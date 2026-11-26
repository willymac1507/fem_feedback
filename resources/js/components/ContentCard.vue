<script lang="ts" setup>
const emit = defineEmits(['selected'])
</script>

<template>
    <div
        class="bg-white flex flex-col gap-y-2.25 p-6 rounded-lg justify-start grow-0">
        <slot/>
    </div>
</template>
