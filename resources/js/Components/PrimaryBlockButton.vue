<template>
    <button
    class="
        flex-1 items-center rounded-full border border-transparent
        bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest
        text-white transition duration-150 ease-in-out

        hover:bg-gray-700
        focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500
        focus:ring-offset-2 active:bg-gray-900

        dark:bg-indigo-700 dark:text-gray-100
        dark:hover:bg-indigo-900
        dark:focus:bg-indigo-800 dark:active:bg-indigo-600
    "
    >
    <slot />
    </button>

</template>
