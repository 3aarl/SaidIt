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
      <button class="rounded border px-4 py-2">Comments(2)</button>
      <button class="rounded bg-blue-500 px-4 py-2 text-white">
        Read more →
      </button>
    </div>
  </div>
</template>

<script setup>
defineProps({
  post: Object,
  community: String,
});
</script>
