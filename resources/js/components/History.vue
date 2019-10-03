<template>
    <div id="home">
        <div>
            <Navi />
        </div>
        <v-container>
            <h3 style="margin-top:100px; margin-bottom: 20px;">History</h3>
            <v-card class="mx-auto" color="green lighten-4" height="120">
                <v-row align="center">
                    <v-col md="9">
                        <v-card-title small class="font-weight-bold">I'm title</v-card-title>
                        <v-card-text>I'm Category</v-card-text>
                    </v-col>
                    <v-col md="3">
                        <v-btn rounded fluid color="green lighten-1" to="/">Approve</v-btn>
                        <v-btn rounded fluid color="red lighten-1" to="/">Decline</v-btn>
                    </v-col>
                </v-row>
            </v-card>
        </v-container>
        <v-overlay opacity="1" color="white" light :value="overlay">
            <v-progress-circular indeterminate size="64" color="primary"></v-progress-circular>
        </v-overlay>
    </div>
</template>

<script>
    import Navi from "@/js/components/Navi.vue";
    import CreateFile from "@/js/components/dialog/CreateFile.vue";
    import store from "@/js/store";
    export default {
        name: "home",
        data() {
            return {
                overlay: false
            }
        },
        components: {
            Navi,
            CreateFile
        },
        computed: {
            curentUser() {
                //   return store.getters.currentUser;
                return store.state.currentUser;
            }
        },
        created() {
            this.overlay = true
        },
        watch: {
            overlay(val) {
                val && setTimeout(() => {
                    this.overlay = false
                }, 3000)
            },
        },
    };

</script>
