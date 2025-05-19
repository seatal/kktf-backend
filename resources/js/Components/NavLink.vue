<script setup>
import {computed} from 'vue'
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    href: {type: String, required: true},
    active: {type: Boolean},
})

const classes = computed(() => props.active ? 'active' : '')
</script>

<template>
    <li :class="classes">
        <Link :href="href">
            <slot/>
        </Link>
    </li>
</template>
