<template>
  <b-container>
    <div v-if="!heeftBelbin">
      <b-row class="mt-5">
        <b-col cols="12">
          <h3 class="text-center">De Belbin test</h3>
        </b-col>
        <b-col class="text-center" cols="12">
          <p>De Belbintest kon niet worden geïmplementeerd wegens autersrechten en moet worden afgenomen op de link hieronder.</p>
        </b-col>
      </b-row>
      <b-row>
        <b-col cols="12">
          <b-card>
            <b-card-text>
              <h3>
                <a
                        href="https://www.thesis.nl/testen/belbin-test"
                        target="_blank"
                >Klik hier voor de Belbintest</a>
                <br>
              </h3>De Belbintest wordt afgenomen op de site www.thesis.nl.
              <br>Daarna krijgt u een resultaat toegewezen. Gelieve de correcte teamrol hieronder te selecteren:
              <br>
            </b-card-text>
            <b-form @submit="onSubmit">
              <b-form-group
                      id="input-group-1"
                      label="Selecteer jouw Belbinrol"
                      label-for="belbinrol"
              >
                <b-form-select id="belbinrol" v-model="belbin" required :options="belbinrollen"></b-form-select>
              </b-form-group>
              <p>Je kan niet bij een groep horen of er kan geen voorstel ingediend worden zonder dat je een Belbinrol hebt.</p>
              <b-button @click="btnClicked()" type="submit" class="btns">Verzenden</b-button>
            </b-form>
          </b-card>
        </b-col>
      </b-row>
    </div>
    <b-row>
      <b-col cols="12">
        <app-belbingroepen
                v-if="selected"
                :belbin="belbinrol"
                :kleuren="kleuren"
                :projects="projects"
        ></app-belbingroepen>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
  import Belbingroepen from "./Belbingroepen.vue";
  export default {
    props: ["projects", "belbin_type"],
    data() {
      return {
        belbin: null,
        belbinrol: "",
        kleuren: [],
        heeftBelbin: false,
        belbinrollen: [
          { value: null, text: "Selecteer" },
          { value: "Bedrijfsman rood blauw", text: "Bedrijfsman" },
          { value: "Groepswerker groen", text: "Groepswerker" },
          { value: "Brononderzoeker groen geel", text: "Brononderzoeker" },
          { value: "Plant geel", text: "Plant" },
          { value: "Voorzitter blauw groen", text: "Voorzitter" },
          { value: "Vormer rood", text: "Vormer" },
          { value: "Monitor geel rood", text: "Monitor" },
          { value: "Zorgdrager blauw", text: "Zorgdrager" }
        ],
        selected: false
      };
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault();
        alert(JSON.stringify(this.belbin));
      },
      btnClicked() {
        var woorden = this.belbin.split(" ");
        this.belbinrol = woorden[0];
        this.kleuren = [];
        this.heeftBelbin = true;
        for (var index = 1; index < woorden.length; index++) {
          this.kleuren.push(woorden[index]);
        }
        this.selected = true;
      }
    },
    mounted() {
      if (this.belbin_type !== null) {
        this.heeftBelbin = true;
        var woorden = this.belbin_type.split(" ");
        this.belbinrol = woorden[0];
        this.selected = true;
        console.log(this.belbinrol);
      }
    },
    components: {
      appBelbingroepen: Belbingroepen
    },
    watch: {
      belbin: function(nieuw) {

      },
      heeftBelbin: function(nieuw) {
        if (nieuw !== null) {
          return true;
        }
      }
    }
  };
</script>

<style>
  h3 a {
    color: #093667;
  }
</style>