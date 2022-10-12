<script setup>
import Layout from "@/Shared/Layout.vue";
import {Head} from "@inertiajs/inertia-vue3"
import Sidebar from "@/Components/Sidebar.vue";
import OrderHistoryItem from "@/Components/OrderHistoryItem.vue";
import {EmojiSadIcon} from "@heroicons/vue/solid";

defineProps(['orders'])
</script>
<template>
    <Layout>
        <Head title="Order History Screen"/>
        <div class="hidden md:flex w-full mx-auto ">
            <div class="w-1/12 border-r border-gray-50 py-10 h-screen">
                <Sidebar/>
            </div>
            <div class="w-11/12 bg-gray-50 ">
                <h2 class="p-8 pb-4 text-2xl font-bold text-gray-600">Today's Orders</h2>
                <div class="grid grid-cols-4 gap-4 p-8 pt-4">
                    <div v-for="(order,orders_array_id) in orders" :key="orders_array_id">
                    <OrderHistoryItem
                        :order = "order"
                    />
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-100 inset-0 h-screen flex justify-center items-center lg:hidden">
            <div class="flex flex-col items-center p-8 text-center text-gray-500">
                <EmojiSadIcon class="w-20 h-20 text-gray-500"/>
                Kindly use a Laptop, Or Desktop Computer to use Software
            </div>
        </div>
    </Layout>
</template>
