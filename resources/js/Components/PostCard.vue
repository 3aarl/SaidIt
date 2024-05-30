<template>
  <div
    class="mx-auto my-8 mt-4 box-border h-auto w-full rounded-md border-2 shadow-lg"
  >
    <!-- This creates the outer box -->
    <div class="flex">
      <div class="mr-3 text-lg">
        <PostVote :post="post" />
      </div>
      <div>
        <div class="m-2 flex p-2">
          <Link
            :href="route('frontend.communities.show', community)"
            class="mr-3 font-semibold hover:text-secondary-400"
            >r/{{ community }}</Link
          >
          <div class="flex">
            Posted By
            <span class="mx-1 font-semibold">{{ post.username }}</span>
            {{ post.created_at }}
          </div>
        </div>
        <Link
          :href="
            route('frontend.communities.post.show', [community, post.slug])
          "
        >
          <header class="my-8">
            <h1 class="text-2xl font-bold hover:text-secondary-400">
              {{ post.title }}
            </h1>

            <p class="mt-4 text-text-100">
              {{ post.description }}
            </p>
          </header>
        </Link>
        <div class="my-4 flex space-x-4">
          <!-- Link with various classes for styling -->
          <Link
            :href="
              route('frontend.communities.post.show', [community, post.slug])
            "
            class="inline-flex items-center rounded-lg bg-secondary-500 px-3 py-2 text-center text-sm font-medium text-white hover:bg-secondary-600 focus:outline-none focus:ring-4 focus:ring-accent-700 dark:bg-secondary-500 dark:hover:bg-secondary-400 dark:focus:ring-secondary-200"
          >
            Read more
          </Link>

          <!-- Paragraph with margin and padding classes -->
          <p class="mr-4 p-2">Comments ({{ post.comments_count }})</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import PostVote from "@/Components/PostVote.vue";

defineProps({
  post: Object,
  community: String,
});
</script>
