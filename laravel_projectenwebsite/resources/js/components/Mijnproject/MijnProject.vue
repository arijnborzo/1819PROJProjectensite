<template>
  <div id="voorstel">
    <b-container align-h="center">
      <b-card class="mb-5 mt-5">
        <b-row>
          <b-col>
            <h2 id="titel">Mijn{{project.title}}</h2>
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
        <b-row>
          <b-col md="6">
            <h4>Groepsleden</h4>
            <p>
              <span style="font-weight: bold">Verantwoordelijke docent</span>
              :
              <span>{{teacher.surname}} {{teacher.name}}</span>
            </p>
            <ul>
              <li v-for="member in groupmembers">
                <p>
                  {{statusMember(member[2])}}
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
                <b-form @click="onClick" action="/test" method="POST" id="accept">
                    <b-button v-bind:value="member[1].id" class="btns">Accepteer</b-button>
                    <input type="hidden" name="member" value={{member[0].id}};
                    <input type="hidden" name="_token" :value="csrf">
                </b-form>
                <b-form @click="onClick" action="/test" method="POST" id="deny">
                    <b-button value="deny" variant="danger" style="float: right">Verwijder</b-button>
                    <input type="hidden" name="member" value={{member[0].id}};
                    <input type="hidden" name="_token" :value="csrf">
                </b-form>
              </li>
            </ul>
          </b-col>
          <b-col id="btns" md="6" align-self="end">
            <b-button href="/mijnproject" style="float:right" variant="primary">Voeg groepslid toe</b-button>
            <b-button href="/nieuwproject" variant="primary">Pas voorstel aan</b-button>
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
  methods: {
    checkId(value){
      if (value == "project_id") {return false} else {return true}
    },
    statusMember(value) {
      console.log(value);
      if (value == 1) return `✔`;
      if (value == 0) return "❔";
    },
    statusProject(value) {
      if (value === "Accepted") return `✔`;
      if (value === "Pending") return "❔";
      if (value === "Declined") return "✖";
    },
    onClick(){
      console.log("clicked");
      console.log(document)
    },
    belbinResult(value) {
      if (value === null) {
        return "x";
      }
      var woorden = value.split(" ");
      var belbinrol = woorden[0];
      if (belbinrol === "Voorzitter") return this.photo.Voorzitter;
      if (belbinrol === "Zorgdrager") return this.photo.Zorgdrager;
      if (belbinrol === "Bedrijfsman") return this.photo.Bedrijfsman;
      if (belbinrol === "Brononderzoeker") return this.photo.Brononderzoeker;
      if (belbinrol === "Monitor") return this.photo.Monitor;
      if (belbinrol === "Vormer") return this.photo.Vormer;
      if (belbinrol === "Plant") return this.photo.Plant;
      if (belbinrol === "Groepswerker") return this.photo.Groepswerker;
    }
  },
  filters: {
    capitalize: function (value) {
      if (!value) return ''
      value = value.toString()
      return value.charAt(0).toUpperCase() + value.slice(1)
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
