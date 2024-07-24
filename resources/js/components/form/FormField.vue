<script lang="ts" setup>
import { useDehydrate } from '@/composables/useDehydrate'
import { useHydrate } from '@/composables/useHydrate'
import { DehydratedValue } from '@/types/dehydrated-value'
import { Field } from '@/types/field'
import { FieldProps } from '@/types/field-props'
import { Value } from '@/types/value'
import DefaultField from '@root/vendor/laravel/nova/resources/js/components/DefaultField.vue'
import type { FieldEmitFn } from '@squidlab/nova-vue3-helper'
import { useFormField } from '@squidlab/nova-vue3-helper'

const props = defineProps<FieldProps>();

const emit = defineEmits<FieldEmitFn>();

const hydrate = useHydrate();
const dehydrate = useDehydrate();

const {
  currentField,
} = useFormField<FieldProps, Field, DehydratedValue, Value>(
  props,
  hydrate,
  dehydrate,
  emit
);
</script>

<template>
  <DefaultField :field="currentField" field-name="">
    <template #field>
      You should instead use a MorphOne relationship in your Nova resource.
      <pre class="bg-gray-100 p-4 mt-2">MorphOne::make('Référencement et Réseaux sociaux', 'seo_meta', SeoMeta::class)
          ->onlyOnForms()
          ->hideWhenCreating(),</pre>
    </template>
  </DefaultField>
</template>
