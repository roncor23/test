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
	<div v-show="main" class="container" style="margin-top:100px">
		<div class="row">
			<div class="col-md-6">
				<img :src="Policies_rules">
			</div>
			<div class="col-md-6">
				<h2 style="margin-top:50px;font-weight:bold;color:#3b5998">PRIVACY POLICY</h2><br>
				<p class="" style="text-align:justify; font-size:12pt">SENEBU is a web-based service application providing a modern way of helping individuals to do things hassle free. The architects, interior designers, and individuals will register to have their own account in the SENEBU.  The SENEBU will ask for some information in order to validate the architect and interior designer.  They can upload the image of their building designs with description and important information. The individuals can view all of the designs they have uploaded.<br><br>

				SENEBU (referred to as SENEBU, we, us or our) has implemented this Privacy Policy to describe what personal information SENEBU collects, how SENEBU uses this information, how this is collected, how this information may be shared and what choices and rights you have with respect to this information. Access and use of our Platform is subject to this Privacy Policy.
				</p>

				<ol>
				  <li style="font-size:12pt"><strong>What PERSONAL INFORMATION we collect</strong>
				  	<ul>
					  <li style="font-size:12pt;text-align:justify">Account and Profile information (full name, address, phone number, city, address, province, country,  email address, birthday). Content you Submit (information and content that you submit or post to our Platform, including your photos/house designs/portfolios.</li>
					</ul> 

				  </li>
				  <li style="font-size:12pt;"><strong>How we USE this information</strong>
				  	<ul>
				  		<li style="font-size:12pt; text-align: justify">We use the Personal Information we collect about you for our business functions and activities, in order to operate our business effectively, and to market products and services for the benefit of our customers.</li>
				  		<li style="font-size:12pt; text-align: justify">to provide and improve our Platform's functionality, including to display content you post publicly; to fulfill your purchases through our Platform; to process, store, and deliver your communications; to provide customer service and support; to respond to your enquiries or requests; to back-up our systems; and to improve the security of our Platform;</li>
				  		<li style="font-size:12pt; text-align: justify">to evaluate the use of our Platform for our business purposes and to improve and develop our products and services, including new products and services and our Platform's functionality;</li>
				  		<li style="font-size:12pt; text-align: justify">to prevent fraud and to maintain a quality experience for our business purposes or legal reasons, including to filter for spam and communications that violate our agreements with you ;</li>
				  		<li style="font-size:12pt; text-align: justify">to provide for the safety and security of workers and onsite visitors;</li>
				  		<li style="font-size:12pt; text-align: justify">to promote and market services to you;</li>
              <li style="font-size:12pt; text-align: justify">to perform research and analysis for our business purposes; and</li>
              <li style="font-size:12pt; text-align: justify">to identify and communicate with you</li>
              <li style="font-size:12pt; text-align: justify">to enable us to provide you with requested information, products or services</li>
              <li style="font-size:12pt; text-align: justify">to otherwise assist customers by providing them with information and support</li>
              <li style="font-size:12pt; text-align: justify">to help us to manage and enhance products or services we provide to you</li>
				  	</ul>
				  </li>
          <li style="font-size:12pt;"><strong>How this is COLLECTED</strong>
            <ul>
              <li style="font-size:12pt; text-align: justify">when you use or buy our products or services</li>
              <li style="font-size:12pt; text-align: justify">when you provide us, or you offer or apply to supply us with goods or services</li>
              <li style="font-size:12pt; text-align: justify">when you provide information to us in any way (including by completing a form, disclosing information over the phone or via email, or providing us a business card)</li>
              <li style="font-size:12pt; text-align: justify">when you request information about us, our products or our services</li>
              <li style="font-size:12pt; text-align: justify">when you visit or fill in a form on our Website</li>
              <li style="font-size:12pt; text-align: justify">when you otherwise contact us by telephone, email, social media, post or in person</li>
            </ul>
          </li><br>
          <p style="font-size:12pt;text-align: justify">but we will only collect your Personal Information in this way if it is unreasonable or impractical to collect this information directly from you or if we are otherwise permitted to do so.</p>
          <li style="font-size:12pt;"><strong>How this information may be SHARED</strong>
            <p style="font-size:12pt;text-align: justify">We do not rent or sell your personal contact information (such as your email address associated with your account registration) to third parties to use for their own marketing purposes. We do not disclose personal data to third parties unless required to do so by law or ordered to do so by a court order. This does not include the disclosure of personal data to third parties:
            </p>
            <ul>
              <li style="font-size:12pt; text-align: justify">for the legal protection of users;</li>
              <li style="font-size:12pt; text-align: justify">to meet legal requirements;</li>
              <li style="font-size:12pt; text-align: justify">to defend and protect the rights of the provider;</li>
              <li style="font-size:12pt; text-align: justify">to comply with the terms of use or the data protection regulations;</li>
              <li style="font-size:12pt; text-align: justify">to solve technical problems of the products;</li>
              <li style="font-size:12pt; text-align: justify">to process your enquiries via a form on our website, which requires the transmission of data to process your enquiry or order. In these cases, the transmission of the data is limited to the necessary minimum for their order fulfilment. </li>
            </ul>
          </li>
          <li style="font-size:12pt;"><strong>Data Security</strong>
             <p style="font-size:12pt;text-align: justify">We use reasonable appropriate measures to protect your personal information from loss, misuse, unauthorized access, disclosure, alteration, and destruction, taking into account the risks involved in the processing and the nature of the personal information.</p>
          </li>
				</ol> 
        
        
			</div>
		</div>
	</div>
  <div v-show="list_of_all_designs_page" class="container">
      <!-- Content Header-->
        <hr id="building" class="hr-text" data-content="Building Designs">
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
<script>
	  export default {
    data() {
      return {
        Policies_rules: 'image/policies_rules.png',
        logo: 'image/logo2.png',
        main: true,
        list_of_all_designs_page: false,
        list_of_buildings: {},
        pagination: {},
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Login',
              path: 'choose_account.page'
            }
          ]     
        },
      }
    },
    mounted() {
      this.get_individuals_username();
    },
    methods: {

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
        get_individuals_username() {
              axios.get('user/info/').then(result => {
             

                var username = result.data.name

                $('#username').html(username);
                

                }).catch(error => {
                    console.log(error);
                });
        },

    }
  }
</script>
<style scoped>
  /* responsive ni nga image */
.card-img-top {
  width: 100%;
  height: 15vw;
  object-fit: cover;
}

.left-img {
  width: 80px;
  height: 5vw;
  object-fit: cover;
}

@media screen and (min-width: 320px) {
    .card-img-top {
    width: 100%;
    height: 50vw;
    object-fit: cover;
    }

    .left-img {
    width: 100px;
    height: 20vw;
    object-fit: cover;
    }
    
}

@media screen and (min-width: 375px) {
    .card-img-top {
    width: 100%;
    height: 50vw;
    object-fit: cover;
    }

    .left-img {
    width: 150px;
    height: 20vw;
    object-fit: cover;
    }
    
}

@media screen and (min-width: 768px) {
    .card-img-top {
    width: 100%;
    height: 40vw;
    object-fit: cover;
    }

    .left-img {
    width: 120px;
    height: 10vw;
    object-fit: cover;
    }
    
}

@media screen and (min-width: 1024px) {
    .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
    }

    .left-img {
    width: 80px;
    height: 5vw;
    object-fit: cover;
    }
    
}

@media screen and (min-width: 2652px) {
    .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
    }

    .left-img {
    width: 80px;
    height: 5vw;
    object-fit: cover;
    }
    
}
.market {
  text-align: center;
  background-color: #3E5C9A;
  color: #fff;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px; 
  font-weight: bolder;

}

.fa-list-ul {
  padding: 5px 5px 5px 5px;

}

a {
  color: rgb(68, 68, 68);
}
a:hover {
  text-decoration: none;
}

.list-group > .list-group-item:hover {
  background-color: rgb(245, 245, 245);
}

/* stars COLOR */
.stars {
  color: #FFD700;
}

/* card hover */
.card {
  border: none;
  box-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
}
.card:hover {
  box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11), 0 5px 15px 0 rgba(0,0,0,0.08);
}

.nav-link:hover {
  background-color: rgb(240, 240, 240);
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
</style>