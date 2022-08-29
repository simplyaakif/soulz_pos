<script setup>
import Layout from "@/Shared/Layout.vue";
import {Head} from "@inertiajs/inertia-vue3"
import Sidebar from "@/Components/Sidebar.vue";
import OrderHistoryItem from "@/Components/OrderHistoryItem.vue";

defineProps(['orders'])
</script>
<template>
    <Layout>
        <Head title="Order History Screen"/>
        <div class="w-full mx-auto flex ">
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
    </Layout>
</template>
