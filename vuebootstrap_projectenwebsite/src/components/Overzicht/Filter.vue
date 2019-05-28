<template>
  <div>
    <b-button v-b-toggle.collapse-1 class="btns" block>Filter</b-button>
    <b-collapse id="collapse-1" visible>
      <b-card>
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
          <b-form-group id="input-group-1" label="Zoeken" label-for="input-1">
            <b-form-input id="input-1" v-model="form.naam" placeholder="Op naam"></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-3" label="Aantal groepsleden" label-for="input-3">
            <b-form-checkbox-group stacked v-model="form.groepsleden" id="checkboxes">
              <b-form-checkbox value="1">1</b-form-checkbox>
              <b-form-checkbox value="2">2</b-form-checkbox>
              <b-form-checkbox value="3">3</b-form-checkbox>
              <b-form-checkbox value="4">4</b-form-checkbox>
            </b-form-checkbox-group>
          </b-form-group>

          <b-form-group id="input-group-4" label="Status" label-for="input-4">
            <b-form-checkbox-group stacked v-model="form.status">
              <b-form-checkbox value="Accepted">✔ Goedgekeurd</b-form-checkbox>
              <b-form-checkbox value="Pending">❔ In beraad</b-form-checkbox>
              <b-form-checkbox value="Declined">✖ Afgekeurd</b-form-checkbox>
            </b-form-checkbox-group>
          </b-form-group>

          <b-button type="submit" class="btns">Pas toe</b-button>
          <b-button type="reset" variant="danger" style="float: right">Reset</b-button>
        </b-form>
      </b-card>
    </b-collapse>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        naam: "",
        groepsleden: [],
        status: []
      },
      show: true
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
      this.$emit("filtersAangepast", this.form);
    },
    onReset(evt) {
      evt.preventDefault();
      // Reset our form values
      this.form.naam = "";
      this.form.groepsleden = [];
      this.form.status = [];
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
.btns {
  background-color: #093667;
  color: #fff;
  border: 1px solid transparent;
  font-weight: 400;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  border-radius: 0.25rem;
}
</style>
