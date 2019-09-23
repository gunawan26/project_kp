<template>
    <div id="offer-field" class="container">
        <div class="card" style="margin-top:5%;">
            <div class="card-header">
                <form class="" action="">
                    <div class="row">
                    
                        <div class="col-sm-10">
                        
                            <div class="form-group">
                                <input v-model="text1" type="text" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="....">
                            </div>
                            <div class="form-group">
                                <input v-model="text2" type="text" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="....">
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input v-model="text3" type="text" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="....">
                                </div>
                                <div class="col-sm-3">
                                    <input v-model="text4" type="text" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="....">
                                </div>
                                <div class="col-sm-6">
                                    <input v-model="text5" type="text" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="....">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img id="logo" src="@/images/tiny-checkers.png" alt="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">

            </div>
        </div> 
    </div>
</template>

<script>
export default {
    
}
</script>

<style lang="scss" scoped>
    #logo{
        width: 150px;
        height: 150px;
    }
</style>