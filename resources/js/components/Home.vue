<template>
    <div id="home">
        <div>
            <Navi />
        </div>
        <div id="top-box">
            <div class="d-none d-lg-block">
                <img style="margin-right:10%; margin-left:20%;" id="top-img"
                    src="@/images/undraw_complete_task_u2c3.svg" alt="">
            </div>
            <v-row justify="center" style="margin-top:2%;">
                <v-col>
                    <div id="top-text1">Let's Start Create Something ...</div>
                </v-col>
                <v-col>
                    <create-file />
                </v-col>
            </v-row>
        </div>
        <v-container>
            <h6 style="margin-top:50px; margin-bottom: 20px;">Recent</h6>
            <div class="row">
                <div class="col-md-4">
                    <!-- pagination links -->
                    <nav v-cloak>
                        <ul class="pagination">
                            <li v-if="docs.prev_page_url">
                                <a @click.prevent="getUsers(docs.prev_page_url)" :href="docs.prev_page_url">
                                    <v-icon>mdi-arrow-left-bold-circle-outline</v-icon>
                                </a>
                            </li>
                            <li v-if="docs.next_page_url">
                                <a @click.prevent="getUsers(docs.next_page_url)" :href="docs.next_page_url">
                                    <v-icon>mdi-arrow-right-bold-circle-outline</v-icon>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-8 text-right">
                    Display from @{{ docs.from }} to @{{ docs.to }} of @{{ docs.total }} data.
                </div>
            </div>
            <v-card class="mx-auto my-5" color="blue lighten-4" height="80" v-for="(doc, index) in docs.data"
                v-bind:key="index">
                <v-row align="center">
                    <v-col md="9" class="ml-5">
                        <h5 small class="font-weight-bold">{{doc.offername}}</h5>
                        <h6>{{doc.created_at}}</h6>
                    </v-col>
                    <v-col md="2" d-inline>
                        <v-row>
                            <v-btn class="d-flex d-sm-none" rounded outlined>
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                            <v-btn rounded outlined class="d-none d-sm-flex">Delete</v-btn>
                            <v-btn class="d-flex d-sm-none ml-2" rounded outlined>
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                            <v-btn rounded outlined class="d-none d-sm-flex ml-2">Continue</v-btn>
                        </v-row>
                    </v-col>
                </v-row>
            </v-card>
            <nav v-cloak>
                <ul class="pagination">
                    <li v-if="docs.prev_page_url">
                        <a @click.prevent="getUsers(docs.prev_page_url)" :href="docs.prev_page_url">
                            <v-icon>mdi-arrow-left-bold-circle-outline</v-icon>
                        </a>
                    </li>
                    <li v-if="docs.next_page_url">
                        <a @click.prevent="getUsers(docs.next_page_url)" :href="docs.next_page_url">
                            <v-icon>mdi-arrow-right-bold-circle-outline</v-icon>
                        </a>
                    </li>
                </ul>
            </nav>
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

export default {
  name: "home",
  data() {
    return {
      overlay: false,
      api: {
        documentIndex: "/api/auth/data"
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
    console.log("Home is ready!");
    this.getUsers(this.api.documentIndex);
  },
  watch: {
    overlay(val) {
      val &&
        setTimeout(() => {
          this.overlay = false;
        }, 3000);
    }
  },
  methods: {
    getUsers(url) {
      this.$authAPI
        .get(url)
        .then(response => {
          this.docs = response.data;
        })
        .catch(errors => {
          console.error(errors);
        });
    }
  }
};
</script>

<style lang="scss">
#top-box {
  background-color: #f1f0ee;
  padding: 15px;
  height: 130px;
  margin-top: 5%;
}

#top-img {
  width: 10%;
  margin-left: 10%;
  float: left;
}

#top-text {
  // height: 100px;
  margin-top: 40px;
  margin-left: 10%;
  float: left;
}
</style>
