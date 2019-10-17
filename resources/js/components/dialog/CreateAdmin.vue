<template>
    <form>
        <v-row justify="center">
            <v-dialog v-model="dialog" persistent max-width="700">
                <v-card max-width="700" class="mx-auto">
                    <v-card-title>
                        <span class="headline">Create New USER</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" sm="6" md="12">
                                    <v-form v-model="valid"  browser-autocomplete="false">
                                        <v-text-field label="Fullname*" v-model="formAddUser.fullname"
                                            :rules="[rules.required, rules.min]"></v-text-field>
                                        <v-text-field label="Email*" v-model="formAddUser.email"
                                            :rules="[rules.required, rules.min]"
                                            type="email" autocomplete="none"></v-text-field>
                                        <v-text-field label="Password*" v-model="formAddUser.password"
                                            :rules="[rules.required, rules.min]"
                                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                            @click:append="show1 = !show1"
                                            :type="show1 ? 'text' : 'password'" autocomplete="none"></v-text-field>
                                        <v-text-field label="Password Confirmation*" v-model="formAddUser.password_confirmation"
                                            :rules="[rules.required, rules.min]"
                                            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                            @click:append="show2 = !show2"
                                            :type="show2 ? 'text' : 'password'"></v-text-field>
                                    </v-form>
                                    <v-alert dense outlined type="error" transition="scale-transition" value="alert"
                                        v-model="alertCreate" >
                                        Failed to make an account {{errorDetailSeparate}}
                                    </v-alert>
                                </v-col>
                            </v-row>
                        </v-container>
                        <small>*indicates required field</small>
                    </v-card-text>
                    <v-card-actions>
                        <div class="flex-grow-1"></div>
                        <v-btn color="blue darken-1" outlined text @click="dialogClose">Close</v-btn>
                        <v-btn color="blue darken-1" outlined text :disabled="!valid" :loading="loadingSubmit" @click="addUser">Submit
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
    </form>
</template>

<script>
// import { createFileApi } from "../../helpers/fileOffer";
import { addUser } from "@/js/helpers/auth";
export default {
  data: () => ({
    dialog: false,
    formAddUser: {
      fullname: "",
      email: "",
      password: "",
      password_confirmation: ""
    },
    rules: {
      required: value => !!value || "Required.",
      min: v => v.length >= 10 || "Min 10 characters"
    },
    show1: false,
    show2: false,
    password: "Password",
    id_dokumen: 0,
    valid: "",
    loadingSubmit: false,
    alertCreate: false,
    errorDetail: ""
  }),
  methods: {
    addUser() {
      addUser(this.$authAPI, this.formAddUser)
        .then(result => {
          console.log(result);
        })
        .catch(err => {
          this.alertCreate = true;
          this.errorDetail = err.response.data.error;
          console.log(err.response.data.error);
        });
    },
    dialogClose() {
      this.dialog = false;
      this.formAddUser.fullname = "";
      this.formAddUser.email = "";
      this.formAddUser.password = "";
      this.formAddUser.confirmpass = "";
      this.rules.required = true;
      this.rules.min = true;
      this.alertCreate = false;
    },
    dialogOpen() {
      this.dialog = true;
    }
  },
  computed: {
    errorDetailSeparate() {
      let errors = "";

      for (var k in this.errorDetail) {
        errors += ",";
        if (this.errorDetail.hasOwnProperty(k)) {
          errors += this.errorDetail[k];
        }
      }

      return errors;
    }
  }
};
</script>

<style>
</style>
