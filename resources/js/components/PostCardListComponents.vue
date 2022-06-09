<template>
  <div class="container">
    <div v-for="(post, index) in posts" :key="index">
      <PostcardComponent
        :title="post.title"
        :cover="post.cover"
        :content="post.content"
      />
    </div>
  </div>
</template>

<script>
import PostCardComponent from "../components/PostCardComponent.vue";

export default {
  name: "PostCardListComponent",
  props: ["post"],
  components: { PostCardComponent },
};
</script>

<style>
</style>
