<template>
  <main>
    <HeaderComponent />
    <router-view></router-view>
  </main>
</template>

<script>
import HeaderComponent from "../components/HeaderComponent.vue";

export default {
  name: "AppComponent",
  components: { HeaderComponent },
};
</script>

<style>
</style>
