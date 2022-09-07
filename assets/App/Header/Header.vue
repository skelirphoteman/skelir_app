<script>
import LiLink from "./Components/LiLink";
import CollapseButton from "./Components/CollapseButton";
export default {
  components: {CollapseButton, LiLink}
}
</script>

<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <CollapseButton id="navbarTogglerDemo01" />

    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

      <a class="navbar-brand" href="">SkelirTrader</a>

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <LiLink name="1" href=""/>
        <LiLink name="2" href=""/>
        <LiLink name="4" href=""/>
      </ul>
    </div>
  </nav>
</template>