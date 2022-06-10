<template>
  <article class="mt-5 d-flex justify-content-center">
    <div v-for="(post, index) in posts" :key="index" class="col-5">
      <PostCardComponent
        :title="post.title"
        :cover="post.cover"
        :content="post.content"
        :slug="post.slug"
      />
    </div>
  </article>
</template>

<script>
import PostCardComponent from "./PostCardComponent.vue";

export default {
  name: "PostCardListComponent",
  props: ["posts"],
  components: { PostCardComponent },
};
</script>

<style>
</style>
