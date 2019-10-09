<template>
    <div id="create-offer">

        <div>
            <navi/>
        </div>
        <v-app-bar elevate-on-scroll:true flat fixed class="pt-5" color="grey lighten-3" style="margin-top:55px;" height="100">
          <v-layout row wrap class="mx-5">
            <v-text-field label="File name" placeholder="File name" v-model="data_dokumen.offername"></v-text-field>
            <v-btn text outlined small class="d-flex d-sm-none" v-on:click="triggerAddCategory">
                <v-icon>mdi-playlist-plus</v-icon>
            </v-btn>
            <v-btn text small class="d-none d-sm-flex" v-on:click="triggerAddCategory">
                <v-icon>mdi-playlist-plus</v-icon>Add Category
            </v-btn>
            <v-btn outlined text small class="d-flex d-sm-none">
                <v-icon>mdi-magnify</v-icon>
            </v-btn>
            <v-btn outlined rounded text small class="d-none d-sm-flex">
                Preview
            </v-btn>
          </v-layout>
        </v-app-bar>
        <div style="margin-top:10%;">
            <Offer ref="OfferComponent" v-bind:document-data="data_dokumen"/>
        </div>
    </div>
</template>

<script>
import Navi from "@/js/components/Navi.vue";
import Offer from "@/js/components/Offer.vue";
import CategoryAdd from "@/js/components/CategoryAdd.vue";
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
      // data_dokumen: {
      //   attachmentname:"",
      //   created_at:"",
      //   customername:"",
      //   date:"",
      //   discussion_date:null

      // }
      data_dokumen: {},
      items: [
        {
          title: "Sub-category"
        },
        {
          title: "Item"
        }
      ]
    };
  },

  created() {
    console.log(this.$route.params);
    this.$data.doc_id = this.$route.params.id_dokumen;

    openFileApi(this.$authAPI, this.$data.doc_id)
      .then(result => {
        this.data_dokumen = Object.assign({}, result.data);
        console.log("data dokumen", this.data_dokumen);
      })
      .catch(err => {
        console.log(err);
      });
  },

  methods: {
    triggerAddCategory() {
      this.$refs.OfferComponent.addCategory();
    }
  }
};
</script>
<style>
* {
  text-transform: none !important;
}
</style>
