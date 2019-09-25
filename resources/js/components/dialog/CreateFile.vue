<template>
<form @submit.prevent="createFile">


  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on }">
        <v-btn color="primary" dark v-on="on">Open Dialog</v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">Create File Offer</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Offer Name*" required v-model="form.offername"></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <div class="flex-grow-1"></div>
          <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
          <v-btn color="blue darken-1" text  @click="createFile">Submit</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</form>
</template>

<script>
import { createFileApi } from "../../helpers/fileOffer";
export default {
  data: () => ({
    dialog: false,
    form: {
      offername: ""
    },
    id_dokumen: 0
  }),
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
