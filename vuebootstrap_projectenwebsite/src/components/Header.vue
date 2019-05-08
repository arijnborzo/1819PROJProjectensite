<template>
   <b-navbar toggleable="md" type="dark" variant="primary">
      <b-navbar-brand href="https://www.odisee.be/">
          <img src="assets/logo.png" alt="Logo" class="d-inline-block align-top logo">
      </b-navbar-brand>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
      <b-collapse id="nav-collapse" is-nav>
         <b-navbar-nav>
             <router-link to="/home" class="nav-link">Overzicht</router-link>
             <router-link to="/studenten" class="nav-link">Studenten</router-link>
             <router-link to="/archief" class="nav-link">Archief</router-link>
             <router-link to="/belbintest" class="nav-link">BELBIN test</router-link>
             <router-link to="/nieuwproject" class="nav-link">Nieuw project</router-link>
         </b-navbar-nav>

         <!-- Right aligned nav items -->
         <b-navbar-nav class="ml-auto">
            <b-nav-item-dropdown right>
               <!-- Using 'button-content' slot -->
               <template slot="button-content"><em>User</em></template>
               <b-dropdown-item href="#">Profile</b-dropdown-item>
               <b-dropdown-item href="#">Sign Out</b-dropdown-item>
            </b-nav-item-dropdown>
         </b-navbar-nav>
      </b-collapse>
   </b-navbar>
</template>

<script>
export default {};
</script>

<style>
.logo {
  width: 12rem;
  height: auto;
}
</style>
