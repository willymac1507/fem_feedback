<script lang="ts" setup>

</script>

<template>
    <!--    TODO - remove temporary border from card. This is just to improve visibility in dev -->
    <div
        class="bg-white flex flex-row flex-wrap gap-x-2 gap-y-4 p-6 rounded-lg border border-gray-400">
        <slot/>
    </div>
</template>
