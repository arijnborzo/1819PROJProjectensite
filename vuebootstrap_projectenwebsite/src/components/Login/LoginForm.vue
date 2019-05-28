<template>
  <div>
    <b-form @submit="onSubmit" v-if="show">
      <b-form-group id="input-group-1" label="Email adres:" label-for="input-1">
        <b-form-input id="input-1" v-model="form.email" type="email" required></b-form-input>
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

      <b-button type="submit" class="btns">Log in</b-button>
    </b-form>
    <b-row>
      <b-col>
        <h6 style="margin-top:2rem">Paswoord vergeten?</h6>
        <router-link to="/paswoordvergeten">
          <b-button class="btns">Reset paswoord</b-button>
        </router-link>
      </b-col>
      <b-col>
        <h6 style="margin-top:2rem">Nog niet geregistreerd?</h6>
        <router-link to="/registreer">
          <b-button class="btns">Registreer</b-button>
        </router-link>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: "",
        paswoord: ""
      },
      show: true
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
      // Inlog service?
      AuthService.login(this.credentials)
        .then(() => this.$router.push(this.$route.query.redirect || "/"))
        .catch(error => {
          /*handle errors*/
        });
    }
  }
};
</script>

<style>
</style>
