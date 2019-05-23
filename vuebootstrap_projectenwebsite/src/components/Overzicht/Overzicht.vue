<template>
  <b-container id="overzicht" fluid>
    <b-row>
      <b-col cols="12" offset-md="2">
        <!--titel-->
        <h3 id="alleprojecten">Alle projecten</h3>
      </b-col>
    </b-row>
    <b-row class="justify-content-center">
      <b-col md="4" lg="3" class="filter">
        <app-filter @filtersAangepast="filterForm = $event"></app-filter>
      </b-col>
      <b-col md="8" lg="9">
        <!--sorteren-->
        <b-row>
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
                v-if="filtered(project)"
                :titel="project.titel"
                :beschrijving="project.beschrijving"
                :groepsleden="project.groepsleden"
                :status="project.status"
                :proj_id="project.id"
              ></app-project>
            </transition>
          </div>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import Filter from "./Filter";
import Project from "./Project";

export default {
  /*props: {
    projects: Array
  },*/
  data() {
    return {
      selected: null,
      sorteeropties: [
        { value: null, text: "Sorteren op:" },
        { value: "az", text: "Op alfabetische volgorde A-Z" },
        { value: "za", text: "Op alfabetische volgorde Z-A" }
      ],
      projecten: [],
      projects: [
        {
          title: "Projectensite",
          short_description:
            "Voor dit vak de projectenwebsite opnieuw makenoor dit vak de projectenwebsite opnieuw makenoor dit vak de projectenwebsite opnieuw makenoor dit vak de projectenwebsite opnieuw maken",
          groepsleden: ["Pieterjan Van Beneden", "Arno Stas", "Arno Stas"],
          id: 1,
          status: "Accepted"
        },
        {
          title: "Projectensite",
          short_description: "Voor dit vak de projectenwebsit",
          groepsleden: ["Pieterjan Van Beneden", "Arno Stas"],
          id: 1,
          status: "Accepted"
        },
        {
          title: "Projectensite",
          short_description:
            "Voor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw maken",
          groepsleden: [
            "Pieterjan Van Beneden",
            "Arno Stas",
            "Arno Stas",
            "Arno Stas"
          ],
          id: 1,
          status: "Accepted"
        },
        {
          title: "Projectensite",
          short_description:
            "Voor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw maken",
          groepsleden: [
            "Pieterjan Van Beneden",
            "Arno Stas",
            "Arno Stas",
            "Arno Stas"
          ],
          id: 1,
          status: "Accepted"
        },
        {
          title: "Projectensite",
          short_description:
            "Voor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw maken",
          groepsleden: [
            "Pieterjan Van Beneden",
            "Arno Stas",
            "Arno Stas",
            "Arno Stas"
          ],
          id: 1,
          status: "Accepted"
        },
        {
          title: "Projectensite",
          short_description:
            "Voor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw makeVoor dit vak de projectenwebsite opnieuw maken",
          groepsleden: [
            "Pieterjan Van Beneden",
            "Arno Stas",
            "Arno Stas",
            "Arno Stas"
          ],
          id: 1,
          status: "Accepted"
        },
        {
          title: "Projectensite",
          short_description: "Voor dit vak de projectenwebsite opnieuw maken",
          groepsleden: [
            "Pieterjan Van Beneden",
            "Arno Stas",
            "Arno Stas",
            "Arno Stas"
          ],
          id: 1,
          status: "Accepted"
        }
      ],
      filterForm: {},
      show: true,
      showicons: true,
      width: 0
    };
  },
  components: {
    appFilter: Filter,
    appProject: Project
  },
  mounted() {
    var currentGroup = 0;

    for (var proj in this.projects) {
      // Neem project
      var project = this.projects[proj];
      // Check of we aan een nieuw voorstel begonnen zijn
      if (project.group_id != currentGroup) {
        currentGroup++;
        // Groepsleden aanmaken
        var groepsleden = [];
        // Eerste lid toevoegen
        var ifnaam = `${project.name} ${project.surname}`;
        groepsleden.push(ifnaam);
        var titel = project.title;
        // beschrijving toevoegen
        var beschrijving = project.short_description;
        var status = project.status;
        var id = project.id;
        // object nieuwe vueproject aanmaken
        var vueproject = { titel, beschrijving, groepsleden, status, id };
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
      this.gridListTekstStyling("7.75rem", "8rem");
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
      var groepstekst = document.getElementsByClassName("groepsleden");
      Array.prototype.filter.call(groepstekst, function(groepsleden) {
        groepsleden.style.height = grheight;
      });
    },
    filterOpNaam(waardeZoeken, projectenNaam) {
      var woordenlijst = waardeZoeken.split(" ");
      for (var i = 0; i < woordenlijst.length; i++) {
        if (
          projectenNaam.toLowerCase().indexOf(woordenlijst[i].toLowerCase()) !==
          -1
        ) {
          return true;
        }
      }
      return false;
    },
    filterOpGroepsleden(aantalGroepsleden, groepsleden) {
      for (var i = 0; i < aantalGroepsleden.length; i++) {
        if (aantalGroepsleden[i] == groepsleden.length) {
          return true;
        }
      }
      return false;
    },
    filterOpStatus(keuzeStatus, status) {
      for (var i = 0; i < keuzeStatus.length; i++) {
        if (keuzeStatus[i] === status) {
          return true;
        }
      }
      return false;
    },
    filtered(project) {
      var naamFilter = true;
      var groepsledenFilter = true;
      var statusFilter = true;
      /* Filter op naam */
      if (
        typeof this.filterForm.naam === "undefined" ||
        this.filterForm.naam === ""
      ) {
        naamFilter = true;
      } else {
        naamFilter = this.filterOpNaam(this.filterForm.naam, project.titel);
      }
      /* Filter op groepsleden */
      if (
        typeof this.filterForm.groepsleden === "undefined" ||
        this.filterForm.groepsleden.length == 0
      ) {
        groepsledenFilter = true;
      } else {
        groepsledenFilter = this.filterOpGroepsleden(
          this.filterForm.groepsleden,
          project.groepsleden
        );
      }
      /* Filter op status */
      if (
        typeof this.filterForm.status === "undefined" ||
        this.filterForm.status.length == 0
      ) {
        statusFilter = true;
      } else {
        statusFilter = this.filterOpStatus(
          this.filterForm.status,
          project.status
        );
      }
      if (naamFilter && groepsledenFilter && statusFilter) {
        return true;
      } else {
        return false;
      }
    }
  }
};
</script>

<style>
body {
  background: #eef1f4;
}
/* GRIDLIST */
#alleprojecten {
  text-align: center;
  margin-bottom: 2rem;
}
#alleprojecten {
  text-align: center;
  margin: 2rem 0;
}
#listgrid div:nth-child(3n + 2) > .project {
  margin: 0 2%;
}
.listul {
  width: auto;
}
.gridli {
  overflow: hidden;
  float: left;
  width: 32%;
}
.listli {
  width: 100%;
  height: auto;
  margin-left: auto !important;
}
.proj {
  width: auto;
}
ul {
  list-style-type: none;
  padding: 0;
}

/* SORTEREN */
#sorteren {
  width: 80%;
}

/* BTNS */
.gridlistbtn {
  margin-left: 0.3rem;
  float: right;
}

/* MEDIA QUERYS */
@media (max-width: 1200px) {
  .projecten {
    -ms-flex-align: center !important;
    align-items: center !important;
    display: -ms-flexbox !important;
    display: flex !important;
  }
  .gridul {
    width: auto;
  }
  .project {
    width: 100%;
    height: auto;
  }
  #sorteren {
    width: 100%;
    margin-top: 1rem;
  }
  .beschrijving {
    height: auto !important;
  }
  .groepsleden {
    height: auto !important;
  }
  #listgrid div:nth-child(3n + 2) > .project {
    margin: auto;
  }
}
@media (max-width: 767px) {
  .projecten {
    margin-top: 2.5rem;
  }
  #sorteren {
    width: 100%;
  }
  #alleprojecten {
    margin-top: 1rem;
  }
}
</style>
