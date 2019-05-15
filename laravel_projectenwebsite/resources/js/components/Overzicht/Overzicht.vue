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
              <div v-for="project in projecten" v-bind:key=project.titel>
                <transition name="fade">
                  <b-col>
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
    props: ['projects'],
  data() {
    return {
      layout: "grid",
      selected: null,
      sorteeropties: [
        { value: null, text: "Sorteren op:" },
        { value: "a", text: "Op alfabetische volgorde A-Z" },
        { value: "b", text: "Op alfabetische volgorde Z-A" }
      ],
      projecten: [
        {
          titel: "Projectensite",
          beschrijving:
            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.",
          groepsleden: ["Arno Stas", "Arno Stas", "Arno Stas", "Arno Stas"]
        },
        {
          titel: "Robotje maken",
          beschrijving:
            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.",
          groepsleden: ["Arno Stasssssss", "Arno Stas", "Arno Stas", "/"]
        },
        {
          titel: "Projectensitee",
          beschrijving:
            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.",
          groepsleden: ["Arno Stas", "Arno Stas", "Arno Stas", "Arno Stas"]
        },
        {
          titel: "MacroKeyboard",
          beschrijving:
            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.",
          groepsleden: ["Arno Stas", "Arno Stas", "/", "/"]
        }
      ],
      show: true,
      showicons: true,
      width: 0
    };
  },
  components: {
    appFilter: Filter,
    appProject: Project
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