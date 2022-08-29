<script setup>
import Layout from "@/Shared/Layout.vue";
import {Head} from "@inertiajs/inertia-vue3"
import Sidebar from "@/Components/Sidebar.vue";
import ClockIcon from "@/Components/Icons/ClockIcon.vue";

defineProps(['orders'])
</script>
<template>
    <Layout>
        <Head title="Best Sellers Screen"/>
        <div class="w-full mx-auto flex ">
            <div class="w-1/12 border-r border-gray-50 py-10 h-screen">
                <Sidebar/>
            </div>
            <div class="w-11/12 bg-gray-50 ">
                <h2 class="p-8 text-2xl font-bold text-gray-600">Best Selling Items</h2>
            </div>
        </div>
    </Layout>
</template>
