<template>
    <div id="home">
        <div>
            <Navi />
        </div>
        <v-container>
            <h6 style="margin-top:100px; margin-bottom: 20px;">Recent</h6>
            <v-card class="mx-auto" color="green lighten-4" height="80">
                <v-row align="center">
                    <v-col md="9" class="ml-5">
                        <h5 small class="font-weight-bold">I'm title</h5>
                        <h6>I'm Category</h6>
                    </v-col>
                    <v-col md="2" d-inline>
                        <v-row>
                          <v-btn rounded fluid color="green lighten-1" class="d-flex d-sm-none"><v-icon>mdi-check</v-icon></v-btn>
                          <v-btn rounded fluid color="green lighten-1" class="d-none d-sm-flex">Approve</v-btn>
                          <v-btn rounded fluid color="red lighten-1" class="d-flex d-sm-none ml-2"><v-icon>mdi-close</v-icon></v-btn>
                          <v-btn rounded fluid color="red lighten-1" class="d-none d-sm-flex ml-2">Decline</v-btn>
                        </v-row>
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
import store from "@/js/state/store";
export default {
  name: "home",
  data() {
    return {
      overlay: false
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
