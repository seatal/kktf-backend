<script setup>
import {Link} from '@inertiajs/vue3'
import {onMounted, onUnmounted, ref, watchEffect} from 'vue'

const show = defineModel()
const props = defineProps(['closeable'])

const dialog = ref(null)

const close = () => {
    if (dialog.value) {
        dialog.value.close()
        show.value = false
    }
}

watchEffect(() => {
    if (show.value && dialog.value) {
        dialog.value.showModal()
        document.body.style.overflow = 'hidden'
    } else if (dialog.value) {
        dialog.value.close()
        document.body.style.overflow = null
    }
})

const closeOnEscape = (event) => {
    if (event.key === 'Escape' && show.value) {
        close()
    }
}

onMounted(() => document.addEventListener('keydown', closeOnEscape))

onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape)
    document.body.style.overflow = null
})
</script>

<template>
    <dialog @close="close" ref="dialog">
        <div class="dialog-content-wrapper box-shadow-lg border-0">
            <div class="p-2" v-if="show">
                <div class="modal-header p-4">
                    <div class="d-flex align-items-start justify-content-between position-relative gap-4">
                        <h4 class="h5 mb-0">
                            <slot name="heading"/>
                        </h4>

                        <Link
                            @click="close"
                            aria-label="Close"
                            class="text-gray-mid"
                            href="#"
                            v-if="closeable"
                        >
                            <svg
                                fill="none"
                                height="24"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                width="24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                                <path d="M18 6l-12 12"/>
                                <path d="M6 6l12 12"/>
                            </svg>
                        </Link>
                    </div>
                </div>

                <div class="modal-content p-4">
                    <slot name="content"/>
                </div>
            </div>
        </div>

        <button @click="close" aria-label="Close Dialog" class="dialog-content-backdrop-faker"/>
    </dialog>
</template>
