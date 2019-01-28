<template>
    <div id="main">
        <header id="header">
            <!-- <h1>
                <router-link :to="{name: 'home'}">
                    Laravel Vue SPA
                </router-link>
            </h1> -->
            <Header></Header>
        </header>
        <div id="content">
            <router-view></router-view>          
        </div>
    </div>
</template>
<script>
  import Header from './components/Header.vue'

  export default {
    data() {
      return {
        //
      }
    },
    components: {
      Header
    }
  }
</script>

<style>

</style>