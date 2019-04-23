<template>
  <div>
    <app-header></app-header>
    <router-view></router-view>
  </div>
</template>

<script>
import Header from "./components/Header";

export default {
  data() {
    return {};
  },
  components: {
    appHeader: Header
  },
  methods: {}
};
</script>

<style>
body {
  background: #eef1f4;
  font-family: Roboto, Helvetica, "sans-serif";
}
</style>
