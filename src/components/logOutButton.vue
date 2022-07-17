<template>
    <router-link to="/" @click="logout"><button> Déconnecter</button></router-link>
</template>
<script>
import cookie from 'vue-cookies'

export default {
  name: 'logOutButton',
  methods: {
    logout () {
      cookie.remove('id')
      cookie.remove('idV')
    }
  }
}
</script>

<style scoped>
button {
    border: 1px solid rgb(219, 138, 222, .715);
    padding: 10%;
    color: rgba(219, 138, 222);
    background: transparent;
}
button:focus{
    outline: none;
}
</style>
