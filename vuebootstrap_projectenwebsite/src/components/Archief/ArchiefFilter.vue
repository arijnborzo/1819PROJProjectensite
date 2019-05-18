<template>
    <div>
    <b-button v-b-toggle.collapse-1 variant="primary" block>Filter</b-button>
    <b-collapse id="collapse-1" class="">
        <b-card>
            <b-form @submit="onSubmit" v-if="show">
                <!-- Filter op jaar -->
                <b-form-group id="input-group-1" 
                    label="Welk jaar?"
                    label-for="input-1"
                >
                    <b-form-checkbox-group stacked size="lg" v-model="geselecteerdeJaartallen" id="jaartal">
                      <b-form-checkbox  v-for="jaar in jaartallen" :key="jaar" :value="jaar">
                        {{ jaar }}
                      </b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>

                <b-button type="submit" variant="primary">Pas toe</b-button>
            </b-form>
        </b-card>
    </b-collapse>
    </div>
</template>

<script>
export default {
  props: {
    jaartallen: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      categorie: null,
      geselecteerdeJaartallen: [],
      show: true
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
      this.$emit("filtersAangepast", this.geselecteerdeJaartallen);
    }
  }
};
</script>

<style>
</style>
