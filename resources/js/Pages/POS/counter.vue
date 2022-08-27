<script setup>
import Layout from '@/Shared/Layout.vue'
import {reactive} from 'vue'
import PosFoodItem from "@/Components/PosFoodItem.vue";
import Sidebar from "@/Components/Sidebar.vue";
import {Head} from "@inertiajs/inertia-vue3"
import {Inertia} from "@inertiajs/inertia";

const props = defineProps(['items', 'food_types','errors'])
let state = reactive({
    food_types:[
        {
            id:0,
            title: 'All'
        },
        ...props.food_types
    ],
    activeFoodType: 'All',
    items:props.items,
    cart: [],
    discount: 0,
    subtotal: 0,
    tax: 0,
    total: 0,
})

function submit(){
    let data = {
        cart:state.cart,
        discount_amount:state.discount,
        subtotal_amount:state.subtotal,
        tax_amount:state.tax,
        total_amount:state.total,
        items_count: state.cart.length,
        paid_in:'cash'

    }
    Inertia.post('/orders',data)
}

function selectFoodType(title,id){
    state.activeFoodType = title
    if(id === 0){
        state.items  = props.items
    }else {
        state.items = props.items.filter((item)=>{
            return item.food_type_id === id
        },id)
    }
}
function clearAll(){
    state.cart = []
    calculate()
}
function calculate() {
    if (state.cart.length > 0) {
        let sub = state.cart.reduce((subt,item)=>{
            return subt + item.item_total
        }, 0)
        state.subtotal = sub
        state.total = state.subtotal - state.discount + state.tax
    } else {
        state.subtotal = 0
        state.total = 0
    }
}
function addToCart(id,data) {
    console.log(id,data)

    let cartItem = {
        index: data.id,
        item: data,
        quantity: 1,
        item_total: parseInt(data.price)
    }
    state.cart.push(cartItem)
    calculate()
}
function increaseQuantity(index) {
    let currentItem = state.cart.map(item => {
        return item.id === index;
    })
    state.cart[index].quantity = state.cart[index].quantity + 1
    state.cart[index].item_total = parseInt(state.cart[index].item_total) + parseInt(state.cart[index].item.price)
    calculate()
}
function decreaseQuantity(index,itemIndex) {
    if (state.cart[index].quantity > 1) {
        state.cart[index].quantity = state.cart[index].quantity - 1
        state.cart[index].item_total = parseInt(state.cart[index].item_total) - parseInt(state.cart[index].item.price)
    }else{
        console.log(state.cart[index].index)
        // let arrIndex = state.cart[index].index
        console.log(itemIndex)
        let newItems = state.cart.filter((item)=>{
            return item.index !== itemIndex;
        },itemIndex)
        state.cart = newItems
    }
    calculate()
}

</script>
<template>
    <Layout>
        <Head title="Order Screen"/>
        <div class="h-screen">
            <div class="w-full mx-auto flex ">
                <div class="w-1/12 border-r border-gray-50 py-10 h-screen">
                    <Sidebar/>
                </div>
                <div class="w-9/12 bg-gray-50 ">
                    <div class="px-8 py-4">
                        <Transition>
                        <ul class="flex space-x-2 items-center">
                            <li @click="selectFoodType(link.title,link.id)"
                                :class="[state.activeFoodType === link.title ?
                                'bg-orange-500 text-white rounded-full':'text-gray-900']"
                                class="font-light text-sm px-6 py-2 cursor-pointer"
                                v-for="(link,i) in state.food_types" :key="i">
                                {{ link.title }}
                            </li>
                        </ul>
                        </Transition>
                        <div class="grid grid-cols-3 mt-4 gap-4">
                            <div v-for="(item,k) in state.items" :key="item.id">
                            <PosFoodItem
                                         @addItem="addToCart(k,$event)"
                                         :item="item"
                                         :price="item.item_variations[0].price"
                                         :food_type="item.food_type.title"
                                         :title="item.title"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="w-3/12">
                    <div class="bg-white px-4 h-screen flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between py-4">
                                <h4 class="font-bold text-xl text-gray-600">Current Order</h4>
                                <div class="flex items-center">
                                    <button @click="clearAll"
                                        class="text-red-700 bg-red-100 text-xs rounded-lg px-4 py-2">Clear
                                        All
                                    </button>
                                </div>
                            </div>
                            <div class="">
                                <div class="w-full flex items-center gap-4 py-2" v-for="(item,j) in state.cart"
                                     :key="j">
                                    <div class="flex justify-between w-full items-center">
                                        <img v-if="items[0].file_url" :src="items[0].file_url"
                                             class="rounded w-12 h-12 object-cover" alt="Order Pic">
                                        <div v-else class="h-12 w-12 bg-gray-100  object-cover rounded-lg"></div>

                                        <h5 class="font-light capitalize text-xs w-20 ">{{ item.item.title }}</h5>
                                        <div class="flex w-16 gap-2">
                                            <button @click="decreaseQuantity(j,item.index)"
                                                    class="bg-gray-100 text-gray-700 text-lg font-bold flex items-center justify-center rounded w-6 h-6 ">
                                                -
                                            </button>
                                            <span class="font-bold text-lg">{{ item.quantity }}</span>
                                            <button
                                                @click="increaseQuantity(j)"
                                                class="bg-gray-100 text-gray-700 text-lg font-bold flex items-center justify-center rounded w-6 h-6 ">
                                                +
                                            </button>
                                        </div>
                                        <div class="w-14 text-right text-sm">{{ item.item_total }} Rs</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-10">
                            <div class="border border-gray-200 rounded pt-4 px-4 my-4">
                                <div class="flex justify-between">
                                    <h4>SubTotal</h4>
                                    <h4>{{ state.subtotal }} Rs</h4>
                                </div>
                                <div class="flex justify-between">
                                    <h4>Discount</h4>
                                    <h4>{{state.discount}} Rs</h4>
                                </div>
                                <div class="flex justify-between">
                                    <h4>Sales Tax</h4>
                                    <h4>{{state.tax}} Rs</h4>
                                </div>
                                <hr class="mt-4 text-lg">
                                <div class="my-4 flex justify-between">
                                    <h4 class="text-lg">Total</h4>
                                    <h4 class="font-bold text-lg ">{{ state.total }} Rs</h4>
                                </div>

                            </div>
                            <div>

                                <button @click="submit"
                                    class="w-full h-10 bg-orange-600 rounded text-white"
                                >Pay With Cash</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </Layout>
</template>


