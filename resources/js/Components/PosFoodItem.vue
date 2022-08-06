<script setup>
import {defineProps} from "vue";

const props = defineProps({
    // img:String,
    title:String,
    price:String
})
console.log(props)
</script>
<template>
<div class="bg-white p-4 border border-gray-200 rounded-lg flex cursor-pointer flex-col ">
        <h2 class="text-gray-500 text-base font-bold capitalize">{{ props.title }}</h2>
    <p class="text-xs text-gray-400">150g</p>
    <div class=" flex justify-between items-end">
        <p class="text-orange-500  text-2xl">Rs {{ props.price }} </p>
    <img class="h-20 w-20  object-cover rounded-lg"
         src="https://picsum.photos/200" alt="">
    </div>
</div>
</template>
