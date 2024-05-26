<template>
  <div
    class="mx-auto my-8 mt-4 box-border h-auto w-3/4 rounded-md border-2 p-8 shadow-lg"
  >
    <!-- This creates the outer box -->
    <div class="text-lg">upvote</div>
    <div>
      <div class="m-2 flex p-2">
        <span class="mr-3 font-semibold">r/{{ community }}</span>
        <div class="flex">
          Posted By
          <span class="ml-1 font-semibold">{{ post.username }}</span>
        </div>
      </div>
    </div>

    <header class="my-8">
      <h1 class="text-2xl font-bold">
        {{ post.title }}
      </h1>
      <p class="mt-4 text-gray-700">
        {{ post.description }}
      </p>
    </header>
    <div class="my-4 flex space-x-4">
      <!-- Link with various classes for styling -->
      <Link
        :href="route('frontend.communities.post.show', [community, post.slug])"
        class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Read more
      </Link>

      <!-- Paragraph with margin and padding classes -->
      <p class="mr-4 p-2">Comments (2)</p>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  post: Object,
  community: String,
});
</script>
