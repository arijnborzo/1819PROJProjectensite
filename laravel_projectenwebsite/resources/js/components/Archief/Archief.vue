<template>
  <b-container id="overzicht" fluid>
    <!--titel-->
    <b-row>
      <b-col cols="12" offset-md="2">
        <h3 id="alleprojecten">Bekijk hier alle projecten van vorige jaren</h3>
      </b-col>
    </b-row>
    <!-- Filter en projecten -->
    <b-row class="justify-content-center">
      <!-- Filter -->
      <b-col md="4" lg="3" class="filter">
        <app-archief-filter
                :jaartallen="this.jaartallen"
                @filtersAangepast="geselecteerdeJaartallen = $event"
        ></app-archief-filter>
      </b-col>
      <!-- Projecten -->
      <b-col md="8" lg="9">
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
        <div id="listgrid">
          <div id="gridlist" v-for="project in projecten" v-bind:key="project.titel">
            <transition name="fade">
              <app-project
                      v-if="filteredOpJaar(project.aanmaakdatum)"
                      :titel="project.titel"
                      :kortebeschrijving="project.korte_beschrijving"
                      :langebeschrijving="project.lange_beschrijving"
                      :groepsleden="project.groepsleden"
                      :status="project.status"
                      :proj_id="project.id"
                      :gridlist="gridlist"
              ></app-project>
            </transition>
          </div>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import ArchiefFilter from "./ArchiefFilter";
import Project from "../Overzicht/Project";

export default {
  props: ['groupmembers'],
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
      gridlist: "grid"
    };
  },
  components: {
    appArchiefFilter: ArchiefFilter,
    appProject: Project
  },
  mounted() {
    var currentGroup = 0;
    for (var proj in this.groupmembers) {
      // Neem project
      var project = this.groupmembers[proj];
      var groepsleden = project[0];
      var projectdetails = project[1];
      // Projecten toevoegen
      // Id
      var id = projectdetails.id;
      // Naam
      var titel = projectdetails.title;
      // beschrijvingen toevoegen
      var korte_beschrijving = projectdetails.short_description;
      var lange_beschrijving = projectdetails.full_description;
      // Status
      var status = projectdetails.status;
      // Aanmaakdatum
      var aanmaakdatum = projectdetails.created_at;
      var jaar = aanmaakdatum.slice(0, 4);
      // Add gebruikte jaren to list, voor filter
      this.addJaarToList(jaar);
      // Teacher
      var docent_id = projectdetails.teacher_id;
      // Project aanmaker
      var creator_id = projectdetails.creator_id;
      // Hoofdvraag
      var hoofdvraag = projectdetails.hoofdvraag;
      // object nieuwe vueproject aanmaken
      var vueproject = {
        id,
        titel,
        korte_beschrijving,
        lange_beschrijving,
        groepsleden,
        status,
        aanmaakdatum,
        docent_id,
        creator_id,
        hoofdvraag
      };
      // toevoegen aan vue component array genaamd projecten
      this.projecten.push(vueproject);
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
    statusProject(value) {
      if (value === "Accepted") return `✔`;
      if (value === "Pending") return "❔";
      if (value === "Declined") return "✖";
    },
    handleResize() {
      this.width = window.innerWidth;
      if (this.width < 1200) {
        this.showicons = false;
      } else {
        this.showicons = true;
      }
    },
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
      var beschrijvingtekst = document.getElementsByClassName("beschrijving");
      Array.prototype.filter.call(beschrijvingtekst, function(beschr) {
        beschr.style.height = "auto";
      });
      var groepsledentekst = document.getElementsByClassName("groepsleden");
      Array.prototype.filter.call(groepsledentekst, function(groepslid) {
        groepslid.style.height = "auto";
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
    },
    addJaarToList(jaar) {
      if (!this.jaartallen.includes(jaar)) {
        this.jaartallen.push(jaar);
      }
    }
  }
};
</script>
<style>
  #overzicht {
    padding-bottom: 2rem;
  }
</style>
