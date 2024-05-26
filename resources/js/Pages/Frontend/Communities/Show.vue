<
<template>
  <GuestLayout>
    <template #header>
      <div class="m-2 flex justify-between p-2">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
          s/{{ community.name }}
        </h2>
        <Link
          v-if="$page.props.auth.auth_check"
          :href="route('communities.posts.create', community.slug)"
          class="rounded bg-indigo-500 px-3 py-2 font-bold text-white transition-colors duration-200 hover:bg-indigo-300"
          >Create Post</Link
        >
      </div>
    </template>

    <section class="m-2 flex p-2 md:flex-row">
      <div class="w-8/12">
        <PostCard
          v-for="post in posts.data"
          :post="post"
          :community="community.name"
          :key="post.id"
        />
        <div class="mt-4 p-2">
          <Pagination :links="posts.meta.links" />
        </div>
      </div>
      <div class="w-4/12 p-4">
        <div class="m-2 bg-slate-500 p-2 text-white">
          <h2>Latests Communities</h2>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>

<script setup>
import Pagination from "@/Components/Pagination.vue";
import PostCard from "@/Components/PostCard.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
  community: Object,
  posts: Object,
});
</script>
