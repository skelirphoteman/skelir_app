<template>
  bonjour {{ form }}
</template>

<script>

let test = window.datas['bonjours'];

export default {
  name: "Create",
  computed : {
    form: {
      get() {
        window.datas['bonjours']
      }
    },
  }
}
</script>

<style scoped>

</style>