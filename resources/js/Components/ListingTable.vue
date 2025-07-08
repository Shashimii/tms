<template>
    <div class=" shadow ring-1 ring-black ring-opacity-5 md:rounded-lg relative">
        <div class="overflow-hidden w-full rounded-lg">
            <div class="px-3 pt-3 pb-8 bg-gray-50 dark:bg-gray-800">
                <slot name="header"></slot>
                <div class="flex flex-col justify-left sm:flex-row mt-6 gap-2">
                    <slot name="filter"></slot>
                </div>
            </div>

            <table class="min-w-full divide-y divide-gray-600">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <slot name="thead"></slot>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-600 bg-white dark:bg-gray-800">
                    <slot name="tbody"></slot>
                </tbody>
            </table>
        </div>
    </div>
    <slot name="pagination"></slot>
</template>