<script lang="ts" setup>
import SeoStatus from '@/components/SeoStatus.vue'
import { useIndexField } from '@squidlab/nova-vue3-helper';
import { FieldProps } from '@/types/field-props';
import { Value } from '@/types/value';
import { Field } from '@/types/field';
import { DehydratedValue } from '@/types/dehydrated-value';
import { config } from '@/config';
import { useHydrate } from '@/composables/useHydrate';

const props = defineProps<FieldProps>();

const hydrate = useHydrate();

const { value } = useIndexField<FieldProps, Field, DehydratedValue, Value>(
  props,
  hydrate
);
</script>

<template>
  <div :class="config.rootClass">
    <SeoStatus :meta="value" :show-details="false" />
  </div>
</template>

