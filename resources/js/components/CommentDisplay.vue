<script lang="ts" setup>
import type {Comment} from "@/types/data.ts"
import {computed, ref} from "vue";
import TextField from "@/components/forms/TextField.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import ReplyDisplay from "@/components/ui/ReplyDisplay.vue";
import {getImage} from "@/composables/useUserImage";
import {useCommentsStore} from "@/stores/comments";

interface Props {
    comment: Comment,
    imageUrl: string,
}

const emit = defineEmits(['repliedToComment'])
const props = defineProps<Props>();
const page = usePage()
const store = useCommentsStore()
const form = useForm({
    content: null,
    comment_id: props.comment.id,
    user_id: page.props.auth.user.id,
    replyTo: props.comment.user.username
});

const replyOpen = ref<boolean>(false);

const replies = computed(() => {
    return props.comment.replies
})

function submitReply() {
    replyOpen.value = false
    form.post('/reply/store', {
        onSuccess: () => {
            emit('repliedToComment')
        },
    })
}

</script>

<template>
    <div class="w-full flex flex-col">
        <div class="flex w-full justify-between items-center mb-2 gap-2">
            <img :src="imageUrl" alt="avatar"
                 class="size-10 rounded-full">
            <div
                class="flex flex-col align-left justify-center gap-1 mr-auto">
                <p class="text-tertiary font-bold">{{ comment.user.name }}</p>
                <p class="text-dark-gray font-normal">@{{
                        comment.user
                            .username
                    }}</p>
            </div>
            <button class="text-secondary" @click="replyOpen=true">Reply
            </button>
        </div>
        <div class="font-normal text-dark-gray">
            <span v-if="comment.replyTo" class="text-primary font-bold">@{{
                    comment.replyTo
                }}</span> {{ comment.content }}
        </div>
        <div v-if="replyOpen">
            <form class="flex justify-between items-start pt-6"
                  @submit.prevent="form.post('/reply/store')">
                <TextField id="reply" v-model="form.content"
                           class="w-5/8 h-20"
                           inputName="reply"
                ></TextField>
                <button
                    :disabled="form.processing"
                    class="bg-primary text-white body-3 font-bold px-4 py-2 rounded-lg hover:bg-primary-hover"
                    @click="submitReply">
                    Post
                    Reply
                </button>
            </form>

        </div>
        <div v-for="reply in replies" v-if="comment.replies"
             :key="reply.id"
             class="w-full border-l border-l-border pl-5.75">
            <ReplyDisplay :imageUrl="getImage(reply.user)"
                          :parentComment="comment.id"
                          :reply="reply"
                          :replyTo="comment.user.username"
            />
        </div>
    </div>
</template>
