<script lang="ts" setup>
import {Head} from '@inertiajs/vue3';
import {dashboard} from '@/routes';
import DashboardHeader from "@/components/DashboardHeader.vue";
import DashboardContent from "@/components/DashboardContent.vue";
import type {Request} from '@/types/data'


type Props = {
    data: Request[]
}

defineProps<Props>()

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
    <DashboardHeader/>
    <DashboardContent :data="data"/>
</template>
