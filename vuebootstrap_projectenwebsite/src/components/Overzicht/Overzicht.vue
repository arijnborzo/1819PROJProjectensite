<template>
    <b-container id="overzicht" fluid>
      <b-row class="pt-5 justify-content-center">
        <b-col md="5" lg="4" xl="3" class="filter">
          <app-filter></app-filter>
        </b-col>
        <b-col md="7" lg="8" xl="9">
            
            <b-row>
              <b-col>
              <!--titel-->
                <h3 id="alleprojecten">Alle projecten</h3>
              </b-col>
            </b-row>
              <!--sorteren-->
            <b-row>
              <b-col>
                <b-form-select id="sorteren" v-model="selected" required :options="sorteeropties"></b-form-select>
              </b-col>
              <!--gridlistbtns-->
              <b-col v-if="showicons">
                <b-button @click="gridView" class="gridlistbtn">  <i class="fas fa-th-large" style="font-size: 1.2em;"></i></b-button>
                <b-button @click="listView" class="gridlistbtn"><i class="fas fa-list"></i></b-button>
              </b-col>
            </b-row>

            <!--gridlist-->
            <b-row id="gridlist" class="gridul">
              
              <!-- HIER WORDT DE VIA LARAVEL DOORGEGEVEN PROJECTEN BEHANDELD
              PROJECT is elk project, PROJECTEN de prop (zie onder export default remember studenten)-->
              <div v-for="project in projecten" v-bind:key=project.titel>
                <transition name="fade">
                  <b-col>
                    <!-- HIER GEVEN WE FIELDS MEE AAN HET APP-PROJECT COMPONENT -->
                    <app-project :titel=project.titel :beschrijving=project.beschrijving :groepsleden=project.groepsleden></app-project>
                  </b-col>
                </transition>
              </div>
            </b-row>
          </b-col>
      </b-row>
    </b-container>
</template>

<script>
import Filter from "./Filter";
import Project from "./Project";

export default {
  /* LARAVEL*/
  props: {
    projects: Object
  },
  data() {
    return {
      layout: "grid",
      selected: null,
      sorteeropties: [
        { value: null, text: "Sorteren op:" },
        { value: "a", text: "Op alfabetische volgorde A-Z" },
        { value: "b", text: "Op alfabetische volgorde Z-A" }
      ],
      projecten: [],
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
    for (var proj in this.projects) {
      // Neem project
      var project = this.projects[proj];

      if (this.projecten.length == 0) {
        var naam = `${project.name} ${project.surname}`;
        var groepsleden = [naam];
        var titel = project.title;
        var beschrijving = project.short_description;
        var vueproject = { titel, beschrijving, groepsleden };
        this.projecten.push(vueproject);
        continue;
      }
      // Zoek in alle projecten of het huidige project er al in zit
      for (var i = 0; i < this.projecten.length; i++) {
        if (this.projecten[i].titel == project.title) {
          // Voeg naam toe aan project
          var naam = `${project.name} ${project.surname}`;
          this.projecten[i].groepsleden.push(naam);
          // Stop met forloop indien gevonden
          break;
          // Indien nog niet gevonden maak nieuw project aan
        } else {
          // Instantieer de fields
          // Maak naam aan
          var naam = `${project.name} ${project.surname}`;
          // Nieuwe array voor groepsleden en naam toevoegen
          var groepsleden = [naam];
          var titel = project.title;
          // beschrijving toevoegen
          var beschrijving = project.short_description;
          // object nieuwe vueproject aanmaken
          var vueproject = { titel, beschrijving, groepsleden };
          // toevoegen aan vue component array genaamd projecten
          this.projecten.push(vueproject);
        }
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
  methods: {
    handleResize() {
      this.width = window.innerWidth;
      if (this.width < 1070) {
        this.showicons = false;
      } else {
        this.showicons = true;
      }
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
    }
  }
};
</script>

<style>
body {
  background: #eef1f4;
}
@media screen and (max-height: 700px) {
  html,
  body {
    height: 100%;
  }
  #overzicht {
    height: 100%;
  }
}

/* GRIDLIST */
.gridlist {
  margin: 0;
}
.listul {
  width: auto;
}
.gridli {
  width: 20rem;
}
.listli {
  width: 100%;
}
.proj {
  width: auto;
}
#alleprojecten {
  text-align: center;
}
ul {
  list-style-type: none;
  padding: 0;
}

/*TRANSITIONS */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}

.gridlistbtn {
  margin: 0 0.3rem;
  float: right;
}

/* SORTEREN */
#sorteren {
  width: 80%;
}

/* MEDIA QUERY */
@media (max-width: 1070px) {
  /* CSS goes here */
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
  }
  #sorteren {
    width: 100%;
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