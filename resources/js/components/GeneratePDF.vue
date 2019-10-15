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
            
            <!-- <button type="button" onClick="window.print()" style="background: pink">
                PRINT ME!
            </button> -->
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
                                            <span>Denpasar, {{created_at}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom: 5px; width:10%;">
                                            <span>Nomor</span>
                                        </td>
                                        <td style="padding-bottom: 5px;">
                                            <span>: {{doc.number}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom: 5px; width:10%;">
                                            <span>Lampiran</span>
                                        </td>
                                        <td style="padding-bottom: 5px;">
                                            <span>: {{doc.attachmentname}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding-top:20px; padding-bottom: 5px;">
                                            <span>Yth. {{doc.customername}}</span>
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
                                            <span>: {{doc.subject}}</span>
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
                                                {{doc.discussion_date}}, yang bertempat di {{doc.discussion_loc}},
                                                dengan ini kami mengajukan penawaran untuk pekerjaan {{doc.subject}}
                                                sebesar Rp. {{doc.offerprice}},- ([Lima Puluh Satu
                                                Juta
                                                Delapan
                                                Ratus Ribu Rupiah]).</p>
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
                                                {{doc.duration}} ([Seratus Sembilan Belas]) hari kerja.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Penawaran ini berlaku selama {{doc.offerduetime}} ([tiga puluh]) hari
                                                kalender sejak
                                                tanggal
                                                surat penawaran ini.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Surat Penawaran beserta lampirannya kami sampaikan sebanyak
                                                {{doc.attachmentname}} ([satu])
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
                                        <span>Yth.{{doc.customername}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <span>perihal: {{doc.subject}}</span>
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
                                            <tbody style="border: 1px solid #000;">
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
                                                        style="width: 20%;  border: 1px solid #000; padding: 5px 5px 1px; ">
                                                        {{item.biaya}}
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
                                <br>
                            </div>
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
        <v-btn
                color="pink"
                dark
                large
                fixed
                bottom
                right
                fab

                @click="print"
              >
                <v-icon>mdi-printer</v-icon>
              </v-btn>
    </div>
</template>

<script>
    import {
        loadHeaderdata
    } from "@/js/helpers/headerFile";
    import * as moment from 'moment';
    import localization from 'moment/locale/id'
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
                doc: {
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
                },
                categories: []
            }
        },
        methods: {
            loadDokumendata() {
                let data = this.$store.getters.getDocumentData;
                this.doc.number = data.number;
                this.doc.attachmentname = data.attachmentname;
                this.doc.customername = data.customername;
                this.doc.subject = data.subject;
                this.doc.discussion_date = data.discussion_date;
                this.doc.discussion_loc = data.discussion_loc;
                this.doc.offerprice = data.offerprice;
                this.doc.duration = data.duration;
                this.doc.offerduetime = data.offerduetime;
                this.doc.created_at = data.created_at;
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
            print(){
                window.print();
            }
        },
        mounted() {
            this.$store.commit("RESET_UPDATE")
            this.loadHeaderAPI();
            this.loadDokumendata();
            this.loadPayload();
        }, computed:{
            timestamp(){
                return moment().locale("id", localization).format('LL')
            },
            created_at(){
                return moment(String(this.doc.created_at)).locale("id", localization).format('LL')
            }
        }
    }

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
        margin: 20mm
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
