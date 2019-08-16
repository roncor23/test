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
				<h2 style="margin-top:50px;font-weight:bold;color:#3b5998">TERMS & CONDITIONS</h2><br>
				<ol>
          <li style="font-size:12pt"><strong>Area of application</strong>
            <p style="font-size:12pt;text-align: justify">As a user of the website www.senebu.co, you recognise the following general terms and conditions and the warranty and liability restrictions which are defined below. Senebu expressly reserves the right, without prior notice, to modify, supplement, or delete parts of the web pages or the entire service, or to close down the domain. In particular Senebu has the right to amend these Terms and Conditions for online use at any time. These Terms and Conditions for online use should be read through again from time to time.</p>
          </li>
          <li style="font-size:12pt"><strong>Information on www.senebu.co</strong>
            <p style="font-size:12pt;text-align: justify">At www.senebu.co, Senebu provides an information platform for architects, interior designers, and consumers. Senebu’s service is divided into sections: Residential, Commercial, Hospitality, Institutional and Industrial. These sections has two collections, which is the Architectural and Interior Designs. It enables the users to search for a specific type of high-quality designs from the segment in accordance with varying search criteria. The products which are shown are posted by the architects and interior designers which was registered to the Senebu platform. The selection does not claim to be exhaustive and is oriented towards the interests of the targeted groups. Senebu does not guarantee that the internet service will be available online at all times. This applies in particular to interference, interruptions or the possible breakdown of the internet site.<br><br>

             As a user you recognise that the contents of the website www.senebu.co and all the websites and internet services connected with it, in particular text, pictorial, video and sound material of all kinds, as well as the names of architects and interior designers are protected under copyright, patent, trademark, branding, design, company, industrial property and/or other legal protection. It is not permitted to users, neither for their own nor for outside commercial purposes, to copy, exploit, distribute or publish any part of the contents of www.senebu.co to use such contents for other purposes. In particular it is forbidden to change or remove logos, brand names, product or design names, references to copyright or other details from the contents.<br><br>

             The website www.senebu.co contain non-binding information which is in no respect part of a business relationship. Senebu regards the website www.senebu.co merely as a database containing a selection of creative designs of the professionals. Professional advice and reliable information must always be obtained from the respective manufacturer or specialist retailer. Any references to products and services, together with outside textual contributions, are prepared carefully in order to provide our users with valuable information. Where the contents and data are derived from third parties, Senebu takes all the usual steps in order to make sure that the information is correct and up to date. However, if any information is found to be incorrect users are requested to inform Senebu without delay.
            </p>
          </li>
          <li style="font-size:12pt"><strong>Information on www.senebu.co</strong>
            <p style="font-size: 12pt; text-align: justify">Senebu accepts no liability and provides no warranty of any kind for any damage which may result from the use of the website www.senebu.co.<br><br>

            This applies particularly to the correctness, completeness and up-to-dateness of the content and data, the download and use of files contained on the site and links to websites of third parties and for the correct functioning of such links. This also applies where the links are provided with comments. When including links to third-party websites Senebu takes all reasonable care to ensure that such sites do not contain illegal contents at the time the link is created. Senebu has no influence on the further development of these websites and hereby distances itself from any possible illegal content.<br><br>

            No liability is accepted particularly for any direct and indirect damage, for any loss of profit, failure of performance of any kind on the part of the internet, misuse by third parties or loss of programmes or other data in the user's information systems.
            </p>
          </li>

           <li style="font-size:12pt"><strong>Intellectual Property Rights</strong>
            <p style="font-size: 12pt; text-align: justify">Notification of claimed infringement of intellectual property rights<br><br>

              If you suspect that your intellectual property rights are being infringed on or from Senebu’s websites, please inform us immediately at info.senebu@gmail.com so we can take swift remedial action. It is neither the actual or presumed intention of Senebu to involve the time-consuming engagement of a lawyer for issuing a written warning, for which we are liable to pay the costs. In the case of notification regarding the claimed infringement of intellectual property rights, Senebu offers the following standard procedure:<br><br>
            </p>
            <ol>
              <li style="font-size: 12pt; text-align: justify">Senebu informs the manufacturer of the claimed infringement and includes the notification in this communication.</li>
              <li style="font-size: 12pt; text-align: justify"> Senebu blocks the content objected to; if the notification pertains to a geographically limited area, Senebu reserves the right to block the content objected to only for the territory in question.</li>
              <li style="font-size: 12pt; text-align: justify">Senebu reactivates the content objected to only after the claimed infringement has been resolved by the involved parties.</li>
              <li style="font-size: 12pt; text-align: justify">In the case of improper notification regarding the claimed infringement of intellectual property rights, the affected manufacturer and/or Senebu reserves the right to take appropriate legal measures.</li>
            </ol>
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