<template>
    <b-container id="overzicht" fluid>
      <b-row class="pt-5 justify-content-center">
        <b-col md="5" lg="4" xl="3" class="filter">
          <app-archief-filter :jaartallen=this.jaartallen @filtersAangepast="geselecteerdeJaartallen = $event"></app-archief-filter>
        </b-col>
        <b-col md="7" lg="8" xl="9">
            
            <b-row>
              <b-col>
              <!--titel-->
                <h3 id="alleprojecten">Bekijk hier alle projecten van vorige jaren {{geselecteerdeJaartallen}}</h3>
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
              <div v-for="project in projectenX" v-bind:key=project.titel>
                <transition name="fade">
                  <b-col>
                    <!-- HIER GEVEN WE FIELDS MEE AAN HET APP-PROJECT COMPONENT -->
                    <app-project :titel=project.titel :beschrijving=project.beschrijving :groepsleden=project.groepsleden :status=project.status></app-project>
                  </b-col>
                </transition>
              </div>
            </b-row>
          </b-col>
      </b-row>
    </b-container>
</template>

<script>
import Filter from "./ArchiefFilter";
import Project from "../Overzicht/Project";
import ArchiefFilterVue from "./ArchiefFilter.vue";

export default {
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
      jaartallen: [],
      geselecteerdeJaartallen: [],
      projecten: [],
      projectenX: [
        {
          titel: "Projectensite",
          beschrijving:
            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.",
          groepsleden: ["Arno Stas", "Arno Stas", "Arno Stas", "Arno Stas"],
          created_at: "2019-05-11 14:27:11"
        },
        {
          titel: "Robotje maken",
          beschrijving:
            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.",
          groepsleden: ["Arno Stasssssss", "Arno Stas", "Arno Stas", "/"],
          created_at: "2018-05-11 14:27:11"
        },
        {
          titel: "Projectensitee",
          beschrijving:
            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.",
          groepsleden: ["Arno Stas", "Arno Stas", "Arno Stas", "Arno Stas"],
          created_at: "2019-05-11 14:27:11"
        },
        {
          titel: "MacroKeyboard",
          beschrijving:
            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.",
          groepsleden: ["Arno Stas", "Arno Stas", "/", "/"],
          created_at: "2017-05-11 14:27:11"
        }
      ],
      show: true,
      showicons: true,
      width: 0
    };
  },
  components: {
    appArchiefFilter: Filter,
    appProject: Project
  },
  mounted() {
    var currentGroup = 0;
    for (var projjj in this.projectenX) {
      var jaar = this.projectenX[projjj].created_at.slice(0, 4);
      var maand = this.projectenX[projjj].created_at.slice(5, 7);
      var jaarInArrayBoolean = this.jaartallen.includes(jaar);
      if (!jaarInArrayBoolean) {
        this.jaartallen.push(jaar);
      }
    }

    var jaarInArrayBoolean = this.jaartallen.includes(jaar);
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
        var status = project.status;
        // object nieuwe vueproject aanmaken
        var vueproject = { titel, beschrijving, groepsleden, status };
        // toevoegen aan vue component array genaamd projecten
        this.projecten.push(vueproject);
      } else {
        var naam = `${project.name} ${project.surname}`;
        this.projecten[currentGroup - 1].groepsleden.push(naam);
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
    filtersAangepast(event) {
      console.log(event);
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
    },
    filtersAangepast(value) {}
  }
};
</script>
