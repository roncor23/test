<template>
    <div> 
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
                <a class="borderan w3-bar-item" style="color:#696969; text-decoration: none; border:1px solid #dcdcdc;border-top:hidden;border-bottom:hidden;border-right:hidden;border-left:hidden;cursor:pointer"><i id="username" class="fa fa-user-circle" style="font-size: 15px;">
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
                  <a href="user/account">
                    <li class="m-2" style="width:200px; padding:5px; cursor:pointer">
                    <i class="fa fa-cog" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Account settings</a></i>
                    </li>
                  </a>
                  <a href="user/profile">
                    <li class="m-2" style="width:200px; padding:5px; cursor:pointer;">
                      <i class="fa fa-user" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Profile</a></i>
                    </li>
                </a>
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
    <div v-show="main" class="container">  
        <div id="building"></div>
         <!-- Content Header-->
       <hr class="hr-text" style="margin-top: 100px" data-content="Commercial Collections">
      <div class="container">
        <div class="justify-content-center align-items-center row">
          <div class="col-lg-4 mb-4">
                 <div class="card">
                        <a class="collection-card" href="/commercial/architectural-list">   
                          <span>
                            <img class="card-img-top" :src="architectural_selection">
                          </span>
                          <div class="collection-name-container">
                            <p>Architectural Designs</p>
                          </div>
                        </a>
                  </div>
         </div>
          <div class="col-lg-4 mb-4">           
              <div class="card">
                    <a class="collection-card" href="/commercial/interior-list">   
                      <span>
                        <img class="card-img-top" :src="interior_selection">
                      </span>
                      <div class="collection-name-container">
                        <p>Interior Designs</p>
                      </div>
                    </a>
              </div>
          </div>    
        </div>
      </div>
  </div>
  <div v-show="list_of_all_designs_page" class="container" style="margin-top:50px">
                   <!-- Content Header-->
          <div  class="loading column is-4 is-offset-4 justify-content-center align-items-center row mt-4" v-if="loading" v-cloak>
            <i class="fa fa-cog fa-spin fa-3x fa-fw margin-bottom"></i>
            <span class="sr-only">Loading...</span>
          </div> 

        <hr id="building" class="hr-text" data-content="Building Designs" style="margin-top:50px">

          <div class="tab-content" style="margin-top:50px">
            <div role="tabpanel" class="tab-pane active" id="houses" >
              <div class="row mt-3 mb-5" >                         
              <div class="col-lg-4 col-md-6 mb-4" v-for="list_of_building in list_of_buildings" v-cloak>
                <div class="card">
                  <span style="cursor: pointer;">
                     <router-link :to="{ name: 'user.portfolio_byDesign_s', params: { portfolio_id: list_of_building.id } }"><img class="card-img-top"  :src="'../storage' + '/portfolio/main_pic/' + list_of_building.user_name + '_' + list_of_building.user_id + '/' + list_of_building.type + '/' + list_of_building.floor_plan_code + '.' + list_of_building.extension" :alt="list_of_building.id"></router-link>
                  </span>     
                  <div class="card-body">
                    <h6 class="card-title">
                      <a href="#"><b style="color:black">{{ list_of_building.name }}</b></a>
                    </h6>
                    <h6>
                      <a>Design #:&nbsp;&nbsp;{{ list_of_building.floor_plan_code }}</a>
                    </h6>
                  </div>
                </div>
              </div>
              </div>                                     
            </div><!-- end sa houses TAB
          </div>

          <!-- Pagination start -->
           <nav   v-if="pagination.last_page > 1" v-cloak>
              <ul class="pagination justify-content-center align-items-center row">
                <li class="page-item disable pagination.current_page <= 1">
                  <a class="page-link" @click.prevent="changePage(pagination.current_page - 1)">Previous</a>
                </li>
                <li v-for="page in pages">
                    <a class="page-link" :class="isCurrentPage(page) ? 'is-current' : ''" @click.prevent="changePage(page)">
                        {{ page }}
                    </a>
                </li>
                <li class="page-item disable pagination.current_page >= pagination.last_page">
                  <a class="page-link " @click.prevent="changePage(pagination.current_page + 1)">NextPage</a>
                </li>
              </ul>
            </nav>
    <!-- Pagination End -->
          </div>
      </div>
</div>
</template>


<style scoped>
.card:hover {
  box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11), 0 5px 15px 0 rgba(0,0,0,0.08);
}
  /* responsive ni nga image */
.card-img-top {
  width: 100%;
  height: 15vw;
  object-fit: cover;
}

.d-block {
   width: 100%;
  height: 30vw;
}

@media screen and (min-width: 320px) {
    .card-img-top {
    width: 100%;
    height: 50vw;
    object-fit: cover;
    }

    
}

@media screen and (min-width: 375px) {
    .card-img-top {
    width: 100%;
    height: 50vw;
    object-fit: cover;
    }

    
}

@media screen and (min-width: 768px) {
    .card-img-top {
    width: 100%;
    height: 40vw;
    object-fit: cover;
    }

    
}



@media screen and (min-width: 1024px) {
    .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
    }


    
}

@media screen and (min-width: 2652px) {
    .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
    }

    
}


/*LIST OF DESIGN*/

.col-xs-4 {
  float: left;
}

.col-xs-4 {
    position: relative;
    min-height: 1px;

}
.collection-card img {
    height: 200px;
}

.collection-card .collection-name-container {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: #494949;
    background: rgba(51,51,51,.5);
    padding: 5px 10px;
    border: 1px solid;
}
.collection-card .collection-name-container p {
    color: #fff;
    font-size: 1.5em;
    font-weight: 400;
    line-height: 1.3;
    margin: 0;
    text-shadow: 2px 1px 0 #000;
    text-align: center;
}
/*LIST OF DESIGN END*/


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
    color: #e67e00!important;
}


.dropdown-menu li:hover {
   color: #000!important;
    background-color: #E6E6FA!important;
}


.w3-bar .w3-button {
    white-space: normal;
}


.w3-bar .w3-bar-item {
    padding: 2px 14px;
    float: left;
    width: auto;
    border: none;
    display: block;
    outline: 0;
    text-decoration: none;

}

.w3-bar .w3-bar-itema {
    padding: 2px 10px;
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
  width: 120px;
}



@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  .w3-bar-items {
    visibility: hidden;
  }
}

/*HEADER END*/

/* hr center text */
.hr-text {
  line-height: 1em;
  position: relative;
  outline: 0;
  border: 0;
  color: black;
  text-align: center;
  height: 1.5em;
  opacity: .5;
  font-size:2rem;
  
}

.hr-text:before {
  content: '';
  background: linear-gradient(to right, transparent, #818078, transparent);
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  height: 1px;
}
.hr-text:after {
  content: attr(data-content);
  position: relative;
  display: inline-block;
  color: black;
  padding: 0 .5em;
  line-height: 1.5em;
  color: #818078;
  background-color: #F5F8FA;
}

/*Header*/
.w3-content {
    max-width: 980px;
}
.w3-content, .w3-auto {
    margin-left: auto;
    margin-right: auto;
}
.w3-tooltip, .w3-display-container {
    position: relative;
}
.w3-wide {
    letter-spacing: 4px;
}
.w3-image {
    max-width: 100%;
    height: auto;
    margin-top: 80px;
}

.w3-margin-top {
    margin-top: 16px!important;
}
.w3-center {
    text-align: center!important;
}
.w3-display-middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
}
.w3-black, .w3-hover-black:hover {
    color: #fff!important;
    background-color: #000!important;
}
.w3-padding_l {
    padding: 8px 16px!important;
}
.w3-opacity-min {
    opacity: 0.75;
}

/*Why choose senebu*/
.choose-senebu h1 {
    font-size: 1.5em;
}

.choose-senebu {
      text-align: center;
}

.choose-senebu ul li {
    padding: 20px 50px;
}
.choose-senebu img {
    height: 50px;
    width: 50px;
}
.choose-senebu h3 {
    font-size: 1.1em;
}

</style>

<script>
  export default {

  data() {
    return {
       
        architectural_selection: '../image/architectural_commercial.jpeg',
        interior_selection: '../image/interior_commercial.jpeg',
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Login',
              path: 'login'
            }
          ]     
        },

        logo: '../image/logo2.png',
        name: "",
        list_of_buildings: {},
        list_of_all_designs_page: false,
        main: true,
        loading: false,
        pagination: {}

      }
      
    },
    methods: {
        get_individuals_username() {
              axios.get('user/info/').then(result => {
             

                var username = result.data.name

                $('#username').html(username);
                

                }).catch(error => {
                    console.log(error);
                });
        },
        list_of_designs(search) {

         $('#search').css('border-color','');
         var ser =  document.getElementById('search').value;

         if(ser == "") {
            $('#search').css('border-color','red');
            swal("Opps!", "You must input in the search bar!", "error");
            return 0;
         }
          this.loading = true;
          axios.get('list_of_all_designs/building_designs/' + ser).then(result => {
            
                   
                if(result.data == "Search not found!"){
                    swal("Opps!", "Search not found!", "error");
                    return 0;
                }

                this.list_of_buildings = result.data;

                console.log(this.list_of_buildings);

                this.main = false;
                this.list_of_all_designs_page = true;
                this.loading = false;

              }).catch(error => {
                  console.log(error);
              });
        },

    },
    mounted() {
        
       this.get_individuals_username();
    },

   
    }
  

</script>