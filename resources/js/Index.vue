<template>
    <div id="main">
        <header id="header">
            <Header></Header>
        </header>
        <v-app id="content" style="background-color:#fff">
            <router-view></router-view>          
        </v-app>
        <footer>
            <Footer></Footer>
        </footer>
    </div>
</template>
<script>
  import Header from './components/Header.vue'
  import Footer from './components/Footer.vue'


  export default {
    data() {
      return {
        users: [],
      }
    },                
    components: {
      Header,
      Footer
    },
    methods: {

    },
    mounted() {

    }
  }
</script>

<style scoped>


   @import "https://use.fontawesome.com/releases/v5.8.1/css/all.css";

/*   @import "https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons";*/
  /* @import "https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css";*/
  /*   @import "https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css";*/
</style>