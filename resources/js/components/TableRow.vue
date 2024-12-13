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
          v-if="authorizedToRun"
          @confirmed="showConfiguresModal = true"
          :required="requiresConfirmPassword"
        >
          <Button
            variant="ghost"
            icon="cog-8-tooth"
            :aria-label="__('Configure')"
            :disabled="!authorizedToRun"
          />
        </ConfirmsPassword>
      </div>

      <Modal
        v-if="authorizedToRun"
        :show="showConfiguresModal"
        :feature="feature" 
        :resource-name="resourceName"
        :resource-id="resourceId"
        @confirm="featureConfigured"
        @close="showConfiguresModal = false"
        role="dialog"
      />
    </td>
  </tr>
</template>

<script setup>
import { computed, ref } from 'vue'
import { Button } from 'laravel-nova-ui'
import Modal from './Modal'
import isString from 'lodash/isString'

const emitter = defineEmits(['updated'])

const props = defineProps({
  feature: { type: Object, required: true },
  panel: { type: Object, required: true },
  resourceName: { type: String, required: true },
  resourceId: { type: Number|String, required: true },
})

const showConfiguresModal = ref(false)

const isActive = computed(() => props.feature.value !== false)
const isRichFeature = computed(() => isString(props.feature.value))
const authorizedToRun = computed(() => (props.panel?.authorizedToRun ?? true) && props.feature.meta.options !== false)
const requiresConfirmPassword = computed(() => {
  const requiresConfirmation = props.panel?.requiresConfirmPassword ?? false

  if (props.feature.meta.options === false || requiresConfirmation === false) {
    return false
  } else if (authorizedToRun.value === false) {
    return false
  }

  return true
})

const featureConfigured = () => {
  emitter('updated')
  showConfiguresModal.value = false
}
</script>
