<template>
  <div class="container" style="margin-top: 100px">
    <div class="card shadow-sm">
      <div class="container-fluid">
        <div class="wrapper row">
          <div class="preview col-md-6 mt-3 mb-3" v-for="file in files" v-cloak>           
            <div class="preview-pic tab-content">  
              <div class="tab-pane active" id="pic-1"> <img class="img-taas" style="cursor: pointer;" :src="'../../storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code"></div>
              <div class="tab-pane" id="pic-2"><img class="img-taas" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension"></div>
              <div class="tab-pane" id="pic-3"><img class="img-taas" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code"></div>
              <div class="tab-pane" id="pic-4"><img class="img-taas" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code"></div>
              <div class="tab-pane" id="pic-5"><img class="img-taas" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code"></div>
            </div>
            <div style="padding:10px">
              <ul class="preview-thumbnail nav nav-tabs">
                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code"></a></li>
                <li><a data-target="#pic-2" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension"></a></li>
                <li><a data-target="#pic-3" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code"></a></li>
                <li><a data-target="#pic-4" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code"></a></li>
                <li><a data-target="#pic-5" data-toggle="tab"><img class="img-ubos" style="cursor: pointer;" :src="'../../storage' + '/portfolio/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code"></a></li>
              </ul>
            </div>
              <span class="mt-3 ">
                <h2 style="float: left">Design # {{ file.floor_plan_code }}</h2>
                <h2 class="icon fa fa-youtube-square mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer"></h2>
                <h2 class="icon fa fa-twitter mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer"></h2>
                <h2 class="icon fa fa-facebook mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer"></h2>
                <h2 class="icon fa fa-print mt-1 ml-2" style="font-size: 25px; float:right; cursor: pointer"></h2>
              </span>
            </div>   
            <div class="details col-md-6" style=" padding:10px;">
                 <div class="" v-for="file in files" v-cloak>
                    <h3 class="product-title"></h3>             
                    <h4 class="price">House estimated price:<span>&#8369;{{ file.price }}</span></h4>
                    <h2 class="mt-4">Design Description</h2>
                    <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                    <p class="mt-3" style="color: black">Feel like you're in the trees in this unique layout for a scenic lot. The living arrangements are reversed, with the kitchen, dining, and living room upstairs. The master suite also resides on this level and opens out to a private balcony, so you can greet the day with fresh air and a special view. Another bedroom and bathroom on this level can be used for guests. Downstairs, a parlor can become a formal entertaining zone or a relaxed hangout for the other bedroom.</p>
                 </div>
            </div>        
          </div>
        </div>
      </div>



      <div id="ccard" class="card shadow-sm mt-4 col-lg-12 col-md-12 col-sm-12" v-for="file in files">
          <div class="row mt-3">
            <div class="col-lg-6" style="">
              <div class="col-lg-12" style="padding: 20px">
                    <h2 class="">KEY SPECS</h2>
                    <div class="vl col-lg-12 mb-4" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                   <span class="con fa fa-tape " ><img :src="tape" width="50" height="40"><p class="ic mt-2" style="color: black">{{file.floor_area}}&nbsp;<span class="for_red">sq/ft</span></p></span>
                   <span  href="" class="con fa fa-bed " ><p class="ic mt-2" style="color: black">{{file.beds}}&nbsp;<span class="for_red">Bedrooms</span></p></span>
                   <span  href="" class="con fa fa-bath " ><p class="ic mt-2" style="color: black">{{file.baths}}&nbsp;<span class="for_red">Baths</span></p></span>
                   <span  href="" class="con fa fa-home " ><p class="ic mt-2" style="color: black">{{file.floors}}&nbsp;<span class="for_red">Floors</span></p></span>
                   <span  href="" class="con fa fa-warehouse " ><img :src="garage" width="50" height="40"><p class="ic mt-2" style="color: black">{{file.garage}}&nbsp;<span class="for_red">Garage</span></p>
                   </span>      
              </div>
              <div class="col-lg-12">
                  <h2 class="mt-4">PLAN DESCRIPTION</h2>
                  <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <p class="mt-3" style="color: black">
                    <!-- {{$description}} -->Feel like you're in the trees in this unique layout for a scenic lot. The living arrangements are reversed, with the kitchen, dining, and living room upstairs. The master suite also resides on this level and opens out to a private balcony, so you can greet the day with fresh air and a special view. Another bedroom and bathroom on this level can be used for guests. Downstairs, a parlor can become a formal entertaining zone or a relaxed hangout for the other bedroom.<!-- {{$description}} -->Feel like you're in the trees in this unique layout for a scenic lot. The living arrangements are reversed, with the kitchen, dining, and living room upstairs. The master suite also resides on this level and opens out to a private balcony, so you can greet the day with fresh air and a special view. Another bedroom and bathroom on this level can be used for guests. Downstairs, a parlor can become a formal entertaining zone or a relaxed hangout for the other bedroom.
                  </p>
              </div>       
              <div class="container">
               <div class="modification-quote clearfix well" style="background-color:#EFEBEB;">
          <a href="" class="btn btn-info text-uppercase">Modify This Plan</a>
          <p class="sub-header">This plan can be customized!</p>
          <p>
            Tell us about your desired changes in negotiation so we can prepare an estimate for the design service.           
          </p>
        </div>
              </div>      
              <div class="col-lg-12">
                <h2 class="mt-4">FULL DESCRIPTION & FEATURES</h2>
                <div class="vl col-lg-12" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                <div class="col-lg-12">
                  <label class="mt-4" style="font-size: 12pt">Basic Features</label>
                  <div style="margin-left: 150px">
                     <span class="fds" style="margin-right:100px">Bedroom&nbsp;:&nbsp;{{file.beds}}</span>
                     <span style="margin-left: " class="fdf">Baths&nbsp;:&nbsp;{{file.baths}}</span>
                  </div>
                  <div style="margin-left: 150px">
                     <span style="margin-right:112px">Stories&nbsp;:&nbsp;{{file.floors}}</span>
                     <span style="" class="fdg">Garage&nbsp;:&nbsp;{{file.garage}}</span>
                  </div>
                </div>
                <div class="vl col-lg-12 mt-3" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                 <div class="col-lg-12">
                  <label class="mt-4" style="font-size: 12pt">Dimension</label>
                  <div style="margin-left: 150px">
                     <span>Depth&nbsp;:&nbsp;{{file.depth}}'</span>
                     <span style="margin-left:120px " class="fdg">Width&nbsp;:&nbsp;{{file.width}}'</span>
                  </div>
                </div>
                <div class="vl col-lg-12 mt-3" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                  <div class="col-lg-12">
                    <label class="mt-4" style="font-size: 12pt">Area</label>
                    <div style="margin-left: 150px">
                       <span>Total&nbsp;:&nbsp;{{area_total}}&nbsp;&nbsp;sq/ft</span>    
                    </div>
                     <div style="margin-left: 150px">
                       <span style="margin-right:75px">Garages&nbsp;:&nbsp;{{file.garage_area}}&nbsp;&nbsp;sq/ft</span>
                       <span style="" class="fdh">Main Floor&nbsp;:&nbsp;{{file.main_floor_area}}&nbsp;&nbsp;sq/ft</span>        
                    </div>
                    <div style="margin-left: 150px">
                       <span style="margin-right:90px">Decks&nbsp;:&nbsp;{{file.deck_area}}&nbsp;&nbsp;sq/ft</span>
                       <span style="" class="fdj" >Lower Floor&nbsp;:&nbsp;{{file.lower_floor_area}}&nbsp;&nbsp;sq/ft</span>        
                    </div>
                    <div class="mt-3" style="margin-left: 150px">
                      <h4 style="font-size: 11px;font-style: italic;">*Total Square Footage only includes conditioned space and does not include garages, porches, bonus rooms, or decks.</h4>
                    </div>
                  </div>
                <div class="vl col-lg-12 mt-3" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                <div class="col-lg-12">
                  <label class="mt-4" style="font-size: 12pt">Ceiling</label>
                  <div style="margin-left: 150px">
                     <span style="margin-right: 85px">Main Ceiling&nbsp;:&nbsp;{{file.depth}}'</span>
                     <span style="margin-left:" class="fdk">Lower Ceiling&nbsp;:&nbsp;{{file.width}}'</span>
                  </div>
                  <div style="margin-left: 150px">
                     <span>Garage Ceiling&nbsp;:&nbsp;{{file.depth}}'</span>
                  </div>
                </div>
                <div class="vl col-lg-12 mt-3" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                <div class="col-lg-12">
                  <label class="mt-4" style="font-size: 12pt">Roof</label>
                  <div style="margin-left: 150px">
                     <span>Roof Framing&nbsp;:&nbsp;{{file.roof}}</span>
                  </div>
                </div>
                <div class="vl col-lg-12 mt-3" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
                <div class="col-lg-12">
                  <label class="mt-4" style="font-size: 12pt">Bedroom Features</label>
                  <div style="margin-left: 150px">
                     <span>{{file.master_bedroom}}</span>
                     <span style="margin-left:" class="fdl">{{file.bedrooms}}</span>
                  </div>
                  <div style="margin-left: 150px">
                     <span v-if="lower_level_bed_rooms == 1" style="margin-right:45px">Lower Level Bed Rooms</span>
                     <span v-if="lower_level_bed_rooms == 0"></span>
                     <span v-if="walk_in_closett == 1" style="margin-left:" class="fdz">Walk in Closet</span>
                     <span v-if="walk_in_closett == 0" style="margin-left:" ></span>
                  </div>
                </div>
                <div class="vl col-lg-12 mt-3" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="col-lg-12" style="background-color: #EFEBEB; border-radius: 5px; padding: 10px">
                <div class="">
                  <div class="form-row mt-3">
                  <div class="col-lg-12" >
                    <form class="add-to-carts col-lg-12" method="post" action="">
                      <div class="option-wrapper">
                        <label class="pull-left">
                        Reservation Price
                        </label>
                        <div class="btn-group btn-block">
                          <select class="form-control">
                          <option selected disabled hidden>₱2,000.00</option>
                          </select>
                        </div>
                      </div>
                      <p class="price clearfix mt-2">
                      <span class="pull-left" style="float:left">Total</span>                        
                      <span class="pull-right" style="float:right">₱<span id="subtotal" data-base-price="0.00" itemprop="price">2,000.00</span></span>                        
                      <meta itemprop="priceCurrency" content="USD">
                      </p>                      
                       <!--  <router-link :to="{ name: 'checkout', params: { portfolio_id: file.id } }"> --><button @click="checkout" type="button" class="btn btn-info btn-lg btn-block mt-3 mb-3" style="background-color:#f6710e;">RESERVE DESIGN</button><!-- </router-link> -->

                    </form>
                  </div>   
                    <div class="col-lg-12 mt-2">
                      <label style="color: red; margin-left: 20px">Important</label>
                      <h4 style="color: black; font-size: 12px; margin-left: 20px">Reservation price is only for reserving the design.<br>
                      The architects' professional fee will be discussed in the meeting place.
                      Reservation price is not included <br>in the architects' professional fee. 
                      It's not refundable.
                      </h4>                       
                    </div>        
                  </div> <!-- form-row end.//-->
                </div>
              </div> 

                <div class="mt-4">
                  <div class="col-lg-12 mt-3" style="background-color:#EFEBEB; border-radius: 5px; padding: 1px">
                    <div class="" style="background-color: #17a2b8;border-top-right-radius: 5px; border-top-left-radius: 5px"><h4 style="text-align: center;color: #fff;padding: 10px; margin:0">QUESTIONS?</h4></div>
                      <div class="form-row" style="padding: 20px">
                          <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-3 col-xs-12">
                              <input type="text" class="form-control" name="beds" placeholder="First Name" >
                              <input type="text" class="form-control mt-3" name="baths" placeholder="Last Name" >
                              <input type="text" class="form-control mt-3" name="floors" placeholder="Email" >
                              <input type="text" class="form-control mt-3" name="garage" placeholder="Company Name (Builders)" >
                              
                              <p class="mt-3" style="color: black">When do you want to start construction?</p>
                              <select class="form-control mt-3" name="design_type">
                                <option value="" selected disabled hidden>Select...</option>
                                <option value="houses">0-3 Months</option>
                                <option value="commercial">3-6 Months</option>
                                <option value="institutional">6-12 Months</option>
                                <option value="industrial">More than one year</option>
                              </select> 

                               <p class="mt-3" style="color: black">Do you have a lot?</p>
                              <select class="form-control mt-3" name="design_type">
                                <option value="" selected disabled hidden>Select...</option>
                                <option value="houses">No</option>
                                <option value="houses">Yes</option>
                                <option value="commercial">In Process</option>
                                <option value="institutional">Multiple Lots</option>
                              </select> 

                               <p class="mt-3" style="color: black">Are you working with a builder?</p>
                              <select class="form-control mt-3" name="design_type">
                                <option value="" selected disabled hidden>Select...</option>
                                <option value="houses">No</option>
                                <option value="houses">Yes</option>
                                <option value="commercial">Owner / Builder</option>
                              </select> 

                              <textarea class="form-control mt-3" placeholder="Please enter your Questions Here "></textarea> 

                              <button type="button" class="btn btn-info btn-lg btn-block mt-3 mb-3" style="background-color:#17a2b8">SUBMIT</button>

                              <span class="mt-3">Phone<span style="color: #17a2b8"> 09353153034</span></span><br>
                              <span>Hours Mon-Fri, 8 am - 5 mp (GMT+8)</span>
                          </div> <!-- form-group end -->            
                      </div> <!-- form-row end.-->
                   </div>
                 </div>
            </div> 
        </div>
      </div>
             <vue-stripe-checkout
              ref="checkoutRef"
              :image="image"
              :name="name"
              :description="description"
              :currency="currency"
              :amount="amount"
              :allow-remember-me="true"
              @done="done"
              @opened="opened"
              @closed="closed"
              @canceled="canceled"
            ></vue-stripe-checkout>
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
        lower_level_bed_rooms: [],
        walk_in_closett: [],
        area_total: [],
  
  
        loading: false,

 
        message: '',
        errors: {},
        tape: '/image/tape.png',
        garage: '/image/garage.png',
        image: '/image/checkout_logo.png',
        name: 'Senebu',
        description: 'Select.Negotiate.Build',
        currency: 'PHP',
        amount: 200000

      }
      
    },

     methods: {

      async checkout () {
      // token - is the token object
      // args - is an object containing the billing and shipping address if enabled
      const { token, args } = await this.$refs.checkoutRef.open();
      },
      done ({token, args}) {
        // token - is the token object
        // args - is an object containing the billing and shipping address if enabled
        // do stuff...
        axios.post('architect/reserve_design/' + this.$route.params.portfolio_id, {val_1: args.billing_name, val_2: args.billing_address_country, val_3: args.billing_address_country_code, val_4: args.billing_address_zip, val_5: args.billing_address_line1})
            .then(response => {

               
            })
            .catch(error => {

                this.errors = error.response.data.errors;
                console.log(this.errors);
            });
        console.log(args);

        console.log(args.billing_name);

      },
      opened () {
        // do stuff 
      },
      closed () {
        // do stuff 
      },
      canceled () {
        // do stuff 
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
        }
    },
    mounted() {
        
        this.fetchFile();
        this.lower_level_bedrooms();
        this.walk_in_closet();
        this.total_area();

    },


  }

</script>

