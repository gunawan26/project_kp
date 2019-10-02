<template>
    <v-app-bar
        fixed
        collapse:true
        
    >
      <v-toolbar-title class="ml-5">OfferApps</v-toolbar-title>

      <div class="flex-grow-1"></div>

      <v-toolbar-items>
        <v-btn text to="/history" class="d-flex d-sm-none" style="display:none;"><v-icon>mdi-check-box-multiple-outline</v-icon></v-btn>
        <v-btn text to="/history" class="d-none d-sm-flex"><v-icon>mdi-check-box-multiple-outline</v-icon>History</v-btn>
        <v-btn text to="/" class="d-flex d-sm-none"><v-icon>mdi-home</v-icon></v-btn>
        <v-btn text to="/" class="d-none d-sm-flex"><v-icon>mdi-home</v-icon>Home</v-btn>
        <v-btn text disabled="">
          <v-avatar
            color="teal"
            tile:false
            size="30"
          >
            <img
              src="https://vuetifyjs.com/apple-touch-icon-180x180.png"
              alt="avatar"
            >
          </v-avatar>
        </v-btn>
        <v-menu
          open-on-hover
          offset-y
        >
          <template v-slot:activator="{ on }">
            <v-btn
              text
              v-on="on"
            >Praba
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
import Home from "@/js/components/Home";
export default {
  name: "navi",
  components:{
    Home
  },
  mounted() {
    console.log("Component mounted.");
  },
  computed: {
    currentUser() {
      return store.state.currentUser;
    }
  }
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
