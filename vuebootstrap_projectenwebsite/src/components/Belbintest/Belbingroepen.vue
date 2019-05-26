<template>
  <b-container>
    <b-row class="mt-5">
      <b-col cols="12"></b-col>
    </b-row>
    <b-row>
      <b-col cols="12">
        <b-card class="p-2">
          <b-card-text>
            <h3 class="text-center">Jouw Belbinrol: {{belbin}}</h3>
          </b-card-text>
          <div v-for="project in geselecteerdeProjecten" :key="project.id">
            <app-belbingroep
              :projectdetails="project.projectdetails"
              :groepsleden="project.groepsleden"
              :match="project.match"
            ></app-belbingroep>
          </div>
        </b-card>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import Belbingroep from "./Belbingroep.vue";
export default {
  props: ["projects", "belbin", "kleuren"],
  data() {
    return {
      alleKleuren: [],
      isVoorzitter: false,
      match: "",
      geselecteerdeProjecten: []
    };
  },
  mounted() {
    for (var proj in this.projects) {
      this.alleKleuren = [];
      var zelfdeBelbin = false;

      // Neem project
      var project = this.projects[proj];
      var groepsleden = project[0];
      var aantalGroepsleden = groepsleden.length;
      var projectdetails = project[1][0];
      // Alle kleuren en belbinrol  van het project toevoegen aan arrays
      for (var groepslid in groepsleden) {
        var groepslidKleuren = groepsleden[groepslid].belbin;
        var woorden = groepslidKleuren.split(" ");
        var belbinRol = woorden[0];

        // Liever geen twee zelfde belbinrollen, indien al een zelfde belbin rol bevat dan gaat men naar het volgende project
        if (this.checkZelfdeBelbin(belbinRol)) {
          zelfdeBelbin = true;
        }
        if (zelfdeBelbin) {
          continue;
        }

        // De kleuren van de persoon
        var belbinKleuren = woorden[1];
        // Voeg ze toe aan de huidige alle kleuren
        for (var index = 1; index < woorden.length; index++) {
          this.alleKleuren.push(woorden[index]);
        }
      }
      if (zelfdeBelbin) {
        continue;
      }

      // Belbin implementatie
      // Unieke kleuren van huidig project
      var uniekeKleuren = this.maakUniekeKleuren(this.alleKleuren);
      var aantalUniekeKleuren = uniekeKleuren.length;
      // Aantal unieke kleuren na toevoegen
      var aantalUniekeKleurenNa = this.checkAantalUniekeKleurenNaToevoegen(
        uniekeKleuren,
        this.maakUniekeKleuren(this.kleuren)
      );
      // Aantal kleuren na toevoegen
      var aantalKleurenNa = this.checkAantalKleurenNaToevoegen(
        this.alleKleuren,
        this.kleuren
      );

      // Check of persoon een voorzitter is
      if (this.belbin === "Voorzitter") {
        this.isVoorzitter = true;
      }

      // Als het een voorzitter is, eerst kijken om bij een groep te horen
      // if (this.isVoorzitter) {

      // Als alle kleuren er zijn maar er nog geen voorzitter is, PERFECT match
      if (aantalUniekeKleuren == 4) {
        this.match = "Perfect";
        // Aantal huidige unieke kleuren = 3
      } else if (aantalUniekeKleuren == 3) {
        if (aantalUniekeKleurenNa == 4) {
          this.match = "Zeer goed";
        } else if (aantalGroepsleden == 3) {
          if (aantalKleurenNa > 6) {
            this.match = "Goed";
          } else if (aantalKleurenNa > 4) {
            this.match = "Matig";
          } else {
            this.match = "Slecht";
          }
        } else if (aantalKleurenNa > 5) {
          this.match = "Perfect";
        } else if (aantalKleurenNa == 5) {
          this.match = "Zeer goed";
        } else {
          this.match = "Goed";
        }
        // Aantal huidige unieke kleuren = 2
      } else if (aantalUniekeKleuren == 2) {
        if (aantalUniekeKleurenNa == 4) {
          this.match = "Perfect";
        } else if (aantalUniekeKleurenNa == 3) {
          if (aantalGroepsleden == 3) {
            this.match = "Slecht";
          } else if (aantalGroepsleden == 2) {
            if (aantalKleurenNa > 5) {
              this.match = "Perfect";
            } else if (aantalKleurenNa == 5) {
              this.match = "Zeer goed";
            } else {
              this.match = "Matig";
            }
          } else {
            this.match = "Perfect";
          }
        } else if (aantalUniekeKleurenNa == 2) {
          if (aantalGroepsleden == 1) {
            if (aantalKleurenNa == 4) {
              this.match = "Perfect";
            } else if (aantalKleurenNa == 3) {
              this.match = "Zeer goed";
            } else {
              this.match = "Matig";
            }
          } else if (aantalGroepsleden == 2) {
            this.match = "Slecht";
          }
        }
      }
      // }
      // Geen voorzitter
      //
      var match = this.match;
      var projectZonderZelfdeBelbin = { groepsleden, projectdetails, match };
      this.geselecteerdeProjecten.push(projectZonderZelfdeBelbin);
    }
  },
  methods: {
    checkZelfdeBelbin: function(belbinrol) {
      if (belbinrol === this.belbin) {
        return true;
      } else {
        return false;
      }
    },
    maakUniekeKleuren: function(alleKleuren) {
      let uniekeKleuren = [...new Set(alleKleuren)];
      return uniekeKleuren;
    },
    checkAantalKleurenNaToevoegen: function(alleKleuren, persoonKleuren) {
      for (var index in persoonKleuren) {
        alleKleuren.push(persoonKleuren[index]);
      }
      return alleKleuren.length;
    },
    checkAantalUniekeKleurenNaToevoegen: function(
      alleUniekeKleuren,
      persoonUniekeKleuren
    ) {
      for (var index in persoonUniekeKleuren) {
        alleUniekeKleuren.push(persoonUniekeKleuren[index]);
      }
      return this.maakUniekeKleuren(alleUniekeKleuren).length;
    }
  },
  components: {
    appBelbingroep: Belbingroep
  }
};
</script>

<style>
</style>