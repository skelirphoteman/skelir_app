<template>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#{{ id }}" aria-controls="{{ id }}" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</template>

<script>
export default {
  name: "CollapseButton",
  props: [
      'id'
  ]
}
</script>

<style scoped>

</style>