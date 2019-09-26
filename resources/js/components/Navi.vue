<template>
  <div id="navi">
    <v-toolbar>
      <v-toolbar-title class="ml-10">OfferApps</v-toolbar-title>

      <div class="flex-grow-1"></div>

      <v-toolbar-items>
        <v-btn text to="/create-offer">Verification</v-btn>
        <v-btn text to="/Home">Home</v-btn>
        <v-btn text disabled="">
          <v-avatar
            color="teal"
            :tile="false"
            :size="30"
          >
            <img
              src="https://vuetifyjs.com/apple-touch-icon-180x180.png"
              alt="avatar"
            >
          </v-avatar>
        </v-btn>
        <v-menu
          v-model="value"
          open-on-hover="true"
          :close-on-click="closeOnClick"
          :close-on-content-click="closeOnContentClick"
          offset-y="true"
        >
          <template v-slot:activator="{ on }">
            <v-btn
              text
              v-on="on"
            >
              Praba
            </v-btn>
          </template>
          <v-list>
            <v-list-item >
              <v-list-item-title>Profile</v-list-item-title>
            </v-list-item>
            <v-list-item>
              <v-list-item-title>Profile</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-toolbar-items>
    </v-toolbar>
  </div>

    
</template>

<script>
import store from '@/js/store';
    export default {

      name :"navi",
      mounted() {
          console.log('Component mounted.')
      },
      computed:{
        currentUser(){
          return store.state.currentUser;
        }
      }
    }
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

  #li-profile{}


</style>
