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
        <div class="m-2 rounded-lg bg-white p-2">
          <h2 class="text-2xl font-semibold text-black">
            <Link :href="route('frontend.communities.show', community.slug)">
              s/{{ community.name }}
            </Link>
          </h2>
        </div>
        <div class="m-2 flex bg-white p-2 text-sm text-slate-400">
          <div>
            <PostVote :post="post.data" />
          </div>
          <div class="w-full">
            <div class="m-2 flex flex-col justify-between md:flex-row">
              <div>
                Posted by
                <span class="ml-2 text-slate-700">
                  {{ post.data.username }}</span
                >
                {{ post.data.created_at }}
              </div>
              <div v-if="$page.props.auth.auth_check">
                <Link
                  v-if="can_update"
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
                  v-if="can_delete"
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
            <hr />
            <div>
              <ul role="list" class="m-2 divide-y divide-zinc-200 p-2">
                <li
                  v-for="(comment, index) in post.data.comments"
                  :key="index"
                  class="flex flex-col py-4"
                >
                  <div class="text-sm">
                    Commented by
                    <span class="ml-1 font-semibold text-slate-700">{{
                      comment.username
                    }}</span>
                  </div>
                  <div class="m2 p2 text-slate-600">{{ comment.content }}</div>
                </li>
              </ul>
            </div>
            <hr />
            <div v-if="$page.props.auth.auth_check">
              <form class="m-2 max-w-md p-2" @submit.prevent="submit">
                <div class="mt-2">
                  <label
                    for="comment"
                    class="mb-2 block text-sm font-medium text-zinc-900"
                    >Your comment</label
                  >
                  <textarea
                    id="comment"
                    v-model="form.content"
                    rows="4"
                    class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-900 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Your comment..."
                  ></textarea>
                </div>
                <div class="mt-2">
                  <button
                    class="rounded-md bg-blue-500 px-4 py-2 text-white hover:bg-blue-700"
                  >
                    Comment
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="w-full md:w-4/12">
        <PostList :posts="posts.data" :community="community">
          <template #title>
            <h2
              class="rounded-lg bg-indigo-700 p-6 text-lg font-semibold text-white"
            >
              Popular Posts
            </h2>
          </template>
        </PostList>
      </div>
    </section>
  </GuestLayout>
</template>

<script setup>
import Pagination from "@/Components/Pagination.vue";
import PostCard from "@/Components/PostCard.vue";
import PostList from "@/Components/PostList.vue";
import PostVote from "@/Components/PostVote.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
// import { Link } from "@inertiajs/vue3";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  community: Object,
  post: Object,
  posts: Object,
  can_delete: Boolean,
  can_update: Boolean,
});

const form = useForm({
  content: "",
});

const submit = () => {
  form.post(
    route("frontend.posts.comments", [
      props.community.slug,
      props.post.data.slug,
    ]),
    {
      onSuccess: () => {
        form.content = "";
      },
    },
  );
};
</script>
