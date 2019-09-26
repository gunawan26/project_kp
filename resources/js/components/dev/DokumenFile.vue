<template>
     <h1>template dokumen</h1>
</template>

<script>
import { openFileApi } from "@/js/helpers/fileOffer";
import { type } from "os";

export default {
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
  methods: {}
};
</script>

<style>
</style>
