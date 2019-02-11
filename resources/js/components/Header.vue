
<template>
      <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
           <router-link v-if="
           !$auth.check()" :to="{name: 'home'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
           <router-link v-if="$auth.check(1)" :to="{name: 'dashboard'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
           <router-link v-if="$auth.check(2)" :to="{name: 'admin.dashboard'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
           <router-link v-if="$auth.check(3)" :to="{name: 'super_admin.dashboard'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
          <!-- Float links to the right. Hide them on small screens -->
          <div class="w3-right w3-hide-small">
            <a href="#projects" class="w3-bar-item w3-button" style="color:#696969">Projects</a>
            <a href="#about" class="w3-bar-item w3-button" style="color:#696969">About</a>
                <!--UNLOGGED-->
            <a href="#contact" class="w3-bar-item w3-button" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
            <router-link style="color:#696969; text-decoration: none" :to="{ name : route.path }" :key="key">
                        {{route.name}}
                </router-link>
           </a>
             <!--LOGGED USER-->
           <a  href="#contact" class="w3-bar-item w3-button" v-if="$auth.check(1)" v-for="(route, key) in routes.user" v-bind:key="route.path">
            <router-link  style="color:#696969; text-decoration: none" :to="{ name : route.path }" :key="key">
                        {{route.name}}
                </router-link>
           </a>
             <!--LOGOUT-->
           <a href="#contact" class="w3-bar-item w3-button" v-if="$auth.check()">
            <a href="#" @click.prevent="$auth.logout()" style="color:#696969; text-decoration: none">Logout</a>
           </a>
          </div>
        </div>
     </div>
</template>

<style scoped>

.w3-top {
    top: 0;
}

.w3-top, .w3-bottom {
    position: fixed;
    width: 100%;
    z-index: 1;
}

.w3-button:hover {
    color: #000!important;
    background-color: #ccc!important;
}

.w3-bar .w3-button {
    white-space: normal;
}


.w3-bar .w3-bar-item {
    padding: 8px 16px;
    float: left;
    width: auto;
    border: none;
    display: block;
    outline: 0;
    text-decoration: none;

}

.w3-white, .w3-hover-white:hover {
	color: #000!important;
	background-color: #fff!important;
}

.w3-padding {
    padding: 8px 16px!important;
}

.w3-card, .w3-card-2 {
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
}

.w3-right {
	float: right;
}



.w3-bar {
    width: auto;
    overflow: hidden;
}

.w3-wide {
    letter-spacing: 4px;
}

*, *:before, *:after {
    box-sizing: inherit;
}

div {
    display: block;
}

#logo {
	height: 60px;
	width: 120px;
}



@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  .w3-bar-items {
  	visibility: hidden;
  }
}

</style>

<script>



  export default {
    data() {
      return {
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Register',
              path: 'register'
            },
            {
              name: 'Login',
              path: 'login'
            }
          ]     
        },
        logo: 'image/logo2.png',
        header_img: 'image/architectural-design.jpg'
      }
    },
    mounted() {
      //
    }
  }
</script>