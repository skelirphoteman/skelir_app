<script>
import LiLink from "./Components/LiLink";
import CollapseButton from "./Components/CollapseButton";

import jsonRoutesMenu from "./../Routes/menu.json";


export default {
  components: {CollapseButton, LiLink},
  data () {
    return {
      links: jsonRoutesMenu
    }
  }
}
</script>

<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <CollapseButton id="navbarTogglerDemo01" />

    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

      <a class="navbar-brand" href="">SkelirTrader</a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <LiLink name="Home" :href="links['menu_home'].path"/>
        <LiLink name="Crypto Currency" :href="links['menu_crypto_currency'].path"/>
      </ul>
    </div>
  </nav>
</template>