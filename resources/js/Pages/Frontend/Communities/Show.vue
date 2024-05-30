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
          :community="community.slug"
          :key="post.id"
        />
        <div class="mt-4 p-2">
          <Pagination :links="posts.meta.links" />
        </div>
      </div>
      <div class="w-4/12 p-4">
        <div>
          <h2
            class="rounded-t-lg bg-indigo-700 p-6 text-lg font-semibold text-white"
          >
            About {{ community.name }}
          </h2>
          <p class="rounded-b-lg bg-white p-4">{{ community.description }}</p>
        </div>
        <CommunityList class="mt-4" :communities="communities.data">
          <template #title>Latest Communities</template>
        </CommunityList>
      </div>
    </section>
  </GuestLayout>
</template>

<script setup>
import CommunityList from "@/Components/CommunityList.vue";
import Pagination from "@/Components/Pagination.vue";
import PostCard from "@/Components/PostCard.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
  community: Object,
  posts: Object,
  communities: Object,
});
</script>
