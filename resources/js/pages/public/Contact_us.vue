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
				<img :src="Contact_us">
			</div>
			<div class="col-md-6">
				<h2 style="margin-top:50px;font-weight:bold;color:#3b5998">CONTACT US</h2><br>
				<p class="" style="color:#3b5998;display: flex;"><i class="fas fa-mobile-alt" style="font-size:35pt"></i><i class="ml-4 align-self-center" style="font-size:12pt">Globe: (0935) 315-3034</i></p>

				<p style="color:#3b5998;display: flex"><i class="fas fa-envelope" style="font-size:25pt"></i><i class="ml-4 align-self-center" style="font-size:12pt">info.senebu@gmail.com</i></p>

				<h4 style="color:#3b5998;">Our Social Media</h4>
				<a href="https://www.facebook.com/senebu2018" target="_blank"><i class="fab fa-facebook-square" style="font-size:25pt;color:#3b5998"></i></a>
				<i class="fab fa-instagram ml-1" style="font-size:25pt;color:#3b5998"></i>
				<i class="fab fa-twitter-square ml-1" style="font-size:25pt;color:#3b5998"></i>
			</div>
		</div>
	</div>
</div>
</template>
<script>
	  export default {
    data() {
      return {
        Contact_us: 'image/contact_us.png',
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