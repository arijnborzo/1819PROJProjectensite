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
            <h4>Groepsleden</h4>
            <ul>
              <li v-for="member in groupmembers" v-bind:key="member">
                <p>
                  {{member[1].name}} {{member[1].surname}}
                  <span>
                    <img
                      class="lidbelbin"
                      :src="belbinResult(member[0])"
                      :alt="member.belbintype"
                      v-b-tooltip.click.hover
                      :title="member.belbintype"
                    >
                  </span>
                </p>
              </li>
            </ul>
          </b-col>
          <b-col class="btns" md="6" align-self="end">
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
        Voorzitter: "../../img/voorzitter.png",
        Zorgdrager: "../../img/zorgdrager.png",
        Bedrijfsman: "../../img/bedrijfsman.png",
        Brononderzoeker: "../../img/brononderzoeker.png",
        Monitor: "../../img/monitor.png",
        Vormer: "../../img/vormer.png",
        Plant: "../../img/plant.png",
        Groepswerker: "../../img/groepswerker.png"
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
      if (value === "Voorzitter") return this.photo.Voorzitter;
      if (value === "Zorgdrager") return this.photo.Zorgdrager;
      if (value === "Bedrijfsman") return this.photo.Bedrijfsman;
      if (value === "Brononderzoeker") return this.photo.Brononderzoeker;
      if (value === "Monitor") return this.photo.Monitor;
      if (value === "Vormer") return this.photo.Vormer;
      if (value === "Plant") return this.photo.Plant;
      if (value === "Groepswerker") return this.photo.Groepswerker;
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
#status {
  line-height: 38px;
  text-align: end;
}
</style>
