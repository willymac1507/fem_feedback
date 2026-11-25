<script lang="ts" setup>
import type {
    DropdownMenuRadioItemEmits,
    DropdownMenuRadioItemProps
} from "reka-ui"
import {
    DropdownMenuItemIndicator,
    DropdownMenuRadioItem,
    useForwardPropsEmits,
} from "reka-ui"
import type {HTMLAttributes} from "vue"
import {Icon} from '@iconify/vue'
import {reactiveOmit} from "@vueuse/core"
import {cn} from "@/lib/utils"

const props = defineProps<DropdownMenuRadioItemProps & {
    class?: HTMLAttributes["class"]
    value: string
}>()

const emits = defineEmits<DropdownMenuRadioItemEmits>()

const delegatedProps = reactiveOmit(props, "class")

const forwarded = useForwardPropsEmits(delegatedProps, emits)
</script>

<template>
    <DropdownMenuRadioItem
        :class="cn(
      'focus:text-primary relative flex cursor-default items-center gap-2 rounded-sm py-1.5 px-4 text-sm outline-hidden select-none data-[disabled]:pointer-events-none data-[disabled]:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*=\'size-\'])]:size-4',
      props.class,
    )"
        data-slot="dropdown-menu-radio-item"
        v-bind="forwarded"
    >
    <span
        class="text-primary pointer-events-none absolute right-4 flex size-3.5 items-center justify-center">
      <DropdownMenuItemIndicator>
                        <Icon icon="radix-icons:check"/>
      </DropdownMenuItemIndicator>
    </span>
        <slot/>
    </DropdownMenuRadioItem>
</template>
