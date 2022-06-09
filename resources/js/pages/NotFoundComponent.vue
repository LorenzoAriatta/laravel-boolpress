<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-secondary">404-not found</h1>
        <router-link :to="{ name: 'home' }">Back to Home!</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "NotFoundComponent",
};
</script>

<style>
</style>
