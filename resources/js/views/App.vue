<template>
  <div id="app">
    <v-app background-color="white">
      <router-view/>
    </v-app>
  </div>
</template>

<style>
#nav-up {
  padding: 20px;
  background: #ffffff;
}
 /* body{
   overflow: hidden;
 }

::-webkit-scrollbar { 
    display: none; 
} */
</style>

<script>
export default {
  name: "app"
};
</script>