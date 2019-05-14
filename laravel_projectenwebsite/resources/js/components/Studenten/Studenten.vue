<template>
   <div id="studenten">
     <b-row align-h="center" class="mt-5">
       <b-col cols="10">
           <b-table responsive striped borderless :items="studenten" :fields="fields" head-variant="dark" :tbody-tr-class="rowClass">
             <span slot="belbin" slot-scope="data" v-html="data.value"></span>
             <span slot="groep" slot-scope="data" v-html="data.value"></span>
           </b-table>
       </b-col>
     </b-row>
   </div>
</template>

<script>
export default {
  data() {
    return {
      fields: [
        {
          key: "groep",
          label: "Groep",
          sortable: true,
          formatter: "groepResult",
          html: true
        },
        {
          key: "naam",
          sortable: true
        },
        {
          key: "projectvoorstel",
          sortable: true
          // Variant applies to the whole column, including the header and footer
        },
        {
          key: "belbin",
          label: "Belbin",
          sortable: false,
          formatter: "belbinResult",
          html: true
        }
      ],
      studenten: [
          // 'students'
        {
          groep: "4",
          naam: "Lukas Petit",
          projectvoorstel: "Projectenwebsite",
          belbin: "X"
        },
        {
          groep: "4",
          naam: "Arno Stas",
          projectvoorstel: "Projectenwebsite",
          belbin: "Y"
        },
        {
          groep: "4",
          naam: "Andreas Lauwers",
          projectvoorstel: "Projectenwebsite",
          belbin: "Z"
        },
        {
          groep: "4",
          naam: "Arijn Borzo",
          projectvoorstel: "Projectenwebsite",
          belbin: "W"
        },
        {
          groep: "2",
          naam: "Nummer twee",
          projectvoorstel: "Macro Keyboard",
          belbin: "Z"
        },
        {
          groep: "2",
          naam: "Nummer een",
          projectvoorstel: "Macro Keyboard",
          belbin: "Y"
        },
        { groep: "1", naam: "Nummer drie", projectvoorstel: "", belbin: "X" }
      ],
      photo: {
        coordinator: "../../img/co-ordinator.png",
        completor: "../../img/completor.png",
        implementor: "../../img/implementor.png",
        investigator: "../../img/investigator.png",
        monitor: "../../img/monitor-evaluator.png",
        shaper: "../../img/shaper.png",
        plant: "../../img/plant.png",
        teamworker: "../../img/teamworker.png"
      }
    };
  },
  methods: {
    rowClass(item) {
      if (!item) return;
    },
    belbinResult(value) {
      if (value === "Z")
        return `<img src=${
          this.photo.coordinator
        } alt="CO-ORDINATOR" v-b-tooltip.click title="Co-ordinator">`;
      if (value === "Y")
        return `<img src=${
          this.photo.completor
        } alt="COMPLETOR" v-b-tooltip.click title="Completor">`;
      if (value === "X")
        return `<img src=${
          this.photo.implementor
        } alt="IMPLEMENTOR" v-b-tooltip.click title="Implementor">`;
      if (value === "W")
        return `<img src=${
          this.photo.investigator
        } alt="INVESTIGATOR" v-b-tooltip.click title="Investigator">`;
      if (value === "V")
        return `<img src=${
          this.photo.monitor
        } alt="MONITOR" v-b-tooltip.click title="Monitor">`;
      if (value === "Q")
        return `<img src=${
          this.photo.shaper
        } alt="SHAPER" v-b-tooltip.click title="Shaper">`;
      if (value === "T")
        return `<img src=${
          this.photo.plant
        } alt="PLANT" v-b-tooltip.click title="Plant">`;
      if (value === "S")
        return `<img src=${this.photo.teamworker} alt="TEAMWORKER">`;
    },
    groepResult(value) {
      if (value === "4") return `✔`;
      if (value === "1") return "✖";
      else return "❔";
    }
  }
};
</script>

<style>
img {
  width: 29px;
  height: auto;
}
html,
body {
  height: 100%;
}
#studenten {
  height: 100%;
}
</style>