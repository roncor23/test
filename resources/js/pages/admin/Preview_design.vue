<template>
  <div>
  <div class="container" style="margin-top: 100px">
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
                              <input type="text" class="form-control" name="firstName" placeholder="First Name">
                              <input type="text" class="form-control mt-3" name="lastName" placeholder="Last Name">
                              <input type="text" class="form-control mt-3" name="email" placeholder="Email">                         
                              <p class="mt-3" style="color: black">When do you want to start construction?</p>
                              <select class="form-control mt-3" name="design_type">
                                <option value="" selected disabled hidden>Select...</option>
                                <option value="houses">0-3 Months</option>
                                <option value="commercial">3-6 Months</option>
                                <option value="institutional">6-12 Months</option>
                                <option value="industrial">More than one year</option>
                              </select> 
                              <textarea class="form-control mt-3" placeholder="Please enter your Questions Here"></textarea> 
                              <button class="btn btn-info btn-lg btn-block mt-3" style="background-color:#1E90FF" @click="submitForm">SUBMIT</button>
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
        list_of_designs: {},
        message: '',
        errors: {},
        name: "",

        modalActive: false,

      }
      
    },

     methods: {

      submitForm() {
           swal("Opps!", "You're in architect dashboard!", "error");
      },

      get_user_info() {
          axios.get('user/info/').then(result => {
             

           this.name = result.data;
           console.log(this.name);
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

        get_architect_username() {
              axios.get('architect/username/').then(result => {
             

                var username = result.data.name

                $('#username').html(username);
                

                }).catch(error => {
                    console.log(error);
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
        }
    },
    mounted() {
        
        this.fetchFile();
        this.total_area();
        this.get_architect_username();


    },


  }

</script>

