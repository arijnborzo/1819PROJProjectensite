<template>
    <div>
      <b-row align-h="center" class="mt-5">
        <b-col cols="10">
          <b-card class="p-3">
            <h3>Nieuw project</h3>
            <h6>Om een nieuw project toe te voegen moet je </h6>

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

              <b-form-group id="input-group-2" label="Beschrijving" label-for="beschrijving">
                <b-form-textarea
                  id="beschrijving"
                  v-model="form.beschrijving"
                  required
                  placeholder="Beschrijf kort het project"
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
                  placeholder="Schrijf hier zoveel mogelijk nevenvragen die bij het project passen"
                ></b-form-textarea>
              </b-form-group>

              <b-form-group id="input-group-5" label="Kies een categorie" label-for="categorie">
                <b-form-select id="categorie" v-model="selected" required :options="categorien"></b-form-select>
              </b-form-group>

              <b-form-group id="input-group-6" label="Reeds besproken met een docent?">
                  <b-form-radio v-model="docentBoolean" button button-variant="success" value="Ja" style="margin-right:2rem">Ja</b-form-radio>
                  <b-form-radio v-model="docentBoolean" button button-variant="danger" value="Neen">Neen</b-form-radio>
              </b-form-group>

              <b-form-group id="input-group-7" label="Kies de docent" v-if="showDocenten">
                <b-form-select v-model="form.docent" :options="docenten"></b-form-select>
              </b-form-group>

              <b-form-group id="input-group-8" label="Indien u al document(en) wilt voorleggen aan de docent, kan u deze in een ZIP versturen" v-if="showDocenten">
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
        beschrijving: "",
        hoofdvraag: "",
        nevenvragen: "",
        categorie: "",
        docent: "",
        bestand: ""
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
      this.form.beschrijving = "";
      this.form.hoofdvraag = "";
      this.form.nevenvragen = "";
      this.form.categorie = "";
      this.form.bestand = "";
      this.form.docent = "";
      this.$nextTick(() => {
        this.show = true;
      });
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
</style>