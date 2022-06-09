<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="mt-5">My Posts</h1>
      </div>
      <div v-if="posts.length > 0">
        <!-- se l'array contiene dei dati andiamo visualizzarli con il v-if -->
        <PostCardListComponent :posts="post" />
      </div>
      <div v-else>Loading Posts</div>
    </div>
  </div>
</template>

<script>
import PostCardListComponent from "../components/PostCardListComponents.vue";
export default {
  name: "BlogComponent",
  components: { PostCardListComponent },
  data() {
    return {
      posts: [],
    };
  },
  mounte() {
    window.axios
      .get("http://127.0.0.1:8000/api/posts")
      .then(({ status, data }) => {
        console.log(data);
        //effettuo un controllo su status
        if (status === 200 && data.success) {
          this.posts = data.result.data;
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
