<script lang="ts" setup>
import AppContent from '@/components/App/AppContent.vue';
import AppShell from '@/components/App/AppShell.vue';
import AppSidebar from '@/components/App/AppSidebar.vue';
import AppSidebarHeader from '@/components/App/AppSidebarHeader.vue';
import {Toaster} from '@/components/ui/sonner';
import type {BreadcrumbItem} from '@/types';

type Props = {
    breadcrumbs?: BreadcrumbItem[];
};

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppShell variant="sidebar">
        <AppSidebar/>
        <AppContent class="min-w-0 overflow-x-clip" variant="sidebar">
            <AppSidebarHeader :breadcrumbs="breadcrumbs"/>
            <slot/>
        </AppContent>
        <Toaster/>
    </AppShell>
</template>
