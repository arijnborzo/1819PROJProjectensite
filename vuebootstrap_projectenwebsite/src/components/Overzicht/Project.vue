<template>
     <b-card
        v-bind:title=titel 
        tag="article"
        class="mt-3 mb-3 project"
        >
        <b-card-text id="beschrijving">
        <h6>Beschrijving</h6>
        {{beschrijving}}
        </b-card-text>
        <h6>Groepsleden</h6>
        <ul>
          <li v-for="(lid, index) in groepsleden" v-bind:key=index>
            <span>{{lid}}</span>
          </li>
        </ul>
        <p style="float:left">Status: <span>{{status}}</span></p>
        
        <b-button href="#" variant="primary" size="sm" class="bekijkbtn">
          <router-link :to="{ name: 'detailproject', params: { titel: titel, beschrijving: beschrijving, status: status }}">
            Bekijk
          </router-link>
        </b-button>
    </b-card>
</template>

<script>
export default {
  props: ["titel", "beschrijving", "groepsleden", "status"]
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
.project a {
  color: white;
}
</style>
