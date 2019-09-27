<template>
    <div id="home"> 
        <Navi/>
        <div id="top-box">
            <div class="d-none d-lg-block" >
                <img style="margin-right:10%; margin-left:20%;" id="top-img" src="@/images/undraw_complete_task_u2c3.svg" alt="">
            </div>
            <v-row justify="center" style="margin-top:2%;">
                <v-col><div id="top-text1">Let's Start Create Something ...</div></v-col>
                <v-icon>mdi-heart</v-icon>
            
                <v-col><v-btn my-auto rounded outlined to="/create-offer">Create</v-btn></v-col>              
            </v-row>
            <!-- <v-layout row>
                <v-flex justify-center>
                    <v-btn primary>
                    Signup
                    </v-btn>
                </v-flex>
            </v-layout> -->
        </div>

        <!-- <v-layout row wrap background-color="grey darken-4" >
            <v-flex justify-center>
                    <v-btn primary>
                    Signup
                    </v-btn>
                </v-flex>
        </v-layout> -->
        
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
                        <v-btn rounded outlined>Delete</v-btn>
                        <v-btn rounded outlined>Continue</v-btn>
                        <v-icon>mdi-anchor</v-icon>
                    </v-col>
                    
                </v-row>
                
            </v-card>
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
                        <v-btn rounded outlined>Delete</v-btn>
                        <v-btn rounded outlined>Continue</v-btn>
                        <v-icon>mdi-anchor</v-icon>
                    </v-col>
                    
                </v-row>
                
            </v-card>
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
                        <v-btn rounded outlined>Delete</v-btn>
                        <v-btn rounded outlined>Continue</v-btn>
                        <v-icon>mdi-anchor</v-icon>
                    </v-col>
                    
                </v-row>
                
            </v-card>
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
                        <v-btn rounded outlined>Delete</v-btn>
                        <v-btn rounded outlined>Continue</v-btn>
                        <v-icon>mdi-anchor</v-icon>
                    </v-col>
                    
                </v-row>
                
            </v-card>
            <!-- <div id="top-text"></div> -->
            <!-- <router-link  id="create-button" to="/create-offer" tag="button">Create</router-link> -->
            <create-file/>
            <!-- <button id="create-button" type="button">Create</button> -->
        </v-container>
        <div class="container">
            <h6 style="margin-top:50px; margin-bottom: 20px;">Recent</h6>
            <div id="draf-box" class="alert alert-primary">
                <div class="row">
                    <div class="col-xs-2 col-sm-1 col-md-2 col-lg-8">
                        <h5 class="row-sm-2">Project Name</h5>
                        <p class="row-sm-2">Category vdczxxzcxz</p>
                    </div>
                    <div class="col-xs-2 col-sm-1 col-md-2 col-lg-4">
                        
                        <button type="button" class="btn btn-outline-primary">
                            Delete
                        </button>
                        <button type="button" class="btn btn-outline-primary">
                            Continue
                        </button>
                    </div>
                
                        
        
                </div>
            </div>
        </div>
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

#create-button{
    color: #fff !important;
    text-decoration: none;
    background: #1b4f72;
    padding: 5px 30px;
    border-radius: 50px;
    display: inline-block;
    border: none;
    transition: all 0.4s ease 0s;
    // float: right;
    margin-top: 30px;
    margin-right: 20%;
}



#draf-box {
  margin-bottom: 50px;
  padding: 15px;
  max-height: 100px;
}
</style>