<template>
  <Modal 
    :show="show"
    @close-on-escape="$emit('close')"
    role="dialog"
    size="2xl"
    modal-style="window"
  >
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
      <ModalHeader v-text="__('Configures Feature')" />
      <ModalContent>
        <form
          ref="theForm"
          autocomplete="off"
          @submit.prevent.stop="submit"
          class="overflow-hidden space-y-6"
        >
          THE FORM
        </form>
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
            @click.prevent="$emit('confirm')"
            ref="confirmButton"
            dusk="confirm-configures-feature-button"
            :loading="working"
            state="danger"
            :label="__('Delete')"
          />
        </div>
      </ModalFooter>
    </div>
  </Modal>
</template>

<script setup>
import { Button } from 'laravel-nova-ui'
import { useLocalization } from 'laravel-nova'

const props = defineProps({
  show: { type: Boolean, default: false },
  feature: { type: Object, required: true },
})

const emitter = defineEmits(['confirm', 'close'])

const { __ } = useLocalization()

const submit = () => {}
</script>
