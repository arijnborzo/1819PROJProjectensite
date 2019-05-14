<template>
  <div>
    <b-form @submit="onSubmit" v-if="show">
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


      <b-form-group id="input-group-2" label="Oud paswoord:" label-for="input-2">
        <b-form-input
          id="input-2"
          type="password"
          aria-describedby="password-help-block"
          v-model="form.oudpaswoord"
          required
        ></b-form-input>
      </b-form-group>

        <b-form-group id="input-group-3a" label="Nieuw paswoord:" label-for="input-3a">
        <b-form-input
          id="input-3a"
          type="password"
          aria-describedby="password-help-block"
          v-model="form.nieuwpaswoord"
          required
        ></b-form-input>

      </b-form-group>
        <b-form-group id="input-group-3b" label="Herhaal nieuw paswoord:" label-for="input-3b">
        <b-form-input
          id="input-3b"
          type="password"
          aria-describedby="password-help-block"
          v-model="form.herhaalpaswoord"
          required
        ></b-form-input>
      </b-form-group>

        <b-button type="submit" variant="primary">Verstuur</b-button>
    </b-form>

    <!--
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
    -->
  </div>
</template>

<script>
// import Vue from "vue/types";
// import VueRouter from "vue-router";
//
// Vue.use(VueRouter);

export default {
  data() {
    return {
      form: {
        email: "",
        oudpaswoord: "",
        nieuwpaswoord: "",
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
