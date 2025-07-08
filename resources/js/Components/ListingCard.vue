<template>
    <div class="space-y-2">
        <slot name="header"></slot>
        <div class="flex flex-col justify-left sm:flex-row mt-6 gap-2">
            <slot name="filter"></slot>
        </div>
    </div>
    <slot name="list"></slot>
    <slot name="pagination"></slot>
</template>