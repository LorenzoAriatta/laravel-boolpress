<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="mt-5">My Posts</h1>
      </div>
      <div class="col-12" v-if="posts.length > 0">
        <!-- se l'array contiene dei dati andiamo visualizzarli con il v-if -->
        <PostCardListComponent :posts="posts" />
        <div class="d-flex justify-content-center align-items-baseline mt-5">
          <button v-if="previousPageLink" @click="goPreviusPage()">Prev</button>
          <h5 class="px-2">{{ currentPage }} / {{ lastPage }}</h5>
          <button v-if="nextPageLink" @click="goNextPage()">Next</button>
        </div>
      </div>
      <div v-else>Loading Posts</div>
    </div>
  </div>
</template>

<script>
import PostCardListComponent from "../components/PostCardListComponent.vue";

export default {
  name: "BlogComponent",
  components: { PostCardListComponent },
  data() {
    return {
      posts: [],
      currentPage: 1,
      lastPage: 1,
      previousPageLink: "",
      nextPageLink: "",
    };
  },
  mounted() {
    this.loadPage("http://127.0.0.1:8000/api/posts");
  },
  methods: {
    loadPage(url) {
      window.axios
        .get(url)
        .then(({ status, data }) => {
          console.log(data);
          //effettuo un controllo su status
          if (status === 200 && data.success) {
            this.currentPage = data.result.current_page;
            this.previousPageLink = data.result.prev_page_url;
            this.nextPageLink = data.result.next_page_url;
            this.lastPage = data.result.last_page;
            this.posts = data.result.data;
            console.log(this.posts);
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
    goNextPage() {
      this.loadPage(this.nextPageLink);
    },
    goPreviusPage() {
      this.loadPage(this.previousPageLink);
    },
  },
};
</script>

<style>
</style>
