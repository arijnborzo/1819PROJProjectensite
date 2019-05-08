<template>
  <div>
     <b-card
        v-bind:title=titel 
        tag="article"
        style="min-width:20rem; background-color: #e0e0e0"
        class="m-2"
        >
        <b-card-text>
        <h6>Beschrijving</h6>
        {{beschrijving}}
        </b-card-text>
        <h6>Groepsleden</h6>
        <ul>
          <li v-for="(lid, index) in groepsleden" v-bind:key=index>
            <span>{{lid}}</span>
          </li>
        </ul>
        <b-button href="#" variant="primary" size="sm" class="bekijkbtn">Bekijk</b-button>
    </b-card>
  </div>
</template>

<script>
export default {
  props: ["beschrijving", "titel", "groepsleden"],
  methods: {}
};
</script>

<style>
.bekijkbtn {
  float: right;
}
</style>
