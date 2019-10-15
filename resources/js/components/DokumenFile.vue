<template>
    <div id="create-offer">

        <div>
            <navi/>
        </div>
        <v-app-bar elevate-on-scroll:true flat fixed color="grey lighten-3" style="margin-top:65px;"
            height="100">
            <v-layout col wrap class="mx-5 d-none d-sm-flex">
                <v-text-field label="File name" placeholder="File name" v-model="data_dokumen.offername"></v-text-field>
                <v-btn text small v-on:click="triggerAddCategory">
                    <v-icon>mdi-playlist-plus</v-icon>Add Category
                </v-btn>
                <v-btn outlined rounded text small class="mr-2"  @click="saveUpdateToDB">
                    Save
                </v-btn>
                <v-btn outlined rounded text small @click="preview">
                    Preview
                </v-btn>
            </v-layout>
            
            <v-layout col wrap class="d-flex d-sm-none">
                <v-text-field label="File name" placeholder="File name" v-model="data_dokumen.offername"></v-text-field>
            </v-layout>
            <v-layout row wrap class="d-flex d-sm-none">
                <v-btn text outlined small v-on:click="triggerAddCategory">
                    <v-icon>mdi-playlist-plus</v-icon>
                </v-btn>
                <v-btn outlined text small @click="saveUpdateToDB">
                    <v-icon>mdi-content-save</v-icon>
                </v-btn>
                <v-btn outlined text small>
                    <v-icon>mdi-magnify</v-icon>
                </v-btn>
            </v-layout>
        </v-app-bar>
        <div>
            <Offer ref="OfferComponent" :document-data="data_dokumen" />
        </div>
    </div>
</template>

<script>
import Navi from "@/js/components/Navi.vue";
import Offer from "@/js/components/Offer.vue";
import CategoryAdd from "@/js/components/CategoryAdd.vue";
import { openFileApi, updateFileApi } from "@/js/helpers/fileOffer";

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
    console.log("route param", this.$route.params);
    this.$data.doc_id = this.$route.params.id_dokumen;

    openFileApi(this.$authAPI, this.$data.doc_id)
      .then(result => {
        let payload = { dataFromDb: result.data, idDoc: this.$data.doc_id };
        this.$store.dispatch("fetchDataDokumen", payload);

        console.log("data dokumen", this.$store.getters.dataDokumen);
      })
      .catch(err => {
        console.log(err);
      });
  },

  methods: {
    saveUpdateToDB() {
      updateFileApi(
        this.$authAPI,
        this.$data.doc_id,
        this.$store.getters.getDocumentData
      )
        .then(result => {
          console.log("responses", result);
        })
        .catch(err => {});
    },
    triggerAddCategory() {
      this.$refs.OfferComponent.addCategory();
    },
    preview(){
      this.$router.push({
            path: "/generatepdf"
          });
    }
  }
};
</script>
<style>
* {
  text-transform: none !important;
}
</style>
