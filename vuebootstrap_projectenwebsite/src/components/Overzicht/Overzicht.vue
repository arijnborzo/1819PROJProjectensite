<template>
    <b-container fluid>
      <b-row class="pt-5 justify-content-center">
        <b-col md="5" lg="4" xl="3" class="filter">
          <app-filter></app-filter>
        </b-col>
        <b-col md="7" lg="8" xl="9">
          <b-card class="projecten">
            <h3>Alle projecten</h3>
            <app-project></app-project>
            <app-project></app-project>
          </b-card>
        </b-col>
      </b-row>
    </b-container>
</template>

<script>
import Filter from "./Filter";
import Project from "./Project";

export default {
  data() {
    return {};
  },
  components: {
    appFilter: Filter,
    appProject: Project
  }
};
</script>

<style>
body {
  background: #eef1f4;
}
@media (max-width: 992px) {
  /* CSS goes here */
  .projecten {
    -ms-flex-align: center !important;
    align-items: center !important;
    display: -ms-flexbox !important;
    display: flex !important;
  }
}
@media (max-width: 767px) {
  /* CSS goes here */
  .projecten {
    margin-top: 2.5rem;
  }
}
</style>