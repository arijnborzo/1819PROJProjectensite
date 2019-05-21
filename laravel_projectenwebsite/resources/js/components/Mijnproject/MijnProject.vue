<template>
  <div id="voorstel">
    <b-container align-h="center">
      <b-card class="mb-5 mt-5">
        <b-row>
          <b-col>
            <h2 id="titel">{{titel}}</h2>
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
              <li v-for="(belbin, naam) in groepsleden" v-bind:key="naam">
                <p>{{naam}} <span><img class="lidbelbin" :src=belbinResult(belbin) :alt="belbin" v-b-tooltip.click.hover :title=belbin></span></p>
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
    props: [
      "titel",
      "status",
      "beschrijving",
      "hoofdvraag",
      "nevenvragen",
      "smart",
      "groepsleden"
    ],
    data() {
      return {
        photo: {
          coordinator: "../../assets/co-ordinator.png",
          completor: "../../assets/completor.png",
          implementor: "../../assets/implementor.png",
          investigator: "../../assets/investigator.png",
          monitor: "../../assets/monitor-evaluator.png",
          shaper: "../../assets/shaper.png",
          plant: "../../assets/plant.png",
          teamworker: "../../assets/teamworker.png"
        }
      };
    },
    methods: {
      belbinResult(value) {
        if (value === "coordinator") return this.photo.coordinator;
        if (value === "completor") return this.photo.completor;
        if (value === "implementor") return this.photo.implementor;
        if (value === "investigator") return this.photo.investigator;
        if (value === "monitor") return this.photo.monitor;
        if (value === "shaper") return this.photo.shaper;
        if (value === "plant") return this.photo.plant;
        if (value === "teamworker") return this.photo.teamworker;
      }
    }
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
