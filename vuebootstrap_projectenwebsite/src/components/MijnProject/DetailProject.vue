<template>
  <div id="voorstel">
    <b-container align-h="center">
      <b-card class="mb-5 mt-5">
        <b-row>
          <b-col>
            <h2 id="titel">Projectensite</h2>
          </b-col>
          <b-col>
            <h5 id="status">Status: {{statusProject(this.projectx.status)}}</h5>
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
          <b-col md="6">
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
                <p>text</p>
              </li>
            </ul>
          </b-col>
        </b-row>
        <!-- groepsleden -->
        <b-row>
          <b-col cols="12">
            <h4>Groepsleden</h4>
          </b-col>
          <b-col cols="12">
            <p>
              <span style="font-weight:bold">Verantwoordelijke docent</span>
              :
              <span>{{teacher.surname | capitalize }} {{teacher.name}}</span>
            </p>
          </b-col>
          <b-col cols="12">
            <ul>
              <b-row v-for="member in groupmembers" :key="member.name">
                <b-col>
                  <p>{{member.name}}</p>
                </b-col>
                <!-- BUTTONS ACCEPT DECLINE OF CREATOR -->
                <b-col v-if="isStudent" style="text-align: center">
                  <b-button-group v-if="isPending(member.user_id)">
                    <b-button
                      size="sm"
                      variant="success"
                      v-if="!isAccepted(member.confirmed)"
                    >Accepteer</b-button>
                    <b-button size="sm" variant="danger" class="ml-3">Verwijder</b-button>
                  </b-button-group>
                  <p v-if="!isPending(member.user_id)">Bedenker van het project</p>
                </b-col>

                <b-col id="belbinimage">
                  <span>
                    <img
                      class="lidbelbin"
                      src="https://www.belbin.com/media/1833/tw-icon-margin.png"
                      :alt="member.belbin"
                      v-b-tooltip.hover
                      :title="member.belbin"
                    >
                  </span>
                </b-col>
              </b-row>
            </ul>
          </b-col>
          <!-- Buttons docent -->
          <b-col cols="12">
            <b-button-group v-if="!isStudent">
              <b-button
                variant="success"
                v-if="checkStatus('Accepted')"
                class="mr-2"
                @click="projectx.status = 'Accepted'"
              >Accept</b-button>
              <b-button
                variant="warning"
                v-if="checkStatus('Pending')"
                @click="projectx.status = 'Pending'"
              >Make pending</b-button>
              <b-button
                variant="danger"
                v-if="checkStatus('Declined')"
                class="ml-2"
                @click="projectx.status = 'Declined'"
              >Decline</b-button>
            </b-button-group>
            <!-- Buttons student -->
            <b-button
              v-if="isStudent"
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
  props: [
    "project" /*
    "teacher",
    "groupmembers"*/,
    "creator",
    "smartcriteria" /*,
    "isStudent"*/
  ],
  data() {
    return {
      showBtn: true,
      isStudent: false,
      undo: false,
      teacher: {
        name: "Lukas",
        surname: "petit"
      },
      projectx: {
        status: "Accepted",
        creator_id: 1
      },
      groupmembers: {
        stud1: {
          name: "Pieterjan Van den",
          user_id: 1,
          group_id: 1,
          confirmed: 1,
          belbin: "Plant geel"
        },
        stud2: {
          name: "Arno St",
          user_id: 2,
          group_id: 1,
          confirmed: 1,
          belbin: "Vormer geel"
        },
        stud3: {
          name: "Arno Sa",
          group_id: 1,
          user_id: 3,
          confirmed: 0,
          belbin: "Brononderzoeker rood geel"
        },
        stud4: {
          name: "Arno Saaaala",
          group_id: 1,
          user_id: 4,
          confirmed: 0,
          belbin: "Zorgdrager blauw rood"
        }
      },
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
    checkStatus(value) {
      if (value === "Accepted") {
        if (this.projectx.status === "Accepted") {
          return false;
        } else if (this.projectx.status === "Pending") {
          return true;
        } else if (this.projectx.status === "Declined") {
          return true;
        }
      } else if (value === "Pending") {
        if (this.projectx.status === "Accepted") {
          return true;
        } else if (this.projectx.status === "Pending") {
          return false;
        } else if (this.projectx.status === "Declined") {
          return true;
        }
      } else if (value === "Declined") {
        if (this.projectx.status === "Accepted") {
          return true;
        } else if (this.projectx.status === "Pending") {
          return true;
        } else if (this.projectx.status === "Declined") {
          return false;
        }
      }
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
    },
    isAccepted(value) {
      if (value == 1) {
        return true;
      }
    },
    isPending(value) {
      if (value == this.projectx.creator_id) {
        return false;
      } else {
        return true;
      }
    }
  },
  filters: {
    capitalize: function(value) {
      if (!value) return "";
      value = value.toString();
      return value.charAt(0).toUpperCase() + value.slice(1);
    },
    isCreator: function(value, conf) {
      if (!value) return "";
      if (conf == 1) {
        return "Maker: " + value;
      } else {
        return value;
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
#belbinimage {
  display: auto;
}
@media (max-width: 767px) {
  #belbinimage {
    display: none;
  }
}
</style>
