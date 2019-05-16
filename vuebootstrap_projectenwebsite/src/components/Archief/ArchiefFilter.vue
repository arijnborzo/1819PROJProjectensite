<template>
    <div>
    <b-button v-b-toggle.collapse-1 variant="primary" block>Filter</b-button>
    <b-collapse id="collapse-1" class="">
        <b-card>
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
                <!--
                <b-form-group id="input-group-2" label="Categorie:" label-for="input-2">
                    <b-form-select
                    id="input-2"
                    v-model="form.categorie"
                    :options="categorien"
                    ></b-form-select>
                </b-form-group>
                -->

                <b-form-group id="input-group-1" 
                    label="Welk jaar?"
                    label-for="input-1"
                >
                    <b-form-checkbox-group v-model="geselecteerdeJaartallen" id="jaartal">
                      <b-form-checkbox v-for="jaar in jaartallen" :key="jaar" :value="jaar">
                        {{ jaar }}
                      </b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>

                <b-button variant="primary" @click="pasToe">Pas toe</b-button>
                <b-button type="reset" variant="danger" style="float: right">Reset</b-button>
            </b-form>
        </b-card>
    </b-collapse>
    </div>
</template>

<script>
export default {
  props: ["jaartallen"],
  data() {
    return {
      categorie: null,
      geselecteerdeJaartallen: [],
      /*
      categorien: [
        { text: "Geen voorkeur", value: null },
        "Elektronica",
        "Webdevelopment",
        "Robotica",
        "Netwerkinfrastructuur"
      ]*/
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
      this.geselecteerdeJaartallen = null;
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
    pasToe(event) {
      this.$emit("clicked", this.geselecteerdeJaartallen);
    }
  }
};
</script>

<style>
</style>
