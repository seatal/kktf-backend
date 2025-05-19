<script setup>
import {computed} from 'vue'

const props = defineProps({
    active: {type: Boolean},
    collapseActive: {type: Boolean},
    id: {type: String},
})

const classes = computed(() => props.active ? 'active' : '')

const classesHeader = computed(() =>
    props.collapseActive ? 'nav-item' : 'nav-item collapsed'
)
</script>

<template>
    <li :class="classes" class="nav-dropdown-li">
        <button
            :aria-controls="id"
            :aria-expanded="!!props.collapseActive"
            :class="classesHeader"
            :data-bs-target="`#${id}`"
            data-bs-toggle="collapse"
        >
            <span class="d-flex align-items-center w-100">
                <slot name="trigger"/>
            </span>
        </button>

        <div :class="props.collapseActive ? 'show' : ''" :id="id" class="collapse" data-bs-parent="#sidebarNavigation">

            <ul class="nav-submenu">
                <slot name="content"/>
            </ul>
        </div>

    </li>
</template>
