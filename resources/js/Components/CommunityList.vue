<template>
  <div class="w-full rounded-lg border bg-white shadow-md">
    <h2
      class="rounded-lg bg-primary-600 p-6 text-lg font-semibold text-text-50"
    >
      <slot name="title" />
    </h2>
    <ul role="list" class="divide-y divide-slate-300 p-4 dark:divide-slate-700">
      <li v-for="community in communities" :key="community.id" class="sm:py-4">
        <div class="flex items-center space-x-4">
          <Link
            :href="route('frontend.communities.show', community.slug)"
            class="truncate text-sm font-semibold text-text-50 hover:text-accent-500 dark:text-text-100"
          >
            {{ community.name }}
          </Link>
          <div>Posts({{ community.posts_count }})</div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  communities: Object,
});
</script>
