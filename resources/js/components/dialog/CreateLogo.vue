<template>
    <form @submit.prevent="createLogo">
        <v-row justify="center">
            <v-dialog v-model="dialog" persistent max-width="1200">
                <template v-slot:activator="{ on }">
                    <v-btn my-auto rounded outlined v-on="on">
                        <v-icon>mdi-plus-circle-outline</v-icon>Edit Header
                    </v-btn>
                </template>
                <v-card max-width="1200" class="mx-auto">
                    <v-card-title>
                        <span class="headline">Edit Letter Header</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-form>
                                <v-row>
                                    <v-col cols="12" sm="6" md="9">

                                        <v-text-field outlined label="Company Name*" v-model="company.name">
                                        </v-text-field>
                                        <v-text-field outlined label="Company Address*" v-model="company.address">
                                        </v-text-field>
                                        <v-row>
                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field outlined label="Company Number*" v-model="company.number">
                                                </v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field outlined label="Company Website*"
                                                    v-model="company.website"></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6" md="4">
                                                <v-text-field outlined label="Company Email*" v-model="company.email">
                                                </v-text-field>
                                            </v-col>
                                        </v-row>

                                    </v-col>
                                    <v-col cols="12" sm="6" md="3">
                                    
                                      <div>
                                        <div oulined class="image-preview" v-if="imageData.length > 0">
                                              <img class="preview" :src="imageData">
                                          </div>
                                          <div class="file-upload-form">
                                              <input type="file" @change="previewImage" accept="image/*">
                                          </div>
                                      </div>

                                      
                                    </v-col>
                                </v-row>
                            </v-form>
                        </v-container>
                        <small>*indicates required field</small>
                    </v-card-text>
                    <v-card-actions>
                        <div class="flex-grow-1"></div>
                        <v-btn color="blue darken-1" outlined text @click="dialogClose">Close</v-btn>
                        <v-btn color="blue darken-1" outlined text>Submit</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
    </form>
</template>

<script>
// import { createFileApi } from "../../helpers/fileOffer";
export default {
  data: () => ({
    dialog: false,
    company: {
      name: "",
      address: "",
      number: "",
      website: "",
      email: ""
    },

    rules: {
      required: value => !!value || "Required.",
      min: v => v.length >= 10 || "Min 10 characters"
    },
    id_dokumen: 0,
    imageData: "/storage/images/logo-here.jpg"
  }),

  created() {
    console.log("show data in child");
    console.log(this.companyData);
  },

  methods: {
    previewImage: function(event) {
      // Reference to the DOM input element
      var input = event.target;
      // Ensure that you have a file before attempting to read it
      if (input.files && input.files[0]) {
        // create a new FileReader to read this image and convert to base64 format
        var reader = new FileReader();
        // Define a callback function to run, when FileReader finishes its job
        reader.onload = e => {
          // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
          // Read image as base64 and set to imageData
          this.imageData = e.target.result;
        };
        // Start the reader job - read file as a data url (base64 format)
        reader.readAsDataURL(input.files[0]);
      }
    },

    dialogClose() {
      this.dialog = false;
      this.company.name = "";
      this.company.address = "";
      this.company.number = "";
      this.company.website = "";
      this.company.email = "";
    }
  },
  props: ["company-data"]
};
</script>

<style>
.file-upload-form,
.image-preview {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  padding: 20px;
}

img.preview {
  width: 200px;
  height: 200px;
  background-color: white;
  border: 1px solid #000;
  padding: 5px;
}
</style>
