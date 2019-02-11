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
        //
      }
    },
    components: {
      Header,
      Footer
    }
  }
</script>

<style scoped>

   @import "https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css";
   @import "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
   @import "//fonts.googleapis.com/css?family=Oswald:300,400)";


</style>