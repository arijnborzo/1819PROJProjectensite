<template>
  <div id="voorstel">
    <b-container align-h="center">
      <b-card class="mb-5 mt-5">
        <b-row>
          <b-col>
            <h2 id="titel">Projectensite</h2>
          </b-col>
          <b-col>
            <h5 id="status">Status: {{statusProject("Accepted")}}</h5>
          </b-col>
        </b-row>
        <div id="beschrijvingVoorstel">
          <h5>Beschrijving</h5>
          <b-row>
            <b-col>
              <p>DESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTIONDESCRIPTION</p>
            </b-col>
          </b-row>
        </div>
        <b-row>
          <b-col cols="12" md="6">
            <h4>Hoofdvraag</h4>
            <p>WAAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAAAROM?</p>
            <h4>Nevenvragen</h4>
            <ul>
              <li>
                <p>waarom zou ik dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat doen?</p>
              </li>
              <li>
                <p>waarom zou ik dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat doen?</p>
              </li>
              <li>
                <p>waarom zou ik dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat doen?</p>
              </li>
              <li>
                <p>waarom zou ik dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat dat of dat doen?</p>
              </li>
            </ul>
          </b-col>
          <b-col md="6">
            <h4>SMART-criteria</h4>
            <ul>
              <li>
                <h6>CRITERIA</h6>
                <p>TEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekst</p>
              </li>
              <li>
                <h6>CRITERIA</h6>
                <p>TEKSTTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekst</p>
              </li>
              <li>
                <h6>CRITERIA</h6>
                <p>TEKSTTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekst</p>
              </li>
              <li>
                <h6>CRITERIA</h6>
                <p>TEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekstTEKSTtekst</p>
              </li>
              <li>
                <h6>CRITERIA</h6>
                <p>TEKST</p>
              </li>
            </ul>
          </b-col>
        </b-row>
        <b-row>
          <b-col md="6">
            <h4>Groepsleden</h4>
            <ul>
              <li>
                <p>
                  Stas Arno
                  <img
                    class="lidbelbin"
                    src="https://www.belbin.com/media/1833/tw-icon-margin.png"
                    alt="belbin"
                    v-b-tooltip.hover="'ToolTip!'"
                  >
                </p>
              </li>
              <li>
                <p>
                  Stas Arno
                  <img
                    class="lidbelbin"
                    src="https://www.belbin.com/media/1833/tw-icon-margin.png"
                    alt="belbin"
                    v-b-tooltip.hover="'ToolTip!'"
                  >
                </p>
              </li>
              <li>
                <p>
                  Stas Arno
                  <img
                    class="lidbelbin"
                    src="https://www.belbin.com/media/1833/tw-icon-margin.png"
                    alt="belbin"
                    v-b-tooltip.hover="'ToolTip!'"
                  >
                </p>
              </li>
              <li>
                <p>
                  Stas Arno
                  <img
                    class="lidbelbin"
                    src="https://www.belbin.com/media/1833/tw-icon-margin.png"
                    alt="belbin"
                    v-b-tooltip.hover="'ToolTip!'"
                  >
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
              v-show="showBtn"
            >Stel kandidaat</b-button>
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
        /*
      } else if (this.project.groupmembers > 3) {
        return false;*/
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
