<template>
  <div id="voorstel">
    <b-container align-h="center">
      <b-card class="mb-5 mt-5">
        <b-row>
          <b-col>
            <h2 id="titel">{{project[0].title}}</h2>
          </b-col>
          <b-col>
            <h5
              style="line-height:38px; text-align:center"
            >Status: {{statusProject(project[0].status)}}</h5>
          </b-col>
        </b-row>
        <div id="beschrijvingVoorstel">
          <b-row>
            <h5>Beschrijving</h5>
          </b-row>
          <b-row>
            <p>{{project[0].full_description}}</p>
          </b-row>
        </div>
        <b-row>
          <b-col cols="12" md="6">
            <h4>Hoofdvraag</h4>
            <p>{{project[0].main_question}}</p>
            <h4>Nevenvragen</h4>
            <ul>
              <p>{{project[0].side_questions}}</p>
              <li v-for="vraag in nevenvragen" v-bind:key="vraag"></li>
            </ul>
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
                <p>
                  {{member.surname}} {{member.name}}
                  <span>
                    <img
                      class="lidbelbin"
                      :src="belbinResult(member.belbintype)"
                      :alt="belbin"
                      v-b-tooltip.click.hover
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
  props: ["project", "teacher", "groupmembers", "creator", "smartcriteria"],
  data() {
    return {
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
  methods: {
    statusProject(value) {
      if (value === "Accepted") return `✔`;
      if (value === "Pending") return "❔";
      if (value === "Declined") return "✖";
    },
    belbinResult(value) {
      if (value === "coordinator") return this.photo.coordinator;
      if (value === "completor") return this.photo.completor;
      if (value === "implementor") return this.photo.implementor;
      if (value === "investigator") return this.photo.investigator;
      if (value === "monitor") return this.photo.monitor;
      if (value === "shaper") return this.photo.shaper;
      if (value === "plant") return this.photo.plant;
      if (value === "teamworker") return this.photo.teamworker;
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
