<template>
    <div>
      <b-row align-h="center" class="mt-5">
        <b-col cols="6">
          <b-card class="p-3">
            <h3>Registreer</h3>
            <app-form></app-form>
          </b-card>
        </b-col>
      </b-row>
    </div>
</template>

<script>
import Form from "./Form";

export default {
  components: {
    appForm: Form
  }
};
</script>

<style>
</style>
