<template>
    <form>
        <v-row justify="center">
            <v-dialog v-model="dialog" persistent max-width="700">
                <v-card max-width="700" class="mx-auto">
                    <v-card-title>
                        <span class="headline">Edit Profile</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" sm="6" md="12">
                                    <v-form v-model="valid">
                                        <v-text-field label="Fullname*" v-model="form.fullname"
                                            :rules="[rules.required, rules.min]"></v-text-field>
                                        <v-text-field label="Email*" v-model="form.email"
                                            :rules="[rules.required, rules.min]"
                                            type="email" disabled></v-text-field>
                                            <v-card-actions>
                                                <div class="flex-grow-1"></div>
                                                <v-btn color="blue darken-1" outlined text :loading="loadingSubmit" @click="changeUsername">Change Username
                                                </v-btn>
                                            </v-card-actions>
                                            <v-divider></v-divider>
                                            <v-text-field label="Old Password*" v-model="form.password"
                                            :rules="[rules.required, rules.min]"
                                            :append-icon="show0 ? 'mdi-eye' : 'mdi-eye-off'"
                                            @click:append="show0 = !show0"
                                            :type="show0 ? 'text' : 'password'"></v-text-field>
                                        <v-text-field label="New Password*" v-model="form.new_password"
                                            :rules="[rules.required, rules.min]"
                                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                            @click:append="show1 = !show1"
                                            :type="show1 ? 'text' : 'password'"></v-text-field>
                                        <v-text-field label="New Password Confirmation*" v-model="form.new_password_confirmed"
                                            :rules="[rules.required, rules.min]"
                                            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                            @click:append="show2 = !show2"
                                            :type="show2 ? 'text' : 'password'"></v-text-field>
                                    </v-form>
                                    <v-alert dense outlined type="error" transition="scale-transition" value="alert"
                                        v-model="alertCreate" :hidden="alertCreate">
                                        Cannot create new file!!!
                                    </v-alert>
                                </v-col>
                            </v-row>
                    <v-card-actions>
                        <small>*indicates required field</small>
                        <div class="flex-grow-1"></div>
                        <v-btn color="blue darken-1" outlined text @click="dialogClose">Close</v-btn>
                        <v-btn color="blue darken-1" outlined text :disabled="!valid" :loading="loadingSubmit" @click="updateProfile">Change Password
                        </v-btn>
                    </v-card-actions>
                        </v-container>
                    </v-card-text>
<notifications group="foo" />


                </v-card>
            </v-dialog>
        </v-row>
    </form>
</template>

<script>
// import { createFileApi } from "../../helpers/fileOffer";
import { getUserInformation, changeUserInformation } from "@/js/helpers/auth";
export default {
  data: () => ({
    dialog: false,
    form: {
      fullname: "",
      email: "",
      password: "",
      new_password: "",
      new_password_confirmed: ""
    },
    rules: {
      required: value => !!value || "Required.",
      min: v => v.length >= 3 || "Min 3 characters"
    },
    show0: false,
    show1: false,
    show2: false,
    password: "Password",
    id_dokumen: 0,
    valid: "",
    loadingSubmit: false,
    alertCreate: false
  }),
  methods: {
    dialogClose() {
      this.dialog = false;
      this.form.fullname = "";
      this.form.email = "";
      this.form.password = "";
      this.form.new_password = "";
      this.form.new_password_confirmed = "";

      this.rules.required = true;
      this.rules.min = true;
    },
    dialogOpen() {
      this.dialog = true;
      getUserInformation(this.$authAPI)
        .then(result => {
          console.log("user info", result);
          this.form.fullname = result.data.name;
          this.form.email = result.data.email;
        })
        .catch(err => {
          console.log("err info", err);
        });
    },
    changePassword() {
      changeUserInformation(this.$authAPI, this.form, "change_user_info")
        .then(result => {})
        .catch(err => {
          console.log(err);
        });
    },
    changeUsername() {
      changeUserInformation(this.$authAPI, this.form, "change_user_name")
        .then(result => {
          this.$notify({
            group: "foo",
            title: "Berhasil",
            text: "Nama user berhasil diganti",
            duration: 2000,
            type: "success "
          });
          console.log(result);
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>

<style>
</style>
