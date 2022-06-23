<script setup lang="ts">
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-gray-50 px-6 py-4 rounded-lg hover:bg-white hover:shadow-lg group transition cursor-pointer duration-75" v-for="post in model.posts">
                            <h2 class="font-bold text-lg text-gray-600 group-hover:text-gray-900">{{ post.title }}</h2>
                            <p class="text-gray-500 group-hover:text-gray-600">{{ post.content }}</p>
                            <p class="mt-2 text-gray-300 group-hover:text-gray-400 text-sm">Geplaatst op {{ new Date(post.published_at).toLocaleDateString('nl-NL') }}</p>
                        </div>
                    </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
