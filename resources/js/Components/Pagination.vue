<template>
  <div class="flex">
    <template v-for="(link, key) in links" :key="key">
      <div
        v-if="link.url === null"
        v-html="link.label"
        class="pd-4 mb-1 mr-1 cursor-not-allowed rounded border border-gray-300 bg-white px-4 py-3 text-sm leading-4 text-gray-400 hover:text-gray-500"
      ></div>
      <Link
        v-else
        :href="link.url"
        v-html="link.label"
        class="text-black-500 pd-4 mb-1 mr-1 rounded border border-gray-300 bg-white px-4 py-3 text-sm leading-4 hover:bg-gray-200 hover:text-gray-500 focus:border-indigo-500 focus:text-indigo-500"
      ></Link>
    </template>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  links: [],
});
</script>
