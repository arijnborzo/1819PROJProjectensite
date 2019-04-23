<template>
    <div>
      <b-container>
      
      <b-row align-h="center" class="mt-5">
        <h3>De Belbin test</h3>
        <p>Je ziet hieronder een aantal stellingen die iets zeggen over jouw rol in een team. Geef per stelling aan in hoeverre deze voor jou kenmerkend is.</p>
        <b-col cols="3">
          <b-card class="p-2">
            <p>Ik houd van competitie</p>
            <hr />
            <p>Ik houd van onderzoeken en begrijpen</p>
            <hr />
            <p>Ik houd van uitdaging</p>
            <hr />
          </b-card>
        </b-col>
        <b-col cols="8">
          <b-card class="p-2">
            

            <b-form-group>
              <b-form-radio-group
                id="btn-radios-1"
                v-model="selected"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
              <hr />
              <b-form-radio-group
                id="btn-radios-2"
                v-model="selected"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
              <hr />

              <b-form-radio-group
                id="btn-radios-3"
                v-model="selected"
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