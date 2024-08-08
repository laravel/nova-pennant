<template>
  <Modal 
    :show="show"
    @close-on-escape="$emit('close')"
    role="dialog"
    size="2xl"
    modal-style="window"
  >
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
      <form
        ref="theForm"
        autocomplete="off"
        @submit.prevent.stop="submit"
        class="overflow-hidden space-y-6"
      >
        <ModalHeader v-text="__('Configure :name Feature', {name: feature.title })" />
        <ModalContent>
          <template v-if="feature.meta.options === true">
            <p>
              {{ __(
                feature.value === true
                  ? 'Would you like to deactivate this feature'
                  : 'Would you like to activate this feature'
              ) }}
            </p>
          </template>
          <template v-else>
            <SelectControl
              :selected="feature.value"
              @update:selected="form.value = $event"
              :options="feature.meta.options"
            />
          </template>
        </ModalContent>
        <ModalFooter>
          <div class="ml-auto">
            <Button
              variant="link"
              state="mellow"
              @click.prevent="$emit('close')"
              class="mr-3"
              dusk="cancel-configures-feature-button"
            >
              {{ __('Cancel') }}
            </Button>

            <Button
              ref="confirmButton"
              dusk="confirm-configures-feature-button"
              type="submit"
              :loading="working"
              :state="buttonLabel === 'Deactivate' ? 'danger' : 'default'"
              :label="__(buttonLabel)"
            />
          </div>
        </ModalFooter>
      </form>
    </div>
  </Modal>
</template>

<script setup>
import { computed, reactive, ref } from 'vue'
import { Button } from 'laravel-nova-ui'
import { useLocalization } from 'laravel-nova'

const props = defineProps({
  show: { type: Boolean, default: false },
  feature: { type: Object, required: true },
  resourceName: { type: String, required: true },
  resourceId: { type: Number|String, required: true },
})

const emitter = defineEmits(['confirm', 'close'])

const { __ } = useLocalization()

const working = ref(false)
const form = reactive(
  Nova.form({
    key: props.feature.key,
    value: props.feature.value,
  })
)
const buttonLabel = computed(() => {
  if (props.feature.meta.options !== true) {
    return 'Update'
  } else if (props.feature.value === false) {
    return 'Activate'
  } else {
    return 'Deactivate'
  }
})

const submit = () => {
  working.value = true

  if (props.feature.meta.options === true) {
    form.value = !props.feature.value
  }

  const endpoint = form.value === false
    ? `/nova-vendor/pennant-features/${props.resourceName}/${props.resourceId}/deactivate`
    : `/nova-vendor/pennant-features/${props.resourceName}/${props.resourceId}/activate`

  form.post(endpoint)
    .then(() => {
      emitter('confirm')
      Nova.success(__('The :feature feature has been updated', {feature: props.feature.title }))
    })
    .finally(() => {
      working.value = false
    })
}
</script>
