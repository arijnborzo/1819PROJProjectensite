<template>
  <div id="studenten">
    <b-row align-h="center" class="mt-5">
      <b-col cols="10">
        <b-table
          responsive
          striped
          borderless
          :items="studenten"
          :fields="fields"
          head-variant="dark"
          caption-top
          :tbody-tr-class="rowClass"
        >
          <template
            slot="table-caption"
          >✔: zit in een volle groep | ✖: heeft nog geen groep | ❔: zit in groep maar is nog niet vol</template>
          <span slot="belbin" slot-scope="data" v-html="data.value"></span>
          <span slot="groep" slot-scope="data" v-html="data.value"></span>
        </b-table>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  props: {
    students: Object
  },
  data() {
    return {
      fields: [
        {
          key: "groep",
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
        },
        {
          key: "belbin",
          label: "Belbin",
          sortable: false,
          formatter: "belbinResult",
          html: true
        }
      ],
      studenten: [],
      groepen: [],
      photo: {
        coordinator: "../../assets/co-ordinator.png",
        completor: "../../assets/completor.png",
        implementor: "../../assets/implementor.png",
        investigator: "../../assets/investigator.png",
        monitor: "../../assets/monitor-evaluator.png",
        vormer: "../../assets/vormer.png",
        plant: "../../assets/plant.png",
        groepswerker: "../../assets/groepswerker.png"
      }
    };
  },
  mounted() {
    // Aantal groepsleden per groep toekennen
    var currentGroup = 0;
    for (var stud in this.students) {
      var student = this.students[stud];
      // Check of we aan een nieuwe groepsvoorstel begonnen zijn
      if (student.group_id != currentGroup) {
        this.groepen[currentGroup] = 1;
        currentGroup++;
      } else {
        this.groepen[currentGroup - 1]++;
      }
    }

    // Alle studenten toevoegen
    var currentStudentGroup = 0;
    for (var stud in this.students) {
      // Neem student
      var student = this.students[stud];
      // Check of we aan een nieuwe groepsvoorstel begonnen zijn
      if (student.group_id != currentStudentGroup) {
        currentStudentGroup++;
        // Groep vinden
        var groep = this.groepen[currentStudentGroup - 1];
        // Eerste lid toevoegen
        var naam = `${student.surname} ${student.name}`;
        // Project voorstel
        var projectvoorstel = student.projectvoorstel;
        // Belbin
        var belbin = student.belbin;
        // object nieuwe vueproject aanmaken
        var vuestudent = { groep, naam, projectvoorstel, belbin };
        // toevoegen aan vue component array genaamd projecten
        this.studenten.push(vuestudent);
      } else {
        var groep = this.groepen[currentStudentGroup - 1];
        var naam = `${student.surname} ${student.name}`;
        var projectvoorstel = student.projectvoorstel;
        var belbin = student.belbin;
        var vuestudent = { groep, naam, projectvoorstel, belbin };
        this.studenten.push(vuestudent);
      }
    }
  },
  methods: {
    rowClass(item) {
      if (!item) return;
    },
    belbinResult(value) {
      if (value === "Coordinator")
        return `<img class="belbinimg" src=${
          this.photo.coordinator
        } alt="CO-ORDINATOR" v-b-tooltip.click title="Co-ordinator">`;
      if (value === "Completor")
        return `<img class="belbinimg" src=${
          this.photo.completor
        } alt="COMPLETOR" v-b-tooltip.click title="Completor">`;
      if (value === "Implementor")
        return `<img class="belbinimg" src=${
          this.photo.implementor
        } alt="IMPLEMENTOR" v-b-tooltip.click title="Implementor">`;
      if (value === "Investigator")
        return `<img class="belbinimg" src=${
          this.photo.investigator
        } alt="INVESTIGATOR" v-b-tooltip.click title="Investigator">`;
      if (value === "Monitor")
        return `<img class="belbinimg" src=${
          this.photo.monitor
        } alt="MONITOR" v-b-tooltip.click title="Monitor">`;
      if (value === "Vormer")
        return `<img class="belbinimg" src=${
          this.photo.vormer
        } alt="VORMER" v-b-tooltip.click title="Vormer">`;
      if (value === "Plant")
        return `<img class="belbinimg" src=${
          this.photo.plant
        } alt="PLANT" v-b-tooltip.click title="Plant">`;
      if (value === "Groepswerker")
        return `<img class="belbinimg" src=${
          this.photo.groepswerker
        } alt="TEAMWORKER">`;
    },
    groepResult(value) {
      if (value === 4) return `✔`;
      if (value === 1) return "✖";
      else return "❔";
    }
  }
};
</script>

<style>
.belbinimg {
  width: 29px;
  height: auto;
}
</style>