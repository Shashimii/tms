<script setup>
defineProps({
  title: String,
  subtitle: String,
});
</script>

<template>
  <div
    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow p-4"
  >
    <div class="flex justify-between items-center mb-2">
      <div class="flex-col">
        <p v-if="title" class="text-lg font-semibold text-gray-900 dark:text-white">
          {{ title }}
        </p>
        <p v-if="subtitle" class="text-md font-semibold text-gray-600 dark:text-white">
          {{ subtitle }}
        </p>
      </div>
      <slot name="badge"></slot>
    </div>
    <div class="mt-4 flex gap-2">
        <slot name="buttons">
        </slot>
    </div>
  </div>
</template>

