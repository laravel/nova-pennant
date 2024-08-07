<template>
  <tr class="group">
    <td class="pl-6 w-8 pr-2 py-2 text-gray-400 dark:text-gray-600">
      <IconBoolean :value="isActive" />
    </td>

    <td class="p-2">
      <p class="text-gray-500 truncate">{{ feature.title }}</p>
    </td>

    <td class="text-right pr-4 py-2">
      <span v-if="isRichFeature">
        <code>{{ feature.value }}</code>
      </span>
    </td>

    <td class="text-right pr-4 py-2">
      <div class="flex justify-end items-center text-gray-400">
        <ConfirmsPassword
          @confirmed="showConfiguresModal = true"
          :required="feature.meta.options !== false"
        >
          <Button
            variant="ghost"
            icon="cog-8-tooth"
            :aria-label="__('Configure')"
            :disabled="feature.meta.options === false"
          />
        </ConfirmsPassword>
      </div>

      <ConfiguresFeatureModal 
        v-if="feature.meta.options !== false"
        :show="showConfiguresModal"
        :feature="feature" 
        @close="showConfiguresModal = false"
        role="dialog"
      />
    </td>
  </tr>
</template>

<script setup>
import { computed, ref } from 'vue'
import { Button } from 'laravel-nova-ui'
import ConfiguresFeatureModal from './ConfiguresFeatureModal'
import isString from 'lodash/isString'

const props = defineProps({
  feature: { type: Object, required: true },
})

const showConfiguresModal = ref(false)

const isActive = computed(() => props.feature.value !== false)
const isRichFeature = computed(() => isString(props.feature.value))
</script>
