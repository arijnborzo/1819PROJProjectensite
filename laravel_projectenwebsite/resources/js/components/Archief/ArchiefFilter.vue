<template>
    <div>
    <b-button v-b-toggle.collapse-1 variant="primary" block>Filter</b-button>
    <b-collapse id="collapse-1" class="">
        <b-card>
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
                <b-form-group id="input-group-2" label="Categorie:" label-for="input-2">
                    <b-form-select
                    id="input-2"
                    v-model="form.categorie"
                    :options="categorien"
                    ></b-form-select>
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
        categorie: null
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
      this.form.categorie = null;
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
