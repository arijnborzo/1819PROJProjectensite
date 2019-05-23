<template>
  <div id="voorstel">
    <b-container align-h="center">
      <b-card class="mb-5 mt-5">
        <b-row>
          <b-col>
            <h2 id="titel">{{project.title}}Van Mij!</h2>
          </b-col>
          <b-col>
            <h6 style="line-height:38px; text-align:center">Status: {{statusProject(project.status)}}</h6>
          </b-col>
        </b-row>
        <div id="beschrijvingVoorstel">
          <b-row>
            <h5>Beschrijving</h5>
          </b-row>
          <b-row>
            <p>{{project.full_description}}</p>
          </b-row>
        </div>
        <b-row>
          <b-col cols="12" md="6">
            <h4>Hoofdvraag</h4>
            <p>{{project.main_question}}</p>
            <h4>Nevenvragen</h4>
            <p>{{project.side_questions}}</p>
          </b-col>
          <b-col id="smart" cols="12" md="6">
            <h4>SMART-criteria</h4>
            <ul>
              <li v-for="(value, criteria) in smartcriteria[0]" v-bind:key="criteria">
                <h6>{{criteria}}</h6>
                <p>{{value}}</p>
              </li>
            </ul>
          </b-col>
        </b-row>
        <b-row>
          <b-col md="6">
            <h4>Groepsleden</h4>
            <ul>
              <li v-for="member in groupmembers" v-bind:key="member">
                <img
                  class="lidbelbin"
                  :src="belbinResult(member.belbintype)"
                  :alt="member.belbintype"
                  v-b-tooltip.click.hover
                  :title="belbin"
                >
                <p>
                  {{ member }}
                </p>

              </li>
            </ul>
          </b-col>
          <b-col id="btns" md="6" align-self="end">
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
  props: ["project", "teacher", "groupmembers", "smartcriteria"],
  data() {
    return {
      photo: {
        coordinator: "../../img/co-ordinator.png",
        completor: "../../img/completor.png",
        implementor: "../../img/implementor.png",
        investigator: "../../img/investigator.png",
        monitor: "../../img/monitor-evaluator.png",
        shaper: "../../img/shaper.png",
        plant: "../../img/plant.png",
        teamworker: "../../img/teamworker.png"
      }
    };
  },
  methods: {
    statusProject(value) {
      if (value === "Accepted") return `✔`;
      if (value === "Pending") return "❔";
      if (value === "Declined") return "✖";
    },
    belbinResult(value) {
      if (value === "Voorzitter") return this.photo.coordinator;
      if (value === "Zorgdrager") return this.photo.completor;
      if (value === "Specialist") return this.photo.implementor;
      if (value === "Brononderzoeker") return this.photo.investigator;
      if (value === "Monitor") return this.photo.monitor;
      if (value === "Vormer") return this.photo.shaper;
      if (value === "Plant") return this.photo.plant;
      if (value === "Groepsdrager") return this.photo.teamworker;
    }
  }
};
</script>

<style>
#beschrijvingVoorstel {
  background-color: #ced9e6;
  box-shadow: 0px 0px 1px #093667;
  margin: 2rem 0;
  padding: 1.5rem;
  margin-left: -1.2rem;
  margin-right: -1.2rem;
}

.lidbelbin {
  width: 29px;
  height: auto;
  float: right;
}
@media (max-width: 767px) {
  /* CSS goes here */
  #titel {
    text-align: center;
  }
  #btns {
    margin-top: 1.5rem;
  }
}
</style>
