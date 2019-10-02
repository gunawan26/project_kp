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

        <div v-for="(sub_cat,index) in list_subs" v-bind:key="index">
            <v-row>
                <v-text-field class="col-sm-12" v-model="subCat[index]" label="SubCategory"></v-text-field>
            </v-row>
            <div v-for="(modul,index_row) in sub_cat.list_row" v-bind:key="index_row" v-on:remove="deleteItem()"
                >
                <v-row justify="center" align="center" v-model="modul.id" @mouseover="hidden=false" @mouseleave="hidden=true">
                    <!-- <v-text-field class="col-sm-1" v-model="form.no[index_row]" label="No" disabled value="index_row"></v-text-field> -->
                    <v-col class="col-sm-1 mb-4">{{index_row+1}}.</v-col>
                    <v-text-field class="col-sm-4" v-model="form.modul[index_row]" label="Modul"></v-text-field>
                    <v-text-field class="col-sm-1" v-model="form.durasi[index_row]" label="Durasi"></v-text-field>
                    <v-text-field class="col-sm-1" v-model="form.satuan[index_row]" label="Satuan"></v-text-field>
                    <v-text-field class="col-sm-3" v-model="form.biaya[index_row]" label="Biaya"></v-text-field>
                    <v-text-field class="col-sm-1" v-model="form.ket[index_row]" label="Keterangan"></v-text-field>
                    <v-btn class="col-sm-1"  v-on:click="deleteItem(sub_cat,index_row)" tile large color="red" icon :hidden="hidden">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-row>
            </div>

            <div id="action-btn" class="mb-10">
                <v-btn fluid color="primary" v-on:click="addSubCategory">Add Sub</v-btn>
                <v-btn fluid color="success" v-on:click="addRow(index)">Add Row</v-btn>
            </div>
        </div>

        <!-- </tbody> -->
    </v-card>

</template>


<script>
    export default {
        components: {

        },

        data: () => ({

            list_category: [],
            list_subs: [],
            row: '',
            form: {
                no: "",
                modul: "",
                durasi: "",
                satuan: "",
                biaya: "",
                ket: ""

            },
            subCat: "",
            category: "",
            hidden: true
            

        }),
        methods: {

            addSubCategory() {
                console.log('Addrow')
                // this.sub.push({
                //     judul:"dummy",
                // })
                // this.sub.row.push()
                this.list_subs.push(this.sub_cat = {
                    id: '1',
                    judul: 'wewewewe',
                    list_row: [{
                        judul: 'sdsd'
                    }]
                })
                console.log(this.list_subs[0])
                // this.list_subs[0].list_row.push("im here")
            },
            addRow: function (index) {
                console.log('Addrow')
                this.list_subs[index].list_row.push('sss')
                console.log(this.row)
            },

            deleteItem(sub_cat,index_row){
                console.log(sub_cat.list_row)
                console.log(index_row)
                sub_cat.list_row.splice(index_row, 1)
            }


        },
        created() {
            this.addSubCategory();
        },
    }

</script>

<style>

</style>
