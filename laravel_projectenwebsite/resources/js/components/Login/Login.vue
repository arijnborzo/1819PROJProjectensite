<template>
    <div id="login">
      <b-row align-h="center" class="mt-5">
        <b-col cols="11" md="10" lg="8" xl="6">
          <b-card class="p-3">
            <h3>Log in</h3>
            <app-login-form></app-login-form>
          </b-card>
        </b-col>
      </b-row>
    </div>
</template>

<script>
import LoginForm from "./LoginForm";

export default {
  components: {
    appLoginForm: LoginForm
  }

};
</script>

<style>
body,
html {
  height: 100%;
}
#login {
  height: 100%;
}
</style>
