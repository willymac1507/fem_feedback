<script lang="ts" setup>
import {Link, usePage} from '@inertiajs/vue3';
import {LayoutGrid} from '@lucide/vue';
import {computed, ref} from 'vue';
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import {Button} from '@/components/ui/button';
import {
    NavigationMenu,
    NavigationMenuItem,
    NavigationMenuList,
    navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';
import {Sheet, SheetContent, SheetTitle,} from '@/components/ui/sheet';
import {useCurrentUrl} from '@/composables/useCurrentUrl';
import {dashboard} from '@/routes';
import headerBackground from '@/assets/background-images/background-header.png'
import type {BreadcrumbItem, NavItem} from '@/types';
import HamburgerIcon from "@/components/icons/HamburgerIcon.vue";
import CloseIcon from "@/components/icons/CloseIcon.vue";
import FeedbackFilter from "@/components/FeedbackFilter.vue";
import RoadmapSummary from "@/components/RoadmapSummary.vue";

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
</script>

<template>
    <div>
        <div
            :style="{ backgroundImage: `url(${headerBackground})` }"
            class="bg-cover bg-center h-18">
            <div
                class="text-white mx-auto flex h-full items-center px-6 py-4 md:max-w-7xl">
                <!-- Mobile Menu -->
                <div class="lg:hidden">
                    <Sheet v-model:open="sheetOpen">
                        <SheetContent class="w-67.75" side="right">
                            <SheetTitle class="sr-only"
                            >Navigation menu
                            </SheetTitle
                            >
                            <div
                                class="flex h-full flex-1 flex-col justify-start space-y-6 p-6"
                            >
                                <FeedbackFilter
                                    @close-sheet="sheetOpen = false"/>
                                <RoadmapSummary/>
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
                        class="mr-2 h-9 w-9 text-white"
                        size="icon"
                        variant="link"
                        @click="sheetOpen = true"
                    >
                        <HamburgerIcon v-if="!sheetOpen" class="size-5 pt-0.5"/>
                        <CloseIcon v-else class="size-5 pt-0.5"/>

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
                <Breadcrumbs :breadcrumbs="breadcrumbs!"/>
            </div>
        </div>
    </div>
</template>
