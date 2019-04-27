<template>
    <div>
      <b-container>
      
      <b-row align-h="center" class="mt-5">
        <h3>De Belbin test</h3>
        <p>Je ziet hieronder een aantal stellingen die iets zeggen over jouw rol in een team. Geef per stelling aan in hoeverre deze voor jou kenmerkend is.</p>

        <b-col cols="12">
          <b-card class="p-2">
            <p>Ik houd van ...</p>
            <!-- COMPETITE -->
            <b-form-group
                label="competitie:"
                label-cols="3"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
              ></b-form-radio-group>
            </b-form-group>

            <!-- O & B -->
            <b-form-group
                label="onderzoeken en begrijpen:"
                label-cols="3"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <!-- UITDAGING -->
            <b-form-group
                label="uitdaging:"
                label-cols="3"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

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
      selected: "radio1",
      options: [
        { text: "Niet kenmerkend", value: "0" },
        { text: "Enigszins kenmerkend", value: "1" },
        { text: "Heel kenmerkend", value: "2" }
      ]
    };
  }
};
</script>

<style>
</style>