<script lang="ts" setup>
import ContentCard from "@/components/ContentCard.vue"
import RequestDetail from "@/components/RequestDetail.vue"
import {Request} from "@/types/data";
import {ref, watch} from "vue";
import CommentsDetail from "./CommentsDetail.vue";

interface Props {
    data: Array<Request>
}

const props = defineProps<Props>()

let showMany = ref(true)
let showDetail = ref(false)
let selectedRequest = ref<Request>(props.data[0])

watch(selectedRequest, () => {

})

function selectRequest(index: number) {
    selectedRequest.value = props.data[index]
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
                           @requestSelected="selectRequest(index)"
            />
        </ContentCard>
    </div>

    <div v-if="showDetail" class="cardContainer">
        <ContentCard>
            <RequestDetail :request="selectedRequest"
                           @requestSelected="selectRequest(0)"/>
        </ContentCard>
        <ContentCard class="gap-y-0!">
            <CommentsDetail v-if="selectedRequest.comments"
                            :comments="selectedRequest.comments"/>
        </ContentCard>
    </div>
</template>
