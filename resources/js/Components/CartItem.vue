<script setup>
const props = defineProps({
    cart_item:Object,
})
</script>
<template>
    <div class="flex justify-between w-full items-center">
                <img v-if="cart_item.variation_item.thumb_image_url" :src="cart_item.variation_item.thumb_image_url"
             class="rounded w-12 h-12 object-cover" alt="Order Pic">
        <div v-else class="h-12 w-12 bg-gray-100  object-cover rounded-lg"></div>

        <h5 class="font-light capitalize text-xs w-20  flex flex-col">
        <span>    {{ cart_item.variation_item.item.title }}</span>
        <span>    {{ cart_item.variation_item.title }}</span>
        </h5>
        <div class="flex w-16 gap-2">
            <button @click="$emit('decreaseQuantity')"
                    class="bg-gray-100 text-gray-700 text-lg font-bold flex items-center justify-center rounded w-6 h-6 ">
                -
            </button>
            <span class="font-bold text-lg">{{ cart_item.quantity }}</span>
            <button
                @click="$emit('increaseQuantity')"
                class="bg-gray-100 text-gray-700 text-lg font-bold flex items-center justify-center rounded w-6 h-6 ">
                +
            </button>
        </div>
        <div class="w-14 text-right text-sm">{{ cart_item.item_total }} Rs</div>
    </div>
</template>
