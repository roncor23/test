<template>
    <div>
                <!--USER ROLE-->
   <div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">    
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

        <a class="navbar-brand">
          <router-link  :to="{name: 'user.dashboard'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
        </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="input-group">
              <input id="search" type="text" class="form-control" placeholder="Ex: One storey" aria-describedby="basic-addon2" style="border-color: #e67e00" @change="list_of_designs">
              <div class="input-group-append">
                <button class="btn_search btn" type="button" style="width:150px; background-color: #e67e00; color:#fff;" @click="list_of_designs">Search</button>
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
                <a class="w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none;"><router-link  style="color:#696969;text-decoration:none;font-weight:bold" :to="{name: 'user.dashboard'}">Home</router-link>
                 </a>
             </li>
              <li class="nav-item">
                <a class="borderan w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none; font-weight:bold">Collections</a>
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
                  <i  class="far fa-envelope" style="font-size: 15px; color:#696969">
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
                  <i  class="far fa-bell" style="font-size: 15px; color:#696969">
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
      <div  class="container card mb-5" style="margin-top: 100px" v-show="empty">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2 mt-3">
                <ul class="nav nav-tabs">
                     <li class="nav-item">
                        <a href="" data-target="#1tab" data-toggle="tab" class="nav-link active">Personal Information</a>
                    </li>
                </ul>
                    <div class="" id="1tab">
                        <div class="row mt-3">
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                <h4>Contact Information</h4>
                                <small>Your contact information is strictly private, visible to you and the admins. </small>
                                <hr>
                                <div class="mt-2">
                                    <small>Choose profile pic.</small><br>
                                    <small>Profile photos must be at least a minimum size of <b>180 x 180 pixels</b></small><br>
                                      <div class="container" style="">
                                        <div class="cb_img_profile">                                   
                                            <img :src="previewUrl" v-if="previewUrl" class="card_id">   
                                            <p v-else style="margin-top:50px;margin-left:20px">No image...</p>                            
                                        </div>
                                        <input id="profile" class="mt-2" type="file" ref="prof" @change="onFileChange" accept="image/*">
                                      </div>
                                </div>   
                            </div>
                            <div class="col-lg-9 col-md-6 col-sm-12">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Full name</label>
                                            <input id="fullname" type="text" name="fullname" v-model="fullnameInfo"  class="form-control" >
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Phone</label>
                                            <input id="phone" type="text" name="phone"  v-model="phoneInfo" class="form-control" >
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row end.// -->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Address</label>
                                            <input id="address1" type="text" name="address1"  v-model="address1Info" class="form-control">
                                        </div> <!-- form-group end.// -->
                                        <div class="col form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Address line 2</label>
                                            <input id="address2" type="text" name="address2"  v-model="address2Info" class="form-control">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>City / Town</label>
                                        <input id="city" type="text" name="city" v-model="cityInfo" class="form-control" >
                                        </div> <!-- form-group end.// -->
                                        <div class="col form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Province</label>
                                            <input id="province" type="text" v-model="provinceInfo" name="province"  class="form-control" >
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Postcode / ZIP</label>
                                        <input id="postcode" type="text" v-model="postcodeInfo" name="postcode" class="form-control">
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Country</label>
                                        <select id="country" class="form-control" v-model="countryInfo" name="country" >
                                            <option value="" selected disabled hidden></option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Russia">Russia</option>
                                            <option value="States">United States</option>
                                            <option value="India">India</option>
                                            <option value="Afganistan">Afganistan</option>
                                        </select>
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <div class="form-row">

                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Birthday</label>
                                            <input v-model="birthdayInfo" id="birthday" type="date" name="birthday"  class="form-control">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// --> 
                                </form>
                                <p class="btn btn-primary mt-1" @click="Save_profile" style="color:#fff">Save</p>
                            </div>
                        </div>
                    </div><!-- 1st tab -->
                 </div>   
            </div>
        </div>
        <div class="container card mb-5" style="margin-top: 100px" v-show="not_empty">
            <div class="col-lg-12 order-lg-2 mt-3" v-for="show_profile in show_profiles" v-cloak>
                    <ul class="nav nav-tabs">
                         <li class="nav-item">
                            <a href="" data-target="#1tab" data-toggle="tab" class="nav-link active">Personal Information</a>
                        </li>
                    </ul>
                        <div class="tab-pane active" id="1tab">
                            <div class="row mt-3">

                                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                    <h4>Contact Information</h4>
                                    <small>Your contact information is strictly private, visible to you and the admins. </small>
                                    <hr>
                                    <div class="mt-2">
                                        <small>Profile pic.</small><br>
                                        <small>Profile photos must be at least a minimum size of <b>180 x 180 pixels</b></small><br>
                                      <div class="container" style="">
                                        <div class="cb_img_profile">               
                                            <img v-show="hide_img" class="card_id"  :src="'../../storage' + '/Profile/' + '/' + show_profile.username + '.jpg'">       
                                            <!-- <img :src="previewUrl" v-if="previewUrl" class="card_id">  -->      
                                        </div>
                                       <!--  <input class="mt-2" type="file" ref="prof" @change="onFileChange1" accept="image/*">    -->      
                                      </div>
                                    </div>                               
                                </div>
                                <div class="col-lg-9 col-md-6 col-sm-12">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                                <label>Full name</label>
                                                <input id="fullname_u" type="text" name="fullname" :value="show_profile.full_name" class="form-control">
                                            </div> <!-- form-group end.// -->
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Phone</label>
                                                <input id="phone_u" type="text" name="phone"  :value="show_profile.phone" class="form-control">
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row end.// -->
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                                <label>Address</label>
                                                <input id="address1_u" type="text" name="address1" :value="show_profile.address" class="form-control">
                                            </div> <!-- form-group end.// -->
                                            <div class="col form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                                <label>Address line 2</label>
                                                <input id="address2_u" type="text" name="address2" :value="show_profile.address2" class="form-control">
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row.// -->
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>City / Town</label>
                                            <input id="city_u" type="text" :value="show_profile.city_town" name="city" class="form-control" >
                                            </div> <!-- form-group end.// -->
                                            <div class="col form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                                <label>Province</label>
                                                <input id="province_u" type="text"  :value="show_profile.state_country_province" name="province"  class="form-control" >
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row.// -->

                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Postcode / ZIP</label>
                                            <input id="postcode_u" type="text" :value="show_profile.postcode" name="postcode" class="form-control">
                                            </div> <!-- form-group end.// -->
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Country</label>
                                            <select id="country_u" :value="show_profile.country" class="form-control" name="country" >
                                                <option value="Choose" selected disabled hidden></option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Russia">Russia</option>
                                                <option value="States">United States</option>
                                                <option value="India">India</option>
                                                <option value="Afganistan">Afganistan</option>
                                            </select>
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row.// -->

                                        <div class="form-row">

                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Birthday</label>
                                                <input id="birthday_u" type="text" :value="show_profile.birthday" name="birthday"  class="form-control">
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row.// --> 
                                    </form>
                                    <p class="btn btn-primary mt-1" @click="updateProf" style="color:#fff">Update</p>
                                </div>

                            </div>
                        </div><!-- 1st tab -->
                    </div> 
            </div>
      <div v-show="list_of_all_designs_page" class="container" style="margin-top:50px">
          <div  class="loading column is-4 is-offset-4 justify-content-center align-items-center row mt-4" v-if="loading" v-cloak>
            <i class="fa fa-cog fa-spin fa-3x fa-fw margin-bottom"></i>
            <span class="sr-only">Loading...</span>
          </div> 
                   <!-- Content Header-->
        <hr id="building" class="hr-text" data-content="Building Designs" style="margin-top:50px">

          <div class="tab-content" style="margin-top:50px">
            <div role="tabpanel" class="tab-pane active" id="houses" >
              <div class="row mt-3 mb-5" >        
                <div class="is-empty column is-4 is-offset-4" v-if="pagination.total == 0" v-cloak>
                  <figure >
                    <img :src="empty_bin" alt="Folder empty" id="folder_empty">
                      <figcaption>
                        <p class="title is-2">
                        This folder is empty!
                        </p>
                      </figcaption>
                  </figure>
                </div>                   
              <div class="col-lg-4 col-md-6 mb-4" v-for="list_of_building in list_of_buildings" v-cloak>
                <div class="card">
                  <span style="cursor: pointer;">
                     <router-link :to="{ name: 'public_user.portfolio_byDesign', params: { portfolio_id: list_of_building.id } }"><img class="card-img-top"  :src="'../storage' + '/portfolio/main_pic/' + list_of_building.user_name + '_' + list_of_building.user_id + '/' + list_of_building.type + '/' + list_of_building.floor_plan_code + '.' + list_of_building.extension" :alt="list_of_building.id"></router-link>
                  </span>
                 
                  <div class="card-body">
                    <h6 class="card-title">
                      <a href="#"><b style="color:black">{{ list_of_building.name }}</b></a>
                      <a class="fa fa-bed" style="float:right">&nbsp;&nbsp;&nbsp;{{ list_of_building.beds }}</a>
                    </h6>
                    <h6>
                      <a>Design #:&nbsp;&nbsp;{{ list_of_building.floor_plan_code }}</a>
                      <a class="fa fa-bath" style="float:right">&nbsp;&nbsp;&nbsp;{{ list_of_building.baths }}</a>
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
<script>
import axios from 'axios'

export default {

  data() {
    return {
      
        formData: {},
        infos: [],
        users: '',
        ver_status: '',
        identity_licenses: [],
        files: [],
        fullnameInfo: '',
        address1Info: '',
        address2Info: '',
        cityInfo: '',
        postcodeInfo: '',
        phoneInfo: '',
        licenseInfo: '',
        provinceInfo: '',
        countryInfo: '',
        birthdayInfo: '',
        prof_pic: '',
        show_profiles: [],
        empty: true,
        hide_img: true,
        not_empty: false,
        previewUrl: '',
        name: '',
        loading: false,
        landing_page: true,
        list_of_all_designs_page: false,
        list_of_buildings: {},
        pagination: {},
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
        logo: '../image/logo2.png',


      }
      
    },
     methods: {

        Save_profile: function(e) {

            
                $('#fullname').css('border-color','');
                $('#address1').css('border-color','');
                $('#address2').css('border-color','');
                $('#city').css('border-color','');
                $('#postcode').css('border-color','');
                $('#phone').css('border-color','');
                $('#province').css('border-color','');
                $('#country').css('border-color','');
                $('#birthday').css('border-color','');

            if(this.fullnameInfo && this.address1Info && this.address2Info && this.cityInfo && this.postcodeInfo  && this.phoneInfo && this.provinceInfo && this.countryInfo && this.birthdayInfo) {

                this.formData = new FormData();
                this.formData.append('fullname', this.fullnameInfo);
                this.formData.append('address1', this.address1Info);
                this.formData.append('address2', this.address2Info);
                this.formData.append('city', this.cityInfo);
                this.formData.append('postcode', this.postcodeInfo);
                this.formData.append('phone', this.phoneInfo);
                this.formData.append('province', this.provinceInfo);
                this.formData.append('country', this.countryInfo);
                this.formData.append('birthday', this.birthdayInfo);
                this.formData.append('profile', this.prof_pic);

            axios.post('profile_info/user', this.formData, {headers: {'content-Type': 'multipart/form-data'}})
                .then(response => {
                    swal("Opps!", response.data, "success");
                   this.showProf();

                })
                .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });


            } 
            this.errors = [];
         
            if(!this.fullnameInfo) {
                    swal("Opps!", "Full Name required.", "error");
                $('#fullname').css('border-color','red');
            }
            if(!this.address1Info) {
                    swal("Opps!", "Address required.", "error");
                $('#address1').css('border-color','red');
            }
            if(!this.address2Info) {
                    swal("Opps!", "Address2 required.", "error");
                $('#address2').css('border-color','red');
            }
            if(!this.postcodeInfo) {
                  swal("Opps!", "Post code required.", "error");
                $('#postcode').css('border-color','red');
            }
            if(!this.phoneInfo) {
                  swal("Opps!", "Phone required.", "error");
                $('#phone').css('border-color','red');
            }
            if(!this.provinceInfo) {
                  swal("Opps!", "Province required.", "error");
                $('#province').css('border-color','red');
            }
            if(!this.countryInfo) {
                  swal("Opps!", "Country required.", "error");
                $('#country').css('border-color','red');
            }
            if(!this.birthdayInfo) {
                  swal("Opps!", "Birthday required.", "error");
                $('#birthday').css('border-color','red');
            }
            if(!this.cityInfo) {
                  swal("Opps!", "City required.", "error");
                $('#city').css('border-color','red');
            }

       
            e.preventDefault();
        },

            onFileChange: function (event) {
              const file = event.target.files[0];
              if (!file) {
                return false
              }
              if (!file.type.match('image.*')) {
                return false
              }
              const reader = new FileReader();
              const that = this;
              reader.onload = function (e) {
                that.previewUrl = e.target.result;
              }
              reader.readAsDataURL(file);

            $('#profile').css('border-color','');
            if(this.$refs.prof.files[0].size > 179999) {
                $('#profile').css('border-color','red');
                $('#profile').val("");
                swal("Opps!", "File size required less than 180x180 pixels.", "error");
                return 0;
            }else{
                this.prof_pic = this.$refs.prof.files[0];
                console.log(this.prof_pic);
            }

         },

            onFileChange1: function (event) {

                this.hide_img=false;  
                const file = event.target.files[0];
                if (!file) {
                return false
                }
                if (!file.type.match('image.*')) {
                return false
                }
                const reader = new FileReader();
                const that = this;
                reader.onload = function (e) {
                that.previewUrl = e.target.result;
                }
                reader.readAsDataURL(file);
     

                $('#profile').css('border-color','');
                if(this.$refs.prof.files[0].size > 179999) {
                    $('#profile').css('border-color','red');
                    $('#profile').val("");
                    swal("Opps!", "File size required less than 180x180 pixels.", "error");
                    return 0;
                }else{
                    this.prof_pic = this.$refs.prof.files[0];
                    console.log(this.prof_pic);
                }

                console.log(file);
          
         },

        showProf() {
                axios.get('users/show_profile/' + this.$route.params.architect_id).then(result => {

                    this.show_profiles = result.data;
                    this.empty = false;
                    this.not_empty = true;

                    console.log(this.show_profiles);
              
                }).catch(error => {
                    console.log(error);
                });

        },
        updateProf() {

            $('#fullname_u').css('border-color','');
            $('#address1_u').css('border-color','');
            $('#address2_u').css('border-color','');
            $('#city_u').css('border-color','');
            $('#postcode_u').css('border-color','');
            $('#phone_u').css('border-color','');
            $('#province_u').css('border-color','');
            $('#country_u').css('border-color','');
            $('#birthday_u').css('border-color','');

            var full_name = document.getElementById('fullname_u');
            var address1 = document.getElementById('address1_u');
            var address2 = document.getElementById('address2_u');
            var city = document.getElementById('city_u');
            var postcode = document.getElementById('postcode_u');
            var phone = document.getElementById('phone_u');
            var province = document.getElementById('province_u');
            var country = document.getElementById('country_u');
            var birthday = document.getElementById('birthday_u');
            this.formData = new FormData();
            this.formData.append('profile', this.prof_pic);

                        if(full_name.value == "") {
                swal("Opps!", "full name you want to edit?!", "error");
                $('#fullname_u').css('border-color','red');
                return 0;
            }
                        if(address1.value == "") {
                swal("Opps!", "address you want to edit?!", "error");
                $('#address1_u').css('border-color','red');
                return 0;
            }
                        if(address2.value == "") {
                swal("Opps!", "address line 2 you want to edit?!", "error");
                $('#address2_u').css('border-color','red');
                return 0;
            }
                        if(city.value == "") {
                swal("Opps!", "city you want to edit?!", "error");
                $('#city_u').css('border-color','red');
                return 0;
            }
                        if(postcode.value == "") {
                swal("Opps!", "postcode you want to edit?!", "error");
                $('#postcode_u').css('border-color','red');
                return 0;
            }
                        if(phone.value == "") {
                swal("Opps!", "phone you want to edit?!", "error");
                $('#phone_u').css('border-color','red');
                return 0;
            }
                        if(province.value == "") {
                swal("Opps!", "province you want to edit?!", "error");
                $('#province_u').css('border-color','red');
                return 0;
            }
                        if(country.value == "") {
                swal("Opps!", "country you want to edit?!", "error");
                $('#country_u').css('border-color','red');
                return 0;
            }
                        if(birthday.value == "") {
                swal("Opps!", "birthday you want to edit?!", "error");
                $('#birthday_u').css('border-color','red');
                return 0;
            }

            axios.post('interior/update_profile/', {val_1: full_name.value, val_2: address1.value, val_3: address2.value, val_4: city.value, val_5: postcode.value, val_6: phone.value, val_7: province.value, val_8: country.value, val_9: birthday.value })
                    .then(response => {

                        this.showProf();
                        swal("Good job!", response.data, "success");
                    
                    })
                    .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });

    

        },

        list_of_designs(search) {

         var ser =  document.getElementById('search').value;
          this.loading = true;
          axios.get('list_of_all_designs/building_designs/' + ser).then(result => {
            
                   
                if(result.data == "Search not found!"){
                    swal("Opps!", "Search not found!", "error");

                    return 0;
                }

                this.list_of_buildings = result.data;

                console.log(this.list_of_buildings);

                this.empty = false;
                this.not_empty = false;
                this.list_of_all_designs_page = true;
                this.loading = false;

              }).catch(error => {
                  console.log(error);
              });
        },

        resetForm() {
  
        },
        get_user_info() {
          axios.get('user/info/').then(result => {
             

           this.name = result.data;

                }).catch(error => {
                    console.log(error);
                });

        },

 
    },
    mounted() {
        this.showProf();
        this.get_user_info();
    }
  }

</script>
<style scoped>
    .cb_img_profile {
        border:1px solid #3b5998;
        width:120px;
        height:120px;
        border-style:dashed;
    }
    .card_id {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


h1 {
  font-weight: normal;
}

input {
  border: 1px solid #e9e9e9;
  border-radius: 4px;
  font-size: .825rem;
  padding: .5rem;
  margin-bottom: .5rem;
  width: 100%;
}

output img {
  max-width: 100%;
}

output p {
  background: #f7f7f7;
  border-radius: 4px;
  padding: 2rem;
  text-align: center;
}

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


.w3-wide {
    letter-spacing: 4px;
}

*, *:before, *:after {
    box-sizing: inherit;
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

.btn_search:hover {
   background-color: #b36200 !important;
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


</style>



     