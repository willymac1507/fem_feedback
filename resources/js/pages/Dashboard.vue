<script lang="ts" setup>
import {Head} from '@inertiajs/vue3';
import {dashboard} from '@/routes';
import DashboardHeader from "../components/DashboardHeader.vue";
import DashboardContent from "../components/DashboardContent.vue";


type Request = {
    id: number,
    title: string,
    category: string,
    description: string,
    status: string,
    upvote: number,
    comments?: []
}
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
    <div
        id="dashboard"
        class="flex flex-1 flex-col gap-4 overflow-x-auto justify-start px-4"
    >
        <DashboardContent :data="data"/>
    </div>
</template>
