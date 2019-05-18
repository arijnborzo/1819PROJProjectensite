<template>
    <div>
      <b-row align-h="center" class="mt-5">
        <b-col cols="10" id="nieuwproj">
          <b-card class="p-3">
            <h3>Nieuw project</h3>
            <h6>Om een nieuw project toe te voegen moet je elk veld invullen.</h6>

            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
              <b-form-group
                id="input-group-1"
                label="Titel"
                label-for="titel"
                description="Maximum 50 karakters."
              >
                <b-form-input
                  id="titel"
                  v-model="form.titel"
                  required
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-2" label="Korte beschrijving" label-for="kortebeschrijving">
                <b-form-textarea
                  id="kortebeschrijving"
                  v-model="form.kortebeschrijving"
                  required
                  placeholder="Beschrijf kort het project"
                ></b-form-textarea>
              </b-form-group>

              <b-form-group id="input-group-2a" label="Lange beschrijving" label-for="langebeschrijving">
                <b-form-textarea
                  id="langebeschrijving"
                  v-model="form.langebeschrijving"
                  rows="6"
                  required
                  placeholder="Beschrijf uitgebreid het project"
                ></b-form-textarea>
              </b-form-group>

              <b-form-group id="input-group-3" label="Hoofdvraag" label-for="hoofdvraag">
                <b-form-input
                  id="hoofdvraag"
                  v-model="form.hoofdvraag"
                  required
                ></b-form-input>
              </b-form-group>

              <b-form-group id="input-group-4" label="Nevenvragen" label-for="nevenvragen">
                <b-form-textarea
                  id="nevenvragen"
                  v-model="form.nevenvragen"
                  required
                  rows="5"
                  placeholder="Schrijf hier zoveel mogelijk nevenvragen die bij het project passen"
                ></b-form-textarea>
              </b-form-group>
              
              <b-form-group id="input-group-8" label="SMART-criteria">
              <b-card
              v-bind:border-variant="form.smart.border"
              >
                  <span><i>Specifiek:</i></span>
                  <b-form-input
                    id="Specifiek"
                    v-model="form.smart.specifiek"
                    placeholder="Geen algemeen maar een specifiek doel"
                    v-on:keyup="smartMonitor"
                    required
                  ></b-form-input>
                  <span><i>Meetbaar:</i></span>
                  <b-form-input
                    id="Meetbaar"
                    v-model="form.smart.meetbaar"
                    placeholder="Het proces moet deel per deel gemeten kunnen worden zodat men een goed beeld kan scheppen of het project een slaagkans heeft."
                    v-on:keyup="smartMonitor"
                    required
                  ></b-form-input>
                  <span><i>Acceptabel:</i></span>
                  <b-form-input
                    id="Acceptabel"
                    v-model="form.smart.acceptabel"
                    placeholder="Het moet een project zijn dat met 3 medestudenten werkelijkheid kan worden."
                    v-on:keyup="smartMonitor"
                    required
                  ></b-form-input>
                  <span><i>Realiseerbaar:</i></span>
                  <b-form-input
                    id="Realiseerbaar"
                    v-model="form.smart.realiseerbaar"
                    placeholder="Het moet realiseerbaar zijn in alle aspecten, voor de groep."
                    v-on:keyup="smartMonitor"
                    required
                  ></b-form-input>
                  <span><i>Tijdsgebonden:</i></span>
                  <b-form-input
                    id="Tijdsgebonden"
                    v-model="form.smart.tijdsgebonden"
                    placeholder="Het moet binnen de tijd verworven kunnen worden."
                    v-on:keyup="smartMonitor"
                    required
                  ></b-form-input>
              </b-card>
              </b-form-group>

<!--
              <b-form-group id="input-group-5" label="Kies een categorie" label-for="categorie">
                <b-form-select id="categorie" v-model="selected" required :options="categorien"></b-form-select>
              </b-form-group>
-->
              <b-form-group id="input-group-6" label="Reeds besproken met een docent?">
                  <b-form-radio v-model="docentBoolean" button button-variant="success" value="Ja" style="margin-right:2rem">Ja</b-form-radio>
                  <b-form-radio v-model="docentBoolean" button button-variant="danger" value="Neen">Neen</b-form-radio>
              </b-form-group>

              <b-form-group id="input-group-7" label="Kies de docent" v-if="showDocenten">
                <b-form-select v-model="form.docent" :options="docenten"></b-form-select>
              </b-form-group>

              <b-form-group id="input-group-8" label="Indien u al document(en) wilt voorleggen aan de docent, kan u deze in een ZIP versturen">
                <b-form-file
                  v-model="form.bestand"
                  :state="Boolean(form.bestand)"
                  placeholder="Kies een bestand..."
                  drop-placeholder="Sleep bestand hier..."
                ></b-form-file>
              </b-form-group>

              <hr />
              <b-button type="submit" variant="primary">Verzend</b-button>
              <b-button type="reset" variant="danger" style="float: right">Reset</b-button>
            </b-form>

          </b-card>
        </b-col>
      </b-row>
    </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        titel: "",
        kortebeschrijving: "",
        langebeschrijving: "",
        hoofdvraag: "",
        nevenvragen: "",
        categorie: "",
        docent: "",
        bestand: "",
        smart: {
          specifiek: "",
          meetbaar: "",
          acceptabel: "",
          realiseerbaar: "",
          tijdsgebonden: "",
          border: "danger"
        }
      },
      selected: "",
      docentBoolean: "",
      categorien: [
        { value: null, text: "Selecteer" },
        { value: "a", text: "Elektronica" },
        { value: "b", text: "Robotica" },
        { value: "c", text: "Webdevelopment" }
      ],
      docenten: [
        { value: null, text: "Selecteer" },
        { value: "a", text: "Peter Demeester" },
        { value: "b", text: "Pieter Van Peteghem" },
        { value: "c", text: "Katrien Van Assche" }
      ],
      show: true,
      showDocenten: false
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
      alert(JSON.stringify(this.form));
    },
    onReset(evt) {
      evt.preventDefault();
      // Reset our form values
      this.form.titel = "";
      this.form.kortebeschrijving = "";
      this.form.langebeschrijving = "";
      this.form.hoofdvraag = "";
      this.form.nevenvragen = "";
      this.form.categorie = "";
      this.form.bestand = "";
      this.form.docent = "";
      this.$nextTick(() => {
        this.show = true;
      });
    },
    smartMonitor() {
      var count = 0;
      for (var key in this.form.smart) {
        var obj = this.form.smart[key];
        if (obj != "") {
          count++;
        }
        if (count == 6) this.form.smart.border = "success";
        else this.form.smart.border = "danger";
      }
    }
  },
  watch: {
    docentBoolean: function(newValue) {
      if (newValue === "Ja") this.showDocenten = true;
      if (newValue === "Neen") this.showDocenten = false;
    }
  }
};
</script>

<style>
#nieuwproj {
  padding-bottom: 2rem;
}
</style>