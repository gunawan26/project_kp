<template>
    <div id="pdf">
        <div class="page-header">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="vertical-align: center;">
                            <table style="font-size: 14px; color: #000;">
                                <tr>
                                    <td style="color: #2496b8; font-size: 24px; font-weight: bold;">
                                        <span>{{company.name}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>{{company.address}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Hp. {{company.number}} | Website: {{company.website}} | Email:
                                            {{company.email}}</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="text-align: right; padding: 10px;">
                            <img src="/storage/images/logo.png" width="100" alt="Goyur" style="width: 62px;">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table>
            <thead>
                <tr>
                    <td>
                        <!--place holder for the fixed-position header-->
                        <div class="page-header-space"></div>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <!--*** CONTENT GOES HERE ***-->
                        <div class="page">
                            <table width="100%" cellspacing="0" cellpadding="0"
                                style="width: 100%; padding-bottom: 20px; font-size: 18px; padding-top:10px;">
                                <br>
                                <tbody>
                                    <tr>
                                        <td colspan="2" style="padding-bottom: 5px; text-align: right;">
                                            <span>Denpasar, {{created_at_date}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom: 5px; width:10%;">
                                            <span>Nomor</span>
                                        </td>
                                        <td style="padding-bottom: 5px;">
                                            <span>: {{number}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom: 5px; width:10%;">
                                            <span>Lampiran</span>
                                        </td>
                                        <td style="padding-bottom: 5px;">
                                            <span>: {{attachmentname}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding-top:20px; padding-bottom: 5px;">
                                            <span>Yth. {{customername}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding-bottom: 5px;">
                                            <span>di-</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom: 5px;">
                                        </td>
                                        <td style="padding-bottom: 5px;">
                                            <span>Tempat</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom: 5px; width:10%;">
                                            <span>Perihal</span>
                                        </td>
                                        <td style="padding-bottom: 5px;">
                                            <span>: {{subject}}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" cellspacing="0" cellpadding="0"
                                style="width: 100%; padding-bottom: 20px;">
                                <tbody style="font-size: 18px; text-align: justify;">
                                    <tr>
                                        <td>
                                            <p style="text-indent: 50px;">Sehubungan dengan Diskusi pada
                                                {{discussion_date}}, yang bertempat di {{discussion_loc}},
                                                dengan ini kami mengajukan penawaran untuk pekerjaan {{subject}}
                                                sebesar Rp. {{separator_value(offerprice)}},- ({{offerpricename}}).</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Penawaran ini sudah memperhatikan ketentuan dan persyaratan untuk
                                                melaksanakan
                                                pekerjaan
                                                tersebut di atas.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Kami akan melaksanakan pekerjaan tersebut dengan jangka waktu pelaksanaan
                                                pekerjaan selama
                                                {{separator_value(duration)}} ({{durationname}}) hari kerja.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Penawaran ini berlaku selama {{separator_value(offerduetime)}} ({{offerduetimename}}) hari
                                                kalender sejak
                                                tanggal
                                                surat penawaran ini.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Surat Penawaran beserta lampirannya kami sampaikan sebanyak
                                                {{separator_value(attachmentname)}} ({{attachment}})
                                                rangkap
                                                dokumen.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Dengan disampaikannya Surat Penawaran ini, maka kami menyatakan sanggup
                                                melaksanakan
                                                pekerjaan ini.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" cellspacing="0" cellpadding="0"
                                style="width: 100%; text-align: right; padding: 0;">
                                <tbody>
                                    <tr style="font-size: 20px;">
                                        <td style="font-weight: bold;">
                                            {{timestamp}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/storage/images/ttd.png" width="100" alt="Goyur"
                                                style="width: 250px;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="page">
                            <table width="100%" cellspacing="0" cellpadding="0" style="font-size: 18px; color: #000;">
                                <br>
                                <tr>
                                    <td style="color: #2496b8; font-size: 30px; font-weight: bold;">
                                        <span>QUOTATION</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <span>kepada:</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="font-size: 24px;">
                                        <span>Yth.{{customername}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <span>perihal: {{subject}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="12%"
                                        style=" margin:50px 0; color: #2496b8; font-weight: bold; font-size: 18px; vertical-align: bottom;">
                                        DETAILS:
                                    </td>
                                    <td width="88%"
                                        style=" background-color:#2496b8; border-top: 3px solid #fff; border-bottom: 4px solid #fff;">
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <div v-for="(category,cat_index) in categories" v-bind:key="cat_index">
                                <table>
                                    <tr>
                                        <td width="12%"
                                            style="margin-top:30px; font-weight: bold; font-size: 18px; vertical-align: bottom;">
                                            {{category.title}}
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" cellspacing="0" cellpadding="0" style="text-align: center;">
                                    <thead
                                        style="font-size: 14px; background-color: #2496b8; color: #fff; text-align: left;">
                                        <tr style="padding-top: 5px;">
                                            <th
                                                style="width: 5%; font-weight: bold; text-align: left; padding: 5px 5px 1px 15px; ">
                                                No.
                                            </th>
                                            <th
                                                style="width: 50%; font-weight: bold; text-align: left; padding: 5px 5px 1px; ">
                                                Modul/Rincian Pengerjaan
                                            </th>
                                            <th style="width: 5%; font-weight: bold; padding: 5px 5px 1px; ">
                                                Durasi
                                            </th>
                                            <th style="width: 5%; font-weight: bold; padding: 5px 5px 1px; ">
                                                Satuan
                                            </th>
                                            <th style="width: 20%; font-weight: bold; padding: 5px 5px 1px; ">
                                                Biaya (Rp)
                                            </th>
                                            <th style="width: 10%; font-weight: bold; padding: 5px 5px 1px; ">
                                                Keterangan
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                                <div v-for="(sub_cat,index) in category.list_subs" v-bind:key="index">
                                    <table width="100%" cellspacing="0" cellpadding="0" style="text-align: center;">
                                        <tbody style="border: 1px solid #000;">
                                            <tr style="font-size: 15px; text-align: left; background-color: #d9d9d9;">

                                                <td style="width: 5%; text-align: left; padding: 5px 5px 1px 15px;">

                                                </td>
                                                <td
                                                    style="width: 95%; font-weight: bold; text-align: left; padding: 5px 5px 1px;">
                                                    {{sub_cat.id}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div v-for="(item,index_row) in sub_cat.list_row" v-bind:key="index_row">
                                        <table width="100%" cellspacing="0" cellpadding="0" style="text-align: center;">
                                            <tbody>
                                                <tr style="padding-top: 5px;">
                                                    <td
                                                        style="width: 5%; text-align: left;  border: 1px solid #000; padding: 5px 5px 1px 15px; ">
                                                        {{index_row+1}}
                                                    </td>
                                                    <td
                                                        style="width: 50%; text-align: left;  border: 1px solid #000; padding: 5px 5px 1px; ">
                                                        {{item.modul}}
                                                    </td>
                                                    <td
                                                        style="width: 5%;  border: 1px solid #000; padding: 5px 5px 1px; ">
                                                        {{item.durasi}}
                                                    </td>
                                                    <td
                                                        style="width: 5%;  border: 1px solid #000; padding: 5px 5px 1px; ">
                                                        {{item.satuan}}
                                                    </td>
                                                    <td
                                                        style="width: 20%; text-align: left;  border: 1px solid #000; padding: 5px 5px 1px; ">
                                                        {{separator_value(item.biaya)}}
                                                    </td>
                                                    <td
                                                        style="width: 10%;  border: 1px solid #000; padding: 5px 5px 1px; ">
                                                        {{item.ket}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <table width="100%" cellspacing="0" cellpadding="0" style="text-align: center;">
                                    <thead
                                        style="font-size: 14px; background-color: #2496b8; color: #fff; text-align: left;">
                                        <tr style="padding-top: 5px;">
                                            <th
                                                style="width: 55%; font-weight: bold; text-align: right; padding: 5px 5px 1px; border: 1px solid #000; ">
                                                Sub-Total
                                            </th>
                                            <th
                                                style="width: 5%; font-weight: bold; text-align: center; padding: 5px 5px 1px; border: 1px solid #000;">
                                                {{total_sub[1][cat_index]}}
                                            </th>
                                            <th
                                                style="width: 5%; font-weight: bold; text-align: center; padding: 5px 5px 1px; border: 1px solid #000;">
                                                Hari
                                            </th>
                                            <th
                                                style="width: 30%; font-weight: bold; text-align: left; padding: 5px 5px 1px; border: 1px solid #000;">
                                                {{separator_value(total_sub[0][cat_index])}}
                                                <!-- {{total_sub[0][cat_index]}} -->
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                                <br>
                            </div>
                            <br>
                            <table>
                                <tr>
                                    <td width="12%"
                                        style="margin-top:30px; font-weight: bold; font-size: 18px; vertical-align: bottom;">
                                        Summary
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" cellspacing="0" cellpadding="0" style="text-align: center;">
                                <thead
                                    style="font-size: 14px; background-color: #2496b8; color: #fff; text-align: left;">
                                    <tr style="padding-top: 5px;">
                                        <th
                                            style="width: 5%; font-weight: bold; text-align: left; padding: 5px 5px 1px 15px; ">
                                            No.
                                        </th>
                                        <th
                                            style="width: 85%; font-weight: border: 1px solid #000; bold; text-align: left; padding: 5px 5px 1px 15px; ">
                                            Pekerjaan
                                        </th>
                                        <th
                                            style="width: 10%; font-weight: border: 1px solid #000; bold; text-align: left; padding: 5px 5px 1px 15px; ">
                                            Biaya(Rp.)
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            <div v-for="(cat,index) in categories" v-bind:key="index">
                                <table width="100%" cellspacing="0" cellpadding="0" style="text-align: center;">
                                    <tbody style="border: 1px solid #000;">
                                        <tr style="padding-top: 5px;">
                                            <td
                                                style="width: 5%; text-align: left;  border: 1px solid #000; padding: 5px 5px 1px 15px; ">
                                                {{index+1}}
                                            </td>
                                            <td
                                                style="width: 85%; text-align: left;  border: 1px solid #000; padding: 5px 5px 1px; ">
                                                {{cat.title}}
                                            </td>
                                            <td
                                                style="width: 10%; text-align: left;  border: 1px solid #000; padding: 5px 5px 1px; ">
                                                {{separator_value(total_sub[0][index])}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table width="100%" cellspacing="0" cellpadding="0" style="text-align: center;">
                                <thead
                                    style="font-size: 14px; background-color: #2496b8; color: #fff; text-align: left;">
                                    <tr style="padding-top: 5px;">
                                        <th
                                            style="width: 90%; font-weight: bold;  border: 1px solid #000; text-align: right; padding: 5px 5px 1px 15px; ">
                                            Total
                                        </th>
                                        <th
                                            style="width: 10%; font-weight:bold; border: 1px solid #000; text-align: left; padding: 5px 5px 1px 15px; ">
                                            {{separator_value(total_item[0])}}
                                        </th>
                                    </tr>
                                </thead>
                            </table>


                            <br>
                            <p>Penawaran masih dapat berubah berdasarkan diskusi lebih lanjut.</p>
                            <table width="100%" cellspacing="0" cellpadding="0"
                                style="width: 100%; text-align: right; padding: 0;">
                                <tbody>
                                    <tr style="font-size: 20px;">
                                        <td style="font-weight: bold;">
                                            {{timestamp}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/storage/images/ttd.png" width="100" alt="Goyur"
                                                style="width: 250px;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <v-btn color="pink" dark large fixed bottom right fab @click="print">
            <v-icon>mdi-printer</v-icon>
        </v-btn>
    </div>
</template>

<script>
    import {
        loadHeaderdata
    } from "@/js/helpers/headerFile";
    import * as moment from "moment";
    import localization from "moment/locale/id";
    import {
        terbilang
    } from "@/js/helpers/angkaKeHuruf";
    import { separatorAngka } from "@/js/helpers/separator";
    export default {
        data() {
            return {
                company: {
                    name: "",
                    address: "",
                    number: "",
                    website: "",
                    email: "",
                    logo: ""
                },

                number: "",
                attachmentname: "",
                customername: "",
                subject: "",
                discussion_date: "",
                discussion_loc: "",
                offerprice: "",
                duration: "",
                offerduetime: "",
                created_at: "",

                offerpricename: "",
                offerduetimename: "",
                durationname: "",
                attachment: "",
                // offer:100,
                categories: []
            };
        },
        methods: {
            separator_value(val){
                let a =  separatorAngka(val);
                console.log("value",a);
                return a
            },
            loadDokumendata() {
                let data = this.$store.getters.getDocumentData;
                this.number = data.number;
                this.attachmentname = data.attachmentname;
                this.customername = data.customername;
                this.subject = data.subject;
                this.discussion_date = data.discussion_date;
                this.discussion_loc = data.discussion_loc;
                this.offerprice = data.offerprice;
                this.duration = data.duration;
                this.offerduetime = data.offerduetime;
                this.created_at = data.created_at;
                this.offerpricename = terbilang(String(data.offerprice));
                this.offerduetimename = terbilang(String(data.offerduetime));
                this.durationname = terbilang(String(data.duration));
                this.attachment = terbilang(String(data.attachmentname));

                // console.log("Terbilang Price", terbilang(this.offerpricename));

                console.log("Load Dokumen", this.$store.getters.getDocumentData);
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
                            logo: result.logo
                        };
                        console.log("data asdsadas", result);
                    })
                    .catch(err => {
                        console.log("err data tidak masuk", err);
                    });
            },
            loadPayload() {
                let localPayload = JSON.parse(this.$store.getters.getDataPayload);
                this.categories = localPayload;
                console.log("categories", this.categories);
            },
            print() {
                window.print();
            },
        },
        mounted() {
            this.$store.commit("RESET_UPDATE");
            this.loadHeaderAPI();
            this.loadDokumendata();
            this.loadPayload();
        },
        computed: {

            timestamp() {
                return moment()
                    .locale("id", localization)
                    .format("LL");
            },
            created_at_date() {
                console.log("created_at", this.created_at);
                return moment(String(this.created_at))
                    .locale("id", localization)
                    .format("LL");
            },
            total_item() {
                var x;
                var y;
                var z;
                var i;
                var biaya = 0;
                var durasi = 0;
                for (x in this.categories) {
                    console.log("panjang kategori", this.categories);
                    if (this.categories[x].hasOwnProperty("list_subs")) {
                        for (y in this.categories[x]["list_subs"]) {
                            for (z in this.categories[x]["list_subs"][y]) {
                                console.log("z val", z);
                                if (z == "list_row") {
                                    for (i in this.categories[x]["list_subs"][y][z]) {
                                        console.log("list_row", i);

                                        biaya += parseInt(
                                            this.categories[x]["list_subs"][y][z][i]["biaya"]
                                        );
                                        durasi += parseInt(
                                            this.categories[x]["list_subs"][y][z][i]["durasi"]
                                        );
                                    }
                                }
                            }
                        }
                    }
                }

                return [biaya, durasi];
            },
            total_sub() {
                var x;
                var y;
                var z;
                var i;
                var biaya;
                var durasi;
                var sub_biaya = [];
                var sub_durasi = [];
                for (x in this.categories) {
                    console.log("panjang kategori", this.categories);
                    biaya = 0;
                    durasi = 0;
                    if (this.categories[x].hasOwnProperty("list_subs")) {
                        for (y in this.categories[x]["list_subs"]) {
                            for (z in this.categories[x]["list_subs"][y]) {
                                console.log("z val", z);
                                if (z == "list_row") {
                                    for (i in this.categories[x]["list_subs"][y][z]) {
                                        console.log("list_row", i);

                                        biaya += parseInt(
                                            this.categories[x]["list_subs"][y][z][i]["biaya"]
                                        );
                                        durasi += parseInt(
                                            this.categories[x]["list_subs"][y][z][i]["durasi"]
                                        );
                                    }
                                }
                            }
                        }
                    }
                    sub_biaya.push(biaya);
                    sub_durasi.push(durasi);
                }
                console.log('sub_biaya', sub_biaya);
                console.log('sub_durasi', sub_durasi);
                return [sub_biaya, sub_durasi];
            }

        }
    };

</script>

<style scoped>
    /* Styles go here */

    #pdf {
        background-color: white !important;
    }

    .page-header,
    .page-header-space {
        height: 100px;
    }

    .page-footer,
    .page-footer-space {
        height: 50px;
    }

    .page-footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        border-top: 1px solid black;
        /* for demo */
        background: yellow;
        /* for demo */
    }

    .page-header {
        position: fixed;
        top: 0mm;
        width: 100%;
        background: white;
        width: 100%;
        border-bottom: 2px solid #4a7ebb;
        margin-bottom: 10px;
    }

    .page {
        page-break-after: always;
    }

    @page {
        margin: 20mm;
    }

    @media print {
        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        button {
            display: none;
        }

        body {
            margin: 0;
        }
    }

</style>
