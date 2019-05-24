<template>
    <div id="studenten">
        <h3 id="alleprojecten">Alle studenten die ingeschreven zijn</h3>
        <b-row align-h="center">
            <b-col cols="10">
                <b-table responsive striped borderless :items="studenten" :fields="fields" head-variant="dark" caption-top :tbody-tr-class="rowClass">
                    <template slot="table-caption">✔: zit in een volle groep | ✖: heeft nog geen groep | ❔: zit in groep maar is nog niet vol</template>
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
                    Voorzitter: "../../img/voorzitter.png",
                    Zorgdrager: "../../img/zorgdrager.png",
                    Bedrijfsman: "../../img/bedrijfsman.png",
                    Brononderzoeker: "../../img/brononderzoeker.png",
                    Monitor: "../../img/monitor.png",
                    Vormer: "../../img/vormer.png",
                    Plant: "../../img/plant.png",
                    Groepswerker: "../../img/groepswerker.png"
                }
            };
        },
        mounted() {
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
            console.log(this.studenten);
        },
        methods: {
            rowClass(item) {
                if (!item) return;
            },
            belbinResult(value) {
                if (value === "Voorzitter")
                    return `<img class="belbinimg" src=${
                        this.photo.Voorzitter
                        } alt="Voorzitter" v-b-tooltip.click title="Voorzitter">`;
                if (value === "Zorgdrager")
                    return `<img class="belbinimg" src=${
                        this.photo.Zorgdrager
                        } alt="Zorgdrager" v-b-tooltip.click title="Zorgdrager">`;
                if (value === "Bedrijfsman")
                    return `<img class="belbinimg" src=${
                        this.photo.bedrijfsman
                        } alt="Bedrijfsman" v-b-tooltip.click title="Bedrijfsman">`;
                if (value === "Brononderzoeker")
                    return `<img class="belbinimg" src=${
                        this.photo.Brononderzoeker
                        } alt="Brononderzoeker" v-b-tooltip.click title="Brononderzoeker">`;
                if (value === "Monitor")
                    return `<img class="belbinimg" src=${
                        this.photo.Monitor
                        } alt="Monitor" v-b-tooltip.click title="Monitor">`;
                if (value === "Vormer")
                    return `<img class="belbinimg" src=${
                        this.photo.Vormer
                        } alt="Vormer" v-b-tooltip.click title="Vormer">`;
                if (value === "Plant")
                    return `<img class="belbinimg" src=${
                        this.photo.Plant
                        } alt="Plant" v-b-tooltip.click title="Plant">`;
                if (value === "Groepswerker")
                    return `<img class="belbinimg" src=${
                        this.photo.Groepswerker
                        } alt="Groepswerker">`;
            },
            groepResult(value) {
                console.log(value);
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
