<script setup lang="ts">
import { computed, defineProps, ref } from 'vue'
import PostsViewModel = Domains.Posts.ViewModels.PostsViewModel
import Authenticated from '@/Layouts/Authenticated.vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import DeleteButton from '@/Components/DeleteButton.vue'

const props = defineProps<{
  model: PostsViewModel
}>()

const form = useForm({
  title: '',
  content: '',
})

const showCreate = ref(false)
const forceShowCreate = computed(() => props.model.posts.length === 0)

const createPost = () => {
  form.post(route('posts.store'), {
    onSuccess() {
      form.reset()
    },
  })
}

const deletePost = (id: Number) => {
  Inertia.delete(route('posts.destroy', { post: id }), {
    preserveState: true,
    preserveScroll: true,
  })
}

const resetCreateForm = () => {
  showCreate.value = false
  form.reset()
}
</script>

<template>
  <authenticated>
    <head>
      <title>All posts</title>
    </head>
    <div class="mx-auto max-w-7xl flex-col space-y-8 py-12 sm:px-6 lg:px-8">
      <ul class="flex list-disc flex-col" v-if="model.posts.length > 0">
        <li v-for="post in model.posts" class="group">
          <strong>{{ post.title }}</strong> by {{ post.user.name }}
          <delete-button @delete="deletePost(post.id)"> Delete post </delete-button>
        </li>
      </ul>
      <div>
        <template v-if="!showCreate && !forceShowCreate">
          <button type="button" @click="showCreate = true">Create post</button>
        </template>
        <template v-else>
          <h2 class="mb-4 text-2xl font-medium">Create New Post</h2>
          <form
            class="flex flex-col items-end space-y-2"
            @submit.prevent="createPost"
            @reset.prevent="resetCreateForm"
          >
            <fieldset class="flex w-full flex-col space-y-2">
              <div
                class="rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600"
              >
                <label for="name" class="block text-xs font-medium text-gray-900">Title</label>
                <input
                  type="text"
                  name="title"
                  id="title"
                  class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                  placeholder="Some cool post title goes here"
                  required
                  v-model="form.title"
                  tabindex="1"
                  autofocus
                />
              </div>
              <div
                class="rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600"
              >
                <label for="content" class="block text-xs font-medium text-gray-900">Content</label>
                <textarea
                  name="content"
                  id="content"
                  class="block h-32 w-full resize-none border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                  placeholder="The good stuff goes here."
                  required
                  v-model="form.content"
                  tabindex="2"
                />
              </div>
            </fieldset>
            <div class="flex space-x-2">
              <button
                type="reset"
                class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                :disabled="form.processing"
                tabindex="4"
              >
                Cancel
              </button>
              <button
                type="submit"
                class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                :disabled="form.processing"
                tabindex="3"
              >
                Save Post
              </button>
            </div>
          </form>
        </template>
      </div>
    </div>
  </authenticated>
</template>
