<template>
	<div >
            <!--USER ROLE-->
   <div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">    
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

        <a class="navbar-brand" href="/individuals">
          <img class="w3-bar-item ml-4" :src="logo" id="logo">
        </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="input-group">
              <input id="search" type="text" class="form-control" placeholder="Ex: One storey" aria-describedby="basic-addon2" style="border-color: #e67e00" @change="list_of_designs">
              <div class="input-group-append">
                <button class="btn" type="button" style="width:150px; background-color: #e67e00; color:#fff;" @click="list_of_designs">Search</button>
              </div>
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              <li class="nav-item">
                <a class="borderan w3-bar-item" style="color:#696969; text-decoration: none; border:1px solid #dcdcdc;border-top:hidden;border-bottom:hidden;border-right:hidden;border-left:hidden;cursor:pointer"><i class="fa fa-user-circle" style="font-size: 15px;">{{name}}
                  </i>
            
               </a>
             </li>
             <li class="nav-item">
                <a class="w3-bar-item w3-button" href="/individuals" style="color:#696969; text-decoration: none;font-weight:bold">Home
                 </a>
             </li>
              <li class="nav-item">
                <a class="w3-bar-item w3-button" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                  <router-link style="color:#696969; text-decoration: none" :to="{ name : route.path }" :key="key">
                  {{route.name}}
                  </router-link>
                </a>
              </li>
            <li class="nav-item">
              <!-- Notification -->
              <div class="dropdown" style="">
                <a class="w3-bar-itema" href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                  <i  class="w3-button far fa-envelope" style="font-size: 15px; color:#696969">
                  </i>                             
                </a>
              <span class="badge_m"></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left" style="margin-top:55px" role="menu" aria-labelledby="dropdownMenu1">
                  <label class="m-2" role="presentation">
                    <a class=" dropdown-menu-header" ><b>Message</b></a>
                  </label>
                  <div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <ul type="none" class="timeline timeline-icons timeline-sm" style="margin:10px;width:250px">
                    <li>
                    <p style="color: #444;">
                    <small class="message_notification"></small>
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
              <div class="dropdown" style="">
                <a class="w3-bar-itema" href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left;" aria-expanded="true">
                  <i  class="w3-button far fa-bell" style="font-size: 15px; color:#696969">
                     <span class="badge_user"></span>       
                  </i>  
                </a>
                <ul class="dropdown-menu dropdown-menu-right pull-left" style="margin-top:55px" role="menu" aria-labelledby="dropdownMenu1">
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
            <li class="nav-item" style="position:sticky">
              <div class="dropdown">
                <a class="w3-bar-itema" href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" aria-expanded="true">
                  <i class="fas fa-caret-down" style="font-size: 15px; color:#696969">
                  </i>
                  <!-- <i class="fas fa-caret-down" style="font-size: 15px; color:#696969"> </i> -->
                </a>
                <span class="badge1 badge-danger" style=""></span>
                <ul class="dropdown-menu dropdown-menu-right pull-left" style="margin-top:55px" aria-labelledby="dropdownMenu1">
                  <router-link :to="{name:'user.account'}">
                    <li class="m-2" style="width:200px; padding:5px; cursor:pointer">
                    <i class="fa fa-cog" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Account settings</a></i>
                    </li>
                  </router-link>
                  <router-link :to="{name:'user.profile'}">
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
  <div class="container" style="margin-top: 100px">
    <div class="card shadow-sm">
      <div class="container-fluid">
        <div class="wrapper row">
          <div class="preview col-md-6 mt-3 mb-3" v-for="file in files" v-cloak>           
            <div class="preview-pic tab-content">  
              <div class="watermarked tab-pane active" id="pic-1" style="cursor:pointer" @click="showModal(file)"><img class="img-taas" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
              <div class="watermarked tab-pane" id="pic-2" style="cursor:pointer"  @click="showModal1(file)"><img class="img-taas" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension"></div>
              <div class="watermarked tab-pane" id="pic-3" style="cursor:pointer" @click="showModal2(file)"><img class="img-taas" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
              <div class="watermarked tab-pane" id="pic-4" style="cursor:pointer" @click="showModal3(file)"><img class="img-taas" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
              <div class="watermarked tab-pane" id="pic-5" style="cursor:pointer" @click="showModal4(file)"><img class="img-taas"  style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
            </div>
            <div style="padding:10px">
              <ul class="preview-thumbnail nav nav-tabs">
                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></a></li>
                <li><a data-target="#pic-2" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension"></a></li>
                <li><a data-target="#pic-3" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></a></li>
                <li><a data-target="#pic-4" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></a></li>
                <li><a data-target="#pic-5" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></a></li>
              </ul>
            </div>
              <span class="mt-3 ">
                <h2 style="float: left">Product # {{ file.floor_plan_code }}</h2>
                <h2 class="icon fab fa-youtube-square mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer"></h2>
                <h2 class="icon fab fa-twitter-square mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer"></h2>
                <h2 class="icon fab fa-facebook-square mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer"></h2>
                <h2 class="icon fas fa-print mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer"></h2>
              </span>
            </div>   
            <div class="details col-md-6" style=" padding:10px;">
                 <div class="" v-for="file in files" v-cloak>
                    <h3 class="product-title">Title:<span>&nbsp;{{ file.name }}</span></h3>             
                    <h4 class="mt-3">Design concept</h4>
                    <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                    <p class="mt-3" style="color: black">Feel like you're in the trees in this unique layout for a scenic lot. The living arrangements are reversed, with the kitchen, dining, and living room upstairs. The master suite also resides on this level and opens out to a private balcony, so you can greet the day with fresh air and a special view. Another bedroom and bathroom on this level can be used for guests. Downstairs, a parlor can become a formal entertaining zone or a relaxed hangout for the other bedroom.</p>
                    <h4 class="price">Building estimated price:<span>&nbsp;&#8369;{{ file.price }}</span></h4>
                 </div>
            </div>        
          </div>
        </div>
      </div>

       

            <modal name="zoom-view" :width="1000" :height="600">
                <div class="watermarked_big" @click="hideModal" style="border:1px solid">
                  <img class="zoom-view"  :src="'../../storage' + '/furnitureAccessories/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.name">
                </div>           
            </modal>
            <modal name="zoom-view1" :width="1000" :height="600">
                <div class="watermarked_big" @click="hideModal1">
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension">
                </div>
            </modal>
            <modal name="zoom-view2" :width="1000" :height="600">    
                <div class="watermarked_big" @click="hideModal2">      
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                </div>            
            </modal>
            <modal name="zoom-view3" :width="1000" :height="600">
                <div class="watermarked_big" @click="hideModal3">
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                </div>
            </modal>
            <modal name="zoom-view4" :width="1000" :height="600">
                <div class="watermarked_big" @click="hideModal4">
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                </div>
            </modal>
    </div>
  </div>
</template>

<style scoped>

.watermarked {
  position: relative;
}

.watermarked:after {
  content: "";
  display: block;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0px;
  left: 0px;
  background-image: url('/image/watermark.png');
  background-size: 350px 350px;
  background-position: center;
  background-repeat: no-repeat;
  opacity: 0.5;
}

.watermarked_big {
  position: relative;
}

.watermarked_big:after {
  content: "";
  display: block;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0px;
  left: 0px;
  background-image: url('/image/watermark.png');
  background-size: 650px 650px;
  background-position: center;
  background-repeat: no-repeat;
  opacity: 0.5;
}
/*HEADER START*/

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

/*HEADER END*/
.img-ubos {
  width: 100%;
  height: 12vh;
  object-fit: cover;
}

.img-taas {
    width: 100%;
    height: 50vh;
    object-fit: cover;
}

.zoom-view {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.icon:hover {
  color: #1E90FF;
}

.cart:hover {
  color: red;
}

#btns:hover {
    background-color: #73c4bd;
  
}

.modification-quote {
    font-size: .9em;
}

.well {
    background: #f8f8f8;
    border: 1px solid #ebebeb;
    padding: 20px;
    margin: 40px 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.modification-quote .sub-header {
    font-size: 1.1em;
    font-weight: 600;
    line-height: 20px;
    margin: 0 0 2px;
}

.modification-quote .sub-header, .modification-quote p {
    float: left;
    width: 65%;
    padding-left: 20px;
}

.modification-quote p {
    margin: 0;
    line-height: 1.2;
}
.modification-quote .btn {
    float: left;
    width: 35%;
    margin-top: 1em;
}



/*-----------------------------------------------------------------------*/

p, i {
	font-size: 15px !important;

}



.stars
{
    font-size: 15px;
    color: #ddd;
    margin-left: 10px;
}   


.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; 
}
  @media screen and (max-width: 996px) {
        .preview {
          margin-bottom: 20px;
           } 
        .preview-pic {
          height: 35%;
          }
                /* Reset */
        

       span.con {
         margin-right: 15px;
         font-size: 40px;
       }
      

       span.for_red{
        font-size: 14px;

       }

    
       span.for_m{
        color: red;
       }

      a.btn {
        font-size: 13px;

      }

      span.fdf {
        margin-left: 75px;
      
      }

      span.fdg {
        margin-left: 90px;
      }

      span.fdh {
        margin-left: 35px;
      }

      span.fdj {
        margin-left: 50px;
      }

      span.fdk {
        margin-left: 50px;
      }

       span.fdl {
        margin-left: 80px;
      }

       span.fdz {
        margin-left: 100px;
      }

     }

     .con {
      font-size: 40px;
      margin-right: 30px;
     }



img {
  cursor: pointer;
}

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  	border: none;
}
.preview-thumbnail.nav-tabs li {
	width: 18%;
	margin-right: 2.5%; 
}
.preview-thumbnail.nav-tabs li img {
  	max-width: 100%;
  	display: block; 
}
.preview-thumbnail.nav-tabs li a {
 	 padding: 0;
  	 margin: 0; 
}
.preview-thumbnail.nav-tabs li:last-of-type {
 	 margin-right: 0; 
}

</style>

<script>

// import "bootstrap/dist/js/bootstrap.min.js";


export default {

  data() {
    return {
      
        files: [],
        file: [],
  
        loading: false,

 
        message: '',
        errors: {},
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Login',
              path: 'login'
            }
          ]     
        },
        logo: '../../image/logo2.png',
      }  
    },
     methods: {
        fetchFile() {
         this.loading = true;
	            axios.get('display/details_per_product/' + this.$route.params.portfolio_id).then(result => {
	                this.loading = false;
	                this.files = result.data;

	                console.log(this.files);
	          
	            }).catch(error => {
	                console.log(error);
	                this.loading = false;
	            });

        },

   
     
        anyError() {
            return Object.keys(this.errors).length > 0;
        },

        clearErrors() {
            this.errors = {};
        },

        showModal(file) {
            this.file = file;
            this.$modal.show('zoom-view');
        },
          showModal1(file) {
            this.file = file;
            this.$modal.show('zoom-view1');
        },
          showModal2(file) {
            this.file = file;
            this.$modal.show('zoom-view2');
        },
          showModal3(file) {
            this.file = file;
            this.$modal.show('zoom-view3');
        },
          showModal4(file) {
            this.file = file;
            this.$modal.show('zoom-view4');
        },
        hideModal(){
            this.$modal.hide('zoom-view');
        },
          hideModal1(){
            this.$modal.hide('zoom-view1');
        },
          hideModal2(){
            this.$modal.hide('zoom-view2');
        },
          hideModal3(){
            this.$modal.hide('zoom-view3');
        },
          hideModal4(){
            this.$modal.hide('zoom-view4');
        },

    },
    mounted() {
        
        this.fetchFile();

    },


  }

</script>
