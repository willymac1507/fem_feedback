<script lang="ts" setup>
import AppContent from '@/components/App/AppContent.vue';
import AppHeader from '@/components/App/AppHeader.vue';
import AppShell from '@/components/App/AppShell.vue';
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
    <AppShell variant="header">
        <AppHeader :breadcrumbs="breadcrumbs"/>
        <AppContent variant="header">
            <slot/>
        </AppContent>
        <Toaster/>
    </AppShell>
</template>
