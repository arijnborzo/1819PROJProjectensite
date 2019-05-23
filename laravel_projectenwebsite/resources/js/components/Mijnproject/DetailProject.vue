<template>
  <div id="voorstel">
    <b-container align-h="center">
      <b-card class="mb-5 mt-5">
        <b-row>
          <b-col>
            <h2 id="titel">{{project.title}}</h2>
          </b-col>
          <b-col>
            <h5 id="status">Status: {{statusProject(project.status)}}</h5>
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
          <b-col md="6">
            <h4>Hoofdvraag</h4>
            <p>{{project.main_question}}</p>
            <h4>Nevenvragen</h4>
            <ul>
              <p>{{project.side_questions}}</p>
              <li v-for="vraag in project.side_questions" v-bind:key="vraag"></li>
            </ul>
          </b-col>
          <b-col md="6">
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
            <h4>Groepsledennn</h4>
            <ul>
              <li v-for="member in groupmembers" v-bind:key="member">
                <p>
                  {{member}}
                  <span>
                    <img
                      class="lidbelbin"
                      :src="belbinResult(member.belbintype)"
                      :alt="member.belbintype"
                      v-b-tooltip.click.hover
                      :title="member.belbintype"
                    >
                  </span>
                </p>
              </li>
            </ul>
          </b-col>
          <b-col id="btns" md="6" align-self="end">
            <b-button
              v-b-modal.modal-1
              @click="verstuurGroepsverzoek()"
              class="btns"
              style="float:right"
              v-show="showButton()"
            >Verstuur verzoek om lid te worden</b-button>
            <b-modal id="modal-1" title="Lidmaatschap" hide-footer>
              <p>Er is een verzoek verstuurd!</p>
            </b-modal>
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
      showBtn: true,
      photo: {
        coordinator: "../../img/co-ordinator.png",
        completor: "../../img/completor.png",
        implementor: "../../img/implementor.png",
        investigator: "../../img/investigator.png",
        monitor: "../../img//monitor-evaluator.png",
        shaper: "../../img/shaper.png",
        plant: "../../img/plant.png",
        teamworker: "../../img/teamworker.png"
      }
    };
  },
  mounted() {
    console.log("x");

    console.log(this.project);
    console.log("y");
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
    },
    verstuurGroepsverzoek() {
      this.showBtn = false;
    },
    showButton() {
      if (this.showBtn == false) {
        return false;
      } else if (this.project.groupmembers > 3) {
        return false;
      } else {
        return true;
      }
    }
  }
};
</script>

<style>
</style>
