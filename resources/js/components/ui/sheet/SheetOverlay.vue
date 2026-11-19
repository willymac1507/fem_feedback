<script lang="ts" setup>
import type {DialogOverlayProps} from "reka-ui"
import {DialogOverlay} from "reka-ui"
import type {HTMLAttributes} from "vue"
import {reactiveOmit} from "@vueuse/core"
import {cn} from "@/lib/utils"

const props = defineProps<DialogOverlayProps & {
    class?: HTMLAttributes["class"]
}>()

const delegatedProps = reactiveOmit(props, "class")
</script>

<template>
    <DialogOverlay
        :class="cn('data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 absolute bottom-0 inset-x-0 h-[calc(1vh - 72px)] z-50 bg-black/80', props.class)"
        data-slot="sheet-overlay"
        v-bind="delegatedProps"
    >
        <slot/>
    </DialogOverlay>
</template>
