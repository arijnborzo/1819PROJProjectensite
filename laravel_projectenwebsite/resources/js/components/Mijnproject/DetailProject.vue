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
              <li v-for="vraag in project.side_questions"></li>
            </ul>
          </b-col>
          <b-col md="6">
            <h4>SMART-criteria</h4>
            <ul>
              <li v-for="(value, criteria) in smartcriteria[0]">
                <p style="font-weight: bold" v-if=checkId(criteria)>{{criteria | capitalize }}</p>
                <p v-if=checkId(criteria)>{{value}}</p>
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
                  <p>{{member[1].name}} {{member[1].surname}}</p>
                </b-col>
                <!-- BUTTONS ACCEPT DECLINE OF CREATOR -->
                <b-col v-if="is_student" style="text-align: center">
                  <b-button-group v-if="isPending(member[1].user_id)">
                    <b-button
                            size="sm"
                            variant="success"
                            v-if="!isAccepted(member[1].confirmed)"
                    >Accepteer</b-button>
                    <b-button size="sm" variant="danger" class="ml-3">Verwijder</b-button>
                  </b-button-group>
                  <p v-if="!isPending(member[1].user_id)">Bedenker van het project</p>
                </b-col>

                <b-col id="belbinimage">
                 <span>
                   <img
                           class="lidbelbin"
                           :src="belbinResult(member[0])"
                           :alt="member.belbintype"
                           v-b-tooltip.hover
                           :title="member.belbintype"
                   >
                 </span>
                </b-col>
              </b-row>
            </ul>
          </b-col>
          <!-- Buttons docent -->
          <b-col cols="12">
            <b-button-group v-if="!is_student">
              <b-button
                      variant="success"
                      v-if="checkStatus('Accepted')"
                      class="mr-2"
                      @click="project.status = 'Accepted'"
              >Accept</b-button>
              <b-button
                      variant="warning"
                      v-if="checkStatus('Pending')"
                      @click="project.status = 'Pending'"
              >Make pending</b-button>
              <b-button
                      variant="danger"
                      v-if="checkStatus('Declined')"
                      class="ml-2"
                      @click="project.status = 'Declined'"
              >Decline</b-button>
            </b-button-group>
            <!-- Buttons student -->
            <b-button :href="'/addMember/' + project.id"
                      v-if="is_student"
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
props: ["project", "teacher", "groupmembers", "smartcriteria", "is_student"],
  data() {
    return {
      showBtn: true,
      undo: false,
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
      checkId(value){
        if (value == "project_id") {return false} else {return true}
      },
      statusProject(value) {
        if (value === "Accepted") return `✔`;
        if (value === "Pending") return ":grey_question:";
        if (value === "Declined") return ":heavy_multiplication_x:";
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
        if (value == this.project.creator_id) {
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