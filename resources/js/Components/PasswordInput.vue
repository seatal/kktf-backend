<script setup>
import {onMounted, ref} from 'vue'

const model = defineModel()

const input = ref(null)
const preview = ref(false)
const identifier = Math.random().toString().substring(2, 7)

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus()
    }
})

defineOptions({
    inheritAttrs: false
})

defineExpose({focus: () => input.value.focus()})
</script>

<template>
    <div class="position-relative">
        <div
            @click.prevent="preview = ! preview"
            class="position-absolute top-0 end-0 me-2 mt-2 cursor-pointer z-5"
        >
            <span :id="`password-preview-${identifier}`" class="">
                <svg
                    fill="none"
                    height="24"
                    stroke="#2c3e50"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    v-if="preview"
                    viewBox="0 0 24 24"
                    width="24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                    <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"/>
                    <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87"/>
                    <path d="M3 3l18 18"/>
                </svg>

                <svg
                    fill="none"
                    height="24"
                    stroke="#2c3e50"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    v-else
                    viewBox="0 0 24 24"
                    width="24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
                </svg>
            </span>
        </div>

        <input
            :aria-describedby="`password-preview-${identifier}`"
            :aria-label="preview ? 'Password' : '••••••••••'"
            :placeholder="preview ? 'Password' : '••••••••••'"
            :type="preview ? 'text' : 'password'"
            class="form-control"
            ref="input"
            v-bind="$attrs"
            v-model="model"
        >
    </div>
</template>
