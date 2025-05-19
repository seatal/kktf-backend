<script setup>
import {Head, Link, useForm, usePage} from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import Checkbox from '@/Components/Checkbox.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PasswordInput from '@/Components/PasswordInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'

defineProps({
    target: {type: String, required: true},
})

const routes = usePage().props.routes
const session = usePage().props.session

const form = useForm({
    email: '',
    password: '',
    remember: false,
})
</script>

<template>
    <GuestLayout>
        <div class="border-section col-sm-11 col-md-10 col-xxl-7 py-6 mx-auto my-auto">
            <div class="h2 pb-10 text-center">
                Sign In
            </div>

            <div class="section-border-radius bg-brand-offwhite shadow-slight">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-5 mx-auto bg-brand-gray-light py-8 order-md-1 order-sm-2">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div class="auth-logo-wrapper">
                                    <img
                                        alt="Shabdamala Logo"
                                        class="h-100 w-auto object-contain"
                                        height="54"
                                        src="/images/logo.png"
                                        width="71"
                                    >
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <svg
                                        fill="none"
                                        height="20"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        width="20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                                        <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"/>
                                        <path d="M3 7l9 6l9 -6"/>
                                    </svg>

                                    <a
                                        href="mailto:info@shabdamala.org.au"
                                        class="link-styled"
                                    >
                                        info@shabdamala.org.au
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-7 mx-auto order-md-2 order-sm-1 my-auto p-10">
                            <p
                                class="p2 py-2 mb-6 text-center rounded-4 border-brand-success-teal-subtle text-brand-success-teal-emphasis bg-brand-teal-subtle"
                                v-if="session.status"
                            >
                                {{ session.status }}
                            </p>

                            <form @submit.prevent="form.post(target)">
                                <fieldset class="py-6 py-md-0 rounded-4">
                                    <div class="mb-4 mb-md-6">
                                        <InputLabel for="email" value="Email"/>

                                        <TextInput
                                            autocomplete="email"
                                            autofocus
                                            id="email"
                                            placeholder="Email Address"
                                            required
                                            type="email"
                                            v-model="form.email"
                                        />

                                        <InputError :message="form.errors.email"/>
                                    </div>

                                    <div class="mb-4 mb-md-6">
                                        <InputLabel for="password" value="Password"/>

                                        <PasswordInput
                                            autocomplete="current-password"
                                            id="password"
                                            required
                                            v-model="form.password"
                                        />
                                    </div>

                                    <div class="row row-sm align-items-center">
                                        <div class="col-12 col-sm-6 mb-6 mb-md-10">
                                            <div class="form-check mb-0">
                                                <Checkbox id="remember_me" v-model:checked="form.remember"/>
                                                <label class="form-label p2" for="remember_me">Remember me</label>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 mb-6 mb-md-10 d-inline-flex justify-content-sm-end">
                                            <Link
                                                :href="routes.forgot"
                                                class="link-styled"
                                            >
                                                Forgot your password?
                                            </Link>
                                        </div>
                                    </div>

                                    <div>
                                        <PrimaryButton
                                            :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing"
                                            class="w-100"
                                        >
                                            Log In
                                        </PrimaryButton>
                                    </div>

                                    <hr class="mt-8 mb-4 border-dashed">

                                    <div class="text-center d-flex flex-wrap row-gap-2 column-gap-4 align-items-center justify-content-center">
                                        <p class="p2">
                                            New Here?
                                        </p>

                                        <Link
                                            :href="routes.register"
                                            class="link-styled link-styled--dark-green"
                                        >
                                            Register
                                        </Link>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>

    <Head title="Log In"/>
</template>
