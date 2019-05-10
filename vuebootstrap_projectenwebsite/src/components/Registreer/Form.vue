<template>
  <div>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group
        id="input-group-1"
        label="Odisee emailadres:"
        label-for="input-1"
      >
        <b-form-input
          id="input-1"
          v-model="form.email"
          type="email"
          required
        ></b-form-input>
      </b-form-group>


      <b-form-group id="input-group-2" label="Nieuw paswoord:" label-for="input-2">
        <b-form-input
          id="input-2"
          type="password"
          aria-describedby="password-help-block"
          v-model="form.paswoord"
          required
        ></b-form-input>

      </b-form-group>
        <b-form-group id="input-group-3" label="Herhaal paswoord:" label-for="input-3">
        <b-form-input
          id="input-3"
          type="password"
          aria-describedby="password-help-block"
          v-model="form.herhaalpaswoord"
          required
        ></b-form-input>
      </b-form-group>

      <!-- Na registratie -->
        <b-button type="submit" variant="primary">Registreer</b-button>
    </b-form>

    <!--
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
    -->
  </div>
</template>

<script>
import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

export default {
  data() {
    return {
      form: {
        email: "",
        paswoord: "",
        herhaalpaswoord: ""
      },
      show: true
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
      if (this.form.paswoord === this.form.herhaalpaswoord) {
        // PW gelijk
        alert(JSON.stringify(this.form));
        this.$router.push({ path: "belbintest" });
      }
    }
  }
};
</script>

<style>
.reset {
  float: right;
}
</style>
