<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

const user = computed(() => usePage().props.value.auth.user)
console.log(user)
defineProps({
    cart: {
        type: Array
    },
    discount: {
        type: Number
    },
    total: {
        type: Number
    },
    subtotal: {
        type: Number
    },
})
</script>
<template>
    <div id="print-receipt" class="text-[0.6rem] max-w-sm mx-auto">
        <div class="text-center mx-auto leading-[1rem]">
            <h1 class="text-center font-bold mt-4 text-base">Ghauri Tikka & Broast</h1>
            <p class=" inline-block border-b border-solid border-black">
                Address :
                Ghauri, Jallal
                Masjid
                Chowk Gulgasht, Multan</p>
            <div>
            <p class="inline-block border-b border-solid border-black">
                Contact: 03001236547
            </p>
            </div>
        </div>
        <div class="flex items-center justify-between mt-2">
            <div class="text-center">
                <span>Cashier:</span>
                <span>{{user.name}}</span>
            </div>
            <div class="text-center">
                <span>Date - </span>
                <span>{{ new Date().toDateString() }}</span>
            </div>
        </div>
        <div class="flex items-center justify-between mb-1">
            <div class="text-center">
                <span>Invoice # - </span>
                <span></span>
            </div>
            <div class="text-center">
                <span>Date - </span>
                <span>{{ new Date().toDateString() }}</span>
            </div>
        </div>
        <table class="w-full ">
            <thead>
            <tr class="border-b border-solid border-black">
                <th class="font-normal text-left">Title</th>
                <th class="font-normal text-right">Qty</th>
                <th class="font-normal text-right">Price</th>
                <th class="font-normal text-right">Total</th>
            </tr>
            </thead>
            <tbody>
            <tr class="border-b border-solid border-black" v-for="(cart_item,cart_array_id) in cart"
                :key="cart_array_id">
                <td>{{ cart_item.variation_item.item.title }} - {{ cart_item.variation_item.title }}</td>
                <td class="text-right">{{ cart_item.quantity }}</td>
                <td class="text-right">{{ cart_item.variation_item.price }}</td>
                <td class="text-right">{{ cart_item.item_total }}</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3" class="text-right">Sub Total</td>
                <td class="text-right">{{ subtotal }}</td>
            </tr>
            <tr>
                <td colspan="3" class="text-right">Discount</td>
                <td class="text-right">{{ discount }}</td>
            </tr>
            <tr>
                <td colspan="3" class="text-right">Total</td>
                <td class="text-right">{{ total }}</td>
            </tr>
            </tfoot>
        </table>
        <div class="text-center text-[.6rem] leading-[.8rem] mt-2">
            <div class="text-xs mb">Buyer Copy</div>
            <div class="">
                Developed by Appsoulz
            </div>
            <div class="">www.appsoulz.com | 03001805559</div>
        </div>

    </div>
</template>
