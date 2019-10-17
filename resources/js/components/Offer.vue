<template>
    <div id="offer-field" class="container">
        <div class="card" style="margin-top:15%;">
            <div class="card-header">
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
                                    <createLogo v-bind:company-data="company" />
                                </div>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-container>
            </div>
            <v-container fluid class="px-10 py-10">
                <form @submit.prevent="authenticate">
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="number" prepend-icon="mdi-format-list-bulleted" text clearable
                                    hint="For example, 22/DART/QTT/2019" label="Nomor Surat"></v-text-field>
                            </v-col>
                        </v-row>
                    </div>
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="attachmentname" prepend-icon="mdi-attachment" text clearable
                                    hint="For example, 1 (satu) lembar" label="Lampiran Surat"></v-text-field>
                            </v-col>
                        </v-row>
                    </div>
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="customername" prepend-icon="mdi-account" text clearable
                                    hint="For example, Edi" label="Kepada"></v-text-field>
                            </v-col>
                        </v-row>
                    </div>
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="subject" text clearable prepend-icon="mdi-clipboard-outline"
                                    hint="For example, Penawaran Pekerjaan Pengembangan Web Sistem"
                                    label="Prihal Surat"></v-text-field>
                            </v-col>
                        </v-row>
                    </div>
                    <br>
                    <p>Sehubung dengan diskusi pada <span>
                            <v-icon>mdi-calendar</v-icon>


                            <v-menu v-model="menu1" :close-on-content-click="false" transition="scale-transition"
                                offset-y full-width max-width="290px" min-width="290px">
                                <template v-slot:activator="{ on }">
                                    <input v-model="discussion_date" readonly v-on="on" />
                                </template>
                                <v-date-picker v-model="date" no-title @input="menu2 = false"></v-date-picker>
                            </v-menu>


                        </span> yang
                        bertempat di <span>
                            <v-icon>mdi-map-marker</v-icon><input v-model="discussion_loc" type="text" id="InputEmail"
                                required>
                        </span>
                        dengan ini kami mengajukan penawaran untuk pekerjaan <span>
                            <v-icon>mdi-clipboard-outline</v-icon><input v-model="subject" type="text" id="InputEmail"
                                required>
                        </span> sebesar Rp. <span>
                            <input v-model="offerprice" type="text" required>
                        </span>
                        ,- (<span><input type="text" v-model="offerpricename" required></span>). </p>
                    <p>Penawaran ini sudah memperhatikan ketentuan dan persyaratan untuk melaksanakan pekerjaan
                        tersebut di atas.</p>
                    <p>Kami akan melaksanakan pekerjaan tersebut dengan jangka waktu pelaksanaan pekerjaan selama
                        <span>
                            <v-icon>mdi-camera-timer</v-icon><input v-model="duration" type="text" id="InputEmail"
                                required>
                        </span>
                        (<span><input type="text" v-model="durationname" required></span>)
                        hari kerja.</p>
                    <p>Penawaran ini berlaku selama <span>
                            <v-icon>mdi-calendar-check</v-icon><input v-model="offerduetime" type="text" required>
                        </span>
                        (<span><input type="text" v-model="offerduetimename" required></span>) hari kalender sejak
                        tanggal
                        surat penawaran ini.
                        surat penawaran beserta lampirannya kami sampaikan sebanyak <span>
                            <v-icon>mdi-attachment</v-icon><input v-model="attachmentname" type="text" id="InputEmail"
                                required>
                        </span>
                        (<span><input type="text" v-model="attachment" required></span>) rangkap
                        dokumen.</p>
                    <p>Dengan disampaikannya Surat Penawaran ini, maka kami menyatakan sanggup melaksanakan
                        pekerjaan ini.</p>
                    <br>
                    <p style="margin-left:80%">Hormat kami</p>
                    <div id="signature">
                        Sign Here
                    </div>
                    <!-- <img id="signature" src="@/images/tiny-checkers.png" alt=""> -->
                </form>
            </v-container>
            <div class="card-header">
                <confirm-update-document :update-status="isUpdateFromLocal" @update="setStatusUpdate" />
                <div v-for="(category,cat_index) in categories" v-bind:key="cat_index" v-on:remove="deleteCategory()">
                    <v-btn style="z-index:1; margin-bottom:-150px;" v-on:click="deleteCategory(categories,cat_index)"
                        large color="red" icon>
                        <v-icon>mdi-close-circle-outline</v-icon>
                    </v-btn>
                    <v-card class="pa-10 mt-10">
                        <v-text-field label="Nama Kategori" v-model.lazy="category.title"></v-text-field>
                        <v-row class="font-weight-bold">
                            <v-col class="col-sm-1">No</v-col>
                            <v-col class="col-sm-4">Modul</v-col>
                            <v-col class="col-sm-1">Durasi</v-col>
                            <v-col class="col-sm-1">Satuan</v-col>
                            <v-col class="col-sm-3">Biaya</v-col>
                            <v-col class="col-sm-2">Keterangan</v-col>
                        </v-row>
                        <div class="col-sm-12" style="border-bottom:1px solid #000"></div>
                        <div v-for="(sub_cat,index) in category.list_subs" v-bind:key="index"
                            @mouseover="hiddenSub=false" @mouseleave="hiddenSub=true" v-on:remove="deleteSub()">
                            <v-row justify="center">
                                <v-col sm="11">
                                    <v-text-field class="col-sm-12" v-model="sub_cat.id" clearable
                                        hint="For example, Layouting" label="SubCategory"></v-text-field>
                                </v-col>
                                <v-col sm="1">
                                    <v-btn v-on:click="deleteSub(category,index)" large color="red" icon
                                        :hidden="hiddenSub">
                                        <v-icon>mdi-close-circle-outline</v-icon>
                                    </v-btn>
                                </v-col>
                            </v-row>
                            <div v-for="(item,index_row) in sub_cat.list_row" v-bind:key="index_row"
                                v-on:remove="deleteItem()" @mouseover="hidden=false" @mouseleave="hidden=true">
                                <!-- {{index_row}} -->
                                <v-row justify="center" align="center" @mouseover="hidden=false"
                                    @mouseleave="hidden=true">
                                    <!-- <v-text-field class="col-sm-1" v-model="form.no[index_row]" label="No" disabled value="index_row"></v-text-field> -->
                                    <v-text-field class="col-sm-4" v-model="item.modul"
                                        hint="For example, Integrasi API" label="Modul"></v-text-field>
                                    <v-text-field class="col-sm-1" v-model="item.durasi" hint="For example, 8"
                                        label="Durasi"></v-text-field>
                                    <v-text-field class="col-sm-1" v-model="item.satuan" hint="For example, Hari"
                                        label="Satuan"></v-text-field>
                                    <v-text-field class="col-sm-3" v-model="item.biaya" hint="For example, 4.000.000"
                                        label="Biaya"></v-text-field>
                                    <v-text-field class="col-sm-1" v-model="item.ket" hint="For example, "
                                        label="Keterangan"></v-text-field>
                                    <v-btn v-on:click="deleteItem(sub_cat,index_row)" large color="red" icon
                                        :hidden="hidden">
                                        <v-icon>mdi-close-circle-outline</v-icon>
                                    </v-btn>
                                </v-row>
                            </div>
                            <div id="action-btn" class="mb-10">
                                <v-btn fluid rounded color="primary" v-on:click="addSubCategory(cat_index)">Add Sub
                                </v-btn>
                                <v-btn fluid rounded color="success" v-on:click="addRow(cat_index,index)">Add Row
                                </v-btn>
                            </div>
                            <!-- <ConfirmUpdateDocument :sts-update="sts"/> -->
                            <hr>
                        </div>
                    </v-card>
                </div>
            </div>
        </div>
        <v-btn color="green" dark x-large fixed bottom right fab>
            <v-icon>mdi-check</v-icon>
        </v-btn>
    </div>
</template>

<script>
import CreateLogo from "@/js/components/dialog/CreateLogo.vue";
import ConfirmUpdateDocument from "@/js/components/dialog/ConfirmUpdateDocument.vue";
import CategoryAdd from "@/js/components/CategoryAdd.vue";
import { loadHeaderdata } from "@/js/helpers/headerFile";
// import { mapFields } from 'vuex-map-fields';
import { createHelpers } from "vuex-map-fields";

const { mapFields: mapDocumentfields } = createHelpers({
  getterType: "getDocumentFields",
  mutationType: "updateDocumentFields"
});

export default {
  components: {
    CreateLogo,
    CategoryAdd,
    ConfirmUpdateDocument
  },
  data: vm => ({
    nomor: "",
    sts: false,
    company: {
      name: "",
      address: "",
      number: "",
      website: "",
      email: "",
      logo: ""
    },
    imageData: "",
    items: [],
    item: [],
    notUpToDate: false,
    isUpdateFromLocal: false,
    categories: [],
    // list_subs: [],
    hidden: true,
    hiddenSub: true,

    date: new Date().toISOString().substr(0, 10),
    dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
    menu1: false,
    offerpricename: "",
    offerduetimename: "",
    durationname: ""
  }),

  methods: {
    setStatusUpdate(sts) {
      this.isUpdateFromLocal = sts;
      console.log("want to load data ?", this.isUpdateFromLocal);

      if (this.isUpdateFromLocal) {
        console.log("string arr", this.$store.getters.getDataPayload);
        let localPayload = JSON.parse(this.$store.getters.getDataPayload);
        this.categories = localPayload;
        // this.categories.push(localPayload);
        // console.log("local payload", localPayload);

        console.log("updating", this.categories);
      } else {
        console.log("string arr", this.$store.getters.getDataPayload);
        // let localPayload = JSON.parse(this.$store.getters.getDataPayload);
        this.categories = localPayload;
      }

      for (var key in this.categories) {
        if (this.categories[key].list_subs.length <= 0) {
          this.categories[key].list_subs.push(
            (this.sub_cat = {
              id: "",
              list_row: [
                {
                  modul: "",
                  durasi: "",
                  satuan: "",
                  biaya: "",
                  ket: ""
                }
              ]
            })
          );
        }
      }
      // console.log(JSON.parse(this.$store.getters.getDataPayload));
      // this.categories.push(
      //   Object.assign({}, JSON.parse(this.$store.getters.getDataPayload))
      // );
    },

    loadHeaderAPI() {
      loadHeaderdata(this.$authAPI)
        .then(result => {
          this.company = {
            name: result.companyname,
            address: result.address,
            number: result.phonenumber,
            email: result.email,
            website: result.website,
            logo: null
          };
          this.imageData = "/storage/" + result.logo;
          console.log("data baru cuy", this.imageData);
        })
        .catch(err => {
          console.log("err data tidak masuk", err);
        });
    },
    addCategory() {
      this.categories.push(
        (this.category = {
          title: "",
          list_subs: [
            {
              id: "",
              list_row: [
                {
                  modul: "",
                  durasi: "",
                  satuan: "",
                  biaya: "",
                  ket: ""
                }
              ]
            }
          ]
        })
      );
      console.log(this.categories);
    },

    deleteCategory(categories, index) {
      console.log(index);
      categories.splice(index, 1);
    },

    addSubCategory(cat_index) {
      console.log("Addcat " + cat_index);
      this.categories[cat_index].list_subs.push(
        (this.sub_cat = {
          id: "",
          list_row: [
            {
              modul: "",
              durasi: "",
              satuan: "",
              biaya: "",
              ket: ""
            }
          ]
        })
      );
      console.log(this.list_subs);
      // this.list_subs[0].list_row.push("im here")
    },
    addRow(cat_index, index) {
      console.log("Addrow");
      this.categories[cat_index].list_subs[index].list_row.push(
        (this.item = {
          modul: "",
          durasi: "",
          satuan: "",
          biaya: "",
          ket: ""
        })
      );
    },

    deleteItem(sub_cat, index_row) {
      // console.log(sub_cat.list_row)
      // console.log(index_row)
      sub_cat.list_row.splice(index_row, 1);
    },

    deleteSub(category, index) {
      console.log(index);
      category.list_subs.splice(index, 1);
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
    },
    formatDate(date) {
      if (!date) return null;

      const [year, month, day] = date.split("-");
      return `${month}/${day}/${year}`;
    },
    parseDate(date) {
      if (!date) return null;

      const [month, day, year] = date.split("/");
      return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
    },

    terbilang(val) {
      var bilangan = val;
      var kalimat = "";
      var subkalimat;
      var kata1;
      var kata2;
      var kata3;
      var angka = new Array(
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0",
        "0"
      );
      var kata = new Array(
        "",
        "Satu",
        "Dua",
        "Tiga",
        "Empat",
        "Lima",
        "Enam",
        "Tujuh",
        "Delapan",
        "Sembilan"
      );
      var tingkat = new Array("", "Ribu", "Juta", "Milyar", "Triliun");
      var panjang_bilangan = bilangan.length;

      /* pengujian panjang bilangan */
      if (panjang_bilangan > 15) {
        kalimat = "Diluar Batas";
      } else {
        /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
        for (i = 1; i <= panjang_bilangan; i++) {
          angka[i] = bilangan.substr(-i, 1);
        }

        var i = 1;
        var j = 0;

        /* mulai proses iterasi terhadap array angka */
        while (i <= panjang_bilangan) {
          subkalimat = "";
          kata1 = "";
          kata2 = "";
          kata3 = "";

          /* untuk Ratusan */
          if (angka[i + 2] != "0") {
            if (angka[i + 2] == "1") {
              kata1 = "Seratus";
            } else {
              kata1 = kata[angka[i + 2]] + " Ratus";
            }
          }

          /* untuk Puluhan atau Belasan */
          if (angka[i + 1] != "0") {
            if (angka[i + 1] == "1") {
              if (angka[i] == "0") {
                kata2 = "Sepuluh";
              } else if (angka[i] == "1") {
                kata2 = "Sebelas";
              } else {
                kata2 = kata[angka[i]] + " Belas";
              }
            } else {
              kata2 = kata[angka[i + 1]] + " Puluh";
            }
          }

          /* untuk Satuan */
          if (angka[i] != "0") {
            if (angka[i + 1] != "1") {
              kata3 = kata[angka[i]];
            }
          }

          /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
          if (angka[i] != "0" || angka[i + 1] != "0" || angka[i + 2] != "0") {
            subkalimat =
              kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " ";
          }

          /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
          kalimat = subkalimat + kalimat;
          i = i + 3;
          j = j + 1;
        }

        /* mengganti Satu Ribu jadi Seribu jika diperlukan */
        if (angka[5] == "0" && angka[6] == "0") {
          kalimat = kalimat.replace("Satu Ribu", "Seribu");
        }
      }
      return kalimat;
    }
  },
  created() {
    this.addCategory();
    this.loadHeaderAPI();
  },

  mounted() {
    console.log("hello");
  },
  computed: {
    ...mapDocumentfields([
      "number",
      "attachmentname",
      "customername",
      "subject",
      "discussion_date",
      "discussion_loc",
      "offerprice",
      "duration",
      "offerduetime"
    ]),
    discussion_date() {
      return this.formatDate(this.date);
    }
  },
  watch: {
    categories: {
      // immediate: true,
      deep: true,
      handler(newVal, oldVal) {
        console.log("handler", newVal, oldVal);
        this.$store.dispatch("updatepayloadData", newVal);
        // this.$store.commit("UPDATE_TIME_UPDATE_LOCAL");
      }
    },
    date(val) {
      this.dateFormatted = this.formatDate(this.date);
    },
    offerprice: function(val) {
      this.offerpricename = this.terbilang(val);
    },
    offerduetime: function(val) {
      this.offerduetimename = this.terbilang(val);
    },
    duration: function(val) {
      this.offerduetimename = this.terbilang(val);
    }
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
  margin-left: 75%;
  text-align: center;
  border: 1px dashed #00f;
  width: 200px;
  height: 50px;
}

input {
  border-bottom: 1px solid #7e7a7a;
}
</style>
