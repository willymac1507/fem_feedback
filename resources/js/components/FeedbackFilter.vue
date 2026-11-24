<script lang="ts" setup>

import NavCard from "./NavCard.vue";
import InteractiveButton1 from "./InteractiveButton1.vue";
import {useFilterStore} from '@/stores/filter'

import {router} from "@inertiajs/vue3"

const emit = defineEmits(['closeSheet'])

const filterItems = [
    'All',
    'UI',
    'UX',
    'Enhancement',
    'Bug',
    'Feature',
];
const store = useFilterStore()

function changeFilter(item: string) {
    if (item === 'All') {
        router.visit('/dashboard')
    } else {
        const preparedItem = item.toLowerCase()
        console.log(preparedItem)
        const url = `/dashboard/${preparedItem}/show`
        store.activeFilter = item
        router.visit(url)
    }
    emit('closeSheet')
}

</script>

<template>
    <NavCard>
        <InteractiveButton1 v-for="item in
        filterItems" :key="item"
                            :active="item === store.activeFilter"
                            @changeFilter="changeFilter(item)">
            {{ item }}
        </InteractiveButton1>
    </NavCard>
</template>

