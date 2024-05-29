<template>
  <div class="m-2 flex w-12 flex-col p-2">
    <UpVoteLink
      :slug="post.slug"
      :class="{
        'text-blue-600': post.postVotes[0] && post.postVotes[0].vote == 1,
      }"
    />
    <div class="my-2 flex rounded-md bg-blue-300 p-2">
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
