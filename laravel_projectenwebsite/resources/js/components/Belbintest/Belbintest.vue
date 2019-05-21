<template>
  <div>
    <b-container>

      <b-row class="mt-5">
        <b-col cols="12">
          <h3 class="text-center">De Belbin test</h3>
        </b-col>
        <b-col class="text-center" cols="12">
          <p>De Belbintest kon niet worden geïmplementeerd wegens autersrechten en moet worden afgenomen op de link hieronder.</p>
        </b-col>
      </b-row>
      <b-row>
        <b-col cols="12">
          <b-card class="p-2">
            <b-card-text>
              <h3><a href="https://www.thesis.nl/testen/belbin-test" target="_blank">Klik hier voor de Belbintest</a><br /></h3>
              De Belbintest wordt afgenomen op de site www.thesis.nl.<br />
              Daarna krijgt u een resultaat toegewezen. Gelieve de correcte teamrol hieronder te selecteren:<br />
            </b-card-text>
            <b-form @submit="onSubmit">
              <b-form-group id="input-group-1" label="Selecteer jouw Belbinrol" label-for="belbinrol">
                <b-form-select id="belbinrol" v-model="belbin" required :options="belbinrollen"></b-form-select>
              </b-form-group>
              <p>Je kan niet bij een groep horen of er kan geen voorstel ingediend worden zonder dat je een Belbinrol hebt.</p>
              <b-button type="submit" class="btns">Verzenden</b-button>
            </b-form>
          </b-card>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        belbin: null,
        belbinrollen: [
          { value: null, text: "Selecteer" },
          { value: "bedrijfsman", text: "Bedrijfsman" },
          { value: "groepswerker", text: "Groepswerker" },
          { value: "onderzoeker", text: "Onderzoeker" },
          { value: "plant", text: "Plant" },
          { value: "voorzitter", text: "Voorzitter" },
          { value: "vormer", text: "Vormer" },
          { value: "waarschuwer", text: "Waarschuwer" },
          { value: "zorgdrager", text: "Zorgdrager" }
        ]
      };
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault();
        alert(JSON.stringify(this.belbin));
      }
    }
  };
</script>

<style>
  h3 a {
    color: #093667;
  }
</style>