<
<template>
  <GuestLayout>
    <div class="m-2 flex justify-end p-2">
      <Link
        v-if="$page.props.auth.auth_check"
        :href="route('communities.posts.create', community.slug)"
        class="rounded bg-indigo-500 px-3 py-4"
        >Create Post</Link
      >
    </div>
    <h1>{{ community.name }} Community Page</h1>
  </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
  community: Object(),
});
</script>
