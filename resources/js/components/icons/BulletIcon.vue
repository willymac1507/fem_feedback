<script lang="ts" setup>
interface Props {
    color: string;
}

defineProps<Props>()
</script>

<template>
    <div :class="color" class="size-2 rounded-full"/>
</template>

<style scoped>

</style>
