<template>
    <div id="home"> 
        <div class='navi'><Navi/></div>
        <div id="top-box">
            <img id="top-img" src="@/images/undraw_complete_task_u2c3.svg" alt="">
            <div id="top-text">Let's Start Create Something ...</div>
            <button id="create-button" type="button">Create</button>
        </div>
        <div class="container">
            <h6 style="margin-top:50px; margin-bottom: 20px;">Recent</h6>
            <div id="draf-box" class="alert alert-primary">
                <div class="row form-inline">
                    <div class="col-sm-9">
                        <h5 class="row-sm-2">Project Name</h5>
                        <p class="row-sm-2">Category</p>
                    </div>
                    <div class="col-sm-3">
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
import Navi from '@/js/components/Navi.vue';

export default {
    name: 'home',
    components:{
        Navi,
    }
}
</script>

<style lang="scss">

    #top-box{
        background-color:#f1f0ee;
        padding: 15px; 
        height: 130px;
    }

    // #top-img{
    //     width: 10%;
    //     margin-left: 10%;
    //     float: left;
    // }

    // #top-text{
    //     // height: 100px;
    //     margin-top: 40px;
    //     margin-left: 10%;
    //     float: left;
    // }

    #create-button{
        color: #fff !important;
        text-decoration: none;
        background: #1b4f72;
        padding: 5px 30px;
        border-radius: 50px;
        display: inline-block;
        border: none;
        transition: all 0.4s ease 0s;
        float: right;
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