<script lang="ts" setup>
import {Link} from '@inertiajs/vue3';
import {BookOpen, FolderGit2, LayoutGrid} from '@lucide/vue';
import AppLogo from '@/components/App/AppLogo.vue';
import NavFooter from '@/components/nav/NavFooter.vue';
import NavMain from '@/components/nav/NavMain.vue';
import NavUser from '@/components/nav/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import {dashboard} from '@/routes';
import type {NavItem} from '@/types';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Repository',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: FolderGit2,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#vue',
        icon: BookOpen,
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton as-child size="lg">
                        <Link :href="dashboard()">
                            <AppLogo/>
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems"/>
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems"/>
            <NavUser/>
        </SidebarFooter>
    </Sidebar>
    <slot/>
</template>
