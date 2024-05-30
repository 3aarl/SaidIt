<template>
  <div class="w-full rounded-lg border bg-white shadow-md">
    <h2
      class="rounded-lg p-6 text-lg font-semibold text-white hover:text-secondary-400"
    >
      <slot name="title" />
    </h2>
    <ul role="list" class="divide-y divide-slate-300 p-4 dark:divide-slate-700">
      <li v-for="post in posts" :key="post.id" class="sm:py-4">
        <div class="flex items-center space-x-4">
          <Link
            :href="
              route('frontend.communities.post.show', [
                community.slug,
                post.slug,
              ])
            "
            class="truncate text-sm font-semibold text-text-100 hover:text-secondary-400 dark:text-slate-400"
          >
            {{ post.title }}
          </Link>
          <div>Votes({{ post.votes }})</div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  community: Object,
  posts: Object,
});
</script>
