<template>
  <div class="col-12">
    <div class="card">
      <img :src="'storage/' + cover" :alt="title" />
      <h3>{{ title }}</h3>
      <p>{{ trimmedContent }} ...</p>
      <router-link :to="{ name: 'single-post', params: { slug } }"
        >Show details</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCardComponent",
  props: ["title", "cover", "content", "slug"],
  computed: {
    trimmedContent() {
      const shortContent =
        this.content.length > 25 ? this.content.substring(0, 25) : this.content;

      return shortContent;
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
