<script lang="ts" setup>
import ContentCard from "@/components/ContentCard.vue"
import RequestDetail from "@/components/RequestDetail.vue"

defineProps({
    data: {},
})
</script>

<template>
    <div id="dropHere"/>
    <ContentCard v-for="request in data">
        <RequestDetail :request="request"/>
    </ContentCard>
</template>
