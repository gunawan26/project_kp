<template>
    <div id="login">
         <v-card
            max-width="70%"
            max-height="100%"
            class="justify-center mx-auto"
        >
            <v-row
            class="py-4 pl-4"
            align="center"
            justify="center"
            >
            <v-col class="shrink">
                <v-img
                height="570"
                width="500"
                src="https://cdn.vuetifyjs.com/images/cards/store.jpg"
                ></v-img>
            </v-col>
            <v-col class="text-center">
                <v-container class="pa-1">
                    <v-card-text>
                        <v-form
                            ref="form"
                            v-model="valid"
                            lazy-validation
                        >
                            <v-text-field
                            v-model="email"

                            :rules="emailRules"
                            label="Email"
                            required
                            ></v-text-field>

                            <v-text-field
                            v-model="password"
                            :rules="passwordRules"
                            label="Password"
                            type="password"
                            required
                            ></v-text-field>

                            <v-btn
                            color="success"
                            class="mr-4"
                            @click="authenticate"
                            >
                            Login
                            </v-btn>
                        </v-form>
                    </v-card-text>
                </v-container>
            </v-col>
            </v-row>
        </v-card>
    </div>
</template>

<script>
import { login } from "@/js/helpers/auth";
export default {
  name: "login",
  data() {
    return {
      form: {
        email: "",
        password: ""
      },
      error: null
    };
  },
  methods: {
    authenticate() {
      this.$store.dispatch("login");
      login(this.$data.form)
        .then(res => {
          this.$store.commit("loginSuccess", res);
          this.$router.push({ path: "/home" });
        })
        .catch(error => {
          this.$store.commit("loginFailed", { error });
        });
    }, 
  }
};
</script>