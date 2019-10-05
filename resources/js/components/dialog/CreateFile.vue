<template>
    <form @submit.prevent="createFile">
        <v-row justify="center">
            <v-dialog v-model="dialog" persistent max-width="344">
                <template v-slot:activator="{ on }">
                    <v-btn my-auto rounded outlined v-on="on">
                        <v-icon>mdi-file-document-outline</v-icon>Create
                    </v-btn>
                </template>
                <v-card max-width="344" class="mx-auto">
                    <v-card-title>
                        <span class="headline">Create File Offer</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" sm="6" md="12">
                                    <v-form v-model="valid">
                                        <v-text-field label="Offer Name*" v-model="form.offername"
                                            :rules="[rules.required, rules.min]"></v-text-field>
                                    </v-form>
                                    <v-alert dense outlined type="error" transition="scale-transition" value="alert"
                                        v-model="alertCreate" :hidden="alertCreate">
                                        Cannot create new file!!!
                                    </v-alert>
                                </v-col>
                            </v-row>
                        </v-container>
                        <small>*indicates required field</small>
                    </v-card-text>
                    <v-card-actions>
                        <div class="flex-grow-1"></div>
                        <v-btn color="blue darken-1" outlined text @click="dialogClose">Close</v-btn>
                        <v-btn color="blue darken-1" outlined text :disabled="!valid" @click="createFile"
                            :loading="loadingSubmit">Submit</v-btn>
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
    rules: {
      required: value => !!value || "Required.",
      min: v => v.length >= 10 || "Min 10 characters"
    },
    id_dokumen: 0,
    valid: "",
    loadingSubmit: false,
    alertCreate: false,
  }),
  methods: {
    redirectToFile($id) {
      this.loadingSubmit= false,
      this.$router.push({
        path: `/offer-document/${$id}`
      });
    },
    createFile() {
      this.loadingSubmit = true
      createFileApi(this.$data.form, this.$store.getters.get_header)
        .then(res => {
          this.$data.id_dokumen = res.id_dokumen;
          this.redirectToFile(this.$data.id_dokumen);
        })
        .catch(err => {
          // console.log(err);
          this.loadingSubmit=false;
          this.alertCreate = true;
        });
    },
    dialogClose() {
      this.dialog = false;
      this.form.offername = "";
      this.rules.required=true;
      this.rules.min=true;
    }
  }
};
</script>

<style>
</style>
