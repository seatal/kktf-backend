<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    href: {type: String, required: true}
})
</script>

<template>
    <Link :href="href" class="btn-action btn-action-outline-primary">
        <svg
            fill="none"
            height="24"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1.5"
            viewBox="0 0 24 24"
            width="24"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
        </svg>

        <span class="pe-1 p3 lh-1">
            <slot/>
        </span>
    </Link>
</template>
