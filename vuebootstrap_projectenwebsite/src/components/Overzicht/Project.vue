<template>
     <b-card
        v-bind:title=titel 
        tag="article"
        class="m-3 project"
        >
        <b-card-text id="beschrijving">
        <h6>Beschrijving</h6>
        {{beschrijving}}
        </b-card-text>
        <h6>Groepsleden {{glwidth}}</h6>
        <ul>
          <li v-for="(lid, index) in groepsleden" v-bind:key=index>
            <span>{{lid}}</span>
          </li>
        </ul>
        <b-button href="#" variant="primary" size="sm" class="bekijkbtn">Bekijk</b-button>
    </b-card>
</template>

<script>
export default {
  props: ["beschrijving", "titel", "groepsleden", "glwidth"],
  computed: {
    styling() {
      return "width: " + this.glwidth;
    }
  }
};
</script>

<style>
.bekijkbtn {
  float: right;
}
.project {
  width: 20rem;
  background-color: #e0e0e0;
  float: left;
}
</style>
