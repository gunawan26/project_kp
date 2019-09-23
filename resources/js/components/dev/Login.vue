<template>
    <div class="login-dev">
      <div class="container">

        <form @submit.prevent="authenticate">
            <div class="form-group row">
                <label for="email">email</label>
                <input type="email" v-model="form.email" class="form-control" placeholder="email">
            </div>
            <div class="form-group row">
                <label for="password">password</label>
                <input type="password" v-model="form.password" class="form-control" placeholder="password">
            </div>

            <div class="form-group row">
                <input type="submit" value="Login">
            </div>
        </form>
      </div>
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
          this.$router.push({ path: "/" });
        })
        .catch(error => {
          this.$store.commit("loginFailed", { error });
        });
    }
  }
};
</script>

<style scoped>
</style>
