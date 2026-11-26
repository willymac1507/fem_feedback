<script lang="ts" setup>

import ArrowUpIcon from "@/components/icons/ArrowUpIcon.vue";
import CommentsIcon from "@/components/icons/CommentsIcon.vue";
import {router} from "@inertiajs/vue3"
import {Request} from "@/types/data";

type Props = {
    request: Request
}

const props = defineProps<Props>()
const emit = defineEmits(["requestSelected"])

function upvoteAdd() {
    let upvote = props.request.upvote + 1
    router.patch((`/request/${props.request.id}/upvote`), {
        upvote: upvote
    }, {
        preserveState: true,
        preserveScroll: true
    })
}


</script>

<template>
    <div class="body-3 font-bold text-tertiary">
        {{ request.title }}
    </div>
    <div class="body-3 font-normal text-dark-gray">
        {{ request.description }}
    </div>
    <div
        class="bg-light-gray py-2 px-4 text-secondary rounded-lg body-3 capitalize mr-auto">
        {{ request.category }}
    </div>
    <div class="body-3 flex flex-row justify-between items-center">
        <button class="btn-interactive flex flex-row gap-2 items-center"
                @click="upvoteAdd">
            <ArrowUpIcon/>
            <span class="text-tertiary">
                {{ request.upvote }}
            </span>
        </button>
        <button class="flex flex-row items-center gap-2"
                @click="$emit('requestSelected', request)">
            <CommentsIcon/>
            <span class="text-tertiary">
                {{ request.comments_count }}
            </span>
        </button>
    </div>
</template>

<style scoped>

</style>
