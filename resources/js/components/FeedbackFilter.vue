<script lang="ts" setup>

import NavCard from "./NavCard.vue";
import InteractiveButton1 from "./InteractiveButton1.vue";
import {useFilterStore} from '@/stores/filter'

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
    store.activeFilter = item
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

