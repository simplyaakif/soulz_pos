<script setup>
import Layout from '@/Shared/Layout.vue'
import {reactive} from 'vue'
import PosFoodItem from "@/Components/PosFoodItem.vue";
import Sidebar from "@/Components/Sidebar.vue";
import {Head} from "@inertiajs/inertia-vue3"
import {Inertia} from "@inertiajs/inertia";
import CartItem from "@/Components/CartItem.vue";
import Notification from "@/Components/Notification.vue";
import {EmojiSadIcon, ArchiveIcon} from "@heroicons/vue/solid"
import InvoiceBill from "@/Components/InvoiceBill.vue";
import Modal from "@/Components/Modal.vue";

const props = defineProps(['items', 'food_types', 'errors'])
let state = reactive({
    food_types: [
        {
            id: 0,
            title: 'All'
        },
        ...props.food_types
    ],
    activeFoodType: 'All',
    items: props.items,
    cart: [],
    discount: 0,
    subtotal: 0,
    tax: 0,
    total: 0,
    show_notification: false,
    show_bill:false,
    show_bill_modal:false,
})

function billModal(){
    state.show_bill_modal = true;
}

const beforeSubmit =  ()=>{
    state.show_bill = true;
    submit()
}

function submit() {
    let data = {
        cart_items: state.cart,
        discount_amount: state.discount,
        subtotal_amount: state.subtotal,
        tax_amount: state.tax,
        total_amount: state.total,
        items_count: state.cart.length,
        paid_in: 'cash'

    }
    Inertia.post('/orders', data, {
        onSuccess: () => {
            showNotification()
            window.print();
            clearAll()
            state.show_bill = false;
        }
    })

}

function showNotification() {
    state.show_notification = true
    setTimeout(() => state.show_notification = false, 3000)

}

function selectFoodType(title, id) {
    state.activeFoodType = title
    if (id === 0) {
        state.items = props.items
    } else {
        state.items = props.items.filter((item) => {
            return item.food_type_id === id
        }, id)
    }
}

function clearAll() {
    state.cart = []
    calculate()
}

function calculate() {
    if (state.cart.length > 0) {
        let sub = state.cart.reduce((subt, item) => {
            return subt + item.item_total
        }, 0)
        state.subtotal = sub
        state.total = state.subtotal - state.discount + state.tax
    } else {
        state.subtotal = 0
        state.total = 0
    }
}

function addToCart(items_array_id, data) {

    //Check Already Existence
    if (state.cart.length > 0) {
        let is_available = state.cart.find(cart_item => {
            return cart_item.variation_item_id === data.id
        }, data)
        if (is_available) {
            let duplicate_item_index = state.cart.findIndex(cart_item => {
                return cart_item.variation_item_id === data.id
            }, data)
            console.log(duplicate_item_index)
            increaseQuantity(duplicate_item_index)
        } else {
            let cartItem = {
                variation_item_id: data.id,
                item_id: data.item.id,
                variation_item: data,
                quantity: 1,
                item_total: parseInt(data.price)
            }
            state.cart.push(cartItem)
            calculate()
        }
    } else {
        //If not add item
        let cartItem = {
            variation_item_id: data.id,
            item_id: data.item.id,
            variation_item: data,
            quantity: 1,
            item_total: parseInt(data.price)
        }
        state.cart.push(cartItem)
        calculate()
    }
}

function increaseQuantity(cart_array_id, variation_item_id) {
    // let currentItem = state.cart.map(item => {
    //     return cart_item.variation_item_id === variation_item_id;
    // })
    state.cart[cart_array_id].quantity = state.cart[cart_array_id].quantity + 1
    state.cart[cart_array_id].item_total = parseInt(state.cart[cart_array_id].item_total) +
        parseInt(state.cart[cart_array_id].variation_item.price)
    calculate()
}

function decreaseQuantity(cart_array_id, variation_item_id) {
    if (state.cart[cart_array_id].quantity > 1) {
        state.cart[cart_array_id].quantity = state.cart[cart_array_id].quantity - 1
        state.cart[cart_array_id].item_total = parseInt(state.cart[cart_array_id].item_total) -
            parseInt(state.cart[cart_array_id].variation_item.price)
    } else {
        state.cart = state.cart.filter((cart_item) => {
            return cart_item.variation_item_id !== variation_item_id;
        }, variation_item_id)
    }
    calculate()
}

</script>
<template>
    <Layout>
        <Head title="Order Screen"/>
            <InvoiceBill v-show="state.show_bill" :cart="state.cart" :subtotal="state.subtotal" :total="state.total"
                          :discount="state.discount"/>
        <Modal :show="state.show_bill_modal" @close="state.show_bill_modal = false">
            <InvoiceBill  :cart="state.cart" :subtotal="state.subtotal" :total="state.total"
                         :discount="state.discount"/>
        </Modal>
        <Notification :show="state.show_notification"/>
        <div class="hidden md:block h-screen print:hidden">
            <div class="w-full mx-auto flex ">
                <div class="w-1/12 border-r border-gray-50 py-10 h-screen">
                    <Sidebar/>
                </div>
                <div class="w-9/12 bg-gray-50 overflow-y-auto h-screen">
                    <div class="px-8 py-4">
                        <Transition>
                            <ul class="flex flex-wrap  space-x-2 items-center">
                                <li @click="selectFoodType(link.title,link.id)"
                                    :class="[state.activeFoodType === link.title ?
                                'bg-orange-500 text-white rounded-full':'text-gray-900']"
                                    class="font-light text-sm px-6 py-2 cursor-pointer"
                                    v-for="(link,i) in state.food_types" :key="i">
                                    {{ link.title }}
                                </li>
                            </ul>
                        </Transition>
                        <div class="grid grid-cols-6 mt-4 gap-4">
                            <div v-for="(item,items_array_id) in state.items" :key="item.id">
                                <PosFoodItem
                                    @addItem="addToCart(items_array_id,$event)"
                                    :item="item"
                                    :price="item.item_variations[0].price"
                                    :food_type="item.food_type.title"
                                    :title="item.title"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="w-3/12">
                    <div class="bg-white  h-screen flex flex-col justify-between print:block">
                        <div>
                            <div class=" px-4 flex justify-between py-4">
                                <h4 class="font-bold text-xl text-gray-600">Current Order</h4>
                                <div class="flex items-center">
                                    <button @click="clearAll"
                                            class="text-red-700 bg-red-100 text-xs rounded-lg px-4 py-2">Clear
                                        All
                                    </button>
                                </div>
                            </div>
                            <div class="h-80 px-4 overflow-y-auto">
                                <div
                                    class="w-full flex items-center gap-4 py-2"
                                    v-for="(cart_item,cart_array_id) in state.cart"
                                    :key="cart_array_id">
                                    <CartItem
                                        :cart_item="cart_item"
                                        @increaseQuantity="increaseQuantity(cart_array_id,cart_item.variation_item_id)"
                                        @decreaseQuantity="decreaseQuantity(cart_array_id,cart_item.variation_item_id)"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 px-4">
                            <div class="border border-gray-200 rounded pt-4 px-4 my-4">
                                <div class="flex justify-between">
                                    <h4>SubTotal</h4>
                                    <h4>{{ state.subtotal }} Rs</h4>
                                </div>
                                <div class="flex justify-between">
                                    <h4>Discount</h4>
                                    <h4>{{ state.discount }} Rs</h4>
                                </div>
                                <div class="flex justify-between">
                                    <h4>Sales Tax</h4>
                                    <h4>{{ state.tax }} Rs</h4>
                                </div>
                                <hr class="mt-4 text-lg">
                                <div class="my-4 flex justify-between">
                                    <h4 class="text-lg">Total</h4>
                                    <h4 class="font-bold text-lg ">{{ state.total }} Rs</h4>
                                </div>

                            </div>
                            <div>
                                <ul class="flex gap-4  items-center">
                                    <li class="" @click="billModal">Bill</li>
                                    <li class="">Discount</li>
                                    <li class="">Pay with Cash</li>
                                </ul>
                                <button @click="beforeSubmit" :disabled="state.cart.length ===0"
                                        :class="state.cart.length===0?'bg-gray-600':'bg-orange-600'"
                                        class="w-full h-10  rounded text-white"
                                >
                                    <span v-if="state.cart.length===0" class="flex items-center justify-center">
                                        <EmojiSadIcon class="w-5 h-5 mr-2 text-white"/>
                                        Cart Empty
                                    </span>
                                    <span v-else class="flex items-center justify-center">
                                        <ArchiveIcon class="w-5 h-5 mr-2 text-white"/>
                                    Pay With Cash
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="print:hidden bg-gray-100 inset-0 h-screen flex justify-center items-center lg:hidden">
            <div class="flex flex-col items-center p-8 text-center text-gray-500">
            <EmojiSadIcon class="w-20 h-20 text-gray-500"/>
            Kindly use a Laptop, Or Desktop Computer to use Software
            </div>
        </div>

    </Layout>
</template>


