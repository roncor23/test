
<template>
<div>
    <div class="w3-top" v-if="$auth.check(1)">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">    
          <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <a class="navbar-brand">
                    <router-link v-if="!$auth.check()" :to="{name: 'home'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
                    <router-link  v-if="$auth.check(1)" :to="{name: 'dashboard'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>>
                </a>
                  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                        <li class="nav-item">
                          <a class="w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none">Projects</a>
                        </li>
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
                                  <i  class="fa fa-envelope-o" style="font-size: 15px; color:#696969" @click="">
                                  </i>                             
                              </a>
                              <span class="badge_m"></span>
                              <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                                  <label class="m-2" role="presentation">
                                      <a class=" dropdown-menu-header" ><b>Message</b></a>
                                  </label>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <ul type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:350px">
                                      <li>
                                          <p style="color: #444;">
                                              <small class="notification">Test</small>
                                              
                                          </p>
                                         
                                      </li>
                                       <br>
                                  </ul>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <label class="m-2" style="width:350px">
                                      <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all messages</p></a>
                                  </label>
                              </ul>
                          </div>
                        </li>
                        <li class="nav-item">
                                   <!-- Notification -->
                          <div class="dropdown" style=" padding: 8px">
                              <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                                  <i  class="fa fa-bell-o" style="font-size: 15px; color:#696969" @click="">
                                  </i>                            
                              </a>
                              <span class="badge_n" ></span>
                              <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                                  <label class="m-2" role="presentation">
                                      <a class=" dropdown-menu-header" ><b>Notifications</b></a>
                                  </label>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <ul type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:350px">
                                      <li>
                                          <p style="color: #444; letter-spacing:2px">
                                              <small class="notification"></small>
                                              
                                          </p>
                                         
                                      </li>
                                       <br>
                                  </ul>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <label class="m-2" style="width:350px">
                                      <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all notifications</p></a>
                                  </label>
                              </ul>
                          </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown" style=" padding: 8px">
                              <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                                  <i class="fa fa-user-circle" style="font-size: 15px; color:#696969" @click="">
                                  </i>
                              </a>
                              <span class="badge1 badge-danger" style=""></span>
                              <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" aria-labelledby="dropdownMenu1">
                                  <li class="m-2" style="width:250px; padding:5px; cursor:pointer"><br>
                                      <i class="fa fa-cog mb-4" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Account settings</a></i>
                                  </li>
                                  <li class="m-2" style="width:250px; padding:5px; cursor:pointer;"><br>
                                      <i class="fa fa-user mb-4" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Profile</a></i>
                                  </li>
                                  <li class="m-2" style="width:250px; padding:5px; cursor:pointer"><br>
                                      <router-link :to="{name:'reservation'}"><i class="fa fa-shopping-cart mb-4" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Reserved design</a></i></router-link>
                                  </li>
                                  <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>                         
                                  <li class="m-2" style="width:250px; padding:5px; cursor:pointer" @click.prevent="$auth.logout()"><br>
                                    <a v-if="$auth.check()">
                                      <i class="fa fa-power-off mb-4" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Logout</a></i>
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
                    <router-link v-if="!$auth.check()" :to="{name: 'home'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
                    <router-link  v-if="$auth.check(2)" :to="{name: 'dashboard'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>>
                </a>
                  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                        <li class="nav-item">
                          <a class="w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none">Projects</a>
                        </li>
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
                                  <i  class="fa fa-envelope-o" style="font-size: 15px; color:#696969" @click="">
                                  </i>                             
                              </a>
                              <span class="badge_m"></span>
                              <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                                  <label class="m-2" role="presentation">
                                      <a class=" dropdown-menu-header" ><b>Message</b></a>
                                  </label>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <ul type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:350px">
                                      <li>
                                          <p style="color: #444;">
                                              <small class="notification">Test</small>
                                              
                                          </p>
                                         
                                      </li>
                                       <br>
                                  </ul>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <label class="m-2" style="width:350px">
                                      <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all messages</p></a>
                                  </label>
                              </ul>
                          </div>
                        </li>
                        <li class="nav-item">
                                   <!-- Notification -->
                          <div class="dropdown" style=" padding: 8px">
                              <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                                  <i  class="fa fa-bell-o" style="font-size: 15px; color:#696969" @click="">
                                  </i>                            
                              </a>
                              <span class="badge_n" ></span>
                              <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                                  <label class="m-2" role="presentation">
                                      <a class=" dropdown-menu-header" ><b>Notifications</b></a>
                                  </label>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <ul type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:350px">
                                      <li>
                                          <p style="color: #444;">
                                              <small class="notification">Test</small>
                                              
                                          </p>
                                         
                                      </li>
                                       <br>
                                  </ul>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <label class="m-2" style="width:350px">
                                      <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all notifications</p></a>
                                  </label>
                              </ul>
                          </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown" style=" padding: 8px">
                              <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                                  <i class="fa fa-user-circle" style="font-size: 15px; color:#696969" @click="">
                                  </i>
                              </a>
                              <span class="badge1 badge-danger" style=""></span>
                              <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" aria-labelledby="dropdownMenu1">
                                  <li class="m-2" style="width:250px; padding:5px; cursor:pointer"><br>
                                      <i class="fa fa-cog mb-4" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Account settings</a></i>
                                  </li>
                                  <li class="m-2" style="width:250px; padding:5px; cursor:pointer;"><br>
                                      <i class="fa fa-user mb-4" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Profile</a></i>
                                  </li>
                                  <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>                         
                                  <li class="m-2" style="width:250px; padding:5px; cursor:pointer" @click.prevent="$auth.logout()"><br>
                                    <a v-if="$auth.check()">
                                      <i class="fa fa-power-off mb-4" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Logout</a></i>
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
      <div class="w3-top" v-if="$auth.check(3)">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">    
          <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <a class="navbar-brand">
                    <router-link v-if="!$auth.check()" :to="{name: 'home'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
                    <router-link  v-if="$auth.check(3)" :to="{name: 'dashboard'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>>
                </a>
                  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                        <li class="nav-item">
                          <a class="w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none">Projects</a>
                        </li>
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
                                  <i  class="fa fa-envelope-o" style="font-size: 15px; color:#696969" @click="">
                                  </i>                             
                              </a>
                              <span class="badge_m"></span>
                              <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                                  <label class="m-2" role="presentation">
                                      <a class=" dropdown-menu-header" ><b>Message</b></a>
                                  </label>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <ul type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:350px">
                                      <li>
                                          <p style="color: #444;">
                                              <small class="notification">Test</small>
                                              
                                          </p>
                                         
                                      </li>
                                       <br>
                                  </ul>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <label class="m-2" style="width:350px">
                                      <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all messages</p></a>
                                  </label>
                              </ul>
                          </div>
                        </li>
                        <li class="nav-item">
                                   <!-- Notification -->
                          <div class="dropdown" style=" padding: 8px">
                              <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                                  <i  class="fa fa-bell-o" style="font-size: 15px; color:#696969" @click="">
                                  </i>                            
                              </a>
                              <span class="badge_n" ></span>
                              <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" role="menu" aria-labelledby="dropdownMenu1">
                                  <label class="m-2" role="presentation">
                                      <a class=" dropdown-menu-header" ><b>Notifications</b></a>
                                  </label>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <ul type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:350px">
                                      <li>
                                          <p style="color: #444;">
                                              <small class="notification">Test</small>
                                              
                                          </p>
                                         
                                      </li>
                                       <br>
                                  </ul>
                                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                                  <label class="m-2" style="width:350px">
                                      <a href="#" class=" dropdown-menu-header"><p style="text-align:center">See all notifications</p></a>
                                  </label>
                              </ul>
                          </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown" style=" padding: 8px">
                              <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                                  <i class="fa fa-user-circle" style="font-size: 15px; color:#696969" @click="">
                                  </i>
                              </a>
                              <span class="badge1 badge-danger" style=""></span>
                              <ul class="dropdown-menu dropdown-menu-right pull-left mt-4" aria-labelledby="dropdownMenu1">
                                  <li class="m-2" style="width:250px; padding:5px; cursor:pointer"><br>
                                      <i class="fa fa-cog mb-4" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Account settings</a></i>
                                  </li>
                                  <li class="m-2" style="width:250px; padding:5px; cursor:pointer;"><br>
                                      <i class="fa fa-user mb-4" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Profile</a></i>
                                  </li>
                                  <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>                         
                                  <li class="m-2" style="width:250px; padding:5px; cursor:pointer" @click.prevent="$auth.logout()"><br>
                                    <a v-if="$auth.check()">
                                      <i class="fa fa-power-off mb-4" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Logout</a></i>
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
        header_img: 'image/architectural-design.jpg'
      }
    },
    methods: {

    },
    mounted() {
 
    }
  }
</script>