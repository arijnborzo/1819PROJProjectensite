<template>
    <div id="voorstel">
        <b-container align-h="center">
            <b-card class="mb-5 mt-5">
                <b-row>
                    <b-col>
                        <h2 id="titel">{{project.title}}</h2>
                    </b-col>
                    <b-col>
                        <h5 id="status">Status: {{statusProject(project.status)}}</h5>
                    </b-col>
                </b-row>
                <div id="beschrijvingVoorstel">
                    <h4>Beschrijving</h4>
                    <b-row>
                        <b-col>
                            <p>{{project.full_description}}</p>
                        </b-col>
                    </b-row>
                </div>
                <b-row>
                    <b-col md="6">
                        <h4>Hoofdvraag</h4>
                        <p>{{project.main_question}}</p>
                        <h4>Nevenvragen</h4>
                        <ul>
                            <p>{{project.side_questions}}</p>
                            <li v-for="vraag in project.side_questions"></li>
                        </ul>
                    </b-col>
                    <b-col md="6">
                        <h4>SMART-criteria</h4>
                        <ul>
                            <li v-for="(value, criteria) in smartcriteria[0]">
                                <p style="font-weight: bold" v-if=checkId(criteria)>{{criteria | capitalize }}</p>
                                <p v-if=checkId(criteria)>{{value}}</p>
                            </li>
                        </ul>
                    </b-col>
                </b-row>
                <!-- groepsleden -->
                <b-row>
                    <b-col cols="12">
                        <h4>Groepsleden</h4>
                    </b-col>
                    <b-col cols="12">
                        <p>
                            <span style="font-weight:bold">Verantwoordelijke docent:</span>

                            <span>{{teacher.surname | capitalize }} {{teacher.name}}</span>
                        </p>
                    </b-col>
                    <b-col cols="12">
                        <ul>
                            <b-row v-for="member in groupmembers" :key="member.name">
                                <b-col>
                                    <p>{{member[1].name}} {{member[1].surname}}</p>
                                </b-col>
                                <!--                 BUTTONS ACCEPT DECLINE OF CREATOR-->
                                <b-col v-if="is_student" style="text-align: center">
                                    <b-button-group v-if="!isCreator(member[1].id) && confirmed">
                                        <b-button
                                                size="sm"
                                                @click="acceptProject(member[1].id)"
                                                variant="success"
                                                v-if="(!isAccepted(member[2])&& buttonAvailble(project.status) && confirmed)"
                                        >Accepteer
                                        </b-button>
                                        <b-button
                                                  size="sm"
                                                  variant="danger"
                                                  @click="denyProject(member[1].id)"
                                                  v-if="(isAccepted(member[2])&& buttonAvailble(project.status) && confirmed)"
                                        >Verwijder
                                        </b-button>
                                    </b-button-group>
                                    <p v-if="isCreator(member[1].id)">Bedenker van het project</p>
                                    <p v-if="userid == member[1].id && confirmed==0">Aangevraagd</p>
                                </b-col>
                                <b-col id="belbinimage">
                                   <span>
                                     <img
                                             class="lidbelbin"
                                             :src="belbinResult(member[0])"
                                             :alt="member.belbintype"
                                             style="width: 29px; height: auto; float: right"
                                             v-b-tooltip.hover
                                             :title="member.belbintype"
                                     >
                                   </span>
                                </b-col>
                            </b-row>


                        </ul>
                    </b-col>
                    <!-- Buttons docent -->
                    <!--          <b-col cols="12">-->
                    <!--            <b-button-group v-if="!is_student">-->
                    <!--              <b-button-->
                    <!--                      variant="success"-->
                    <!--                      v-if="checkStatus('Accepted')"-->
                    <!--                      class="mr-2"-->
                    <!--                      @click="project.status = 'Accepted'"-->
                    <!--              >Accept</b-button>-->
                    <!--              <b-button-->
                    <!--                      variant="warning"-->
                    <!--                      v-if="checkStatus('Pending')"-->
                    <!--                      @click="project.status = 'Pending'"-->
                    <!--              >Make pending</b-button>-->
                    <!--              <b-button-->
                    <!--                      variant="danger"-->
                    <!--                      v-if="checkStatus('Declined')"-->
                    <!--                      class="ml-2"-->
                    <!--                      @click="project.status = 'Declined'"-->
                    <!--              >Decline</b-button>-->
                    <!--            </b-button-group>-->
                    <!--            &lt;!&ndash; Buttons student &ndash;&gt;-->
                    <b-button :href="'/nieuwproject'"
                              v-if="!buttonAvailble(project.status) && confirmed"
                              @click="changeProject()"
                              class="btns"
                              style="float:right"
                    >Pas voorstel aan
                  </b-button>
                    <!--          </b-col>-->

                </b-row>
                <b-form action="/changeMember" method="POST" id="hiddenform">
                  <input type="hidden" v-model="form.action" id="action" name="action" value="test">
                  <input type="hidden" v-model="form.user_id" id="user_id" name="user_id">
                  <input type="hidden" name="_token" v-model="csrf">
              </b-form>

            </b-card>
        </b-container>
    </div>
</template>

<script>
    export default {
        props: ["project", "teacher", "groupmembers", "smartcriteria", "is_student", "csrf_token", "confirmed", "userid"], // "token",
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                form: {
                    action: "",
                    user_id: "",
                },
                showBtn: true,
                undo: false,
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
        methods: {
            buttonAvailble(value) {
                if (this.is_student && value == 'Accepted') {
                    return true;
                } else {
                    return false;
                }
            },
            checkId(value) {
                if (value == "project_id") {
                    return false
                } else {
                    return true
                }
            },
            statusProject(value) {
                if (value === "Accepted") return `✔`;
                if (value === "Pending") return `❔`;
                if (value === "Declined") return `✖`;
            },

            denyProject(value) {
              console.log(value);
                document.getElementById('action').value = 'DELETE';
                document.getElementById('user_id').value = value;
                document.getElementById("hiddenform").submit();
            },
            acceptProject(value) {
                document.getElementById('action').value = 'ACCEPT';
                document.getElementById('user_id').value = value;
                document.getElementById("hiddenform").submit();
            },
            checkStatus(value) {
                if (value === "Accepted") {
                    if (this.projectx.status === "Accepted") {
                        return false;
                    } else if (this.projectx.status === "Pending") {
                        return true;
                    } else if (this.projectx.status === "Declined") {
                        return true;
                    }
                } else if (value === "Pending") {
                    if (this.projectx.status === "Accepted") {
                        return true;
                    } else if (this.projectx.status === "Pending") {
                        return false;
                    } else if (this.projectx.status === "Declined") {
                        return true;
                    }
                } else if (value === "Declined") {
                    if (this.projectx.status === "Accepted") {
                        return true;
                    } else if (this.projectx.status === "Pending") {
                        return true;
                    } else if (this.projectx.status === "Declined") {
                        return false;
                    }
                }
            },
            belbinResult(value) {
                if (value === null) {
                    return "x";
                }
                var woorden = value.split(" ");
                var belbinrol = woorden[0];
                if (belbinrol === "Voorzitter") return this.photo.Voorzitter;
                if (belbinrol === "Zorgdrager") return this.photo.Zorgdrager;
                if (belbinrol === "Bedrijfsman") return this.photo.Bedrijfsman;
                if (belbinrol === "Brononderzoeker") return this.photo.Brononderzoeker;
                if (belbinrol === "Monitor") return this.photo.Monitor;
                if (belbinrol === "Vormer") return this.photo.Vormer;
                if (belbinrol === "Plant") return this.photo.Plant;
                if (belbinrol === "Groepswerker") return this.photo.Groepswerker;
            },
            changeProject() {
                console.log('clicked');
                location.href = '/myproject';
            },
            showButton() {
                if (this.showBtn == false) {
                    return false;
                    /*
                  } else if (this.project.groupmembers > 3) {
                    return false;*/
                } else {
                    return true;
                }
            },
            isAccepted(value) {
                if (value == 1) {
                    return true;
                }
                else{
                    return false;
                }
            },
            isCreator(value) {
                if (value == this.project.creator_id) {
                    return true;
                } else {
                    return false;
                }
            }
        },
        filters: {
            capitalize: function (value) {
                if (!value) return "";
                value = value.toString();
                return value.charAt(0).toUpperCase() + value.slice(1);
            }
        }
    };
</script>

<style>
    #status {
        line-height: 38px;
        text-align: end;
    }

    #belbinimage {
        display: auto;
    }

    @media (max-width: 767px) {
        #belbinimage {
            display: none;
        }
    }

    #beschrijvingVoorstel {
        background-color: #ced9e6;
        box-shadow: 0px 0px 1px #093667;
        margin: 2rem 0;
        padding: 1.5rem;
        margin-left: -1.2rem;
        margin-right: -1.2rem;
    }
</style>
