<template>
    <b-container fluid>
      <b-row class="pt-5 justify-content-center">
        <b-col md="5" lg="4" xl="3" class="filter">
          <app-filter></app-filter>
        </b-col>
        <b-col md="7" lg="8" xl="9">
          <b-card>
            
            <!--titel-->
            <h3 id="alleprojecten">Alle projecten</h3>

            <!--sorteren-->
            <b-form-select id="sorteren" v-model="selected" required :options="sorteeropties"></b-form-select>

            <!--gridlistbtns-->
            <b-button @click="gridView" class="gridlistbtn">Grid</b-button>
            <b-button @click="listView" class="gridlistbtn">List</b-button>
            
            <!--gridlist-->
            <ul id="gridlist" class="gridul">
              <li v-for="project in projecten" v-bind:key=project.titel>
                <app-project :titel=project.titel :beschrijving=project.beschrijving :groepsleden=project.groepsleden></app-project>
              </li>
            </ul>
          </b-card>
        </b-col>
      </b-row>
    </b-container>
</template>

<script>
import Filter from "./Filter";
import Project from "./Project";

export default {
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
            "Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, ",
          groepsleden: ["Arno Stas", "Arno Stas", "Arno Stas", "Arno Stas"]
        },
        {
          titel: "MacroKeyboard",
          beschrijving:
            "Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, ",
          groepsleden: ["Arno Stas", "Arno Stas"]
        }
      ]
    };
  },
  components: {
    appFilter: Filter,
    appProject: Project
  },
  methods: {
    gridView: function() {
      var ul = document.getElementById("gridlist");
      ul.classList.remove("listul");
      ul.classList.add("gridul");
    },
    listView: function() {
      var ul = document.getElementById("gridlist");
      ul.classList.remove("gridul");
      ul.classList.add("listul");
    }
  }
};
</script>

<style>
body {
  background: #eef1f4;
}

/* GRIDLIST */
.gridul {
  float: left;
  display: flex;
}
.listul {
  width: 100%;
  display: table;
}
.gridli {
  display: table-cell;
}
#alleprojecten {
  text-align: center;
}
ul {
  list-style-type: none;
  padding: 0;
}
.gridlistbtn {
  margin: 0 0.3rem;
  float: right;
}

/* SORTEREN */
#sorteren {
  width: 30%;
  float: left;
}

/* MEDIA QUERY */
@media (max-width: 992px) {
  /* CSS goes here */
  .projecten {
    -ms-flex-align: center !important;
    align-items: center !important;
    display: -ms-flexbox !important;
    display: flex !important;
  }
  .gridlistbtn {
    display: none;
  }
}
@media (max-width: 767px) {
  /* CSS goes here */
  .projecten {
    margin-top: 2.5rem;
  }
  #sorteren {
    width: 60%;
  }
}
</style>