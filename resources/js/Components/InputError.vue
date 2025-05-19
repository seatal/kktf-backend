<script setup>
defineProps({
    message: {type: String, required: false},
})
</script>

<template>
    <span class="invalid-feedback p3 mt-1" v-show="message">
        {{ message }}
    </span>
</template>
