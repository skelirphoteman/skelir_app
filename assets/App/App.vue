
<template>
  <Header />
  <Body />
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
    ),
  },
  props: [
      'compo'
  ],
}
</script>