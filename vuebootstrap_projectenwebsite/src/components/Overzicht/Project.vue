<template>
  <div>
     <b-card
        v-bind:title=titel 
        img-src="https://picsum.photos/600/300/?image=25"
        img-alt="Image"
        img-top
        tag="article"
        style="max-width: 20rem; float: left"
        class="m-2"
        >
        <article>{{categorie}}</article>
        <b-card-text>
        Some quick example text to build on the card title and make up the bulk of the card's content.
        </b-card-text>

        <b-button href="#" variant="primary">Go somewhere</b-button>
    </b-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      groepsnummer: 14,
      categorie: "Web development",
      titel: "Projectenwebsite",
      groepleden: 4
    };
  },
  methods: {}
};
</script>

<style>
</style>
