<script lang="ts" setup>
import type {
    DropdownMenuCheckboxItemEmits,
    DropdownMenuCheckboxItemProps
} from "reka-ui"
import {
    DropdownMenuCheckboxItem,
    DropdownMenuItemIndicator,
    useForwardPropsEmits,
} from "reka-ui"
import type {HTMLAttributes} from "vue"
import {Check} from "@lucide/vue"
import {reactiveOmit} from "@vueuse/core"
import {cn} from "@/lib/utils"

const props = defineProps<DropdownMenuCheckboxItemProps & {
    class?: HTMLAttributes["class"]
}>()
const emits = defineEmits<DropdownMenuCheckboxItemEmits>()

const delegatedProps = reactiveOmit(props, "class")

const forwarded = useForwardPropsEmits(delegatedProps, emits)
</script>

<template>
    <DropdownMenuCheckboxItem
        :class=" cn(
      'focus:text-primary relative flex cursor-default items-center gap-2 rounded-sm py-1.5 px-4 text-sm outline-hidden select-none data-[disabled]:pointer-events-none data-[disabled]:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*=\'size-\'])]:size-4',
      props.class,
    )"
        data-slot="dropdown-menu-checkbox-item"
        v-bind="forwarded"
    >
    <span
        class="pointer-events-none absolute right-4 flex size-3.5 items-center justify-center">
      <DropdownMenuItemIndicator>
        <slot name="indicator-icon">
          <Check class="size-4 text-primary"/>
        </slot>
      </DropdownMenuItemIndicator>
    </span>
        <slot/>
    </DropdownMenuCheckboxItem>
</template>
