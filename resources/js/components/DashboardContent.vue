<script setup lang="ts">
import ContentCard from "@/components/ContentCard.vue"
import RequestDetail from "@/components/RequestDetail.vue"

defineProps({
  data: {},
})
</script>

<template>
  <ContentCard v-for="request in data">
    <RequestDetail :request="request"/>
  </ContentCard>
</template>