<template>
  <div id="app">
    <app-header></app-header>
    <router-view></router-view>
    <app-footer></app-footer>
  </div>
</template>

<script>
import Header from "./components/HeaderFooter/Header";
import Footer from "./components/HeaderFooter/Footer";

export default {
  data() {
    return {};
  },
  components: {
    appHeader: Header,
    appFooter: Footer
  },
  methods: {}
};
</script>

<style>
body {
  background: #eef1f4;
  font-family: Roboto, Helvetica, "sans-serif";
}
#app {
  display: flex;
  flex-direction: column;
  height: 100%;
}
</style>
