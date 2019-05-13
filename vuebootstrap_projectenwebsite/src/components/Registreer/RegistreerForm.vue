<template>
  <div>
    <b-form  >
      <b-form-group
      id="fieldset-1"
      description=""
      label="Odisee E-mail"
      label-for="input-1"
      :invalid-feedback="invalidFeedback"
      :state="state"
    >
      <b-form-input id="input-1" v-model="email" :state="state" trim></b-form-input>
      
    </b-form-group>
<b-form-group
      id="fieldset-1"
      description=""
      label="wachtwoord"
      label-for="input-1"
    >
      <b-form-input id="input-1" v-model="wachtwoord"></b-form-input>
    </b-form-group>
      
  

        <b-form-group
      id="fieldset-1"
      description=""
      label="Herhaal wachtwoord"
      label-for="input-1"
      :invalid-feedback="invalidFeedbackww"
      :valid-feedback="validFeedbackww"
      :state="stateww"
    >
      <b-form-input id="input-1" v-model="herhaalwachtwoord" :state="statenw" trim></b-form-input>
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
  computed: {
      state() {
        return (this.email.includes('@') && this.email.includes('odisee.be'))? true : false
      },
       statenw() {
        return (this.wachtwoord.length >= 8 && this.wachtwoord==this.herhaalwachtwoord)? true : false
      },
      invalidFeedback() {
        return 'Geen odisee mail'
      },
      invalidFeedbackww() {
        if(this.wachtwoord.length <8)
        return 'Wachtwoorden moet minstens 8 karakters bevatten'
        else if(this.wachtwoord!=this.herhaalwachtwoord)
        return 'Wachtwoorden komen niet overeen'
        else
        return true
      },
    },
    data() {
      return {
        email: '',
        wachtwoord: '',
        herhaalwachtwoord: ''
      }
    }
};
</script>

<style>
.reset {
  float: right;
}
</style>
