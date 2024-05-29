<template>
  <div class="flex h-full w-12 flex-col bg-gray-200 p-2 text-center">
    <UpVoteLink
      :slug="post.slug"
      :class="{
        'text-blue-600': post.postVotes[0] && post.postVotes[0].vote == 1,
      }"
    />
    <div
      class="my-2 p-2 font-bold"
      :class="{
        'text-blue-600': post.postVotes[0] && post.postVotes[0].vote == 1,
        'text-red-600': post.postVotes[0] && post.postVotes[0].vote == -1,
      }"
    >
      {{ post.votes }}
    </div>
    <DownVoteLink
      :slug="post.slug"
      :class="{
        'text-red-600': post.postVotes[0] && post.postVotes[0].vote == -1,
      }"
    />
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import UpVoteLink from "@/Components/UpVoteLink.vue";
import DownVoteLink from "@/Components/DownVoteLink.vue";

defineProps({
  post: Object,
});
</script>
