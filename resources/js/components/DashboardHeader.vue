<script lang="ts" setup>
import PlusIcon from "@/components/icons/PlusIcon.vue"
import SortOptions from "./SortOptions.vue";
</script>

<template>
    <div
        class="body-3 w-full h-14 shrink-0 bg-dark-blue py-2 px-6 flex flex-row gap-2 justify-between items-center">
        <div class="text-white">
            <span class="font-normal">Sort by : </span>
        </div>
        <SortOptions/>
        <button
            class="gap-1 bg-primary h-full w-33.5 rounded-lg text-white flex flex-row justify-center items-center">
            <PlusIcon class=""/>
            <span class="font-bold">Add Feedback</span>
        </button>

    </div>
</template>
