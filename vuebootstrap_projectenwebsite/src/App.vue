<template>
  <div id="app">
    <app-header></app-header>
    <div id="wrapper">
      <router-view></router-view>
    </div>
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
  max-width: 100%;
  overflow-x: hidden;
}
#app {
  position: relative;
  min-height: 100%;
}
#wrapper {
  padding-bottom: 4rem;
}
h3 {
  color: #093667;
}
</style>
