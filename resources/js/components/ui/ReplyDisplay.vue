<script lang="ts" setup>
import type {Comment} from "@/types/data.ts"
import {ref} from "vue";
import TextField from "@/components/forms/TextField.vue";
import {useForm, usePage} from "@inertiajs/vue3";

interface Props {
    reply: Comment,
    imageUrl: string,
    parentComment: number,
    replyTo: string,
}

const emit = defineEmits(['repliedToComment'])
const props = defineProps<Props>();
const page = usePage()
const form = useForm({
    content: null,
    comment_id: props.parentComment,
    user_id: page.props.auth.user.id,
    replyTo: props.reply.user.username
});

const replyOpen = ref<boolean>(false);

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
    <div class="w-full flex flex-col pt-6">
        <div class="flex w-full justify-between items-center mb-2 gap-2">
            <img :src="imageUrl" alt="avatar"
                 class="size-10 rounded-full">
            <div
                class="flex flex-col align-left justify-center gap-1 mr-auto">
                <p class="text-tertiary font-bold">{{ reply.user.name }}</p>
                <p class="text-dark-gray font-normal">
                    @{{ reply.user.username }}</p>
            </div>
            <button class="text-secondary" @click="replyOpen=true">Reply
            </button>
        </div>
        <div class="font-normal text-dark-gray">
            <span v-if="reply.replyTo" class="text-primary font-bold">@{{
                    reply.replyTo
                }}</span> {{ reply.content }}
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
    </div>
</template>
