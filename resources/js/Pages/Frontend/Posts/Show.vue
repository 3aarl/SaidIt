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

    <section class="m-2 flex flex-col p-2 md:flex-row">
      <div class="w-full md:w-8/12">
        <div class="m-2 bg-white p-2">
          <h2 class="text-2xl font-semibold text-black">
            <Link :href="route('frontend.communities.show', community.slug)">
              s/{{ community.name }}
            </Link>
          </h2>
        </div>
        <div class="m-2 bg-white p-2 text-sm text-slate-400">
          <div class="m-2 flex flex-col justify-between md:flex-row">
            <div>
              Posted by
              <span class="ml-2 text-slate-700"> {{ post.data.username }}</span>
            </div>
            <div v-if="$page.props.auth.auth_check && post.data.owner">
              <Link
                :href="
                  route('communities.posts.edit', [
                    community.slug,
                    post.data.slug,
                  ])
                "
                class="mr-2 rounded-md bg-blue-500 px-4 py-2 font-semibold text-white hover:bg-blue-700"
                >Edit</Link
              >
              <Link
                :href="
                  route('communities.posts.destroy', [
                    community.slug,
                    post.data.slug,
                  ])
                "
                class="rounded-md bg-red-500 px-4 py-2 font-semibold text-white hover:bg-red-700"
                method="delete"
                as="button"
                type="button"
                >Delete</Link
              >
            </div>
          </div>
          <div class="p-2">
            <h1 class="text-3xl font-semibold text-black">
              {{ post.data.title }}
            </h1>
            <p class="my-2 text-slate-700">{{ post.data.description }}</p>
            <a
              :href="post.data.url"
              class="text-sm font-semibold text-blue-500 hover:text-blue-300"
              >{{ post.data.url }}</a
            >
          </div>
        </div>
      </div>
      <div class="w-full p-4 md:w-4/12">
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
  post: Object,
});
</script>