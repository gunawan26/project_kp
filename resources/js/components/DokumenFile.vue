<template>
    <div id="create-offer">
        <div><navi/></div>
        <div id="top-box">
            <div class="row">
                <div id="menu1" class="col-sm-6">
                    <form @submit="formSubmit">
                        <input v-model="email" type="text" class="form-control-lg" style="margin-left:20%;" id="InputEmail" aria-describedby="emailHelp" placeholder="Nama File">
                    </form>
                </div>
                <div class="col-sm-1">
                    <button @click="triggerPrintHelloWorld()" class="btn btn-primary">Tambah Kolom</button>
                </div>
                 <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Save Kop</button>
                </div>
                <div id="menu2" class="col-sm-2">
                    <button id="create-button1" type="button" style="widtth:15px;">Preview</button>
                    <button id="create-button1" type="button" style="widtth:15px;">Save</button>
                </div>
            </div>
        </div>
        <div><Offer ref="OfferComponent"/></div>
    </div>
</template>

<script>
import Navi from "@/js/components/Navi.vue";
import Offer from "@/js/components/Offer.vue";
import { openFileApi } from "@/js/helpers/fileOffer";

export default {
  name: "create-offer",
  components: {
    Navi,
    Offer
  },

  data() {
    return {
      doc_id: 0,
      data_dokumen: ""
    };
  },

  created() {
    console.log(this.$route.params);
    this.$data.doc_id = this.$route.params.id_dokumen;

    openFileApi(this.$data.doc_id)
      .then(result => {
        console.log("masuk");
        console.log(result);
      })
      .catch(err => {
        console.log(err);
      });
  },
  methods: {
    triggerPrintHelloWorld() {
      this.$refs.OfferComponent.printHelloWorld();
    }
  }
};
</script>

<style lang="scss" scoped>
#top-box {
  box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2), 0 3px 5px 0 rgba(0, 0, 0, 0.1);
}

#create-button1 {
  color: #fff !important;
  width: 150px;
  text-decoration: none;
  background: #1b4f72;
  padding: 5px 30px;
  border-radius: 50px;
  display: inline-block;
  border: none;
  transition: all 0.4s ease 0s;
  margin-top: 5%;
}

#create-button1:hover {
  text-shadow: 0px 0px 6px rgba(255, 255, 255, 1);
  -webkit-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
  -moz-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
  transition: all 0.4s ease 0s;
}
</style>