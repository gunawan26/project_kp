<template>
    <!-- <div class='msg'>{{myMessage}}</div> -->
    <div class="login">
        <nav id="nav-up1" class="navbar">
            <a class="navbar-brand mb-0 h1" href="#">Offer Apps</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div id="container" class="container">
            <div class="row">
                <div id="left-image-con" class="col-sm-8 d-none d-lg-block">
                    <img id="left-image" src="@/images/undraw_steps_ngvm.svg">
                    <img id="first-text" src="@/images/Group 12.png" alt="">
                </div>

                <div  class="col-sm-4">
                    <div class="card">
                        <img id="login-image" class="card-img-top" src="@/images/undraw_explore_7ofa.svg">
                        <div class="card-body">
                            <form @submit.prevent="authenticate">
                                <div class="form-group">
                                     <v-text-field
                                        v-model="form.email"
                                        label="Email/Username"
                                        type="email"
                                        required
                                    ></v-text-field>
                                </div>
                                <div class="form-group">
                                    <v-text-field
                                        v-model="form.password"
                                        label="Password"
                                        type="password"
                                        required
                                    ></v-text-field>
                                </div>
                                <v-alert
                                    dense
                                    outlined
                                    type="error"
                                    transition="scale-transition"
                                    value="alert"
                                    v-model="alert"
                                    >
                                    Wrong email or password!
                                    </v-alert>
                                <v-row
                                    justify="center"
                                >
                                    <v-btn
                                    large 
                                    rounded
                                    block
                                    color="primary"
                                    class="mt-12"
                                    type="submit"
                                    :loading="loading"
                                    >Login
                                    </v-btn>  
                                </v-row>                             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background">

        </div>
    </div>
</template>


<script>
import { login } from "@/js/helpers/auth";
export default {
  name: "login",
  data() {
    return {
      form: {
        email: "",
        password: ""
      },
      loading : false,
      alert:false,
      error: null
    };
  },
  methods: {
    authenticate() {
        this.loading =true
        this.$store.dispatch("login");
        login(this.$data.form)
            .then(res => {
            this.$store.commit("loginSuccess", res);
            this.$router.push({ path: "/home" });
        })
        .catch(error => {
        this.$store.commit("loginFailed", { error });
        console.log(error);
        this.alert = true;
        this.loading = false;
        });
    }, 
  }
};
</script>


<style lang="scss" scoped>

    body{
        opacity: 0;
        z-index: -2;
    }



    .login{
        max-height: 100%;
        z-index: 3;
    }

    .container{
        // clip-path: polygon(0 57%, 100% 57%, 100% 100%, 0 100%);
        height: 100%;
        z-index: 5;
    }

   .background{
       position: absolute;
       background: grey;
       opacity: 0.2 ;
       bottom: 0%;
       width: 100%;
       height: 50%;
       margin: 0;
       z-index: -1;
   }

   #left-image-con{
       margin-top: 3%;
       
   }

   #left-image{
        max-width: 55%;
        display: block;
        margin-left: 10%;
   }

   .card{
       border-radius: 25px;
   }

   .card-body{
       padding: 10%;
   }

   #login-image{
       border-top-right-radius: 25px;
       border-top-left-radius: 25px;
   }

   #login-panel{
       max-width: 50%;
   }

   #first-text{
       max-width: 70%;
       float: left;
       margin-top: 10%;
   }

</style>
