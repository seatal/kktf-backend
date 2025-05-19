<script setup>
defineProps({
    value: {type: String, required: false},
})
</script>

<template>
    <label class="form-label mb-2">
        <span v-if="value">{{ value }}</span>
        <span v-else>
            <slot/>
        </span>
    </label>
</template>
