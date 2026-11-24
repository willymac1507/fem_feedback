<script lang="ts" setup>
import {ref} from "vue";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger
} from "@/components/ui/dropdown-menu";
import ArrowDownIcon from "@/components/icons/ArrowDownIcon.vue";

let dropOpen = ref(false)

function toggleDrop() {
    dropOpen.value = !dropOpen.value
}
</script>

<template>
    <!--    <button class="mr-auto flex gap-2 text-white items-center"-->
    <!--            @click="toggleDrop">-->
    <!--        <span class="font-bold">Most Upvotes</span>-->
    <!--        <ArrowDownIcon class="text-white"/>-->
    <!--    </button>-->
    <!--    <DropdownMenu v-model:open="dropOpen">-->
    <!--        <DropdownMenuContent>-->
    <!--            <DropdownMenuSeparator/>-->
    <!--            <DropdownMenuItem>Test</DropdownMenuItem>-->
    <!--        </DropdownMenuContent>-->
    <!--    </DropdownMenu>-->

    <DropdownMenu>
        <DropdownMenuTrigger asChild class="text-white">
            <button class="mr-auto flex gap-2 text-white items-center">
                <span class="font-bold">Most Upvotes</span>
                <ArrowDownIcon class="text-white"/>
            </button>
        </DropdownMenuTrigger>
        <DropdownMenuContent class="bg-white body-1 text-dark-gray">
            <DropdownMenuItem>Most Upvotes</DropdownMenuItem>
            <DropdownMenuSeparator/>
            <DropdownMenuItem>Least Upvotes</DropdownMenuItem>
            <DropdownMenuSeparator/>
            <DropdownMenuItem>Most Comments</DropdownMenuItem>
            <DropdownMenuSeparator/>
            <DropdownMenuItem>Least Comments</DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>

<style scoped>

</style>
