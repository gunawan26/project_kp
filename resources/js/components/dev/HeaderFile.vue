<template>
    <v-form ref="form" v-model="valid" lazy-validation>
        <v-text-field v-model="form.companyname" :rules="companynameRule" label="Nama Perusahaan" required>
        </v-text-field>

        <v-text-field v-model="form.address" :rules="required" label="Alamat" required></v-text-field>
        <v-text-field v-model="form.email" :rules="emailRules" label="E-mail" required></v-text-field>
        <v-text-field v-model="form.website" :rules="required" label="Alamat Website" required></v-text-field>
        <v-text-field v-model="form.phonenumber" :rules="required" label="No Telepon" required></v-text-field>
        <input type="file" id="logo" ref="logo" v-on:change="handleFileUpload()"/>


        <v-btn :disabled="!valid" color="success" class="mr-4" @click="submit">
            Validate
        </v-btn>


    </v-form>
</template>

<script>
import { createOrUpdateHeader } from "@/js/helpers/headerFile";
import { loadHeaderdata } from "@/js/helpers/headerFile";

export default {
  data() {
    return {
      valid: false,
      companynameRule: [v => !!v || "Nama perusahaan tidak boleh kosong"],
      emailRules: [
        v => !!v || "Email diperlukan",
        v => /.+@.+\..+/.test(v) || "Alamat Email Tidak Valid"
      ],
      imgRules: [
        value =>
          !value ||
          value.size < 2000000 ||
          "Avatar size should be less than 2 MB!"
      ],
      required: [v => !!v || "Tidak Boleh Kosong."],
      form: {
        companyname: "",
        address: "",
        email: "",
        website: "",
        phonenumber: "",
        fileLogoname: "",
        fileLogo: null
      }
    };
  },

  created() {
    loadHeaderdata()
      .then(result => {
        this.form.companyname = result.companyname;
        this.form.address = result.address;
        this.form.email = result.email;
        this.form.website = result.website;
        this.form.phonenumber = result.phonenumber;
        this.form.fileLogoname = result.logo;
      })
      .catch(err => {});
  },
  methods: {
    handleFileUpload() {
      this.form.fileLogo = this.$refs.logo.files[0];
    },

    submit() {
      let form = new FormData();

      form.append("fileLogo", this.form.fileLogo);
      form.append("companyname", this.form.companyname);
      form.append("address", this.form.address);
      form.append("email", this.form.email);
      form.append("website", this.form.website);
      form.append("phonenumber", this.form.phonenumber);

      createOrUpdateHeader(form)
        .then(result => {
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
