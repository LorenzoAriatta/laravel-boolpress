<template>
  <nav class="navbar navbar-light bg-white d-flex justify-content-center py-3">
    <ul class="nav">
      <li v-for="(menuItem, index) in menu" :key="index" class="nav-item mr-3">
        <router-link :to="{ name: menuItem.linkName }">{{
          menuItem.label
        }}</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "HeaderComponent",
  data() {
    return {
      menu: [
        { linkName: "home", label: "Home" },
        { linkName: "blog", label: "My Posts" },
        { linkName: "who-we-are", label: "Who We Are" },
        { linkName: "contacts", label: "Contacts" },
      ],
    };
  },
};
</script>

<style>
</style>
