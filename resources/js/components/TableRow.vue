<template>
  <tr class="group">
    <td
      v-if="row.icon"
      class="pl-6 w-8 pr-2"
      :class="{
        [row.iconClass]: true,
        [rowClasses]: true,
        'text-gray-400 dark:text-gray-600': !row.iconClass,
      }"
    >
      <Icon :name="row.icon" class="inline-block" />
    </td>

    <td
      class="px-2"
      :class="{
        [rowClasses]: true,
        'pl-6': !row.icon,
        'pr-6': !row.editUrl || !row.viewUrl,
      }"
    >
      <h2 class="text-base text-gray-500">
        {{ row.title }}
      </h2>
      <p class="text-gray-400 text-xs truncate">{{ row.subtitle }}</p>
    </td>

    <td
      v-if="row.actions.length > 0"
      class="text-right pr-4"
      :class="rowClasses"
    >
      <div class="flex justify-end items-center text-gray-400">
        <Button
          icon="ellipsis-horizontal"
          variant="action"
          :aria-label="__('Resource Row Dropdown')"
        />
      </div>
    </td>
  </tr>
</template>

<script>
import { Button, Icon } from 'laravel-nova-ui'
import isNull from 'lodash/isNull'
import omitBy from 'lodash/omitBy'

export default {
  components: {
    Button,
    Icon,
    Heroicon,
  },

  props: {
    row: {
      type: Object,
      required: true,
    },
  },

  computed: {
    rowClasses() {
      return ['py-2']
    },
  },
}
</script>
