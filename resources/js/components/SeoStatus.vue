<script setup lang="ts">
import { config } from '@/config'
import { Value } from '@/types/value'

const { meta, showDetails } = withDefaults(defineProps<{
  meta: Value,
  showDetails: boolean,
}>(), {
  showDetails: true,
});

const robotsEnabled = !meta.robots_noindex;
const hasMinimumSeo = meta.title.length >= 3 && meta.title.length <= 70 && meta.description.length >= 50 && meta.description.length <= 160;
</script>

<template>
  <div
    :class="config.rootClass"
    class="flex items-center"
  >
    <span
      class="flex size-3 rounded-full"
      :class="{
          'bg-green-500': robotsEnabled && hasMinimumSeo,
          'bg-yellow-500': robotsEnabled && !hasMinimumSeo,
          'bg-red-500': !robotsEnabled,
        }"
    />
    <div v-if="showDetails" class="ml-1.5">
      <span
        v-if="!robotsEnabled"
        class="text-xs text-gray-500 dark:text-gray-400">No index</span>
      <span
        v-else-if="!hasMinimumSeo"
        class="text-xs text-gray-500 dark:text-gray-400">À améliorer</span>
    </div>
  </div>
</template>
