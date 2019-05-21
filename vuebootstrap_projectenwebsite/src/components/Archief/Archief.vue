<template>
  <b-container id="overzicht" fluid>
    <!--titel-->
    <b-row>
      <b-col>
        <h3 id="alleprojecten">Bekijk hier alle projecten van vorige jaren</h3>
      </b-col>
    </b-row>
    <!-- Filter en projecten -->
    <b-row class="justify-content-center">
      <!-- Filter -->
      <b-col md="4" lg="3" xl="2" class="filter">
        <app-archief-filter
          :jaartallen="this.jaartallen"
          @filtersAangepast="geselecteerdeJaartallen = $event"
        ></app-archief-filter>
      </b-col>
      <!-- Projecten -->
      <b-col md="8" lg="9" xl="10">
        <b-row>
          <!--sorteren-->
          <b-col>
            <b-form-select id="sorteren" v-model="selected" required :options="sorteeropties"></b-form-select>
          </b-col>
          <!--gridlistbtns-->
          <b-col v-if="showicons">
            <b-button @click="gridView" class="gridlistbtn btns">
              <i class="fas fa-th-large" style="font-size: 1.2em;"></i>
            </b-button>
            <b-button @click="listView" class="gridlistbtn btns">
              <i class="fas fa-list"></i>
            </b-button>
          </b-col>
        </b-row>

        <!--gridlist-->
        <b-row id="gridlist" class="gridul">
          <div v-for="project in projecten" v-bind:key="project.titel">
            <transition name="fade">
              <b-col v-show="filteredOpJaar(project.aanmaakdatum)">
                <app-project
                  :titel="project.titel"
                  :beschrijving="project.beschrijving"
                  :groepsleden="project.groepsleden"
                  :status="project.status"
                ></app-project>
              </b-col>
            </transition>
          </div>
        </b-row>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import ArchiefFilter from "./ArchiefFilter";
import Project from "../Overzicht/Project";

export default {
  props: {
    projects: Object
  },
  data() {
    return {
      selected: null,
      sorteeropties: [
        { value: null, text: "Sorteren op:" },
        { value: "az", text: "Op alfabetische volgorde A-Z" },
        { value: "za", text: "Op alfabetische volgorde Z-A" }
      ],
      jaartallen: [],
      geselecteerdeJaartallen: [],
      projecten: [],
      show: true,
      showicons: true,
      width: 0,
      height: 0
    };
  },
  components: {
    appArchiefFilter: ArchiefFilter,
    appProject: Project
  },
  mounted() {
    var currentGroup = 0;
    var jaarInArrayBoolean = true;
    for (var projjj in this.projects) {
      var jaar = this.projects[projjj].created_at.slice(0, 4);
      jaarInArrayBoolean = this.jaartallen.includes(jaar);
      if (!jaarInArrayBoolean) {
        this.jaartallen.push(jaar);
      }
    }

    jaarInArrayBoolean = this.jaartallen.includes(jaar);
    if (!jaarInArrayBoolean) {
      this.jaartallen.push(jaar);
    }

    for (var proj in this.projects) {
      // Neem project
      var project = this.projects[proj];
      // Check of we aan een nieuw voorstel begonnen zijn
      if (project.group_id != currentGroup) {
        currentGroup++;
        // Groepsleden aanmaken
        var groepsleden = [];
        // Eerste lid toevoegen
        var naam = `${project.name} ${project.surname}`;
        groepsleden.push(naam);
        var titel = project.title;
        // beschrijving toevoegen
        var beschrijving = project.short_description;
        // status vh project toevoegen
        var status = project.status;
        // aanmaakdatum (voor filter op jaar)
        var aanmaakdatum = project.created_at;
        // object nieuwe vueproject aanmaken
        var vueproject = {
          titel,
          beschrijving,
          groepsleden,
          status,
          aanmaakdatum
        };
        // toevoegen aan vue component array genaamd projecten
        this.projecten.push(vueproject);
      } else {
        var elsenaam = `${project.name} ${project.surname}`;
        this.projecten[currentGroup - 1].groepsleden.push(elsenaam);
      }
    }
  },
  created() {
    window.addEventListener("resize", this.handleResize);
    this.handleResize();
  },
  destroyed() {
    window.removeEventListener("resize", this.handleResize);
  },
  watch: {
    selected: function(nieuw, oud) {
      if (nieuw == "az") {
        this.projecten.sort(this.compare);
      } else if (nieuw === "za") {
        this.projecten.sort(this.compareReverse);
      }
    }
  },
  methods: {
    handleResize() {
      this.width = window.innerWidth;
      if (this.width < 1070) {
        this.showicons = false;
      } else {
        this.showicons = true;
      }
    },
    // Sorteren
    compare(a, b) {
      // Use toUpperCase() to ignore character casing
      const titelA = a.titel.toUpperCase();
      const titelB = b.titel.toUpperCase();

      let comparison = 0;
      if (titelA > titelB) {
        comparison = 1;
      } else if (titelA < titelB) {
        comparison = -1;
      }
      return comparison;
    },
    compareReverse(a, b) {
      // Use toUpperCase() to ignore character casing
      const titelA = a.titel.toUpperCase();
      const titelB = b.titel.toUpperCase();

      let comparison = 0;
      if (titelA > titelB) {
        comparison = 1;
      } else if (titelA < titelB) {
        comparison = -1;
      }
      return comparison * -1;
    },
    gridView: function() {
      var ul = document.getElementById("gridlist");
      ul.classList.remove("listul");
      ul.classList.add("gridul");
      var list = document.getElementsByClassName("project");
      Array.prototype.filter.call(list, function(proj) {
        proj.classList.remove("listli");
        proj.classList.add("gridli");
      });
      this.gridListTekstStyling("7.75rem", "10.75rem");
    },
    listView: function() {
      var ul = document.getElementById("gridlist");
      ul.classList.remove("gridul");
      ul.classList.add("listul");
      var list = document.getElementsByClassName("project");
      Array.prototype.filter.call(list, function(proj) {
        proj.classList.remove("gridli");
        proj.classList.add("listli");
      });
      this.gridListTekstStyling("auto", "auto");
    },
    gridListTekstStyling(grheight, beschrheight) {
      var beschrijvingtekst = document.getElementsByClassName("beschrijving");
      Array.prototype.filter.call(beschrijvingtekst, function(beschr) {
        beschr.style.height = beschrheight;
      });

      var groepsledentekst = document.getElementsByClassName("groepsleden");
      Array.prototype.filter.call(groepsledentekst, function(groepslid) {
        groepslid.style.height = grheight;
      });
    },
    filteredOpJaar(datum) {
      if (this.geselecteerdeJaartallen.length === 0) {
        return true;
      } else {
        var jaar = datum.slice(0, 4);
        var maand = datum.slice(5, 7);
        var isInJarenList = this.geselecteerdeJaartallen.indexOf(jaar) > -1;
        if (isInJarenList) {
          if (maand < 9) {
            return true;
          } else {
            return false;
          }
        }
      }
    }
  }
};
</script>
