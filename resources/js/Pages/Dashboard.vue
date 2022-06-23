<script setup lang="ts">
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'

import PostsViewModel = Domains.Posts.ViewModels.PostsViewModel

const props = defineProps<{
  versions: {
    php: string
    laravel: string
  }
  model: PostsViewModel
}>()
</script>

<template>
  <Head>
    <title>Dashboard</title>
  </Head>

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
    </template>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-4">
          <div
            class="group cursor-pointer rounded-lg bg-gray-50 px-6 py-4 transition duration-75 hover:bg-white hover:shadow-lg"
            v-for="post in model.posts"
          >
            <h2 class="text-lg font-bold text-gray-600 group-hover:text-gray-900">
              {{ post.title }}
            </h2>
            <p class="text-gray-500 group-hover:text-gray-600">{{ post.content }}</p>
            <p class="mt-2 text-sm text-gray-300 group-hover:text-gray-400">
              Geplaatst op {{ new Date(post.published_at).toLocaleDateString('nl-NL') }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
