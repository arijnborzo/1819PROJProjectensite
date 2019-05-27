<template>
  <div id="studenten">
    <h3 id="alleprojecten">Alle studenten die ingeschreven zijn</h3>
    <b-row align-h="center">
      <b-col cols="10">
        <b-table
          responsive
          bordered
          borderless
          hover
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
    students: Array
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
          label: "Belbinrol",
          sortable: false,
          formatter: "belbinResult",
          html: true
        }
      ],
      studenten: [],
      groepen: [],
      photo: {
        Voorzitter: "../../assets/completor.png",
        Zorgdrager: "../../assets/completor.png",
        Bedrijfsman: "../../assets/completor.png",
        Brononderzoeker: "../../assets/completor.png",
        Monitor: "../../assets/completor.png",
        Vormer: "../../assets/vormer.png",
        Plant: "../../assets/plant.png",
        Groepswerker: "../../assets/groepswerker.png"
      }
    };
  },
  mounted() {
    var currentGroup = 0;
    for (var stud in this.students) {
      var student = this.students[stud];
      // Check of we aan een nieuwe groepsvoorstel begonnen zijn
      if (student[3] != currentGroup) {
        this.groepen[currentGroup] = 1;
        currentGroup++;
      } else {
        this.groepen[currentGroup - 1]++;
      }
    }
    var currentStudentGroup = 0;
    for (var stud in this.students) {
      // Neem student
      var student = this.students[stud];
      // Check of we aan een nieuwe groepsvoorstel begonnen zijn
      if (student[3] != currentStudentGroup) {
        currentStudentGroup++;
        // Groep vinden
        var groep = this.groepen[currentStudentGroup - 1];
        // Eerste lid toevoegen
        var naam = student[0];
        // Voorstel toevoegen
        var projectvoorstel = student[2];
        // Belbin
        var belbin = student[1];
        // object nieuwe vueproject aanmaken
        var vuestudent = { groep, naam, projectvoorstel, belbin };
        // toevoegen aan vue component array genaamd projecten
        this.studenten.push(vuestudent);
      } else {
        var groep = this.groepen[currentStudentGroup - 1];
        var naam = student[0];
        var projectvoorstel = student[2];
        var belbin = student[1];
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
      if (value === null) {
        return "x";
      }
      var woorden = value.split(" ");
      var belbinrol = woorden[0];
      if (belbinrol === "Voorzitter")
        return `<img class="belbinimg" src=${
          this.photo.Voorzitter
        } alt="Voorzitter" v-b-tooltip.click title="Voorzitter">`;
      if (belbinrol === "Zorgdrager")
        return `<img class="belbinimg" src=${
          this.photo.Zorgdrager
        } alt="Zorgdrager" v-b-tooltip.click title="Zorgdrager">`;
      if (belbinrol === "Bedrijfsman")
        return `<img class="belbinimg" src=${
          this.photo.bedrijfsman
        } alt="Bedrijfsman" v-b-tooltip.click title="Bedrijfsman">`;
      if (belbinrol === "Brononderzoeker")
        return `<img class="belbinimg" src=${
          this.photo.Brononderzoeker
        } alt="Brononderzoeker" v-b-tooltip.click title="Brononderzoeker">`;
      if (belbinrol === "Monitor")
        return `<img class="belbinimg" src=${
          this.photo.Monitor
        } alt="Monitor" v-b-tooltip.click title="Monitor">`;
      if (belbinrol === "Vormer")
        return `<img class="belbinimg" src=${
          this.photo.Vormer
        } alt="Vormer" v-b-tooltip.click title="Vormer">`;
      if (belbinrol === "Plant")
        return `<img class="belbinimg" src=${
          this.photo.Plant
        } alt="Plant" v-b-tooltip.click title="Plant">`;
      if (belbinrol === "Groepswerker")
        return `<img class="belbinimg" src=${
          this.photo.Groepswerker
        } alt="Groepswerker">`;
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
td {
  font-weight: 300;
}
</style>
