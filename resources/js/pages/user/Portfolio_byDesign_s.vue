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
                  <a href="/user/account">
                    <li class="m-2" style="width:200px; padding:5px; cursor:pointer">
                    <i class="fa fa-cog" style="color:#696969;"><a style="letter-spacing:2px;color:#696969;">Account settings</a></i>
                    </li>
                  </a>
                  <a href="/user/profile">
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
  <div v-show="landing_page" class="container" style="margin-top: 100px">
     <div class="card shadow-sm">
      <div class="container-fluid">
        <div class="wrapper row">
          <div class="preview col-md-6 mt-3 mb-3" v-for="file in files" v-cloak>           
            <div class="preview-pic tab-content">  
              <div class="watermarked tab-pane active" id="pic-1" style="cursor:pointer" @click="showModal(file)"> <img class="img-taas" @click="showModal(file)" style="cursor: pointer;" :src="'../../storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
              <div class="watermarked tab-pane" id="pic-2" style="cursor:pointer" @click="showModal1(file)"><img class="img-taas" @click="showModal1(file)" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension"></div>
              <div class="watermarked tab-pane" id="pic-3" style="cursor:pointer" @click="showModal2(file)"><img class="img-taas" @click="showModal2(file)" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
              <div class="watermarked tab-pane" id="pic-4" style="cursor:pointer" @click="showModal3(file)"><img class="img-taas" @click="showModal3(file)" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
              <div class="watermarked tab-pane" id="pic-5" style="cursor:pointer" @click="showModal4(file)"><img class="img-taas" @click="showModal4(file)" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
            </div>
            <div style="padding:10px">
              <ul class="preview-thumbnail nav nav-tabs">
                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/thumbnail/main_pic/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id"></a></li>
                <li><a data-target="#pic-2" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/thumbnail/thumbnail1/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension"></a></li>
                <li><a data-target="#pic-3" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/thumbnail/thumbnail2/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id"></a></li>
                <li><a data-target="#pic-4" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/thumbnail/thumbnail3/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id"></a></li>
                <li><a data-target="#pic-5" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/thumbnail/thumbnail4/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id"></a></li>
              </ul>
            </div>
              <span class="mt-3 ">
                <h2 style="float: left">Design # {{ file.floor_plan_code }}</h2>
                <h2 class="icon fab fa-youtube-square mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer; color:#e67e00"></h2>
                <h2 class="icon fab fa-twitter-square mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer; color:#e67e00"></h2>
                <h2 class="icon fab fa-facebook-square mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer; color:#e67e00"></h2>
              </span>
            </div>   
            <div class="details col-md-6" style=" padding:10px;">
                 <div class="" v-for="file in files" v-cloak>
                    <h3 class="product-title">Title:<span>&nbsp;{{ file.name }}</span></h3>             
                    <h4 class="mt-3">Design concept</h4>
                    <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                    <p class="mt-3" style="color: black">{{ file.description }}</p>
                    <h4 class="price">Building estimated price:<span>&nbsp;&#8369;{{ file.price }}</span></h4>
                 </div>
            </div>        
          </div>
        </div>
      </div>

       

      <div id="ccard" class="card shadow-sm mt-4 col-lg-12 col-md-12 col-sm-12" v-for="file in files">
          <div class="row">
            <div class="col-lg-7">   
              <div class="container">
                <div class="modification-quote clearfix well" style="background-color:#EFEBEB;border-radius: 5px;">
                  <a class="btn text-uppercase" style="background-color:#1E90FF;color:#fff">Customizable</a>
                  <p class="sub-header">This plan can be customized!</p>
                  <p>
                    Tell us about your desired changes in negotiation so we can prepare an estimate for the design service.           
                  </p>
                </div>
              </div>     
                    <div class="col-lg-12">
                <h2 class="">FULL DESCRIPTION & FEATURES</h2>
                <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                <div class="fdff col-lg-12">
                  <label class="mt-4" style="color:#7f7f7f">Number of Areas</label>
                  <div style="margin-left: 100px;display:flex">
                     <span style="flex:1">Bedroom&nbsp;:&nbsp;{{file.beds}}</span>
                  </div>
                  <div style="margin-left: 100px;display:flex">
                     <span class="fdf"  style="flex:1">Toilet & Baths&nbsp;:&nbsp;{{file.baths}}</span>
                  </div>
                </div>
                <div class="vl col-lg-12 mt-3" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                <div class="fdffa col-lg-12">
                  <label class="mt-4" style="color:#7f7f7f">Area</label>
                  <div style="margin-left: 100px;display:flex">
                  <!--    <span style="padding:20px">Total&nbsp;:&nbsp;{{area_total}}&nbsp;&nbsp;sq/m</span>   -->
                     <span style="flex:1">Total Lot Area&nbsp;:&nbsp;{{area_total}}&nbsp;&nbsp;sq/m</span>  
                     <span class="fdfa" style="flex:1">Floor Width&nbsp;:&nbsp;{{file.floor_area_width}}&nbsp;&nbsp;sq/m</span>    
                  </div>
                   <div style="margin-left: 100px;display:flex">
                     <span style="flex:1">Lot Width&nbsp;:&nbsp;{{file.lot_area_width}}&nbsp;&nbsp;sq/m</span>
                     <span class="fdfa" style="flex:1">Floor Length&nbsp;:&nbsp;{{file.floor_area_length}}&nbsp;&nbsp;sq/m</span>        
                  </div>
                  <div style="margin-left: 100px;display:flex">
                     <span style="flex:1">Lot Length&nbsp;:&nbsp;{{file.lot_area_length}}&nbsp;&nbsp;sq/m</span>
                     <span class="fdfa" style="flex:1">Floor Height&nbsp;:&nbsp;{{file.floor_area_height}}&nbsp;&nbsp;sq/m</span>         
                  </div>
            <!--       <div class="mt-3" style="margin-left: 100px">
                    <h4 style="font-size: 11px;font-style: italic;">*Total Square Footage only includes conditioned space and does not include garages, porches, bonus rooms, or decks.</h4>
                  </div> -->
                </div>
                <div class="vl col-lg-12 mt-3" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                <div class="fdffb col-lg-12">
                  <label class="mt-4" style="color:#7f7f7f">Location</label>
                  <div style="margin-left: 100px; display:flex">
                     <span style="flex:1">Ground Floor&nbsp;:&nbsp;{{file.ground_floor}}</span>
                  </div>
                  <div style="margin-left: 100px; display:flex">
                      <span style="flex:1">Second Floor&nbsp;:&nbsp;{{file.second_floor}}</span>
                  </div>
                  <div style="margin-left: 100px; display:flex">
                      <span style="flex:1">Third Floor&nbsp;:&nbsp;{{file.third_floor}}</span>
                  </div>
                </div>
                <div class="vl col-lg-12 mt-3" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                <div class="fdffx col-lg-12">
                  <label class="mt-4" style="color:#7f7f7f">Features</label>
                  <div style="margin-left: 100px; display:flex">
                     <span style="flex:1">{{file.features}}</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-5" style="padding:20px">
                  <div class="col-lg-12" style="background-color:#EFEBEB; border-radius: 5px; padding: 1px">
                    <div class="" style="background-color: #e67e00;border-top-right-radius: 5px; border-top-left-radius: 5px"><h4 style="text-align: center;color: #fff;padding: 10px; margin:0">CONTACT US</h4></div>
                      <div class="form-row" style="padding: 20px">
                          <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-3 col-xs-12">
                              <span class="mt-3"><i></i>Phone<span style="color: #1E90FF"> 09353153034</span></span><br>
                              <span class="mt-3"><i></i>Email<span style="color: #1E90FF"> info.senebu@gmail.com</span></span><br>
                              <span>Hours Mon-Fri, 8 am - 5 pm </span><br>
                          </div> <!-- form-group end -->            
                      </div> <!-- form-row end.-->
                   </div>
                            <div class="col-lg-12 mt-4" style="background-color:#EFEBEB; border-radius: 5px; padding: 1px">
                    <div class="" style="background-color: #1E90FF;border-top-right-radius: 5px; border-top-left-radius: 5px"><h4 style="text-align: center;color: #fff;padding: 10px; margin:0">QUESTIONS?</h4></div>
                      <div class="form-row" style="padding: 20px">
                          <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-3 col-xs-12">
                            <form @submit.prevent="submit_question" method="POST">
                              <input type="text" class="form-control" id="firstName" v-model="firstName" name="firstName" placeholder="First Name">
                              <input type="text" class="form-control mt-3" id="lastName" v-model="lastName" name="lastName" placeholder="Last Name">
                              <input type="text" class="form-control mt-3" id="email" v-model="email" name="email" placeholder="Email">                              
                              <p class="mt-3" style="color: black">When do you want to start construction?</p>
                              <select class="form-control mt-3" id="select" v-model="select" name="select">
                                <option value="" selected disabled hidden>Select...</option>
                                <option value="0-3 Months">0-3 Months</option>
                                <option value="3-6 Months">3-6 Months</option>
                                <option value="6-12 Months">6-12 Months</option>
                                <option value="More than one year">More than one year</option>
                              </select> 
                              <textarea class="form-control mt-3" id="question" name="question" v-model="question" placeholder="Please enter your Questions Here"></textarea> 
                              <button class="btn btn-info btn-lg btn-block mt-3" style="background-color:#1E90FF">SUBMIT</button>
                            </form>
                          </div> <!-- form-group end -->            
                      </div> <!-- form-row end.-->
                   </div>
              </div> 
          </div>
      </div>

            <modal name="zoom-view" :width="1000" :height="600">
                <div class="watermarked_big" @click="hideModal">
                  <img name="modal" class="zoom-view"  :src="'../../storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.name">
                </div>
            </modal>
            <modal name="zoom-view1" :width="1000" :height="600">
                <div class="watermarked_big" @click="hideModal1">
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension">
                </div>
            </modal>
            <modal name="zoom-view2" :width="1000" :height="600">
                <div class="watermarked_big" @click="hideModal2">        
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                </div>            
            </modal>
            <modal name="zoom-view3" :width="1000" :height="600">
                <div class="watermarked_big" @click="hideModal3">
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                </div>
            </modal>
            <modal name="zoom-view4" :width="1000" :height="600">
                <div class="watermarked_big" @click="hideModal4">
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                </div>
            </modal>
  </div>
        <div v-show="list_of_all_designs_page" class="container" style="margin-top:50px">
                   <!-- Content Header-->
          <div  class="loading column is-4 is-offset-4 justify-content-center align-items-center row mt-4" v-if="loading" v-cloak>
            <i class="fa fa-cog fa-spin fa-3x fa-fw margin-bottom"></i>
            <span class="sr-only">Loading...</span>
          </div> 

        <hr id="building" class="hr-text" data-content="Building Designs" style="margin-top:50px">

          <div class="tab-content" style="margin-top:100px">
            <div role="tabpanel" class="tab-pane active" id="houses" >
              <div class="row mt-3 mb-5" >                         
              <div class="col-lg-4 col-md-6 mb-4" v-for="list_of_building in list_of_buildings" v-cloak>
                <div class="card">
                  <span style="cursor: pointer;">
                     <router-link :to="{ name: 'user.portfolio_byDesign_s', params: { portfolio_id: list_of_building.id } }"><img class="card-img-top"  :src="'../../storage' + '/portfolio/main_pic/' + list_of_building.user_name + '_' + list_of_building.user_id + '/' + list_of_building.type + '/' + list_of_building.floor_plan_code + '.' + list_of_building.extension" :alt="list_of_building.id"></router-link>
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
#ic {
  color: #e67e00;
}

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
  color: #b36200 !important;
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

.badge_user {
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

.badge_architect {
    border-radius: .20rem;
    background-color:#dc3545;
    color: #fff;
    text-align: center;
    font-size: 14px;
}


.btn_search:hover {
   background-color: #b36200 !important;
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

/*-----------------------------------------------------------------------*/


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
      

      
     }

     .con {
      font-size: 40px;
      margin-right: 30px;
     }



img {
  cursor: pointer;
   pointer-events: none;
  -webkit-user-drag: none;
  -khtml-user-drag: none;
  -moz-user-drag: none;
  -o-user-drag: none;
   user-drag: none;
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






</style>

<script>

// import "bootstrap/dist/js/bootstrap.min.js";

export default {

  data() {
    return {
        file: {},
        files: [],

        area_total: [],
        activeTab: 'houses',
            routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Login',
              path: 'login'
            }
          ]     
        },
        loading: false,
        logo: '../../image/logo2.png',
        message: '',
        errors: {},
        name: "",
        landing_page: true,
        list_of_all_designs_page: false,
        pagination: {},
        list_of_buildings: {},
        modalActive: false,
        question: '',
        firstName: '',
        lastName: '',
        email: '',
        select: '',

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

        submit_question() {

        $('#firstName').css('border-color','');
        $('#lastName').css('border-color','');
        $('#email').css('border-color','');
        $('#select').css('border-color','');
        $('#question').css('border-color','');

        if(this.firstName && this.lastName && this.email && this.select && this.question) {

        this.formData = new FormData();
        this.formData.append('firstName', this.firstName);
        this.formData.append('lastName', this.lastName);
        this.formData.append('email', this.email);
        this.formData.append('select', this.select);
        this.formData.append('question', this.question);

            axios.post('user/question', this.formData, {headers: {'content-Type': 'multipart/form-data'}})
                .then(response => {

                   
                    this.resetForm();
                    swal("Good Job!", response.data, "success");
                   
                })
                .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });


            }       
            this.errors = [];

            if(!this.firstName) {
                    swal("Opps!", "Firstname required.", "error");
                $('#firstName').css('border-color','red');
            }
            if(!this.lastName) {
                    swal("Opps!", "Lastname required.", "error");
                $('#lastName').css('border-color','red');
            }
            if(!this.email) {
                    swal("Opps!", "Email required.", "error");
                $('#email').css('border-color','red');
            }
            if(!this.select) {
                    swal("Opps!", "Select required.", "error");
                $('#select').css('border-color','red');
            }
            if(!this.question) {
                    swal("Opps!", "Question required.", "error");
                $('#question').css('border-color','red');
            }


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

                this.landing_page = false;
                this.list_of_all_designs_page = true;
                this.loading = false;

              }).catch(error => {
                  console.log(error);
              });
        },
      
        fetchFile() {
         this.loading = true;
	            axios.get('architects/details_per_portfolio/' + this.$route.params.portfolio_id).then(result => {
	                this.loading = false;
	                this.files = result.data;


	          
	            }).catch(error => {
	                console.log(error);
	                this.loading = false;
	            });

        },


        total_area() {

             axios.get('architects/design_area_total/' + this.$route.params.portfolio_id).then(result => {

                  this.area_total = result.data;

                  console.log(this.area_total);
            
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
        resetForm() {
            this.formData = {};
            this.firstName = '';
            this.lastName = '';
            this.email = '';
            this.select = '';
            this.question = '';

        },
    },
    mounted() {
        
        this.fetchFile();
        this.total_area();
        this.get_individuals_username();


    },


  }

</script>

