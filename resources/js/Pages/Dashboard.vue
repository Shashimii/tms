<script setup>
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';
import StatCard from '@/Components/StatCard.vue'
import ListingTable from '@/Components/ListingTable.vue';
import MagnifyingGlass from '@/Components/MagnifyingGlass.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, usePage, router } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

const props = defineProps({
    admins: {
        type: Object,
        required: true,
    },
    coordinators: {
        type: Object,
        required: true,
    },
    officers: {
        type: Object,
        required: true,
    },
    users: {
        type: Object,
        required: true,
    }
})

const countAdmin = computed(() => props.admins.data.length);
const countCoordinator = computed(() => props.coordinators.data.length);
const countOfficer = computed(() => props.officers.data.length);
const countUser = computed(() => props.users.data.length);

// searchbar
let pageNumber = ref(1),
    search = ref(usePage().props.search ?? ""),
    role = ref(usePage().props.role ?? "")

const updatedPageNumber = (link) => {
    pageNumber.value = link.url.split('=')[1];
}

let url = computed(() => {
    let url = new URL(route('admin.dashboard'));
    url.searchParams.set('page', pageNumber.value);

    if (search.value) {
        url.searchParams.append('search', search.value);
    }

    if (role) {
        url.searchParams.append('role', role.value);
    }

    return url
});

watch(
    () => url.value,
    (updatedUrl) => {
        router.visit(updatedUrl, {
            preserveScroll: true,
            preserveState: true,
            replace: true
        })
    }
)

watch(
    () => search.value,
    (value) => {
        if (value) {
            pageNumber.value = 1;
        }
    }
)

watch(
    () => role.value,
    (value) => {
        if (value) {
            pageNumber.value = 1;
        }
    }
)



</script>

<template>
    <Head title="Dashboard" />

    <PrimaryLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-4">
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <StatCard>
                        <template #icon>
                            <div class="p-4 bg-pink-200 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-pink-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                </svg>
                            </div>
                        </template>
                        <template #count>
                            {{ countAdmin }}
                        </template>
                        <template #label>
                            System Admin
                        </template>
                    </StatCard>
                    <StatCard>
                        <template #icon>
                            <div class="p-4 bg-orange-200 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-orange-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </div>
                        </template>
                        <template #count>
                            {{ countCoordinator }}
                        </template>
                        <template #label>
                            Task Coordinator
                        </template>
                    </StatCard>
                    <StatCard>
                        <template #icon>
                            <div class="p-4 bg-teal-200 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-teal-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                        </template>
                        <template #count>
                            {{ countOfficer }}
                        </template>
                        <template #label>
                            Officers
                        </template>
                    </StatCard>
                    <StatCard>
                        <template #icon>
                            <div class="p-4 bg-blue-200 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-blue-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            </div>
                        </template>
                        <template #count>
                            {{ countUser }}
                        </template>
                        <template #label>
                            Total Users
                        </template>
                    </StatCard>
                </div>
                
                <ListingTable>
                    <template #header>
                        <h1 class="text-xl font-semibold text-gray-900 dark:text-green-500">
                            Users
                        </h1>
                        <p class="mt-2 text-sm text-gray-700 dark:text-green-700">
                            shows the users of the system and their roles.
                        </p>
                    </template>
                    <template #filter>
                        <div class="relative text-sm text-gray-800 w-full sm:max-w-xs">
                            <div
                                class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500 dark:text-green-100"
                            >
                                <MagnifyingGlass />
                            </div>

                            <input
                                v-model="search"
                                type="text"
                                autocomplete="off"
                                placeholder="Search username, email..."
                                id="search"
                                class="w-full block rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:ring-green-500 dark:focus:ring-green-500 dark:bg-green-800 dark:text-white dark:placeholder-white sm:text-sm sm:leading-6"
                            />
                        </div>

                        <select
                            v-model="role"
                            class="block rounded-lg border-0 py-2 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 dark:ring-green-500 dark:focus:ring-green-500 dark:bg-green-800 dark:text-white sm:ml-5 sm:text-sm sm:leading-6"
                        >
                            <option value="">Filter by role</option>
                            <option value="2">System Admin</option>
                            <option value="1">Task Coordinator</option>
                            <option value="0">Officer</option>
                        </select>
                    </template>
                    <template #thead>
                        <th class="px-3 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Username</th>
                        <th class="px-3 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Email</th>
                        <th class="px-3 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white max-w-xs">Role</th>
                    </template>
                    <template #tbody>
                        <tr v-for="user in props.users.data" :key="user.id" class="transition duration-300 hover:bg-gray-100 dark:hover:bg-black">
                            <td class="px-3 py-4 text-sm text-gray-900">
                                <p class="bg-blue-200 text-blue-800 font-semibold px-2 py-1 rounded inline-block">
                                    {{ user.name }}
                                </p>
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 max-w-xs">
                                <p class="bg-emerald-200 text-emerald-800 font-semibold px-2 py-1 rounded inline-block">
                                    {{ user.email }}
                                </p>
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 max-w-xs">
                                <p v-if="user.role == 2" class="bg-pink-200 text-pink-800 font-semibold px-2 py-1 rounded inline-block">
                                    System Admin
                                </p>
                                <p v-if="user.role == 1" class="bg-orange-200 text-orange-800 font-semibold px-2 py-1 rounded inline-block">
                                    Task Coordinator
                                </p>
                                <p v-if="user.role == 0" class="bg-teal-200 text-teal-800 font-semibold px-2 py-1 rounded inline-block">
                                    Officer
                                </p>
                            </td>
                        </tr>
                    </template>
                    <template #pagination>
                        <Pagination 
                            :data="props.users" 
                            :updatedPageNumber="updatedPageNumber"
                        /> 
                    </template>
                </ListingTable>
            </div>
        </div>
    </PrimaryLayout>
</template>
