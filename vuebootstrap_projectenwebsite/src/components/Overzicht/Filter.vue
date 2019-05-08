<template>
    <div>
    <b-button v-b-toggle.collapse-1 variant="primary" block>Filter</b-button>
    <b-collapse id="collapse-1" class="">
        <b-card>
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
                <b-form-group
                    id="input-group-1"
                    label="Zoeken"
                    label-for="input-1"
                >
                    <b-form-input
                    id="input-1"
                    v-model="form.groep"
                    placeholder="Op groepsnummer/naam"
                    ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-2" label="Categorie:" label-for="input-2">
                    <b-form-select
                    id="input-2"
                    v-model="form.categorie"
                    :options="categorien"
                    ></b-form-select>
                </b-form-group>

                <b-form-group id="input-group-3" 
                    label="Aantal groepsleden"
                    label-for="input-3"
                >
                    <b-form-checkbox-group v-model="form.checked" id="checkboxes">
                    <b-form-checkbox value="1">1</b-form-checkbox>
                    <b-form-checkbox value="2">2</b-form-checkbox>
                    <b-form-checkbox value="3">3</b-form-checkbox>
                    <b-form-checkbox value="4">4</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>

                <b-button type="submit" variant="primary">Pas toe</b-button>
                <b-button type="reset" variant="danger" style="float: right">Reset</b-button>
            </b-form>
        </b-card>
    </b-collapse>
    </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        groep: "",
        categorie: null,
        checked: []
      },
      categorien: [
        { text: "Geen voorkeur", value: null },
        "Elektronica",
        "Webdevelopment",
        "Robotica",
        "Netwerkinfrastructuur"
      ],
      show: true
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
      this.form.groep = "";
      this.form.categorie = null;
      this.form.checked = [];
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    }
  }
};
</script>

<style>
</style>
