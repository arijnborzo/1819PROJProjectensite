<template>
    <div id="registreer">
      <b-row align-h="center" class="mt-5">
        <b-col cols="6">
          <b-card class="p-3">
            <h3>Maak hier uw account aan</h3>
            <app-registreer-form></app-registreer-form>
          </b-card>
        </b-col>
      </b-row>
    </div>
</template>

<script>
import RegistreerForm from "./RegistreerForm";

export default {
  components: {
    appRegistreerForm: RegistreerForm
  }
};
</script>

<style>
body,
html {
  height: 100%;
}
#registreer {
  height: 100%;
}
</style>
