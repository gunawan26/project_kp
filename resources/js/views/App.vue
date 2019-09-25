<template>
  <div id="app">
    <v-app>
    <router-view/>
      </v-app>
  </div>
</template>

<style lang="scss" scoped>
#nav-up {
  padding: 20px;
  background: #ffffff;
}
</style>

<script>
export default {
  name: "app"
};
</script>