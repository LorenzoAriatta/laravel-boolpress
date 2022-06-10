<template>
  <div class="container">
    <div class="card w-25">
      <img :src="'storage/' + cover" :alt="title" />
      <h3>{{ title }}</h3>
      <p>{{ trimmedContent }} ...</p>
      <router-link :to="{ name: 'single-post', params: { id } }"
        >Show details</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCardComponent",
  props: ["title", "cover", "content", "id"],
  computed: {
    trimmedContent() {
      const shortContent =
        this.content.length > 25 ? this.content.substring(0, 25) : this.content;

      return shortContent;
    },
  },
};
</script>

<style>
</style>
