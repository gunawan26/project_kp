<template>
    <v-app-bar
        fixed
        collapse:true>
 
          <v-toolbar-title class="ml-5">OfferApps</v-toolbar-title>

      <div class="flex-grow-1"></div>

      <v-toolbar-items>
        <v-btn text class="d-flex d-sm-none" to="/history" style="text-decoration:none;"><v-icon>mdi-check-box-multiple-outline</v-icon></v-btn>
        <v-btn text class="d-none d-sm-flex no-text-transform" to="/history" style="text-decoration:none;"><v-icon>mdi-check-box-multiple-outline</v-icon>History</v-btn>
        <v-btn text class="d-flex d-sm-none" to="/" style="text-decoration:none;"><v-icon>mdi-home</v-icon></v-btn>
        <v-btn text class="d-none d-sm-flex" to="/" style="text-decoration:none;"><v-icon>mdi-home</v-icon>Home</v-btn>
        <v-menu
          open-on-hover
          offset-y
        >
          <template v-slot:activator="{ on }">
            <v-btn
              text
              v-on="on"
            ><v-icon color="black">mdi-account-circle</v-icon>{{currentUser}}
            </v-btn>
          </template>
          <v-list>
            <v-list-item @click="createAdmin">
              <v-list-item-title><v-icon>mdi-account-plus</v-icon>Create User</v-list-item-title>
            </v-list-item>
            <v-list-item @click="account">
              <v-list-item-title><v-icon>mdi-account</v-icon>Profile</v-list-item-title>
            </v-list-item>
            <v-list-item  @click="logout">
              <v-list-item-title><v-icon>mdi-logout-variant</v-icon>Logout</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-toolbar-items>
      <CreateAdmin ref="AdminComponent"/>   
      <AccountEdit ref="AccountComponent"/> 
    </v-app-bar>
   
</template>

<script>
import store from "@/js/state/store";
import { setTimeout } from "timers";
import CreateAdmin from "@/js/components/dialog/CreateAdmin.vue";
import AccountEdit from "@/js/components/dialog/AccountEdit.vue";
import { logout } from "@/js/helpers/auth";
export default {
  name: "navi",
  data() {
    return {
      overlay: false
    };
  },
  components: {
    CreateAdmin,
    AccountEdit
  },
  mounted() {
    console.log("Component mounted.");
  },
  computed: {
    currentUser() {
      return store.getters.get_user_name;
    }
  },
  methods: {
    logout() {
      logout(this.$authAPI)
        .then(result => {
          console.log("logout");
          this.$store.dispatch("authFailed");
          this.$router.push({
            path: "/login"
          });
        })
        .catch(err => {});
    },

    createAdmin() {
      console.log("create Admin");
      this.$refs.AdminComponent.dialogOpen();
    },
    account() {
      console.log("profile");
      this.$refs.AccountComponent.dialogOpen();
    }
  }
};
</script>


<style lang="scss">
#navbarSupportedContent {
  margin-right: 10%;
}

.navbar-brand {
  margin-left: 10%;
}

#li-item {
  margin-right: 20%;
}
</style>
