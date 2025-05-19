<script setup>
import {computed} from 'vue'

const emit = defineEmits(['update:checked'])

const props = defineProps({
    checked: {type: [Array, Boolean], required: true},
    value: {type: [Boolean, null], default: null},
})

const proxyChecked = computed({
    get: () => props.checked,
    set: checked => emit('update:checked', checked),
})
</script>

<template>
    <input
        :value="value"
        class="form-check-input"
        type="checkbox"
        v-model="proxyChecked"
    />
</template>
