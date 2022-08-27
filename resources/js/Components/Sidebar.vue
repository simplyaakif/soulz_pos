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
                <li class="w-16 h-16 items-center justify-center  flex rounded-lg"
                    :class="[ route().current('pos.order') ? 'active bg-orange-500':'' ]">
                    <Link :href="route('pos.order')">
                    <div class="flex flex-col items-center">
                        <CartIcon :classNames="[ route().current('pos.order') ?
                        'text-white w-7 h-7 mb-1':'text-gray-700 w-7 h-7 mb-1' ]"/>
                        <div class="text-xs"
                             :class="[ route().current('pos.order') ? 'text-white':'text-gray-700' ]">
                            Orders
                        </div>
                    </div>
                    </Link>
                </li>
                <li class="w-16 h-16 items-center justify-center  flex rounded-lg"
                    :class="[ route().current('pos.history') ? 'active bg-orange-500':'' ]">
                    <Link :href="route('pos.history')">
                    <div class="flex flex-col items-center">
                        <ClockIcon :classNames="[ route().current('pos.history') ?
                        'text-white w-7 h-7 mb-1':'text-gray-700 w-7 h-7 mb-1' ]"/>
                        <div class="text-xs"
                             :class="[ route().current('pos.history') ? 'text-white':'text-gray-700' ]">
                            History
                        </div>
                    </div>
                    </Link>
                </li>
                <li class="w-16 h-16 items-center justify-center  flex rounded-lg"
                    :class="[ route().current('pos.best-sellers') ? 'active bg-orange-500':'' ]">
                    <Link :href="route('pos.best-sellers')">
                    <div class="flex flex-col items-center">
                        <ListIcon :classNames="[ route().current('pos.best-sellers') ?
                        'text-white w-7 h-7 mb-1':'text-gray-700 w-7 h-7 mb-1' ]"/>
                        <div class="text-xs"
                             :class="[ route().current('pos.best-sellers') ? 'text-white':'text-gray-700' ]">
                            Top Items
                        </div>
                    </div>
                    </Link>
                </li>
            </ul>
        </li>
        <li class="w-16 h-16 items-center justify-center  flex rounded-lg">
            <a :href="route('logout')" >
            <div class="flex flex-col items-center">
                <LogoutIcon classNames="w-6 h-6 text-gray-700 mb-2"/>
                <div class="text-gray-700 text-xs">
                    Sign Out
                </div>
            </div>
            </a>
        </li>
    </ul>
</template>
