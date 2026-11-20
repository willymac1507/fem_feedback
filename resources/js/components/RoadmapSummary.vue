<script lang="ts" setup>

import NavCard from "@/components/NavCard.vue";
import BulletIcon from "@/components/icons/BulletIcon.vue";

const roadmapItems = [
    ['Planned', '2', 'bg-peach'],
    ['In Progress', '3', 'bg-primary'],
    ['Live', '1', 'bg-light-blue'],
]
</script>

<template>
    <NavCard>
        <div class="flex flex-col justify-between h-full w-full">
            <div class="flex justify-between w-full mb-8">
                <h3>Roadmap</h3>
                <button class="text-secondary underline cursor-pointer body-3">
                    View
                </button>
            </div>
            <div class="flex flex-col w-full gap-2">
                <div v-for="(item, index) in roadmapItems" :key="index"
                     class="flex justify-between items-center w-full gap-4">
                    <BulletIcon :color="item[2]"/>
                    <p class="body-1">{{ item[0] }}</p>
                    <h3 class="ml-auto">{{ item[1] }}</h3>
                </div>
            </div>
        </div>

    </NavCard>
</template>

<style scoped>

</style>
