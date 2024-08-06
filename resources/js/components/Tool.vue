<template>
  <LoadingCard :loading="loading" class="pt-4">
    <div class="h-6 flex items-center px-6 mb-4">
      <h3 class="mr-3 leading-tight text-sm font-bold">{{ panel.name }}</h3>
    </div>

    <div class="mb-5 pb-4">
      <div
        v-if="value.length > 0"
        class="overflow-hidden overflow-x-auto relative"
      >
        <table class="w-full table-default font-normal">
          <tbody
            class="border-t border-b border-gray-100 dark:border-gray-700 divide-y divide-gray-100 dark:divide-gray-700"
          >
            <TableRow v-for="row in value" :row="row" />
          </tbody>
        </table>
      </div>
      <div v-else class="flex flex-col items-center justify-between px-6 gap-2">
        <p class="font-normal text-center py-4">
          {{ __('No :resource available at the moment.', { resource: panel.name }) }}
        </p>
      </div>
    </div>
  </LoadingCard>
</template>

<script>
import TableRow from './TableRow'

export default {
  components: {
    TableRow,
  },

  props: ['resourceName', 'resourceId', 'panel'],

  data: () => ({
    loading: true,
    value: [],
  }),

  mounted() {
    console.log(JSON.parse(JSON.stringify(this.panel)))

    this.loading = false

    Nova.request().get('/nova-vendor/user-pennant-features').then(response => {
      this.value = response.data
      Nova.debug(this.value)
    }).finally(() => {
      this.loading = false
    })
  },
}
</script>
