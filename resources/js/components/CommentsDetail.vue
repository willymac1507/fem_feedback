<script lang="ts" setup>
import type {Comment, User} from '@/types/data.ts'
import {computed} from "vue";
import CommentDisplay from "./CommentDisplay.vue";

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

const images = import.meta.glob('/resources/js/assets/user-images/*.jpg', {
    import: 'default',
    eager: true,
})

function getImage(user: User): any {
    const firstName = user.name.split(' ')[0].toLowerCase()
    return images[`/resources/js/assets/user-images/image-${firstName}.jpg`]
}


</script>

<template>
    <h3>{{ commentCount }} Comments</h3>
    <div v-for="comment in comments" v-if="comments" :key="comment.id"
         class="flex flex-col body-3 gap-6 pt-6">
        <CommentDisplay :comment="comment" :imageUrl="getImage(comment.user)"/>
        <div v-for="reply in comment.replies" v-if="comment.replies"
             :key="reply.id"
             class="w-full border-l border-l-border pl-5.75">
            <CommentDisplay :comment="reply" :imageUrl="getImage(reply.user)"
                            :replyTo="comment.user.username"/>
        </div>
        <div class="w-full h-0 border-t border-border"></div>
    </div>
</template>
