<template>
  <b-container>
    <b-row class="mt-5">
      <b-col cols="12">
        <b-card>
          <b-card-text>
            <b-row>
              <b-col cols="4">
                <span>{{projectdetails.title}}</span>
              </b-col>
              <b-col cols="4">
                <span>{{groepsleden.length}}</span>
              </b-col>
              <b-col cols="4">
                <span>{{match}}</span>
              </b-col>
            </b-row>
          </b-card-text>
        </b-card>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  props: ["projectdetails", "groepsleden", "match"],
  data() {
    return {};
  }
};
</script>

<style>
</style>