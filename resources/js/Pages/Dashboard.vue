<script setup lang="ts">
import { Head } from '@inertiajs/inertia-vue3'

import Authenticated from '@/Layouts/Authenticated.vue'
</script>

<template>
  <Head>
    <title>Dashboard</title>
  </Head>

  <Authenticated>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
    </template>
  </Authenticated>
</template>
