<script lang="ts" setup>
import {ref, watch} from "vue";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuRadioGroup,
    DropdownMenuRadioItem,
    DropdownMenuTrigger
} from "@/components/ui/dropdown-menu";
import ArrowDownIcon from "@/components/icons/ArrowDownIcon.vue";
import {router} from "@inertiajs/vue3";
import {dashboard} from "@/routes";

const sortOptionSelected = ref(
    'mostUpvotes'
)

let triggerLabel = ref('Most Upvotes')
let dropdownOpen = ref(false)
let sortField = ref('upvote')
let sortDirection = ref('desc')

watch(sortOptionSelected, updateSortOptions)

function updateSortOptions() {
    switch (sortOptionSelected.value) {
        case 'mostUpvotes':
            sortField.value = 'upvote';
            sortDirection.value = 'desc';
            triggerLabel.value = 'Most Upvotes';
            break;
        case 'leastUpvotes':
            sortField.value = 'upvote';
            sortDirection.value = 'asc';
            triggerLabel.value = 'Least Upvotes';
            break;
        case 'mostComments':
            sortField.value = 'comments_count';
            sortDirection.value = 'desc';
            triggerLabel.value = 'Most Comments';
            break;
        case 'leastComments':
            sortField.value = 'comments_count';
            sortDirection.value = 'asc';
            triggerLabel.value = 'Least Comments';
            break;
    }
    router.get(dashboard(), {
        'sortField': sortField.value,
        'sortDirection': sortDirection.value,
    }, {
        preserveState: true,
        preserveScroll: true
    })
}

</script>

<template>
    <DropdownMenu v-model:open="dropdownOpen">
        <DropdownMenuTrigger asChild class="text-white">
            <button class="mr-auto flex gap-2 text-white items-center">
                <span class="font-bold">{{ triggerLabel }}</span>
                <ArrowDownIcon class="text-white"/>
            </button>
        </DropdownMenuTrigger>
        <DropdownMenuContent class="bg-white body-1 text-dark-gray w-63.75">
            <DropdownMenuRadioGroup v-model="sortOptionSelected">
                <DropdownMenuRadioItem :checked="sortOptionSelected ===
                                       'mostUpvotes'"
                                       value="mostUpvotes">
                    Most Upvotes
                </DropdownMenuRadioItem>
                <DropdownMenuRadioItem :checked="sortOptionSelected ===
                                       'leastUpvotes'"
                                       value="leastUpvotes">
                    Least Upvotes
                </DropdownMenuRadioItem>
                <DropdownMenuRadioItem :checked="sortOptionSelected ===
                                       'mostComments'"
                                       value="mostComments">
                    Most Comments
                </DropdownMenuRadioItem>
                <DropdownMenuRadioItem :checked="sortOptionSelected ===
                                       'leastComments'"
                                       value="leastComments">
                    Least Comments
                </DropdownMenuRadioItem>
            </DropdownMenuRadioGroup>
        </DropdownMenuContent>
    </DropdownMenu>
</template>

<style scoped>

</style>
