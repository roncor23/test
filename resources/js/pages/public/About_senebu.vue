<template>
	<div>
	    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">    
          <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <a class="navbar-brand" href="/">
                   <img class="w3-bar-item ml-4" :src="logo" id="logo">
                </a>              
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <div class="input-group">
                      <input id="search" type="text" class="sear form-control" placeholder="Ex: One storey" aria-describedby="basic-addon2" style="border-color: #e67e00" @change="">
                      <div class="input-group-append">
                        <button class="btn" type="button" style="width:150px; background-color: #e67e00; color:#fff;" @click="">Search</button>
                      </div>
                    </div>
                    <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                        <li class="nav-item">
                          <a class="w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none">Collections</a>
                        </li>
                        <li class="nav-item">
                           <a href="/choose-account" class="w3-bar-item w3-button" v-if="!$auth.check()" style="color:#696969; text-decoration: none" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">

                                        {{route.name}}
                           </a>
                        </li>
                     </ul>             
                 </div>     
            </nav>
        </div>
    </div> 
	<div class="container" style="margin-top:100px">
		<div class="row">
			<div class="col-md-6">
				<img :src="About_us">
			</div>
			<div class="col-md-6">
				<h2 style="margin-top:50px;font-weight:bold;color:#3b5998">ABOUT</h2><br>
				<span style="color:#3b5998;"><h4>senebu.co | The Builders</h4></span>
				<p style="font-size:12pt; text-align:justify">SENEBU is a web based providing a hassle-free platform that helps individuals to find the right architect and interior designer. We provide easy marketing of architects’ and interior designers' building designs and easy access to the individuals in viewing building designs. We give security to our customers and assure them to find what they’re looking for. We give hassle-free and a trustworthy transaction in all of our customers.</p>
				<span style="color:#3b5998;"><h4>What we do</h4></span>
				<p style="font-size:12pt; text-align:justify">  SENEBU offers different building designs of different registered architects and interior designers of the Philippines. We upgraded the traditional way of looking for an architect more easily and creatively using modern technology. Architects and interior designers nowadays make their profile and use social media as their way of connecting to the public. The SENEBU maximized their way of marketing by giving multiple architects’ and interior designers' design. In this way, clients can choose their preferred design anywhere anytime as long as they have access to the internet.</p>
			</div>
		</div>
	</div>
</div>
</template>
<script>
	  export default {
    data() {
      return {
        About_us: 'image/about_us.png',
        logo: 'image/logo2.png',
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
      
    },
    methods: {

    }
  }
</script>
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