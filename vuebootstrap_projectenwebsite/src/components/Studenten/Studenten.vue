<template>
   <div>
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
        coordinator: "../../assets/co-ordinator.png",
        completor: "../../assets/completor.png",
        implementor: "../../assets/implementor.png",
        investigator: "../../assets/investigator.png",
        monitor: "../../assets/monitor-evaluator.png",
        shaper: "../../assets/shaper.png",
        plant: "../../assets/plant.png",
        teamworker: "../../assets/teamworker.png"
      }
    };
  },
  methods: {
    rowClass(item) {
      if (!item) return;
    },
    belbinResult(value) {
      if (value === "Z")
        return `<img src=${this.photo.coordinator} alt="CO-ORDINATOR">`;
      if (value === "Y")
        return `<img src=${this.photo.completor} alt="COMPLETOR">`;
      if (value === "X")
        return `<img src=${this.photo.implementor} alt="IMPLEMENTOR">`;
      if (value === "W")
        return `<img src=${this.photo.investigator} alt="INVESTIGATOR">`;
      if (value === "V") return `<img src=${this.photo.monitor} alt="MONITOR">`;
      if (value === "Q") return `<img src=${this.photo.shaper} alt="SHAPER">`;
      if (value === "T") return `<img src=${this.photo.plant} alt="PLANT">`;
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
</style>
Message Input


Message Arijn