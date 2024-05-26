<template>
  <Head title="All Communities" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        All Communities
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="container mx-auto">
          <div class="mb-4 flex justify-between">
            <h2 class="text-xl font-bold">Communities Table</h2>
            <Link
              :href="route('communities.create')"
              class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
            >
              Add Community
            </Link>
          </div>
          <div class="overflow-x-auto rounded-lg shadow-sm">
            <table class="w-full table-auto">
              <thead>
                <tr class="bg-white text-left text-xs font-semibold">
                  <th scope="col" class="px-6 py-3">Name</th>
                  <th scope="col" class="px-6 py-3">Slug</th>
                  <th scope="col" class="px-6 py-3"></th>
                </tr>
              </thead>
              <tbody class="text-sm font-medium">
                <tr
                  v-for="community in communities.data"
                  :key="community.id"
                  class="border-b border-gray-200 transition-colors duration-200 hover:bg-gray-300"
                >
                  <td class="px-6 py-4">{{ community.name }}</td>
                  <td class="px-6 py-4">{{ community.slug }}</td>
                  <td class="px-6 py-4 text-right">
                    <Link
                      :href="route('communities.edit', community.id)"
                      class="mr-3 text-indigo-600 hover:text-indigo-900"
                      >Edit</Link
                    >

                    <Link
                      :href="route('communities.destroy', community.id)"
                      class="text-red-600 hover:text-red-900"
                      method="delete"
                      as="button"
                      type="button"
                      >Delete
                    </Link>
                  </td>
                </tr>
              </tbody>
            </table>
            <Pagination
              :links="communities.links"
              class="mt-4 bg-gray-200 p-1"
            />
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import Pagination from "@/Components/pagination.vue";

defineProps({
  communities: Object,
});
</script>
