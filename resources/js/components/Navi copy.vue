<template>
  <div id="navi">
    <nav id="nav-up" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Offer Apps</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li id="li-item" class="nav-item">
          <router-link  class="nav-link" to="/create-offer" tag="button">Verification</router-link>
        </li>
        <li id="li-item" class="nav-item">
          <router-link  class="nav-link" to="/home" tag="button">Home</router-link>
        </li>
        <li id="li-profile" class="nav-item">
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
        </li>
        <li id="li-profile" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- {{currentUser.token}} -->
            Praba
          </a>
        </li>
      </ul>
    </div>
    </nav>
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


</style>
