<template>
  <b-card v-bind:title="titel" tag="article" class="mt-3 mb-3 project">
    <b-card-text class="beschrijving">
      <h6>Beschrijving</h6>
      {{kortebeschrijving}}
    </b-card-text>

    <b-card-text class="groepsleden">
      <h6>Groepsleden</h6>
      <ul>
        <li v-for="(lid, index) in groepsleden" v-bind:key="index">
          <span>{{lid}}</span>
        </li>
      </ul>
    </b-card-text>
    <p class="statusDatum" v-if="!ifArchief">
      Status:
      <span>{{statusResult(status+"")}}</span>
    </p>
    <p class="statusDatum" v-if="ifArchief">
      Datum:
      <span>{{datumProject.slice(0,4)}}</span>
    </p>
    <b-button :href="'/project/' + proj_id" size="sm" class="bekijkbtn">Bekijk</b-button>
  </b-card>
</template>

<script>
export default {
  props: [
    "titel",
    "kortebeschrijving",
    "langebeschrijving",
    "groepsleden",
    "status",
    "proj_id",
    "gridlist",
    "is_student",
    "ifArchief",
    "datumProject"
  ],
  mounted() {
    if (this.gridlist === "list") {
      var articles = document.getElementsByTagName("ARTICLE");
      Array.prototype.filter.call(articles, function(proj) {
        proj.classList.remove("gridli");
        proj.classList.add("listli");
      });
    }
  },
  methods: {
    statusResult(status) {
      if (status === "Accepted") return "✔";
      if (status === "Declined") return "✖";
      else return "❔";
    }
  }
};
</script>

<style>
  .bekijkbtn {
    float: right;
    background-color: #093667;
    list-style-type: none;
  }
  .card-title {
    overflow: overlay;
    height: 3.6rem;
  }
  .beschrijving {
    height: 7.75rem;
    overflow: overlay;
    padding-right: 1.25rem;
  }

  .groepsleden {
    height: 7.75rem;
  }
  .project a {
    color: white;
  }
  .statusDatum {
    float: left;
    line-height: 38px;
  }
  /* Zotte border */
  * {
    box-sizing: border-box;
  }

  .project {
    overflow: hidden;
    float: left;
    width: 31%;
  }
  .project:before,
  .project:after {
    content: "";
    position: absolute;
    left: 0;
    height: 1px;
    width: 100%;
    background-color: #fff;
  }
  .project:before {
    top: 0;
  }
  .project:after {
    bottom: 0;
  }
  .project:hover > * > *:before,
  .project:hover > * > *:after {
    transform: translate3d(0, 0, 0);
  }
  .project:hover > * > * > *:before,
  .project:hover > * > * > *:after {
    transform: translate3d(0, 0, 0);
  }
  .project > *:before,
  .project > *:after {
    content: "";
    position: absolute;
    top: 0;
    height: 100%;
    width: 1px;
    background-color: #fff;
  }
  .project > *:before {
    left: 0;
  }
  .project > *:after {
    right: 0;
  }
  .project > * > *:before,
  .project > * > *:after {
    content: "";
    position: absolute;
    left: 0;
    z-index: 9;
    height: 1px;
    width: 100%;
    background-color: #093667;
  }
  .project > * > *:before {
    top: 0;
    transform: translate3d(-105%, 0, 0);
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
  }
  .project > * > *:after {
    bottom: 0;
    transform: translate3d(105%, 0, 0);
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
  }
  .project > * > * > *:before,
  .project > * > * > *:after {
    content: "";
    position: absolute;
    top: 0;
    z-index: 9;
    height: 100%;
    width: 1px;
    background-color: #093667;
  }
  .project > * > * > *:before {
    left: 0;
    transform: translate3d(0, 105%, 0);
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
  }
  .project > * > * > *:after {
    right: 0;
    transform: translate3d(0, -105%, 0);
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
  }
</style>
