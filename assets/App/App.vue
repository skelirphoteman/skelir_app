
<template>
  <Header />
  <div class="container">
    <div class="row">
      <div class="col-3">
      </div>
      <div class="col-8">
        <Body />
      </div>
    </div>
  </div>
</template>

<script>
import {defineAsyncComponent} from "vue";
const $ = require('jquery');

import Header from "./Header/Header";

export default {
  components: {
    Header,
    Body: defineAsyncComponent(() =>
        import('./Pages/'+ window.mainComponent+ '.vue')
    )
  },
  props: [
      'compo'
  ],
}
</script>