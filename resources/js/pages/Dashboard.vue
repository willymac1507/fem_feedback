<script lang="ts" setup>
import {Head} from '@inertiajs/vue3';
import {dashboard} from '@/routes';
import ArrowDownIcon from "@/components/icons/ArrowDownIcon.vue";
import PlusIcon from "@/components/icons/PlusIcon.vue";

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Dashboard',
                href: dashboard(),
            },
        ],
    },
});
</script>

<template>
    <Head title="Dashboard"/>

    <div
        id="dashboard"
        class="flex h-full flex-1 flex-col gap-4 overflow-x-auto"
    >
        <div
            class="body-3 w-full h-14 bg-dark-blue py-2 px-6 flex flex-row gap-2 justify-between items-center">
            <div class="text-white">
                <span class="font-normal">Sort by : </span>
                <span class="font-bold">Most Upvotes</span>
            </div>
            <button class="mr-auto">
                <ArrowDownIcon class="text-white"/>
            </button>
            <button
                class="gap-1 bg-primary h-full w-33.5 rounded-lg text-white flex flex-row justify-center items-center">
                <PlusIcon class=""/>
                <span class="font-bold">Add Feedback</span>
            </button>

        </div>
    </div>
</template>
