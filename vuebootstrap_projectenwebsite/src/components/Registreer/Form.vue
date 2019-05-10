<template>
  <div>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group
        id="input-group-1"
        label="Email adres:"
        label-for="input-1"
      >
        <b-form-input
          id="input-1"
          v-model="form.email"
          type="email"
          required
        ></b-form-input>
      </b-form-group>


      <b-form-group id="input-group-2" label="Password:" label-for="input-2">
        <b-form-input
          id="input-2"
          type="password"
          aria-describedby="password-help-block"
          v-model="form.paswoord"
          required
        ></b-form-input>

      </b-form-group>
        <b-form-group id="input-group-3" label="Herhaal Password:" label-for="input-3">
        <b-form-input
          id="input-3"
          type="password"
          aria-describedby="password-help-block"
          v-model="form.herhaalpaswoord"
          required
        ></b-form-input>
      </b-form-group>


      <router-link to="/home">
           <b-button type="submit" variant="primary">Registreren</b-button>
      </router-link>
    </b-form>
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: "",
        paswoord: "",
        herhaalpaswoord:""
      },
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
      this.form.email = "";
      this.form.paswoord = "";
      this.form.herhaalpaswoord = "";
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
.reset {
  float: right;
}
</style>
