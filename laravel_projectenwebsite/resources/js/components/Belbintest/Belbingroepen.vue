<template>
  <div>
    <b-row class="mt-5">
      <b-col cols="12">
        <b-card class="p-2">
          <b-card-text>
            <h3>Jouw Belbinrol: {{belbin}}</h3>
            <p>
              Hieronder zie je de projecten waarin je past afhankelijk van jouw Belbinrol.
              <br>Indien jouw rol al in een groep voorkomt, zal deze groep niet tevoorschijn komen aangezien dit afgeraden is.
              <br>
              <br>De match geeft aan hoe goed je zou passen in de groep rekeninghoudend met het aantal groepsleden en de Belbinrollen in de groep.
              <br>
              <br>Let op! De groepen waarin al een persoon zit met dezelfde rol, maar wel een goede groep is, worden aangeduid met
              <span
                      class="text-danger"
              >!Goed!</span>.
            </p>
          </b-card-text>
          <b-table
                  responsive
                  borderless
                  hover
                  table-variant="dark"
                  :items="geselecteerdeProjecten"
                  :fields="fields"
          >
            <template slot="match" slot-scope="data">
              <span :class="`${geefMatchKlasse(data.value)}`">{{data.value}}</span>
            </template>
          </b-table>
        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
  export default {
    props: ["projects", "belbin", "kleuren"],
    data() {
      return {
        alleKleuren: [],
        isVoorzitter: false,
        match: "",
        geselecteerdeProjecten: [],
        matchKlasse: "",
        fields: [
          {
            key: "projecttitel",
            label: "Titel"
          },
          {
            key: "groepsleden.length",
            label: "Aantal groepsleden"
          },
          {
            key: "match",
            formatter: "matchWeergeven"
          }
        ]
      };
    },
    mounted() {
      for (var proj in this.projects) {
        this.alleKleuren = [];
        var zelfdeBelbin = false;
        // Neem project
        var project = this.projects[proj];
        var projecttitel = project[0];
        var groepsleden = project[1];
        var aantalGroepsleden = groepsleden.length;
        // Alle kleuren en belbinrol  van het project toevoegen aan arrays
        if (aantalGroepsleden == 4){ continue; }
        if (aantalGroepsleden == 0){ continue; }
        for (var groepslid in groepsleden) {
          var groepslidBelbinKleuren = groepsleden[groepslid][1];
          if (groepslidBelbinKleuren === null) {
            groepslidBelbinKleuren = "";
          }
          var woorden = groepslidBelbinKleuren.split(" ");
          var belbinRol = woorden[0];

          // Liever geen twee zelfde belbinrollen, indien al een zelfde belbin rol bevat dan gaat men naar het volgende project
          if (this.checkZelfdeBelbin(belbinRol)) {
            zelfdeBelbin = true;
          }

          // De kleuren van de persoon
          var belbinKleuren = woorden[1];
          // Voeg ze toe aan de huidige alle kleuren
          for (var index = 1; index < woorden.length; index++) {
            this.alleKleuren.push(woorden[index]);
          }
        }

        // Belbin implementatie
        // Unieke kleuren van huidig project
        var uniekeKleuren = this.maakUniekeKleuren(this.alleKleuren);
        var aantalUniekeKleuren = uniekeKleuren.length;
        console.log("Unieke kleuren voor: " + aantalUniekeKleuren);
        // Aantal unieke kleuren na toevoegen
        var aantalUniekeKleurenNa = this.checkAantalUniekeKleurenNaToevoegen(
                uniekeKleuren,
                this.maakUniekeKleuren(this.kleuren)
        );
        if (
                aantalUniekeKleurenNa == 4 &&
                zelfdeBelbin &&
                this.belbinRol !== "Voorzitter"
        ) {
          this.match = "!Goed!";
          var match = this.match;
          var projectZonderZelfdeBelbin = { groepsleden, projecttitel, match };
          this.geselecteerdeProjecten.push(projectZonderZelfdeBelbin);
          continue;
        }
        console.log("Unieke kleuren na: " + aantalUniekeKleurenNa);
        // Aantal kleuren na toevoegen
        var aantalKleurenNa = this.checkAantalKleurenNaToevoegen(
                this.alleKleuren,
                this.kleuren
        );

        // Check of persoon een voorzitter is
        if (this.belbin === "Voorzitter") {
          this.isVoorzitter = true;
        }
        console.log("Kleuren voor: " + this.alleKleuren.length);
        console.log("Kleuren na: " + aantalKleurenNa);

        // Als het een voorzitter is, eerst kijken om bij een groep te horen
        // if (this.isVoorzitter) {

        if (aantalUniekeKleuren == 4) {
          if (aantalKleurenNa > 6) {
            this.match = "Perfect";
          }
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
              } else if (aantalKleurenNa == 4) {
                this.match = "Matig";
              } else {
                this.match = "Slecht";
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
        var projectZonderZelfdeBelbin = { groepsleden, projecttitel, match };
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
      },
      geefMatchKlasse: function(value) {
        if (value === "Perfect") {
          return "text-success font-weight-bold";
        }
        if (value === "Zeer goed" || value === "Goed") {
          return "text-success";
        }
        if (value === "Matig") {
          return "text-warning";
        }
        if (value === "Slecht" || value === "!Goed!") {
          return "text-danger";
        }
      }
    }
  };
</script>
<style>
  th,
  td {
    padding-left: 0 !important;
  }
</style>