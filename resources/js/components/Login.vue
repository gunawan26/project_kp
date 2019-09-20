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
                <div id="left-image-con" class="col-sm-8">
                    <img id="left-image" src="@/images/undraw_steps_ngvm.svg">
                    <img id="first-text" src="@/images/Group 12.png" alt="">
                </div>

                <div  class="col-sm-4">
                    <div class="card">
                        <img id="login-image" class="card-img-top" src="@/images/undraw_explore_7ofa.svg">
                        <div class="card-body">
                            <form @submit="formSubmit">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email/Username</label>
                                    <input v-model="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input v-model="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
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
export default {
    mounted(){
        console.log('Component mounted.')
    },
    data() { 
        return { 
            email:'',
            password:'',            
        };
    },
    methods:{
        formSubmit(e){
            e.preventDefault();
            let currentObj = this;
            // this.axios.post('http://localhost:8000/yourPostApi', {
            //     email: this.email,
            //     password: this.password
            // })
            // .then(function (response) {
            //     currentObj.output = response.data;
            // })
            // .catch(function (error) {
            //     currentObj.output = error;
            // });
        }
    }
}
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
