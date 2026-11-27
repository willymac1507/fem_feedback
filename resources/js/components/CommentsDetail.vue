<script lang="ts" setup>
import type {Comment} from '@/types/data.ts'
import {computed} from "vue";
import CommentDisplay from "./CommentDisplay.vue";
import {router} from "@inertiajs/vue3";
import {getImage} from "@/composables/useUserImage";

interface Props {
    comments: Comment[]
}

const props = defineProps<Props>()

const commentCount = computed(() => {
    if (props.comments) {
        return props.comments.length
    } else {
        return 0
    }
})

function refreshReplies() {
    router.reload({only: ['props.comments']})
}


</script>

<template>
    <h3>{{ commentCount }} Comments</h3>
    <div v-for="comment in comments" v-if="comments" :key="comment.id"
         class="flex flex-col body-3 gap-6 pt-6">
        <CommentDisplay :comment="comment" :imageUrl="getImage(comment.user)"/>

        <div class="w-full h-0 border-t border-border"></div>
    </div>
</template>
