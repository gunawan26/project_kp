<template>
    <div id="create-offer">
        <div class='navi'><Navi/></div>
        <div id="top-box1" class="row">
            <div id="left-box" class="col-sm-10">
                <form id="top-form" action="">
                    <div class="row">
                        <div class="col-sm-3">
                            <input class="form-group" type="text" placeholder="Nama File">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-outline-secondary btn-sm btn-block">Tambah Kolom</button>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-outline-secondary btn-sm btn-block">Delete</button>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-outline-secondary btn-sm btn-block">Save KOP</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="right-box" class="col-sm-2">
                <div>
                    <button style="margin-top:12%" class="btn btn-outline-light btn-sm btn-block">Preview</button>
                </div>
                <div>
                    <button style="margin-top:10%" class="btn btn-outline-light btn-sm btn-block">Save</button>
                </div>
            </div> 
        </div>
        <div id="container1">
            <div id="middle-box">
                <div id="cop" class="row">
                    <div id="company-cop" class="col-sm-10">
                        <form id="cop-form" class="form-group" action="">
                            <div>
                                <input class="form-control input-sm" type="text">
                            </div>
                            <div>
                                <input class="form-control input-sm" type="text">
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input class="form-control input-sm" type="text">
                                </div>
                                <div class="col-sm-3">
                                    <input class="form-control input-sm" type="text">
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control inpus-sm" type="text">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="logo-icon" class="col-sm-2">

                    </div>
                </div>
                <div id="form-offer">
                    <form id="offer-cop" class="form-group" action="">
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-form-label">Nomor</label>
                            <div class="col-sm-3">
                                <input class="form-control input-sm" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-form-label">Lampiran</label>
                            <div class="col-sm-3">
                                <input class="form-control input-sm" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-form-label">Yth</label>
                            <div class="col-sm-3">
                                <input class="form-control input-sm" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-1 col-form-label">Perihal</label>
                            <div class="col-sm-3">
                                <input class="form-control input-sm" type="text">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="bottom-box">

            </div>
        </div>
    </div>
</template>

<script>
    import Navi from '@/js/components/Navi.vue';

    export default {
        name: 'create-offer',
        components:{
            Navi,
        }
    }
</script>

<style lang="scss" scoped>
    #top-box1{
        // padding: 15px;
        height: 150px;
    }

    #top-form{
        margin-left: 20%;
        margin-top: 4%;
    }

    #left-box{
        background-color: #f1f0ee;
        padding: 15px;
        height: 150px;
    }    

    #right-box{
        background-color: darkgray;
        padding: 15px;
        height: 150px;
    }

    #right-bottom{
        margin-top: 12%;
    }

    #container1{
        margin-top: 3%;
        background-color: #f1f0ee;
        margin-left: 5%;
        margin-right: 5%;
        padding-left: 5%;
        padding-right: 5%;
    }

    #logo-icon{
        background-color: aquamarine;
    }


</style>