<script lang="ts" setup>

import ContentCard from "./ContentCard.vue";
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
    <ContentCard>
        <InteractiveButton1 v-for="item in
        filterItems" :key="item"
                            :active="item === store.activeFilter"
                            @changeFilter="changeFilter(item)">
            {{ item }}
        </InteractiveButton1>
    </ContentCard>
</template>

