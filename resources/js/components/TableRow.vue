<template>
  <tr class="group">
    <td class="pl-6 w-8 pr-2 py-2 text-gray-400 dark:text-gray-600">
      <IconBoolean :value="isActive" />
    </td>

    <td class="p-2">
      <p class="text-gray-500 truncate">{{ row.title }}</p>
    </td>

    <td class="text-right pr-4 py-2">
      <span v-if="!isBooleanValue">
        <code>{{ row.value }}</code>
      </span>
    </td>

    <td class="text-right pr-4 py-2">
      <div class="flex justify-end items-center text-gray-400">
        <Button
          v-if="row.value === true"
          variant="link"
          :label="__('Deactivate')"
          destructive
        />
        <Button
          v-else-if="row.value === false"
          variant="link"
          :label="__('Activate')"
        />
      </div>
    </td>
  </tr>
</template>

<script>
import { Button } from 'laravel-nova-ui'
import isBoolean from 'lodash/isBoolean'

export default {
  components: {
    Button,
  },

  props: {
    row: {
      type: Object,
      required: true,
    },
  },

  computed: {
    isActive() {
      return this.row.value !== false
    },

    isBooleanValue() {
      return isBoolean(this.row.value)
    },
  },
}
</script>
