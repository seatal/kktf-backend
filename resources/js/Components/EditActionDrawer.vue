<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    offcanvasRight: {type: String, default: '#offcanvasRight'},
    iconType: {type: String, default: 'pencil'},
    closeBtn: {type: String, default: '#closeBtn'},
    showIcon: {type: String, default: 'true'},
    title: {type: [String, null], required: false},
    disabled: {type: Boolean, default: false},
})
</script>

<style scoped>
.text-brand-red:hover {
    color: #bd072b !important;
}
</style>

<template>
    <Link
        :aria-controls="offcanvasRight"
        :class="[disabled ? 'disabled' : $attrs.class ? $attrs.class : 'btn-action btn-action-outline-secondary']"
        :data-bs-target="offcanvasRight"
        :id="closeBtn"
        data-bs-toggle="offcanvas"
        href="#"
    >
        <svg
            fill="none"
            height="24"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1"
            v-if="showIcon === 'true' && iconType === 'pencil'"
            viewBox="0 0 24 24"
            width="24"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"/>
            <path d="M13.5 6.5l4 4"/>
        </svg>

        <svg
            fill="none"
            height="24"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1"
            v-if="showIcon === 'true' && iconType === 'upload'"
            viewBox="0 0 24 24"
            width="24"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
            <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/>
            <path d="M12 11v6"/>
            <path d="M9.5 13.5l2.5 -2.5l2.5 2.5"/>
        </svg>

        <svg
            fill="none"
            height="24"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1"
            v-if="showIcon === 'true' && iconType === 'tick'"
            viewBox="0 0 24 24"
            width="24"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
            <path d="M5 12l5 5l10 -10" />
        </svg>

        <template v-if="showIcon">
            <slot/>
        </template>

        <span class="pe-1 p3 lh-1" v-else>
            <slot/>
        </span>

        <span class="p3">
            {{ title }}
        </span>
    </Link>
</template>

<style scoped>
.disabled {
    pointer-events: none !important;
    color: #8fa385 !important;
}
</style>
