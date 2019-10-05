<template>
    <form>
        <v-row justify="center">
            <v-dialog v-model="dialog" persistent max-width="700">
                <v-card max-width="700" class="mx-auto">
                    <v-card-title>
                        <span class="headline">Create New Admin</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" sm="6" md="12">
                                    <v-form v-model="valid">
                                        <v-text-field label="Fullname*" v-model="form.fullname"
                                            :rules="[rules.required, rules.min]"></v-text-field>
                                        <v-text-field label="Email*" v-model="form.email"
                                            :rules="[rules.required, rules.min]"
                                            type="email"></v-text-field>
                                        <v-text-field label="Password*" v-model="form.password"
                                            :rules="[rules.required, rules.min]"
                                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                            @click:append="show1 = !show1"
                                            :type="show1 ? 'text' : 'password'"></v-text-field>
                                        <v-text-field label="Password Confirmation*" v-model="form.confirmpass"
                                            :rules="[rules.required, rules.min]"
                                            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                            @click:append="show2 = !show2"
                                            :type="show2 ? 'text' : 'password'"></v-text-field>
                                    </v-form>
                                    <v-alert dense outlined type="error" transition="scale-transition" value="alert"
                                        v-model="alertCreate" :hidden="alertCreate">
                                        Cannot create new file!!!
                                    </v-alert>
                                </v-col>
                            </v-row>
                        </v-container>
                        <small>*indicates required field</small>
                    </v-card-text>
                    <v-card-actions>
                        <div class="flex-grow-1"></div>
                        <v-btn color="blue darken-1" outlined text @click="dialogClose">Close</v-btn>
                        <v-btn color="blue darken-1" outlined text :disabled="!valid" :loading="loadingSubmit">Submit
                        </v-btn>
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
            form: {
                fullname: "",
                email:"",
                password:"",
                confirmpass:""
            },
            rules: {
                required: value => !!value || "Required.",
                min: v => v.length >= 10 || "Min 10 characters"
            },
            show1: false,
            show2: false,
            password: 'Password',
            id_dokumen: 0,
            valid: "",
            loadingSubmit: false,
            alertCreate: false,
        }),
        methods: {
            dialogClose() {
                this.dialog = false;
                this.form.fullname = "";
                this.form.email = "";
                this.form.password = "";
                this.form.confirmpass = "";
                this.rules.required=true;
                this.rules.min=true;
            },
            dialogOpen() {
                this.dialog = true;
            }
        }
    };

</script>

<style>
</style>
