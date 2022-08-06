<script setup>
import CartIcon from "@/Components/Icons/CartIcon.vue"
import LogoutIcon from "@/Components/Icons/LogoutIcon.vue";
import ClockIcon from "@/Components/Icons/ClockIcon.vue";
import ListIcon from "@/Components/Icons/ListIcon.vue";
import {Link} from "@inertiajs/inertia-vue3";
</script>
<template>
    <ul class="flex flex-col  items-center justify-between h-full">
        <li>
            <ul class="space-y-6">
                <li class="w-16 h-16 items-center justify-center flex rounded-lg">
                    <div class="flex flex-col items-center">
                        <!--                <MenuIcon class="w-8 h-8 text-gray-400" />-->
                        <div class="text-gray-700 text-center">
                            GHAURI
                            TIKKA
                        </div>
                    </div>
                </li>
                <li class="w-16 h-16 items-center justify-center bg-orange-500 flex rounded-lg">
                    <div class="flex flex-col items-center">
                        <CartIcon classNames="w-7 h-7 mb-1 text-white" />
                        <div class="text-white text-xs">
                            Orders
                        </div>
                    </div>
                </li>
<!--                <li class="w-16 h-16 items-center justify-center  flex rounded-lg">-->
<!--                    <div class="flex flex-col items-center">-->
<!--                        <SettingIcon classNames="w-6 h-6 text-gray-400 mb-2"/>-->
<!--                        <div class="text-gray-400 text-xs">-->
<!--                            Settings-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </li>-->
                <li class="w-16 h-16 items-center justify-center  flex rounded-lg">
                    <div class="flex flex-col items-center">
                        <ClockIcon classNames="w-6 h-6 text-gray-400 mb-2"/>
                        <div class="text-gray-400 text-xs">
                            History
                        </div>
                    </div>
                </li>
                <li class="w-16 h-16 items-center justify-center  flex rounded-lg">
                    <div class="flex flex-col items-center">
                        <ListIcon classNames="w-6 h-6 text-gray-400 mb-2"/>
                        <div class="text-gray-400 text-xs">
                            Top Items
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        <li class="w-16 h-16 items-center justify-center  flex rounded-lg">
            <Link :href="route('filament.auth.logout')" method="post" >
            <div class="flex flex-col items-center">
                <LogoutIcon classNames="w-6 h-6 text-gray-400 mb-2"/>
                <div class="text-gray-400 text-xs">
                    Sign Out
                </div>
            </div>
            </Link>
        </li>
    </ul>
</template>
