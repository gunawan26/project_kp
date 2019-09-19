<template>
    <nav id="nav-up" class="navbar">
      <a class="navbar-brand mb-0 h1" href="#">Offer Apps</a>
      <ul id="ul-class" class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
    </nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>


<style lang="scss">
  @import url("https://fonts.googleapis.com/css?family=Work+Sans:400,600");

  #nav-up{
    background-color: #ffffff; 
  }
  
  nav ul {
    margin: 0;
    padding: 0;
    // list-style: none;
  }

nav li {
  display: inline-block;
  background-color: red;
  margin-left: 100px;
  padding-top: 23px;
  padding-bottom:23px;
  position: relative;
}

nav ul a {
  color: #444;
  text-decoration: none;
  font-size: 14px;
}

nav ul a:hover {
  color: #000;
}

nav ul a::before {
  content: '';
  display: block;
  height: 5px;
  background-color: #444;
  position: absolute;
  bottom: 0;
  width: 100%;
  transition: 500ms;
}

nav ul a:hover::before {
  width: 60%;
}
</style>
