<script setup>
import {ref} from "vue"
import Modal from "@/Components/Modal.vue"
import {RadioGroup, RadioGroupDescription, RadioGroupLabel, RadioGroupOption} from '@headlessui/vue'

const props = defineProps({
    item: Object,
})
const emit = defineEmits(['addItem'])
let showModal = ref(false);
const selected = ref(props.item.item_variations[0])

function addItem(){
    showModal.value = false
    emit('addItem',selected.value)
}

</script>
<template>
    <div @click="showModal = true" class="bg-white p-4 border border-gray-200 rounded-lg flex cursor-pointer flex-col ">
        <h2 class="text-gray-500 text-base font-bold capitalize">{{ props.item.title }}</h2>
        <p class="text-xs text-gray-400"> {{props.item.item_variations.length}} Options</p>
        <div class=" flex justify-between items-end">
            <p class="text-orange-500  text-2xl">Rs {{ props.item.item_variations[0].price }} </p>

            <img v-if="props.item.thumb_url" class="h-20 w-20  object-cover rounded-lg"
                 :src="props.item.thumb_url" alt="">
            <div v-else class="h-20 w-20 bg-gray-100  object-cover rounded-lg"></div>
        </div>
    </div>
    <Modal :show="showModal" @close="showModal = false" @addItem="addItem(data)">
        <template #header>
            <div class="bg-gray-100 h-56 w-full">
                <img v-if="item.file_url" class="h-full object-cover w-full "
                     :src="item.file_url" alt="">
            </div>
        </template>

        <span>
                <RadioGroup v-model="selected">
    <div class="bg-white rounded-md -space-y-px">
      <RadioGroupOption as="template" v-for="(variation, variationIdx) in item.item_variations" :key="variation.id"
                        :value="variation" v-slot="{ checked, active }">
        <div :class="[variationIdx === 0 ? 'rounded-tl-md rounded-tr-md' : '', variationIdx === variation.length - 1 ?
        'rounded-bl-md rounded-br-md' : '', checked ? 'bg-orange-50 border-orange-200 z-10' : 'border-gray-200',
        'relative border p-4 flex cursor-pointer focus:outline-none']">
          <span :class="[checked ? 'bg-orange-600 border-transparent' : 'bg-white border-gray-300', active ?
          'ring-2 ring-offset-2 ring-orange-500' : '',
          'h-4 w-4 mt-0.5 cursor-pointer shrink-0 rounded-full border flex items-center justify-center']"
                aria-hidden="true">
            <span class="rounded-full bg-white w-1.5 h-1.5"/>
          </span>
            <span class="flex justify-between w-full">
                  <span class="ml-3 flex flex-col">
            <RadioGroupLabel as="span" :class="[checked ? 'text-orange-900' : 'text-gray-900',
            'block text-sm font-medium']">
              {{ variation.title }}
            </RadioGroupLabel>
            <RadioGroupDescription as="span" :class="[checked ? 'text-orange-700' : 'text-gray-500', 'block text-sm']">
              {{ variation.short_description }}
            </RadioGroupDescription>
          </span>
                    <span class="text-base font-bold bg-orange-400 text-white items-center px-4 py-2 rounded-full ">
                        {{ variation.price }} Rs
                    </span>
            </span>
        </div>
      </RadioGroupOption>
    </div>
  </RadioGroup>
        </span>

        <template #footer>
            <button
                @click="addItem()"
                class="bg-orange-500 text-white px-4 py-1 rounded ml-2">Add {{props.item.title}}</button>
        </template>
    </Modal>
</template>
