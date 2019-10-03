<template>
    <v-app-bar
        fixed
        collapse:true>
 
          <v-toolbar-title class="ml-5">OfferApps</v-toolbar-title>

      <div class="flex-grow-1"></div>

      <v-toolbar-items>
        <v-btn text class="d-flex d-sm-none" to="/history" style="text-decoration:none;"><v-icon>mdi-check-box-multiple-outline</v-icon></v-btn>
        <v-btn text class="d-none d-sm-flex no-text-transform" to="/history" style="text-decoration:none;"><v-icon>mdi-check-box-multiple-outline</v-icon>History</v-btn>
        <v-btn text class="d-flex d-sm-none" to="/" style="text-decoration:none;"><v-icon>mdi-home</v-icon></v-btn>
        <v-btn text class="d-none d-sm-flex" to="/" style="text-decoration:none;"><v-icon>mdi-home</v-icon>Home</v-btn>
        <v-menu
          open-on-hover
          offset-y
        >
          <template v-slot:activator="{ on }">
            <v-btn
              text
              v-on="on"
            ><v-icon color="black">mdi-account-circle</v-icon>Praba
            </v-btn>
          </template>
          <v-list>
            <v-list-item >
              <v-list-item-title><v-icon>mdi-account</v-icon>Profile</v-list-item-title>
            </v-list-item>
            <v-list-item>
              <v-list-item-title><v-icon>mdi-logout-variant</v-icon>Logout</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-toolbar-items>   
    </v-app-bar>
   
</template>

<script>
import store from "@/js/store";
import {setTimeout} from 'timers';
export default {
  name: "navi",
  data(){
    return{
      overlay: false,
    }
  },
  components:{
    // Home,
    // Loading
  },
  mounted() {
    console.log("Component mounted.");
  },
  computed: {
    currentUser() {
      return store.state.currentUser;
    }
  }, 

};
</script>


<style lang="scss">
  #navbarSupportedContent{
    margin-right: 10%;
  }

  .navbar-brand{
  margin-left: 10%;
  }

  #li-item{
    margin-right: 20%;
  }


</style>
