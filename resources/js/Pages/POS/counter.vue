<script setup>
import Layout from '@/Shared/Layout.vue'
import {reactive,computed} from 'vue'

const props = defineProps(['items'])
let state = reactive({
    cart: [],
    discount:0,
    tax:0,
    subtotal:0,
    total:0,
})
const people = [
    {name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member'},
];
console.log(props.items)

const subTotal = computed(()=>{
return cart.sum()
})

function addToCart(id) {
    let cartItem = {
        index: props.items[id].id,
        item: props.items[id],
        quantity: 1,
        item_total:  parseInt(props.items[id].price)
    }
    state.cart.push(cartItem)
}

function increaseQuantity(index){
    let currentItem = state.cart.map(item=>{
        return item.id === index;
    })
    // currentItem.quantity = currentItem.quantity+1
    // currentItem.item_total = currentItem.item_total+currentItem.item.price

    state.cart[index].quantity = state.cart[index].quantity+1
    state.cart[index].item_total = parseInt(state.cart[index].item_total) +parseInt(state.cart[index].item.price)
    console.log(state.cart[index])

}

function decreaseQuantity(index){
    if(state.cart[index].quantity>1){
    state.cart[index].quantity = state.cart[index].quantity-1
    state.cart[index].item_total = parseInt(state.cart[index].item_total) -parseInt(state.cart[index].item.price)
    console.log(state.cart[index])
    }

}

</script>
<template>
    <Layout>
        <div class="h-screen">
            <div class="w-full mx-auto flex ">
                <div class="w-9/12 bg-gray-100 ">
                    <div class="px-8 py-2 bg-white mx-auto flex justify-between  border-b border-gray-100">
                        <div class="text-blue-600 font-bold">GHAURI</div>
                        <div>
                            User
                        </div>
                    </div>
                    <div class="bg-white p-8">
                        <div class="grid grid-cols-5 gap-4">
                            <div @click="addToCart(k)"
                                 class="border border-gray-200 rounded-lg flex cursor-pointer flex-col "
                                 v-for="(item,k) in props.items" :key="item.id">
                                <img class="h-24 w-full object-cover rounded-t-lg"
                                     src="https://picsum.photos/200" alt="">
                                <div class="p-2 flex flex-col">
                                    <h2 class=" text-gray-600 text-sm capitalize">{{ item.title }}</h2>
                                    <p class="text-sm font-bold text-red-800 ">
                                        {{ item.price }} Rs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div
                            class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
                            <div>
                                <div class="mt-1 relative flex items-center">
                                    <input type="text" name="search" id="search"
                                           class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md"/>
                                    <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                                        <kbd
                                            class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400">
                                            ⌘K </kbd>
                                    </div>
                                </div>
                            </div>
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Sr #
                                    </th>
                                    <th scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">
                                        Quantity
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        <span class="">Total</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="person in people" :key="person.email">
                                    <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                                        {{ person.name }}
                                        <dl class="font-normal lg:hidden">
                                            <dt class="sr-only">Title</dt>
                                            <dd class="mt-1 truncate text-gray-700">{{ person.title }}</dd>
                                            <dt class="sr-only sm:hidden">Email</dt>
                                            <dd class="mt-1 truncate text-gray-500 sm:hidden">{{ person.email }}</dd>
                                        </dl>
                                    </td>
                                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{
                                            person.title
                                        }}
                                    </td>
                                    <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">{{
                                            person.email
                                        }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">{{ person.role }}</td>
                                    <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                        >Edit<span class="sr-only">, {{ person.name }}</span></a
                                        >
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="w-3/12 bg-gray-200 ">
                    <div class="bg-white px-4 h-screen flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between py-4">
                                <h4 class="font-bold text-xl">Current Order</h4>
                                <button class="text-red-700 bg-red-100 text-xs rounded-full px-4 py-2">Clear
                                    All</button>
                            </div>
                            <div class="">
                                <div class="w-full flex items-center gap-4 py-2" v-for="(item,j) in state.cart"
                                     :key="j">
                                    <div class="flex justify-between w-full items-center">
                                        <img src="https://picsum.photos/seed/picsum/200"
                                             class="rounded w-12 h-12 object-cover" alt="Order Pic">
                                        <h5 class="font-bold text-xs w-24 px-2">{{ item.item.title }}</h5>
                                        <div class="flex w-16 gap-2">
                                            <button @click="decreaseQuantity(j)"
                                                class="bg-gray-100 text-gray-700 text-lg font-bold flex items-center justify-center rounded w-6 h-6 ">
                                                -
                                            </button>
                                            <span class="font-bold text-lg">{{item.quantity}}</span>
                                            <button
                                                @click="increaseQuantity(j)"
                                                class="bg-gray-100 text-gray-700 text-lg font-bold flex items-center justify-center rounded w-6 h-6 ">
                                                +
                                            </button>
                                        </div>
                                        <div class="w-14 text-right">{{ item.item_total }} Rs</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-10">
                            <div class="border border-gray-200 rounded pt-4 px-4 my-4">
                                <div class="flex justify-between">
                                    <h4>SubTotal</h4>
                                    <h4>10236Rs</h4>
                                </div>
                                <div class="flex justify-between">
                                    <h4>Discount</h4>
                                    <h4>10236Rs</h4>
                                </div>
                                <div class="flex justify-between">
                                    <h4>Sales Tax</h4>
                                    <h4>10236Rs</h4>
                                </div>
                                <hr class="mt-4 text-lg">
                                <div class="my-4 flex justify-between">
                                    <h4 class="text-lg">Total</h4>
                                    <h4 class="font-bold text-lg ">10236 Rs</h4>
                                </div>

                            </div>
                            <div>
                                <button class="w-full h-10 bg-blue-600 rounded text-white">Print Invoice</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </Layout>
</template>


