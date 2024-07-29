<script lang="ts" setup>
import SeoStatus from '@/components/SeoStatus.vue'
import PanelItem from '@root/vendor/laravel/nova/resources/js/components/PanelItem.vue'
import type { FieldEmitFn } from '@squidlab/nova-vue3-helper'
import { useDetailField } from '@squidlab/nova-vue3-helper'
import { type Value } from '@/types/value'
import { type FieldProps } from '@/types/field-props'
import { type Field } from '@/types/field'
import { type DehydratedValue } from '@/types/dehydrated-value'
import { useHydrate } from '@/composables/useHydrate'

const props = defineProps<FieldProps>()
const emit = defineEmits<FieldEmitFn>()

const hydrate = useHydrate()

const { value } = useDetailField<
  FieldProps,
  Field,
  DehydratedValue,
  Value
>(props, hydrate, emit)

function highlightKeywords(text: string, keywords: string) {
  if (!keywords) {
    return text
  }

  const kwToSearch = keywords.replace(new RegExp(/[?!]/g), '').trim().split(' ')
  let highlightedText = text
  kwToSearch.forEach((kw) => {
    highlightedText = highlightedText.replace(
      new RegExp(`(${kw})`, 'gi'),
      '<span class="font-bold">$1</span>',
    )
  })
  return highlightedText
}

</script>

<template>
  <!--suppress HtmlUnknownAttribute -->
  <div
    :dusk="props.field.attribute"
  >
    <PanelItem :field="props.field" :index="props.index">
      <template #default>
        <div class="seo__field">
          <div class="seo__field-label">SEO</div>
          <SeoStatus :meta="value" />
        </div>
      </template>
      <template #value>
        <div class="g-preview" :data-has-image="!!value.image_url">
          <div class="g-preview__image" v-if="value.image_url">
            <img :src="value.image_url" alt="" />
          </div>
          <div class="g-preview__header">
            <div class="g-preview__favicon">
              <img src="https://www.eveiletconseil.fr/favicon.ico" alt="">
            </div>
            <div class="g-preview__header-top">
              <div class="g-preview__domain">eveiletconseil.fr</div>
              <div class="g-preview__permalink">
                <span class="g-preview__permalink-proto">https://</span>
                <span>{{ value.permalink.replace('https://', '') }}</span>
              </div>
            </div>
          </div>
          <div class="g-preview__title">
            <a :href="value.permalink" target="_blank">{{ value.title }}</a>
          </div>
          <div class="g-preview__description"
               v-html="highlightKeywords(value.description, value.focus_keyword)"
          />
        </div>
      </template>
    </PanelItem>
  </div>
</template>

<style scoped lang="postcss">
.seo__field {
  @apply flex items-center gap-3;
}
.g-preview {
  max-width: 540px;
  @apply font-['Roboto','Helvetica_Neue','Arial','sans-serif'] lg:font-['Arial','sans-serif'];
  @apply text-[#202124] md:text-[#4d5156];
  @apply font-normal break-normal;
}

.g-preview__favicon {
  @apply size-7 rounded-full;
}

.g-preview__domain {
  @apply text-sm/5 truncate md:text-[#202124];
}

.g-preview__permalink {
  @apply text-sm/5 md:text-xs max-w-xs truncate;
}

.g-preview[data-has-image="true"] {
  max-width: 654px;
}

.g-preview__image {
  width: 92px;
  height: 92px;
  @apply hidden md:block float-right rounded-lg overflow-hidden ml-5;
}
.g-preview__image img {
  @apply w-full h-full object-cover;
}

.g-preview__header {
  @apply flex items-center gap-3;
}

.g-preview__favicon {
  @apply hidden md:block;
}

.g-preview__header-top {
  @apply flex-1 min-w-0 flex flex-col;
}

.g-preview__domain {
  @apply hidden md:block;
}

.g-preview__permalink-proto {
  @apply hidden lg:inline;
}

.g-preview__title {
  @apply text-[20px] text-[#1967d2] md:text-[#1a0dab] pt-3;
}

.g-preview__description {
  @apply text-[14px] lg:leading-[1.58] pt-2;
}
</style>
