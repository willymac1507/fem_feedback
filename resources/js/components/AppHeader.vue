<script lang="ts" setup>
import {Link, usePage} from '@inertiajs/vue3';
import {BookOpen, Folder, LayoutGrid} from '@lucide/vue';
import {computed, ref} from 'vue';
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import {Button} from '@/components/ui/button';
import {
    NavigationMenu,
    NavigationMenuItem,
    NavigationMenuList,
    navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';
import {
    Sheet,
    SheetContent,
    SheetHeader,
    SheetTitle,
} from '@/components/ui/sheet';
import {useCurrentUrl} from '@/composables/useCurrentUrl';
import {toUrl} from '@/lib/utils';
import {dashboard} from '@/routes';
import type {BreadcrumbItem, NavItem} from '@/types';
import HamburgerIcon from "@/components/icons/HamburgerIcon.vue";

type Props = {
    breadcrumbs?: BreadcrumbItem[];
};
const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const sheetOpen = ref(false);
const page = usePage();
const auth = computed(() => page.props.auth);
const {isCurrentUrl, whenCurrentUrl} = useCurrentUrl();

const activeItemStyles =
    'text-neutral-900 dark:bg-neutral-800 dark:text-neutral-100';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
];

const rightNavItems: NavItem[] = [
    {
        title: 'Repository',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#vue',
        icon: BookOpen,
    },
];
</script>

<template>
    <div>
        <div
            class="header-background border-b border-sidebar-border/80 h-18">
            <div
                class="text-white mx-auto flex h-full items-center px-6 py-4 md:max-w-7xl">
                <!-- Mobile Menu -->
                <div class="lg:hidden">
                    <Sheet v-model:open="sheetOpen">
                        <SheetContent class="w-93.75 p-6" side="right">
                            <SheetTitle class="sr-only"
                            >Navigation menu
                            </SheetTitle
                            >
                            <SheetHeader class="flex justify-start text-left">
                                <AppLogoIcon
                                    class="size-6 fill-current text-black dark:text-white"
                                />
                            </SheetHeader>
                            <div
                                class="flex h-full flex-1 flex-col justify-between space-y-4 py-6"
                            >
                                <nav class="-mx-3 space-y-1">
                                    <Link
                                        v-for="item in mainNavItems"
                                        :key="item.title"
                                        :class="
                                            whenCurrentUrl(
                                                item.href,
                                                activeItemStyles,
                                            )
                                        "
                                        :href="item.href"
                                        class="flex items-center gap-x-3 rounded-lg px-3 py-2 text-sm font-medium hover:bg-accent"
                                    >
                                        <component
                                            :is="item.icon"
                                            v-if="item.icon"
                                            class="h-5 w-5"
                                        />
                                        {{ item.title }}
                                    </Link>
                                </nav>
                                <div class="flex flex-col space-y-4">
                                    <a
                                        v-for="item in rightNavItems"
                                        :key="item.title"
                                        :href="toUrl(item.href)"
                                        class="flex items-center space-x-2 text-sm font-medium"
                                        rel="noopener noreferrer"
                                        target="_blank"
                                    >
                                        <component
                                            :is="item.icon"
                                            v-if="item.icon"
                                            class="h-5 w-5"
                                        />
                                        <span>{{ item.title }}</span>
                                    </a>
                                </div>
                            </div>
                        </SheetContent>
                    </Sheet>
                </div>
                <div>
                    <p class="body-2 font-bold ">Frontend
                        Mentor</p>
                    <p class="body-3 font-normal">Feedback Board</p>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden h-full lg:flex lg:flex-1">
                    <NavigationMenu class="ml-10 flex h-full items-stretch">
                        <NavigationMenuList
                            class="flex h-full items-stretch space-x-2"
                        >
                            <NavigationMenuItem
                                v-for="(item, index) in mainNavItems"
                                :key="index"
                                class="relative flex h-full items-center"
                            >
                                <Link
                                    :class="[
                                        navigationMenuTriggerStyle(),
                                        whenCurrentUrl(
                                            item.href,
                                            activeItemStyles,
                                        ),
                                        'h-9 cursor-pointer px-3',
                                    ]"
                                    :href="item.href"
                                >
                                    <component
                                        :is="item.icon"
                                        v-if="item.icon"
                                        class="mr-2 h-4 w-4"
                                    />
                                    {{ item.title }}
                                </Link>
                                <div
                                    v-if="isCurrentUrl(item.href)"
                                    class="absolute bottom-0 left-0 h-0.5 w-full translate-y-px bg-black dark:bg-white"
                                ></div>
                            </NavigationMenuItem>
                        </NavigationMenuList>
                    </NavigationMenu>
                </div>

                <div class="ml-auto flex items-center space-x-2">

                    <Button
                        class="mr-2 h-9 w-9"
                        size="icon"
                        variant="ghost"
                        @click="sheetOpen = true"
                    >
                        <HamburgerIcon class="size-5 pt-0.5"/>
                    </Button>
                </div>
            </div>
        </div>

        <div
            v-if="props.breadcrumbs.length > 1"
            class="flex w-full border-b border-sidebar-border/70"
        >
            <div
                class="mx-auto flex h-12 w-full items-center justify-start px-4 text-neutral-500 md:max-w-7xl"
            >
                <Breadcrumbs :breadcrumbs="breadcrumbs"/>
            </div>
        </div>
    </div>
</template>

<style>
.header-background {
    background-image: url('@images/background-header.png');
    background-size: cover;
    background-position: center;
}
</style>
