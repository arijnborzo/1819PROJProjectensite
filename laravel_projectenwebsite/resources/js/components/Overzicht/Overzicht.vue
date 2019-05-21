<template>
    <b-container id="overzicht" fluid>
        <b-row class="justify-content-center">
            <b-col md="5" lg="4" xl="3" class="filter">
                <app-filter @filtersAangepast="filterForm = $event"></app-filter>
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
                            <b-button @click="gridView" class="gridlistbtn btns"><i class="fas fa-th-large" style="font-size: 1.2em;"></i></b-button>
                        <b-button @click="listView" class="gridlistbtn btns"><i class="fas fa-list"></i></b-button>
                    </b-col>
                </b-row>

                <!--gridlist-->
                <b-row id="gridlist" class="gridul">

                    <div v-for="project in projecten" v-bind:key=project.titel>
                        <transition name="fade">
                            <b-col v-show="filtered(project)">
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
    import Filter from "./Filter";
    import Project from "./Project";

    export default {
        props: {
            projects: Array
        },
        data() {
            return {
                selected: null,
                sorteeropties: [
                    { value: null, text: "Sorteren op:" },
                    { value: "az", text: "Op alfabetische volgorde A-Z" },
                    { value: "za", text: "Op alfabetische volgorde Z-A" }
                ],
                projecten: [],
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
                    // object nieuwe vueproject aanmaken
                    var vueproject = { titel, beschrijving, groepsleden, status };
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
                this.gridListTekstStyling("7.75rem", "10.75rem");
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

                var groepsledentekst = document.getElementsByClassName("groepsleden");
                Array.prototype.filter.call(groepsledentekst, function(groepslid) {
                    groepslid.style.height = grheight;
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

card ttiel
image.png

beschr
image.png

<style>
    body {
        background: #eef1f4;
    }
    /* GRIDLIST */
    #alleprojecten {
        text-align: center;
        margin-bottom: 2rem;
    }
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
        height: auto;
    }
    .proj {
        width: auto;
    }
    ul {
        list-style-type: none;
        padding: 0;
    }

    /*TRANSITIONS ON PROJECTS* /
    .fade-enter-active,
    .fade-leave-active {
     transition: opacity 0.9s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }

    /* SORTEREN */
    #sorteren {
        width: 80%;
    }

    /* BTNS */
    .gridlistbtn {
        margin: 0 0.3rem;
        float: right;
    }

    /* MEDIA QUERYS */
    @media (max-width: 1070px) {
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
