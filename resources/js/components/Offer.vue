<template>
    <div id="offer-field" class="container">
        <div class="card" style="margin-top:5%;">
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
                                    <createLogo :company-data="company" />
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
                                <v-text-field v-model="documentData.number" text clearable
                                    hint="For example, 22/DART/QTT/2019" label="Nomor Surat"></v-text-field>
                            </v-col>
                        </v-row>
                    </div>
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.attachmentname" text clearable
                                    hint="For example, 1 (satu) lembar" label="Lampiran Surat"></v-text-field>
                            </v-col>
                        </v-row>
                    </div>
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.customername" text clearable hint="For example, Edi"
                                    label="Kepada"></v-text-field>
                            </v-col>
                        </v-row>
                    </div>
                    <div>
                        <v-row align-center>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field v-model="documentData.subject" text clearable
                                    hint="For example, Penawaran Pekerjaan Pengembangan Web Sistem"
                                    label="Prihal Surat"></v-text-field>
                            </v-col>
                        </v-row>
                    </div>
                    <br>
                    <p>Sehubung dengan diskusi pada <span><input v-model="documentData.discussion_date" type="text"
                                id="InputEmail" required></span> yang
                        bertempat di <span><input v-model="documentData.discussion_loc" type="text" id="InputEmail"
                                required></span>
                        dengan ini kami mengajukan penawaran untuk pekerjaan Penawaran Pembuatan Web Sistem /
                        Aplikasi Survei Sebersar Rp. <span><input v-model="documentData.offerprice" type="text"
                                id="InputEmail" required></span>
                        ,- (<span><input v-model="documentData.offerpricename" type="text" id="InputEmail"
                                required></span>). </p>
                    <p>Penawaran ini sudah memperhatikan ketentuan dan persyaratan untuk melaksanakan pekerjaan
                        tersebut di atas.</p>
                    <p>Kami akan melaksanakan pekerjaan tersebut dengan jangka waktu pelaksanaan pekerjaan selama
                        <span><input v-model="documentData.duration" type="text" id="InputEmail" required></span>
                        (<span><input v-model="documentData.durationname" type="text" id="InputEmail" required></span>)
                        hari kerja.</p>
                    <p>Penawaran ini berlaku selama <span><input v-model="documentData.offerduetime" type="text"
                                id="InputEmail" required></span>
                        (<span><input v-model="documentData.offerduetimename" type="text" id="InputEmail"
                                required></span>) hari kalender sejak tanggal
                        surat penawaran ini.
                        surat penawaran beserta lampirannya kami sampaikan sebanyak <span><input
                                v-model="documentData.attachment" type="text" id="InputEmail" required></span>
                        (<span><input v-model="documentData.attachmentname" type="text" id="InputEmail"
                                required></span>) rangkap
                        dokumen.</p>
                    <p>Dengan disampaikannya Surat Penawaran ini, maka kami menyatakan sanggup melaksanakan
                        pekerjaan ini.</p>
                    <br>
                    <p style="margin-left:80%">Hormat kami</p>
                    <img id="signature" src="@/images/tiny-checkers.png" alt="">
                </form>
            </v-container>
            <div class="card-header">
                <div v-for="(category,cat_index) in categories" v-bind:key="cat_index" v-on:remove="deleteCategory()">
                    <v-btn style="z-index:1; margin-bottom:-150px;" v-on:click="deleteCategory(categories,cat_index)" large
                        color="red" icon>
                        <v-icon>mdi-close-circle-outline</v-icon>
                    </v-btn>
                    <v-card class="pa-10 mt-10">
                        <v-text-field label="Nama Kategori" v-model="category.title"></v-text-field>
                        <v-row class="font-weight-bold">
                            <v-col class="col-sm-1">No</v-col>
                            <v-col class="col-sm-4">Modul</v-col>
                            <v-col class="col-sm-1">Durasi</v-col>
                            <v-col class="col-sm-1">Satuan</v-col>
                            <v-col class="col-sm-3">Biaya</v-col>
                            <v-col class="col-sm-2">Keterangan</v-col>
                        </v-row>
                        <div class="col-sm-12" style="border-bottom:1px solid #000"></div>
                        <div v-for="(sub_cat,index) in category.list_subs" v-bind:key="index" @mouseover="hiddenSub=false"
                            @mouseleave="hiddenSub=true" v-on:remove="deleteSub()">
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
                            <div v-for="(item,index_row) in sub_cat.list_row" v-bind:key="index_row" v-on:remove="deleteItem()" @mouseover="hidden=false"
                            @mouseleave="hidden=true">
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
                                <v-btn fluid rounded color="primary" v-on:click="addSubCategory(cat_index)">Add Sub</v-btn>
                                <v-btn fluid rounded color="success" v-on:click="addRow(cat_index,index)">Add Row</v-btn>
                            </div>
                            <hr>
                        </div>
                    </v-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CreateLogo from "@/js/components/dialog/CreateLogo.vue";
    // import CategoryAdd from "@/js/components/CategoryAdd.vue";
    import {
        loadHeaderdata
    } from "@/js/helpers/headerFile";

    export default {
        components: {
            CreateLogo,
            // CategoryAdd
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
            categories: [],
            // list_subs: [],
            hidden: true,
            hiddenSub: true
        }),
        watch: {
            documentData: {
                handler: function (val, oldVal) {
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
                this.categories.push(this.category = {
                    title: "",
                    list_subs: [{
                        id: "",
                        list_row: [{
                            modul: "",
                            durasi: "",
                            satuan: "",
                            biaya: "",
                            ket: ""
                        }]
                    }]
                });
                console.log(this.categories);
            },

            deleteCategory(categories, index) {
                console.log(index);
                categories.splice(index, 1);
            },

            addSubCategory(cat_index) {
                console.log('Addcat ' + cat_index)
                this.categories[cat_index].list_subs.push(this.sub_cat = {
                    id: "",
                    list_row: [{
                        modul: "",
                        durasi: "",
                        satuan: "",
                        biaya: "",
                        ket: ""
                    }]
                })
                console.log(this.list_subs)
                // this.list_subs[0].list_row.push("im here")
            },
            addRow(cat_index,index) {
                console.log('Addrow')
                this.categories[cat_index].list_subs[index].list_row.push(this.item={
                    modul: "",
                    durasi: "",
                    satuan: "",
                    biaya: "",
                    ket: ""
                })
            },

            deleteItem(sub_cat,index_row) {
                // console.log(sub_cat.list_row)
                // console.log(index_row)
                sub_cat.list_row.splice(index_row, 1)
            },

            deleteSub(category, index) {
                console.log(index)
                category.list_subs.splice(index, 1)
            },

            printHelloWorld() {
                console.log("hello world");
            },
            previewImage: function (event) {
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
