<template>
    <div id="offer-field" class="container">
        <div class="card" style="margin-top:5%;">
            <div class="card-header">
                <!-- <createLogo /> -->
                <v-container>
                    <v-form>
                        <v-row>
                            <v-col cols="12" sm="6" md="9">
                                <v-text-field label="Company Name*" v-model="company.name" disabled>
                                </v-text-field>
                                <v-text-field label="Company Address*" v-model="company.address" disabled>
                                </v-text-field>
                                <v-row>
                                    <v-col cols="12" sm="6" md="4">
                                        <v-text-field label="Company Number*" v-model="company.number" disabled>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                        <v-text-field label="Company Website*" v-model="company.website" disabled>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                        <v-text-field label="Company Email*" v-model="company.email" disabled>
                                        </v-text-field>
                                    </v-col>
                                </v-row>

                            </v-col>
                            <v-col cols="12" sm="6" md="3">
                                <div>
                                    <div oulined class="image-preview" v-if="imageData.length > 0">
                                        <img class="preview" :src="imageData">
                                    </div>
                                    <createLogo v-bind:company-data="company"/>
                                </div>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-container>
            </div>
            <div class="card-body">
                <form @submit.prevent="authenticate">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                <span for="exampleInputEmail1">Nomor</span>
                            </div>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp"
                                    placeholder="Masukan no surat" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                <span for="exampleInputEmail1">Lampiran</span>
                            </div>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp"
                                    placeholder="Jumlah lampiran" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                <span for="exampleInputEmail1">Yth.</span>
                            </div>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp"
                                    placeholder="Nama tujuan surat" required>
                            </div>
                        </div>
                    </div>
                    <p>di -</p>
                    <p>Tempat</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                <span for="exampleInputEmail1">Perihal</span>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="InputEmail" aria-describedby="emailHelp"
                                    placeholder="Masukan perihal" required>
                            </div>
                        </div>
                        <br>
                        <p>Sehubung dengan diskusi pada <span><input type="text" id="InputEmail" required></span> yang
                            bertempat di <span><input type="text" id="InputEmail" required></span>
                            dengan ini kami mengajukan penawaran untuk pekerjaan Penawaran Pembuatan Web Sistem /
                            Aplikasi Survei Sebersar Rp. <span><input type="text" id="InputEmail" required></span>
                            ,- (<span><input type="text" id="InputEmail" required></span>). </p>
                        <p>Penawaran ini sudah memperhatikan ketentuan dan persyaratan untuk melaksanakan pekerjaan
                            tersebut di atas.</p>
                        <p>Kami akan melaksanakan pekerjaan tersebut dengan jangka waktu pelaksanaan pekerjaan selama
                            <span><input type="text" id="InputEmail" required></span> (<span><input type="text"
                                    id="InputEmail" required></span>) hari kerja.</p>
                        <p>Penawaran ini berlaku selama <span><input type="text" id="InputEmail" required></span>
                            (<span><input type="text" id="InputEmail" required></span>) hari kalender sejak tanggal
                            surat penawaran ini.
                            surat penawaran beserta lampirannya kami sampaikan sebanyak <span><input type="text"
                                    id="InputEmail" required></span> (<span><input type="text" id="InputEmail"
                                    required></span>) rangkap dokumen.</p>
                        <p>Dengan disampaikannya Surat Penawaran ini, maka kami menyatakan sanggup melaksanakan
                            pekerjaan ini.</p>
                        <br>
                        <p style="margin-left:80%">Hormat kami</p>
                        <img id="signature" src="@/images/tiny-checkers.png" alt="">
                    </div>
                </form>
            </div>
            <div class="card-header">
                <div v-for="(cat,index) in categories" v-bind:key="index" v-on:remove="deleteCategory()">
                    <v-btn class="col-sm-1" style="z-index:1; margin-bottom:-130px;"
                        v-on:click="deleteCategory(categories,index)" tile large color="red" icon>
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <CategoryAdd />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CreateLogo from "@/js/components/dialog/CreateLogo.vue";
import CategoryAdd from "@/js/components/CategoryAdd.vue";
import { loadHeaderdata } from "@/js/helpers/headerFile";

export default {
  components: {
    CreateLogo,
    CategoryAdd
  },
  data: () => ({
    company: {
      name: "",
      address: "",
      number: "",
      website: "",
      email: "",
      logo: ""
    },

    imageData: "/storage/images/logo.png",
    items: [],
    item: [],
    categories: []
  }),
  methods: {
    loadHeaderAPI() {
      loadHeaderdata(this.$authAPI)
        .then(result => {
          this.company = {
            name: result.companyname,
            address: result.address,
            number: result.phonenumber,
            email: result.email,
            website: result.website,
            logo: result.logo
          };
          console.log("data asdsadas", result);
        })
        .catch(err => {
          console.log("err data tidak masuk", err);
        });
    },
    addCategory() {
      console.log("AddCategory");
      this.categories.push({
        message: "test"
      });
      console.log(this.table);
    },

    deleteCategory(categories, index) {
      console.log(index);
      categories.splice(index, 1);
    },

    printHelloWorld() {
      console.log("hello world");
    },
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
    }
  },
  created() {
    console.log("created offer");
    this.addCategory();
    this.loadHeaderAPI();
  }
};
</script>


<style lang="scss" scoped>
#logo {
  width: 150px;
  height: 150px;
}

#signature {
  margin-left: 77%;
  width: 150px;
  height: 100px;
}

input {
  border-bottom: 1px solid #7e7a7a;
}
</style>
