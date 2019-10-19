<template>
    <div id="home">
        <div>
            <Navi />
        </div>
        <v-container>
            <h6 style="margin-top:100px; margin-bottom: 20px;">History</h6>
            <div class="row">
                <div class="col-md-4">
                    <!-- pagination links -->
                    <div class="pagination">
                        <a v-if="docs.prev_page_url" @click.prevent="getUsers(docs.first_page_url)"
                            :href="docs.first_page_url">
                            First Page
                        </a>

                        <a v-if="docs.prev_page_url" @click.prevent="getUsers(docs.prev_page_url)"
                            :href="docs.prev_page_url">
                            &laquo; Prev
                        </a>
                        <a v-if="docs.next_page_url" @click.prevent="getUsers(docs.next_page_url)"
                            :href="docs.next_page_url">
                            Next &raquo;
                        </a>
                        <a @click.prevent="getUsers(docs.last_page_url)" :href="docs.last_page_url">
                            Last
                        </a>
                    </div>
                </div>
                <div class="col-md-8 text-right">
                    Display from {{ docs.from }} to {{ docs.to }} of {{ docs.total }} data.
                </div>
            </div>
            <v-card class="mx-auto" color="purple lighten-4" height="80" style="margin-bottom:10px;" v-for="(doc, index) in docs.data"
                v-bind:key="index">
                <v-row align="center">
                    <v-col md="9" class="ml-5">
                        <h5 small class="font-weight-bold">{{doc.offername}}</h5>
                        <h6>{{doc.created_at}}</h6>
                    </v-col>
                    <v-col md="2" d-inline>
                        <v-row>
                          <v-btn rounded outlined class="d-flex d-sm-none"><v-icon>mdi-check</v-icon></v-btn>
                          <v-btn rounded outlined class="d-none d-sm-flex" @click="printPage(doc.id)">Preview</v-btn>
                        </v-row>
                    </v-col>
                </v-row>
                <br>
            </v-card>
            <div class="pagination">
                <a v-if="docs.prev_page_url" @click.prevent="getUsers(docs.first_page_url)" :href="docs.first_page_url">
                    First Page
                </a>

                <a v-if="docs.prev_page_url" @click.prevent="getUsers(docs.prev_page_url)" :href="docs.prev_page_url">
                    &laquo; Prev
                </a>
                <a v-if="docs.next_page_url" @click.prevent="getUsers(docs.next_page_url)" :href="docs.next_page_url">
                    Next &raquo;
                </a>
                <a @click.prevent="getUsers(docs.last_page_url)" :href="docs.last_page_url">
                    Last
                </a>
            </div>
        </v-container>

        <v-overlay opacity="1" color="white" light :value="overlay">
            <v-progress-circular indeterminate size="64" color="primary"></v-progress-circular>
        </v-overlay>
    </div>
</template>

<script>
import Navi from "@/js/components/Navi.vue";
import CreateFile from "@/js/components/dialog/CreateFile.vue";
import store from "@/js/state/store";
import { openFileApi, updateFileApi } from "@/js/helpers/fileOffer";
export default {
  name: "home",
  data() {
    return {
      overlay: false,
      api: {
        documentIndex: "/api/auth/data-history"
      },
      docs: null
    };
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
    this.overlay = true;
  },
  mounted() {
    this.getUsers(this.api.documentIndex);
  },
  methods: {
    getUsers(url) {
      this.$authAPI
        .get(url)
        .then(response => {
          this.docs = response.data;
          console.log("document", this.docs);
        })
        .catch(errors => {
          console.error(errors);
        });
    },
    printPage(id) {
      openFileApi(this.$authAPI, id)
        .then(result => {
          console.log("result fetching", result.data.dataPayload);
          let payload = {
            dataFromDb: result.data.doc,
            idDoc: id,
            dataPayload: result.data.dataPayload
          };
          this.$store.dispatch("fetchDataDokumen", payload);
          this.$store.dispatch("getDataPayloadFirst", result.data.dataPayload);
          console.log("data dokumen", this.$store.getters.dataDokumen);

          this.$router.push({
            path: `/generatepdf`
          });
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  watch: {
    overlay(val) {
      val &&
        setTimeout(() => {
          this.overlay = false;
        }, 3000);
    }
  }
};
</script>
