<script setup>

defineProps({
    text: {type: String, required: true},
})

</script>

<template>
    <div class="container container-fluid bg-brand-warning-subtle shadow-slight border border-brand-green-mid rounded-4 p-4 mb-4">
        <div class="marquee" id="marquee">
            <div class="marquee-content">
                <div class="marquee-wrapper">
                    <p class="mb-0 h5">{{ text }}</p>
                </div>

                <div class="marquee-wrapper">
                    <p class="mb-0 h5">{{ text }}</p>
                </div>

                <div class="marquee-wrapper">
                    <p class="mb-0 h5">{{ text }}</p>
                </div>
            </div>

            <div class="marquee-content">
                <div class="marquee-wrapper">
                    <p class="mb-0 h5">{{ text }}</p>
                </div>

                <div class="marquee-wrapper">
                    <p class="mb-0 h5">{{ text }}</p>
                </div>

                <div class="marquee-wrapper">
                    <p class="mb-0 h5">{{ text }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.marquee {
    --marquee-gap: 40px;
    display: flex;
    column-gap: var(--marquee-gap);
    overflow: hidden;

    &:hover .marquee-content {
        animation-play-state: paused;
    }
}

.marquee .marquee-content {
    animation: marquee 20s linear infinite;
    display: flex;
    align-items: center;
    padding: 0;
    min-width: 100%;
    justify-content: space-around;
    flex-shrink: 0;
    column-gap: var(--marquee-gap);
}

.marquee .marquee-wrapper {
    display: flex;
    align-items: center;
    column-gap: var(--marquee-gap);
}

.marquee .btn {
    font-weight: 500;
    color: #fff;
    background-color: transparent;
    padding: 4px 12px;
    border: 1px solid white;
    font-size: 12px;
    line-height: 1.3;
    border-radius: 20px;

    &:hover {
        background-color: #fff;
        color: #121212;
    }
}

@keyframes marquee {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(calc(-100% - var(--marquee-gap)));
    }
}
</style>
