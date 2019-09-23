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
                <form @submit.prevent="authenticate">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                <span for="exampleInputEmail1">Nomor</span>
                            </div>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Masukan no surat" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                <span for="exampleInputEmail1">Lampiran</span>
                            </div>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Jumlah lampiran" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                <span for="exampleInputEmail1">Yth.</span>
                            </div>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Nama tujuan surat" required>
                            </div>
                        </div>
                    </div>
                    <p>di -</p>
                    <p>Tempat</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                <span for="exampleInputEmail1">Perihal</span>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Masukan perihal" required>
                            </div>
                        </div>
                        <br>
                        <p>Sehubung dengan diskusi pada <span><input type="text" id="InputEmail" required></span>, yang bertempat di <span><input type="text" id="InputEmail" required></span>,  </p>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" value="Login">Login</button>
                </form>
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