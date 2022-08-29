<script setup>
defineProps({
    order:Object,
})
</script>
<template>
    <div class="bg-white rounded-t">
        <div class="h-28 w-full bg-gray-200 rounded-t">
            <img class="w-full h-full"
                v-if="order.cart_items[0].variation_item.item.file_url"
                :src="order.cart_items[0].variation_item.item.file_url" alt="">
        </div>
        <div class="p-4">
            <div>
            Items Ordered: {{order.cart_items.length}}
            </div>
            <div>
            Amount : {{order.total_amount}} Rs
            </div>
        </div>
    </div>
</template>
