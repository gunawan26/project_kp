<template>
    <div id="home"> 
        <div><Navi/></div>
        <div id="top-box">
            <div class="d-none d-lg-block" >
                <img style="margin-right:10%; margin-left:20%;" id="top-img" src="@/images/undraw_complete_task_u2c3.svg" alt="">
            </div>
            <v-row justify="center" style="margin-top:2%;">
                <v-col><div id="top-text1">Let's Start Create Something ...</div></v-col>            
                <v-col><create-file/></v-col>              
            </v-row>
        </div>        
        <v-container >
            <h6 style="margin-top:50px; margin-bottom: 20px;">Recent</h6>           
            <v-card
                class="mx-auto"
                color="blue lighten-4"
                height="120"
                >
                <v-row align="center">
                    <v-col md="9">
                        <v-card-title small class="font-weight-bold">I'm title</v-card-title>
                        <v-card-text>I'm Category</v-card-text>
                    </v-col>
                    <v-col md="3"> 
                        <v-btn rounded outlined to="/">Delete</v-btn>
                        <v-btn rounded outlined to="/">Continue</v-btn>
                    </v-col>
                </v-row>
            </v-card>
        </v-container>
    </div>
</template>

<script>
import Navi from "@/js/components/Navi.vue";
import CreateFile from "@/js/components/dialog/CreateFile.vue";
import store from "@/js/store";
export default {
  name: "home",

  components: {
    Navi,
    CreateFile
  },
  computed: {
    curentUser() {
      //   return store.getters.currentUser;
      return store.state.currentUser;
    }
  }
};
</script>

<style lang="scss">
#top-box {
  background-color: #f1f0ee;
  padding: 15px;
  height: 130px;
  margin-top: 5%;
}

</style>