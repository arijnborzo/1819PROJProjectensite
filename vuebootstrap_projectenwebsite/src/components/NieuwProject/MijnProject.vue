<template>
  <div id="voorstel">
    <b-container align-h="center">
        <b-card class="mb-5 mt-5">
          <b-row>
            <b-col>
              <h2>{{titel}}</h2>
            </b-col>
            <b-col>
              <h6 style="line-height:38px; text-align:center">Status: in afwachting tot goedkeuring</h6>
            </b-col>
          </b-row>
          <b-row id="beschrijvingVoorstel">
            <h6>Beschrijving</h6>
            <p>{{beschrijving}}</p>
          </b-row>
          <b-row>
            <b-col cols="12" md="6">
              <h4>
                Hoofdvraag
              </h4>
              <p>
                {{hoofdvraag}}
              </p>
              <h4>
              Nevenvragen
            </h4>
            <ul>
              <li v-for="vraag in nevenvragen" v-bind:key="vraag">
                <p>{{vraag}}</p>
              </li>
            </ul>
            </b-col>
            <b-col id="smart" cols="12" md="6">
              <h4>
                SMART-criteria
              </h4>
              <ul>
                <li v-for="(value, criteria) in smart" v-bind:key="criteria">
                  <h6>{{criteria}}</h6><p>{{value}}</p>
                </li>
              </ul>
            </b-col>
          </b-row>
          <b-row>
          <b-col md="6">
            <h4>
              Groepsleden
            </h4>
            <ul>
              <li v-for="lid in groepsleden" v-bind:key="lid">
                <p>{{lid}}</p>
              </li>
            </ul>
            </b-col>
            <b-col md="6" align-self="end">
              <b-button style="float:right" variant="primary">Voeg groepslid toe</b-button>
              <b-button variant="primary">Pas voorstel aan</b-button>
            </b-col>
          </b-row>
        </b-card>
    </b-container>
  </div>
</template>

<script>
export default {
  props: [
    "titel",
    "status",
    "beschrijving",
    "hoofdvraag",
    "nevenvragen",
    "smart",
    "groepsleden"
  ],
  methods: {}
};
</script>

<style>
#beschrijvingVoorstel {
  background-color: skyblue;
  margin: 2rem 0;
  padding: 1.5rem;
  margin-left: -1.2rem;
  margin-right: -1.2rem;
}
</style>
