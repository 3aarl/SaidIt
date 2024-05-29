<
<template>
  <GuestLayout>
    <section class="m-2 flex p-2 md:flex-row">
      <div class="w-8/12">
        <PostCard
          v-for="post in posts.data"
          :post="post"
          :community="post.community_slug"
          :key="post.id"
        />
      </div>
      <div class="w-4/12 p-4">
        <div class="m-2 bg-slate-500 p-2 text-white">
          <h2>Top Communities</h2>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>

<script setup>
import Pagination from "@/Components/Pagination.vue";
import PostCard from "@/Components/PostCard.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";

defineProps({
  communities: Object,
  posts: Object,
});
</script>
