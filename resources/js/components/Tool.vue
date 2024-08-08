<template>
  <LoadingCard :loading="loading" class="pt-4">
    <div class="h-6 flex items-center px-6 mb-4">
      <h3 class="mr-3 leading-tight text-sm font-bold">{{ panel.name }}</h3>
    </div>

    <div class="mb-5 pb-4">
      <div
        v-if="features.length > 0"
        class="overflow-hidden overflow-x-auto relative"
      >
        <table class="w-full table-default font-normal">
          <tbody
            class="border-t border-b border-gray-100 dark:border-gray-700 divide-y divide-gray-100 dark:divide-gray-700"
          >
            <TableRow 
              v-for="(feature, index) in features" 
              :key="index"
              :feature="feature" 
              :authorized-to-run="panel.authorizedToRun"
              :resource-name="resourceName"
              :resource-id="resourceId"
              @updated="fetch"
            />
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

<script setup>
import { ref, onMounted } from 'vue'
import TableRow from './TableRow'
import { useLocalization } from 'laravel-nova'

const props = defineProps([
  'resource', 
  'resourceName', 
  'resourceId', 
  'panel'
])

const { __ } = useLocalization()

const loading = ref(true)
const features = ref([])

const fetch = () => {
  loading.value = true

  Nova.request().get(`/nova-vendor/pennant-features/${props.resourceName}/${props.resourceId}`).then(response => {
    features.value = response.data
  }).finally(() => {
    loading.value = false
  })
}

onMounted(() => fetch())
</script>
