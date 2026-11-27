<script lang="ts" setup>
import ContentCard from "@/components/ContentCard.vue"
import RequestDetail from "@/components/RequestDetail.vue"
import {Request} from "@/types/data";
import {computed, ref} from "vue";
import CommentsDetail from "./CommentsDetail.vue";

interface Props {
    data: Array<Request>
}

const props = defineProps<Props>()

let showMany = ref(true)
let showDetail = ref(false)
let selectedRequestId = ref<number>(props.data[0].id)

const selectedRequest = computed(() => {
    return props.data.find(
        request => request.id === selectedRequestId.value
    )
})

function selectRequest(id: number) {
    selectedRequestId.value = id
    showMany.value = !showMany.value
    showDetail.value = !showDetail.value
}

</script>

<template>
    <div v-if="showMany"
         class="cardContainer">
        <ContentCard v-for="(request, index) in data"
                     :key="index">
            <RequestDetail :request="request"
                           @requestSelected="selectRequest(request.id)"
            />
        </ContentCard>
    </div>

    <div v-if="showDetail" class="cardContainer">
        <ContentCard>
            <RequestDetail v-if="selectedRequest" :request="selectedRequest"
                           @requestSelected="selectRequest(0)"/>
        </ContentCard>
        <ContentCard class="gap-y-0!">
            <CommentsDetail v-if="selectedRequest && selectedRequest.comments"
                            :comments="selectedRequest.comments"/>
        </ContentCard>
    </div>
</template>
