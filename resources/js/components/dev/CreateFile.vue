<template>

    <form action="">

        <div class="container">

            <form @submit.prevent="createFile">
                <div class="form-group row">
                    <label for="nama_file">Nama File</label>
                    <input type="text" id="nama_file" v-model="form.nama_file" class="form-control" placeholder="nama file">
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
        nama_file: ""
      }
    };
  },

  methods: {
    createFile() {
      createFileApi(this.$data.form)
        .then(result => {
          console.log("berhasil dibuat");
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
