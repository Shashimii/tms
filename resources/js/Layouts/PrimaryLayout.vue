<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Navbar from '@/Components/Navbar.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <Navbar>
                <template #logo>
                    <Link v-if="$page.props.auth.user.role == 2" :href="route('admin.dashboard')">
                        <img src="/images/denrLogo.png" alt="Logo" class="w-12 h-auto object-cover rounded-full shadow-lg dark:drop-shadow-[0_4px_6px_rgba(144,238,144,0.5)]" />
                    </Link>
                    <Link v-if="$page.props.auth.user.role == 1" :href="route('coordinator.dashboard')">
                        <img src="/images/denrLogo.png" alt="Logo" class="w-12 h-auto object-cover rounded-full shadow-lg dark:drop-shadow-[0_4px_6px_rgba(144,238,144,0.5)]" />
                    </Link>
                    <Link v-if="$page.props.auth.user.role == 0" :href="route('officer.dashboard')">
                        <img src="/images/denrLogo.png" alt="Logo" class="w-12 h-auto object-cover rounded-full shadow-lg dark:drop-shadow-[0_4px_6px_rgba(144,238,144,0.5)]" />
                    </Link>
                </template>
                <template #links>
                    <template v-if="$page.props.auth.user.role == 2">
                        <NavLink :href="route('admin.dashboard')" :active="route().current('admin.dashboard')">
                            Dashboard
                        </NavLink>
                    </template>

                    <template v-if="$page.props.auth.user.role == 1">

                    </template>

                    <template v-if="$page.props.auth.user.role == 0">
                        
                    </template>
                </template>
                <template #responsive-links>
                    <template v-if="$page.props.auth.user.role == 2">
                        <ResponsiveNavLink
                            :href="route('admin.dashboard')"
                            :active="route().current('admin.dashboard')"
                        >
                            Dashboard
                        </ResponsiveNavLink>
                    </template>
                    <template v-if="$page.props.auth.user.role == 1">

                    </template>
                    <template v-if="$page.props.auth.user.role == 0">

                    </template>
                </template>
            </Navbar>

            <!-- Page Heading -->
            <header
                class="bg-white shadow dark:bg-gray-800"
                v-if="$slots.header"
            >
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                        <slot name="header" />
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
