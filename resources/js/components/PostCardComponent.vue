<template>
  <div>
    <img :src="'storage/' + cover" :alt="title" />
    <h3>{{ title }}</h3>
    <p>{{ content }}</p>
  </div>
</template>

<script>
export default {
  name: "PostCardComponent",
  props: ["title", "cover", "content"],
  computed: {
    trimmedContent() {
      const shortContent =
        this.content.length > 30 ? this.content.substring(0, 30) : this.content;

      return shortContent;
    },
  },
};
</script>

<style>
</style>
