<template>
  <li class="nav-item active">
    <a class="nav-link" :href="href">
      {{ name }}
    </a>
  </li>
</template>

<script>
export default {
  name: "LiLink",
  props: [
      'name',
      'href'
  ]
}
</script>

<style scoped>

</style>