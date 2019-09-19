<template>
    <nav id="nav-up" class="navbar">
      <a id="offer-text" class="navbar-brand mb-0 h1" href="#">Offer Apps</a>
      <ul id="ul-class" class="nav justify-content-end">
        <li><a href="#">Verification</a></li>
        <li><a href="#">Home</a></li>
      </ul>
      <ul id="ul-profile">
        <li></li>
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
    box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2), 0 3px 5px 0 rgba(0, 0, 0, 0.1);
 
  }

  #offer-text{
    margin-left: 10%;
    margin-right: 10%;
    color: #000;
  }
  
  nav ul {
    margin: 0;
    padding: 0;
    // list-style: none;
  }

  nav li {
    display: inline-block;
    background-color: red;
    text-align: center;
    margin-left: 50px;
    padding-top: 10px;
    padding-bottom:10px;
    position: relative;
    
  }

  nav ul a {
    color: #444;
    text-decoration: none !important;
    font-size: 14px;
    padding: 15px 15px 15px 15px;
  }

  nav ul li:hover {
    color: #000;
  }

  nav ul li::before {
    content: '';
    display: block;
    height: 3px;
    background-color: #117094;
    position: absolute;
    bottom: 0;
    width: 00%;
    transition: 50ms;
  }

  nav ul li:hover::before {
    width: 100%;
  }


</style>
