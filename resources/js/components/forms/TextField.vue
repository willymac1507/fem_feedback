<script lang="ts" setup>
import {Ref} from "vue";

interface Props {
    inputName: string,
    id: string,
    cols?: number,
    rows?: number,
    addClass?: string
    placeholder?: string
}

const model: Ref = defineModel()
const props = defineProps<Props>()


</script>

<template>
    <textarea
        :id="id"
        v-model="model"
        :class="addClass"
        :cols="cols"
        :name="inputName"
        :placeholder="placeholder"
        :rows="rows"
        class="bg-light-gray focus:outline focus:outline-secondary rounded-sm body-3 font-normal text-tertiary p-2"
    ></textarea>
</template>

<style scoped>

</style>
