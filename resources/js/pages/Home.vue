<template>
  <div> 
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">    
          <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <a class="navbar-brand">
                    <router-link v-if="!$auth.check()" :to="{name: 'home'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
                </a>
                  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                        <li class="nav-item">
                          <a class="w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none">Collections</a>
                        </li>
                        <li class="nav-item">
                           <a href="" class="w3-bar-item w3-button" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                            <router-link style="color:#696969; text-decoration: none" :to="{ name : route.path }" :key="key">
                                        {{route.name}}
                                </router-link>
                           </a>
                        </li>
                     </ul>             
                 </div>     
            </nav>
        </div>
    </div> 
       <div class="container">  
   <!--       <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
          <img class="w3-image" :src="header_img" alt="Architecture">
          <div class="w3-display-middle w3-margin-top w3-center">
            <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding_l w3-black w3-opacity-min"><b>CB</b></span> <span style="color:#fff" class="w3-hide-small w3-text-light-grey">Designs</span></h1>
          </div>
        </header> -->

            <div class="card col-lg-12" style="margin-top:100px;">
              <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <img class="d-block img-fluid" :src="ad1" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block img-fluid" 
                    :src="ad2" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block img-fluid" 
                    :src="ad3" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>     
            </div>

        <div id="building"></div>
         <!-- Content Header-->
       <hr class="hr-text" style="margin-top: 100px" data-content="Senebu Design Collections">

      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-4">
                 <div class="card">
                        <a class="collection-card">   
                          <span>
                            <!-- <router-link :to="{name:'public_residential'}"><img class="card-img-top" :src="residential"></router-link> -->
                            <router-link :to="{name:'residential.selection'}"><img class="card-img-top" :src="residential"></router-link>
                          </span>
                          <div class="collection-name-container">
                            <p>Residential Houses</p>
                          </div>
                        </a>
                  </div>
         </div>
          <div class="col-lg-4 mb-4">           
              <div class="card">
                    <a class="collection-card">   
                      <span>
                    <!--     <router-link :to="{name:'public_commercial'}"><img class="card-img-top" :src="commercial"></router-link> -->
                        <router-link :to="{name:'commercial.selection'}"><img class="card-img-top" :src="commercial"></router-link>
                      </span>
                      <div class="collection-name-container">
                        <p>Commercial Houses</p>
                      </div>
                    </a>
              </div>
          </div>
          <div class="col-lg-4 mb-4">        
              <div class="card">
                    <a class="collection-card"> 
                      <span>  
                      <!--   <router-link :to="{name:'public_interior'}"><img class="card-img-top" :src="hospitality"></router-link> -->
                        <router-link :to="{name:'hospitality.selection'}"><img class="card-img-top" :src="hospitality"></router-link>
                      </span>
                      <div class="collection-name-container">
                        <p>Hospitality</p>
                      </div>
                    </a>
              </div>
          </div>   
        </div>

<!--         <div class="justify-content-center align-items-center row">
          <div class="col-lg-4 ">        
              <div class="card">
                    <a class="collection-card"> 
                      <span>   -->
                      <!--   <router-link :to="{name:'public_interior'}"><img class="card-img-top" :src="hospitality"></router-link> -->
    <!--                     <router-link :to="{name:'hospitality.selection'}"><img class="card-img-top" :src="furnitures"></router-link>
                      </span>
                      <div class="collection-name-container">
                        <p>Home Furnitures & Accessories</p>
                      </div>
                    </a>
              </div>
          </div> 
        </div> -->

      </div>
  </div>

      <div class="container">
        <div class="choose-senebu">
          <h1>
            Why choose Senebu?
          </h1>
          <div class="row mt-4">
            <div class="col-md-4" style="padding:20px 50px">
                <i class="fa fa-edit" style="font-size:28pt"></i>
                <h3>Customize any plan</h3>
                <p>We will work with you to create small or large changes therefore you get the house of your dreams.</p>
            </div>
            <div class="col-md-4" style="padding:20px 50px">
                <i class="fa fa-shield" style="font-size:28pt"></i>
                <h3>Licensed Architect / Designer  </h3>
                <p>We will offer you a licensed architect and interior designer to plan your dream house.</p>
            </div>
            <div class="col-md-4" style="padding:20px 50px">
                <i class="fa fa-home"  style="font-size:28pt"></i>
                <h3>Quality of design</h3>
                <p>We will offer you good quality of every design so you can choose better for your dream house.</p>
            </div>
          </div>
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
      
       
        header_img: 'image/architectural-design.jpg',
        residential: 'image/residential.jpeg',
        commercial: 'image/commercial.jpeg',
        interior: 'image/interior.jpeg',
        hospitality: 'image/hospitality.jpg',
        furnitures: 'image/furnitures.jpg',
        ad1: 'image/ad1.jpg',
        ad2: 'image/ad2.png',
        ad3: 'image/ad4.png',
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Login',
              path: 'login'
            }
          ]     
        },

        logo: 'image/logo2.png'

      }
      
    },
    
    
    mounted() {
        
       
    },

   
    }
  

</script>