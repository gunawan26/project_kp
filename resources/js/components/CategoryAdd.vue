<template>

    <v-card class="pa-10 mt-10">
        <v-text-field label="Nama Kategori" v-model="category"></v-text-field>

        <v-row class="font-weight-bold">
            <v-col class="col-sm-1">No</v-col>
            <v-col class="col-sm-4">Modul</v-col>
            <v-col class="col-sm-1">Durasi</v-col>
            <v-col class="col-sm-1">Satuan</v-col>
            <v-col class="col-sm-3">Biaya</v-col>
            <v-col class="col-sm-2">Keterangan</v-col>
        </v-row>
        <div class="col-sm-12" style="border-bottom:1px solid #000"></div>

        <div v-for="(sub_cat,index) in list_subs" v-bind:key="index" @mouseover="hiddenSub=false"
            @mouseleave="hiddenSub=true">
            {{sub_cat}}
            <v-row justify="center">
                <v-col sm="11">
                    <v-text-field class="col-sm-12" v-model="sub_cat.id" clearable hint="For example, Layouting"
                        label="SubCategory"></v-text-field>
                </v-col>

                <v-col sm="1">
                    <v-btn v-on:click="deleteSub(list_subs,index)" large color="red" icon :hidden="hiddenSub">
                        <v-icon>mdi-close-circle-outline</v-icon>
                    </v-btn>
                </v-col>
            </v-row>
            <div v-for="(item,index_row) in sub_cat.list_row" v-bind:key="index_row">
                {{index_row}}
                <v-row justify="center" align="center" @mouseover="hidden=false"
                    @mouseleave="hidden=true">
                    <!-- <v-text-field class="col-sm-1" v-model="form.no[index_row]" label="No" disabled value="index_row"></v-text-field> -->
                    <v-col class="col-sm-1 mb-4">{{index_row+1}}.</v-col>
                    <v-text-field class="col-sm-4" v-model="item.modul" hint="For example, Integrasi API"
                        label="Modul"></v-text-field>
                    <v-text-field class="col-sm-1" v-model="item.durasi" hint="For example, 8"
                        label="Durasi"></v-text-field>
                    <v-text-field class="col-sm-1" v-model="item.satuan" hint="For example, Hari"
                        label="Satuan"></v-text-field>
                    <v-text-field class="col-sm-3" v-model="item.biaya" hint="For example, 4.000.000"
                        label="Biaya"></v-text-field>
                    <v-text-field class="col-sm-1" v-model="item.ket" hint="For example, "
                        label="Keterangan"></v-text-field>
                    <v-btn v-on:click="deleteItem(sub_cat,index_row)" large color="red" icon :hidden="hidden">
                        <v-icon>mdi-close-circle-outline</v-icon>
                    </v-btn>
                </v-row>
            </div>

            <div id="action-btn" class="mb-10">
                <v-btn fluid rounded color="primary" v-on:click="addSubCategory(index)">Add Sub</v-btn>
                <v-btn fluid rounded color="success" v-on:click="addRow(index)">Add Row</v-btn>
            </div>
            <hr>
        </div>


        <!-- </tbody> -->
    </v-card>

</template>


<script>
    export default {
        components: {

        },

        data: () => ({
            list_subs: [],
            hidden: true,
            hiddenSub: true

        }),
        methods: {
            addSubCategory(index) {
                console.log('Addsubcat ' + index)
                this.list_subs.push(this.sub_cat = {
                    id:"",
                    list_row: [{
                        no: "",
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
            addRow: function () {
                console.log('Addrow')
                this.sub_cat.list_row.push({ no: "",
                        modul: "",
                        durasi: "",
                        satuan: "",
                        biaya: "",
                        ket: ""})
                console.log(this.sub_cat.list_row)
            },

            deleteItem(sub_cat, index_row) {
                console.log(sub_cat.list_row)
                console.log(index_row)
                sub_cat.list_row.splice(index_row, 1)
            },

            deleteSub(list_subs, index) {
                console.log(index)
                list_subs.splice(index, 1)
            },

        },
        created() {
            this.addSubCategory(0);
        },
    }

</script>

<style>

</style>
