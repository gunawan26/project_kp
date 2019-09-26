<template>
    <div id="home"> 
        <div     fixed app><Navi/></div>
        <div id="top-box">
            <div class="d-none d-lg-block" >
                <img id="top-img" src="@/images/undraw_complete_task_u2c3.svg" alt="">
            </div>
            
            <div id="top-text">Let's Start Create Something ...</div>

            <router-link  id="create-button" to="/create-offer" tag="button">Create</router-link>
        </div>
        <div class="container">
            <h6 style="margin-top:50px; margin-bottom: 20px;">Recent</h6>
            <v-card
                class="mx-auto"
                :flat="flat"
                :outlined="outlined"
                :elevation="elevation"
                :raised="raised"
                color="blue lighten-4"
                d-block
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
                :flat="flat"
                :outlined="outlined"
                :elevation="elevation"
                :raised="raised"
                color="blue lighten-4"
                d-block
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
                :flat="flat"
                :outlined="outlined"
                :elevation="elevation"
                :raised="raised"
                color="blue lighten-4"
                d-block
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
                :flat="flat"
                :outlined="outlined"
                :elevation="elevation"
                :raised="raised"
                color="blue lighten-4"
                d-block
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
                :flat="flat"
                :outlined="outlined"
                :elevation="elevation"
                :raised="raised"
                color="blue lighten-4"
                d-block
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
                :flat="flat"
                :outlined="outlined"
                :elevation="elevation"
                :raised="raised"
                color="blue lighten-4"
                d-block
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
            <v-card>
                <v-row justify="space-around">
                <v-icon dark>mdi-anchor</v-icon>

                <v-icon>mdi-xbox-controller</v-icon>

                <v-icon>mdi-watch</v-icon>

                <v-icon>mdi-tilde</v-icon>

                <v-icon>mdi-tennis</v-icon>

                <v-icon>mdi-mouse</v-icon>
            </v-row>
            </v-card>            
        </div>
    </div>
</template>

<script>
import Navi from '@/js/components/Navi.vue';

export default {
    name: 'home',

    mounted(){
    },
    
    components:{
        Navi,
    },
    created: function(){
        this.items = JSON.parse(localStorage.getItem('user'))
    }
}
</script>

<style lang="scss">

    #top-box{
        background-color:#f1f0ee;
        padding: 15px; 
        height: 130px;
    }

    #top-img{
        width: 50%;
        margin-left: 10%;
        // float: left;
    }

    #top-text{
        // height: 100px;
        margin-top: 40px;
        // float: left;
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

    #create-button:hover {
        text-shadow: 0px 0px 6px rgba(255, 255, 255, 1);
        -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
        -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
        transition: all 0.4s ease 0s;
    }

    #draf-box{
        margin-bottom: 50px;
        padding: 15px;
        max-height: 100px;
    }

</style>