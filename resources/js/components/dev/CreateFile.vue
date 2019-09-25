<template>

    <form action="">

        <div class="container">

            <form @submit.prevent="createFile">
                <div class="form-group row">
                    <label for="nama_file">Nama File</label>
                    <input type="text" id="nama_file" v-model="form.offername" class="form-control" placeholder="nama file">
                </div>


                <div class="form-group row">
                  <v-btn type="submit" class="" value="createfile">sadsadas</v-btn>

                </div>
            </form>
        </div>
    </form>
</template>

<script>
import { createFileApi } from "../../helpers/fileOffer";

export default {
  data() {
    return {
      form: {
        offername: ""
      },
      id_dokumen: 0
    };
  },

  methods: {
    redirectToFile($id) {
      console.log("id doc", this.$data.id_dokumen);
      this.$router.push({
        path: `/dev/file/${$id}`
      });
    },
    createFile() {
      createFileApi(this.$data.form)
        .then(res => {
          this.$data.id_dokumen = res.id_dokumen;

          this.redirectToFile(this.$data.id_dokumen);
        })
        .catch(err => {
          console.log("gagal dibuat", { err });
        });
    }
  }
};
</script>

<style>
</style>
