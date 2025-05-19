<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    offcanvasRight: {type: String, default: 'offcanvasRight'}
})
</script>

<template>
    <div
        :id="offcanvasRight"
        class="offcanvas offcanvas-edit offcanvas-end"
        tabindex="-1"
        data-bs-scroll="true"
    >
        <div class="offcanvas-header">
            <h5 class="mb-0 h4">
                <slot name="heading"/>
            </h5>

            <Link
                aria-label="Close"
                class="p-1 position-absolute border rounded-5 close-button text-opacity-50"
                data-bs-dismiss="offcanvas"
                href="#"
                type="button"
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

        <div class="offcanvas-body">
            <slot name="content"/>
        </div>
    </div>
</template>

<style scoped>
.offcanvas.offcanvas-edit {
    --sm-offcanvas-width: min(80%, 60rem);
}

.offcanvas-header, .offcanvas-body {
    padding: 20px;
}
</style>
