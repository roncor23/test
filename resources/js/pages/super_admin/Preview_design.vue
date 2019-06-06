<template>
  <div class="container" style="margin-top: 100px">
    <div class="card shadow-sm">
      <div class="container-fluid">
        <div class="wrapper row">
          <div class="preview col-md-6 mt-3 mb-3" v-for="file in files" v-cloak>           
            <div class="preview-pic tab-content">  
              <div class="tab-pane active" id="pic-1"> <img class="img-taas" @click="showModal(file)" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
              <div class="tab-pane" id="pic-2"><img class="img-taas" @click="showModal1(file)" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension"></div>
              <div class="tab-pane" id="pic-3"><img class="img-taas" @click="showModal2(file)" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
              <div class="tab-pane" id="pic-4"><img class="img-taas" @click="showModal3(file)" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
              <div class="tab-pane" id="pic-5"><img class="img-taas" @click="showModal4(file)" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></div>
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
                    <h4 class="mt-3">Design description</h4>
                    <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                    <p class="mt-3" style="color: black">Feel like you're in the trees in this unique layout for a scenic lot. The living arrangements are reversed, with the kitchen, dining, and living room upstairs. The master suite also resides on this level and opens out to a private balcony, so you can greet the day with fresh air and a special view. Another bedroom and bathroom on this level can be used for guests. Downstairs, a parlor can become a formal entertaining zone or a relaxed hangout for the other bedroom.</p>
                    <h4 class="price">Product price:<span>&nbsp;&#8369;{{ file.price }}</span></h4>
                 </div>
            </div>        
          </div>
        </div>
      </div>

       


            <modal name="zoom-view" :width="1200" :height="600">
                  <span class="close" style="font-size:24px;position:absolute;color:#fff; margin-left:1170px;cursor:pointer" @click="hideModal">x</span>
                  <img name="modal" class="zoom-view"  :src="'../../storage' + '/furnitureAccessories/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.name">
            </modal>
            <modal name="zoom-view1" :width="1200" :height="600">
                  <span class="close" style="font-size:24px;position:absolute;color:#fff; margin-left:1170px;cursor:pointer" @click="hideModal1">x</span>
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension">
            </modal>
            <modal name="zoom-view2" :width="1200" :height="600"> 
                  <span class="close" style="font-size:24px;position:absolute;color:#fff; margin-left:1170px;cursor:pointer" @click="hideModal2">x</span>          
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">            
            </modal>
            <modal name="zoom-view3" :width="1200" :height="600">
                  <span class="close" style="font-size:24px;position:absolute;color:#fff; margin-left:1170px;cursor:pointer" @click="hideModal3">x</span>
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
            </modal>
            <modal name="zoom-view4" :width="1200" :height="600">
                  <span class="close" style="font-size:24px;position:absolute;color:#fff; margin-left:1170px;cursor:pointer" @click="hideModal4">x</span>
                  <img class="zoom-view" style="cursor: pointer;" :src="'../../storage' + '/furnitureAccessories/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
            </modal>



    </div>

    
</template>
 
<style scoped>

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

.close:hover {
  color:red;
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
        file: {},
        files: [],
        lower_level_bed_rooms: [],
        walk_in_closett: [],
        area_total: [],
        activeTab: 'houses',
  
        loading: false,

 
        message: '',
        errors: {},
        tape: '/image/tape.png',
        garage: '/image/garage.png',
        amount: 200000

      }
      
    },

     methods: {

      preview() {

        swal("Opps!", "you can't this reserved design! You are in Interior dashboard!", "error");
      },

        fetchFile() {
         this.loading = true;
              axios.get('super_admin/details_per_furnituresAccessories/' + this.$route.params.portfolio_id).then(result => {
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


        lower_level_bedrooms() {

             axios.get('architects/design_lower_bedrooms/' + this.$route.params.portfolio_id).then(result => {

                  this.lower_level_bed_rooms = result.data;

                  // console.log(this.lower_level_bed_rooms);
            
              }).catch(error => {
                  console.log(error);
                  this.loading = false;
              });
        },

          walk_in_closet() {

             axios.get('architects/design_walk_in_closet/' + this.$route.params.portfolio_id).then(result => {

                  this.walk_in_closett = result.data;

                  // console.log(this.walk_in_closett);
            
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
        get_user_info() {
          axios.get('user/info/').then(result => {
             
              var i;
              var html=''         
              for(i=0;i<result.data.length;i++) {

                html+= '<span>' +result.data[i].name+ '</span>'; 

                $('#username').html(html);
                
               
              } 

                }).catch(error => {
                    console.log(error);
                });

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
        this.lower_level_bedrooms();
        this.walk_in_closet();
        this.total_area();
        this.get_user_info();

    },


  }

</script>

