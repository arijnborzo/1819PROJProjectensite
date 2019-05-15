<template>
    <div id="pwv">
      <b-row align-h="center" class="mt-5">
        <b-col cols="11" md="10" lg="8" xl="6">
          <b-card class="p-3">
            <app-p-w-v-form></app-p-w-v-form>
          </b-card>
        </b-col>
      </b-row>
    </div>
</template>

<script>
import PWVForm from "./PWVForm";

export default {
  components: {
    appPWVForm: PWVForm
  }
};
</script>

<style>
body,
html {
  height: 100%;
}
#pwv {
  height: 100%;
}
</style>
