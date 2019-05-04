
<template>
<div>
  <div class="w3-top" v-if="$auth.check(4)">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">    
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <a class="navbar-brand">
          <router-link  :to="{name: 'interior.dashboard'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
        </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              <li class="nav-item">
                <a href="" class="w3-bar-item w3-button" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                  <router-link style="color:#696969; text-decoration: none" :to="{ name : route.path }" :key="key">
                  {{route.name}}
                  </router-link>
                </a>
              </li>
            <li class="nav-item">
              <!-- Notification -->
              <div class="dropdown" style=" padding: 8px">
                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                  <i  class="far fa-envelope" style="font-size: 15px; color:#696969" @click="">
                  </i>                             
                </a>
              <span class="badge_m"></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                  <label class="m-2" role="presentation">
                    <a class=" dropdown-menu-header" ><b>Message</b></a>
                  </label>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <ul type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:250px">
                    <li>
                    <p style="color: #444;">
                    <small class="message_notification">Test</small>
                    </p>
                    </li>
                    <br>
                  </ul>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <label class="m-2" style="width:250px">
                    <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all messages</p></a>
                  </label>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <!-- Notification -->
              <div class="dropdown" style=" padding: 8px">
                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                  <i  class="far fa-bell" style="font-size: 15px; color:#696969" @click="reset_noti_reserved_design_per_interior">
                  </i>                            
                </a>
                <span class="badge_interior" ></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                  <label class="m-2" role="presentation">
                    <a class=" dropdown-menu-header" ><b>Notifications</b></a>
                  </label>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <div type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:250px">
                    <div>
                      <div style="color: #444;letter-spacing:2px">
                        <small class="notification"></small>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <label class="m-2" style="width:250px">
                  <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all notifications</p></a>
                  </label>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown" style=" padding: 8px">
                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                  <i id="username" class="fa fa-user-circle" style="font-size: 15px; color:#696969" @click="">
                  </i>
                </a>
                <span class="badge1 badge-danger" style=""></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" aria-labelledby="dropdownMenu1">
                  <router-link :to="{name:'interior.account'}">
                    <li class="m-2" style="width:200px; padding:5px; cursor:pointer">
                    <i class="fa fa-cog" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Account settings</a></i>
                    </li>
                  </router-link>
                  <router-link :to="{name:'interior.profile'}">
                    <li class="m-2" style="width:200px; padding:5px; cursor:pointer;">
                      <i class="fa fa-user" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Profile</a></i>
                    </li>
                </router-link>
                  <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>                         
                  <li class="m-2" style="width:200px; padding:5px; cursor:pointer" @click.prevent="$auth.logout()">
                    <a v-if="$auth.check()">
                      <i class="fa fa-power-off" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Logout</a></i>
                    </a>
                  </li>                            
                </ul>
              </div>
            </li>
            </ul>             
          </div>     
      </nav>
      </div>
    </div>
   <div class="w3-top" v-if="$auth.check(2)">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">    
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <a class="navbar-brand">
          <router-link  :to="{name: 'admin.dashboard'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
        </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              <li class="nav-item">
                <a href="" class="w3-bar-item w3-button" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                  <router-link style="color:#696969; text-decoration: none" :to="{ name : route.path }" :key="key">
                  {{route.name}}
                  </router-link>
                </a>
              </li>
            <li class="nav-item">
              <!-- Notification -->
              <div class="dropdown" style=" padding: 8px">
                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                  <i  class="far fa-envelope" style="font-size: 15px; color:#696969" @click="">
                  </i>                             
                </a>
              <span class="badge_m"></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                  <label class="m-2" role="presentation">
                    <a class=" dropdown-menu-header" ><b>Message</b></a>
                  </label>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <ul type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:250px">
                    <li>
                    <p style="color: #444;">
                    <small class="message_notification">Test</small>
                    </p>
                    </li>
                    <br>
                  </ul>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <label class="m-2" style="width:250px">
                    <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all messages</p></a>
                  </label>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <!-- Notification -->
              <div class="dropdown" style=" padding: 8px">
                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                  <i  class="far fa-bell" style="font-size: 15px; color:#696969" @click="reset_noti_reserved_design_per_interior">
                  </i>                            
                </a>
                <span class="badge_interior" ></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                  <label class="m-2" role="presentation">
                    <a class=" dropdown-menu-header" ><b>Notifications</b></a>
                  </label>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <div type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:250px">
                    <div>
                      <div style="color: #444;letter-spacing:2px">
                        <small class="notification"></small>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <label class="m-2" style="width:250px">
                  <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all notifications</p></a>
                  </label>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown" style=" padding: 8px">
                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                  <i id="username" class="fa fa-user-circle" style="font-size: 15px; color:#696969" @click="">
                  </i>
                </a>
                <span class="badge1 badge-danger" style=""></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" aria-labelledby="dropdownMenu1">
                  <router-link :to="{name:'interior.account'}">
                    <li class="m-2" style="width:200px; padding:5px; cursor:pointer">
                    <i class="fa fa-cog" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Account settings</a></i>
                    </li>
                  </router-link>
                  <router-link :to="{name:'interior.profile'}">
                    <li class="m-2" style="width:200px; padding:5px; cursor:pointer;">
                      <i class="fa fa-user" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Profile</a></i>
                    </li>
                </router-link>
                  <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>                         
                  <li class="m-2" style="width:200px; padding:5px; cursor:pointer" @click.prevent="$auth.logout()">
                    <a v-if="$auth.check()">
                      <i class="fa fa-power-off" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Logout</a></i>
                    </a>
                  </li>                            
                </ul>
              </div>
            </li>
            </ul>             
          </div>     
      </nav>
      </div>
    </div>
   <div class="w3-top" v-if="$auth.check(1)">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">    
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <a class="navbar-brand">
          <router-link  :to="{name: 'user.dashboard'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
        </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              <li class="nav-item">
                <a class="w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none"><router-link  style="color:#696969;text-decoration:none" :to="{name: 'user.dashboard'}">Home</router-link>
                 </a>
                <a class="w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none">Collections</a>
                <a href="" class="w3-bar-item w3-button" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                  <router-link style="color:#696969; text-decoration: none" :to="{ name : route.path }" :key="key">
                  {{route.name}}
                  </router-link>
                </a>
              </li>
            <li class="nav-item">
              <!-- Notification -->
              <div class="dropdown" style=" padding: 8px">
                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                  <i  class="far fa-envelope" style="font-size: 15px; color:#696969" @click="">
                  </i>                             
                </a>
              <span class="badge_m"></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                  <label class="m-2" role="presentation">
                    <a class=" dropdown-menu-header" ><b>Message</b></a>
                  </label>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <ul type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:250px">
                    <li>
                    <p style="color: #444;">
                    <small class="message_notification">Test</small>
                    </p>
                    </li>
                    <br>
                  </ul>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <label class="m-2" style="width:250px">
                    <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all messages</p></a>
                  </label>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <!-- Notification -->
              <div class="dropdown" style=" padding: 8px">
                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                  <i  class="far fa-bell" style="font-size: 15px; color:#696969" @click="reset_noti_reserved_design_per_interior">
                  </i>                            
                </a>
                <span class="badge_interior" ></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                  <label class="m-2" role="presentation">
                    <a class=" dropdown-menu-header" ><b>Notifications</b></a>
                  </label>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <div type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:250px">
                    <div>
                      <div style="color: #444;letter-spacing:2px">
                        <small class="notification"></small>
                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <label class="m-2" style="width:250px">
                  <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all notifications</p></a>
                  </label>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown" style=" padding: 8px">
                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                  <i id="username" class="fa fa-user-circle" style="font-size: 15px; color:#696969" @click="">
                  </i>
                </a>
                <span class="badge1 badge-danger" style=""></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" aria-labelledby="dropdownMenu1">
                  <router-link :to="{name:'interior.account'}">
                    <li class="m-2" style="width:200px; padding:5px; cursor:pointer">
                    <i class="fa fa-cog" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Account settings</a></i>
                    </li>
                  </router-link>
                  <router-link :to="{name:'interior.profile'}">
                    <li class="m-2" style="width:200px; padding:5px; cursor:pointer;">
                      <i class="fa fa-user" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Profile</a></i>
                    </li>
                </router-link>
                  <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>                         
                  <li class="m-2" style="width:200px; padding:5px; cursor:pointer" @click.prevent="$auth.logout()">
                    <a v-if="$auth.check()">
                      <i class="fa fa-power-off" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Logout</a></i>
                    </a>
                  </li>                            
                </ul>
              </div>
            </li>
            </ul>             
          </div>     
      </nav>
      </div>
    </div>
  </div>
</template>

<style scoped>

.badge_m {
    border-radius: .20rem;
    background-color:#dc3545;
    color: #fff;
    text-align: center;
    font-size: 14px;
}

.badge_n {
    border-radius: .20rem;
    background-color:#dc3545;
    color: #fff;
    text-align: center;
    font-size: 14px;
}

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
    background-color: #E6E6FA!important;
}

.dropdown-menu li:hover {
   color: #000!important;
    background-color: #E6E6FA!important;
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


.w3-card, .w3-card-2 {
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
}

.w3-right {
	float: right;
}



.w3-bar {
    width: auto;

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
              name: 'Login',
              path: 'login'
            }
          ],
          unlogged1: [
            {
              name: 'Register',
              path: 'register'
            }
          ]      
        },

        logo: 'image/logo2.png',
        logo: '../../image/logo2.png',
        logo: '../../../image/logo2.png',
        header_img: 'image/architectural-design.jpg'
      }
    },
    methods: {


      reset_noti_reserved_design_per_users() {

        axios.get('notification/reset_noti_reserved_design_per_user/').then(result => {


              }).catch(error => {
                  console.log(error);
              });
      },



      reset_noti_reserved_design_per_admin() {

        axios.get('notification/reset_noti_reserved_design_per_admin/').then(result => {


              }).catch(error => {
                  console.log(error);
              });
      },
      reset_noti_reserved_design_per_interior() {

        axios.get('notification/reset_noti_reserved_design_per_interior/').then(result => {


              }).catch(error => {
                  console.log(error);
              });
      },
    },
    mounted() {

   
    }
  }
</script>