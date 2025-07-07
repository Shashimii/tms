<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Navbar from '@/Components/Navbar.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <Navbar>
                <template #logo>
                    <Link v-if="$page.props.auth.user.role == 2" :href="route('admin.dashboard')">
                        <ApplicationLogo
                            class="block h-9 w-auto fill-current text-gray-800"
                        />
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
                class="bg-white shadow"
                v-if="$slots.header"
            >
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
