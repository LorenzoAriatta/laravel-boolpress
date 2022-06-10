<template>
  <div class="container">
    <div v-if="post" class="col-12">
      <h2 class="text-center mt-3">{{ post.title }}</h2>
      <div class="col-12">
        <img
          class="w-100 mb-3"
          :src="'/storage/' + post.cover"
          :alt="post.title"
        />
      </div>
      <p>{{ post.content }}</p>
      <div>
        <h3>Category:</h3>
        {{ post.category.name }}
      </div>
      <div>
        <h3>Tags:</h3>
        <ul>
          <li v-for="tag in post.tags" :key="tag.id">{{ tag.name }}</li>
        </ul>
      </div>
      <router-link :to="{ name: 'blog' }">Go Back</router-link>
    </div>
    <div v-else>Loading Post</div>
  </div>
</template>

<script>
export default {
  name: "SinglePostComponent",
  data() {
    return {
      post: undefined,
    };
  },
  mounted() {
    const id = this.$route.params.id;
    console.log("mounted with id", id);
    window.axios
      .get("http://127.0.0.1:8000/api/posts/" + id)
      .then(({ status, data }) => {
        console.log(data);
        if (status === 200 && data.success) {
          this.post = data.result;
        }
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style>
</style>
