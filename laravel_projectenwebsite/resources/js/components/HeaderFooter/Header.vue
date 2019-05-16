<template>
   <b-navbar toggleable="md" type="dark" variant="primary">
      <b-navbar-brand href="https://www.odisee.be/">
          <img src="img/logo.png" alt="Logo" class="d-inline-block align-top logo">
      </b-navbar-brand>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
      <b-collapse id="nav-collapse" is-nav>
         <ul>
             <li class="nav-btn"><a href="/"> Overzicht</a> </li>
             <li class="nav-btn"><a href="/students"> Studenten</a> </li>
             <li class="nav-btn"><a href="/archief"> Archief</a> </li>
             <li class="nav-btn"><a href="/belbintest"> BELBIN test</a> </li>
             <li class="nav-btn"><a href="/nieuwproject"> Nieuw project</a> </li>
         </ul>

         <!-- Right aligned nav items -->
         <b-navbar-nav class="ml-auto">
            <b-nav-item-dropdown right>
               <!-- Using 'button-content' slot -->
               <template slot="button-content" ><em>Usernaam</em></template>
                    <b-dropdown-item href="#"><router-link to="/mijnproject">Mijn project</router-link></b-dropdown-item>
                    <b-dropdown-item href="#"><router-link to="/">Uitloggen</router-link></b-dropdown-item>
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
    .nav-btn {
        display: inline-block;
        padding: 0.5rem 1rem;
    }
    .nav-btn a {
        color: white;
    }
    .nav-btn a:hover {
        color: white;
        text-decoration: none;
    }
</style>

