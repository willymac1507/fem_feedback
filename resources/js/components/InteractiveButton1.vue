<script lang="ts" setup>
interface Props {
    active?: boolean;
}

defineProps<Props>()
</script>

<template>
    <span v-if="active"
          class="bg-interactive-active text-interactive-foreground-active rounded-lg body-3 p-2">
        <slot/>
    </span>
    <button v-else
            class="inline-block cursor-pointer!  bg-interactive text-interactive-foreground hover:bg-interactive-hover rounded-lg body-3 p-2"

            @click="$emit('changeFilter')">
        <slot/>
    </button>
</template>


