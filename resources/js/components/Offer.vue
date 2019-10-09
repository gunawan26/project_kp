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
                                    <createLogo :company-data="company" />
                                </div>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-container>
            </div>
            <div class="card-body">
                <form @submit.prevent="authenticate">
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="1">
                                <v-text-field placeholder="Nomor"  disabled></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.number" text placeholder="Masukan no surat"></v-text-field>
                            </v-col>
                        </v-row>
                    </div>
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="1">
                                <v-text-field placeholder="Lampiran" disabled></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.attachmentname" text placeholder="Masukan Lampiran"></v-text-field>
                            </v-col>
                        </v-row>
                    </div>
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="1">
                                <v-text-field placeholder="Kepada" disabled></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.customername" text placeholder="Kepada"></v-text-field>
                            </v-col>
                        </v-row>    
                    </div>
                    <p>di -</p>
                    <p>Tempat</p>
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="1">
                                <v-text-field placeholder="perihal" disabled></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.subject" text placeholder="Perihal"></v-text-field>
                            </v-col>
                        </v-row>    
                    </div>
                     <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.discussion_date" text placeholder="Tanggal diskusi"></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.discussion_loc" text placeholder="Tempat Diskusi diskusi"></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.offerprice" text placeholder="Harga Penawaran"></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.offerpricename" text placeholder="Harga Penawaran Terbilang"></v-text-field>
                            </v-col>
                        </v-row>  
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.duration" text placeholder="Waktu Pengerjaan"></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.offerduetimename" text placeholder="Waktu Pengerjaan terbilang"></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.attachment" text placeholder="Lampiran"></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.attachmentname" text placeholder="Lampiran Terbilang"></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-img v-model="documentData.sign" text placeholder="Lampiran Terbilang"></v-img>
                            </v-col>
                        </v-row>      
                    </div>

                        <!-- <p>Sehubung dengan diskusi pada <span><input type="text" id="InputEmail" required></span> yang
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
                                    required></span>) rangkap
                            dokumen.</p>
                        <p>Dengan disampaikannya Surat Penawaran ini, maka kami menyatakan sanggup melaksanakan
                            pekerjaan ini.</p> -->
                        <br>
                        <p style="margin-left:80%">Hormat kami</p>
                        <img id="signature" src="@/images/tiny-checkers.png" alt="">
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
    nomor: "",
    company: {
      name: "",
      address: "",
      number: "",
      website: "",
      email: "",
      logo: ""
    },
    offers: {
      nomor: "",
      lampiran: "",
      kepada: "",
      perihal: "",
      offerdate: "",
      offerplace: "",
      offerprice: "",
      offerpricename: "",
      offerduetime: "",
      offerduetimename: "",
      attachment: "",
      attachmentname: "",
      sign: ""
    },
    imageData: "/storage/images/logo.png",
    items: [],
    item: [],
    categories: []
  }),
  watch: {
    documentData: {
      handler: function(val, oldVal) {
        /* ... */
        console.log(val);
      },
      deep: true
    }
  },
  methods: {
    saveLocalStorage() {},
    updateLocalStorage() {},
    removeLocalStorage() {},
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
    this.addCategory();
    this.loadHeaderAPI();
  },
  props: ["document-data"]
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
