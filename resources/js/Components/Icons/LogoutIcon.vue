<template>
    <svg :class="props.classNames" width="24" height="24" viewBox="0 0 24 24" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M8.89999 7.56001C9.20999 3.96001 11.06 2.49001 15.11 2.49001H15.24C19.71 2.49001 21.5 4.28001 21.5 8.75001V15.27C21.5 19.74 19.71 21.53 15.24 21.53H15.11C11.09 21.53 9.23999 20.08 8.90999 16.54" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M15 12H3.62" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M5.85 8.64999L2.5 12L5.85 15.35" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round"/>
    </svg>

</template>
<script setup>
const props = defineProps({
    classNames:{
        type:String,
        default: 'w-4 h-4 text-gray-600'
    }
})
</script>
