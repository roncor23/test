<template>
  <div> 
    <div class="w3-top" v-if="!$auth.check()">
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
                          <a class="w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none">Projects</a>
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
       <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
        <img class="w3-image" :src="header_img" alt="Architecture">
        <div class="w3-display-middle w3-margin-top w3-center">
          <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding_l w3-black w3-opacity-min"><b>CB</b></span> <span style="color:#fff" class="w3-hide-small w3-text-light-grey">Designs</span></h1>
        </div>
      </header>

       <!-- BUILDING DESIGNS AREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
     <hr id="building" class="hr-text mt-5" data-content="Senebu Plan Collections">

      <div class="container">
        <div style="margin-left:100px">
        <span>
            <div class="card col-xs-4 mr-4 mb-4">
                  <a class="collection-card">   
                <router-link :to="{name:'residential'}"><img alt="Modern House Plans" src="https://cdn.houseplans.com/product/24grb9i4edkegpvh3rq0gmogl1/w300x200.jpg?v=3" width="300" height="200"></router-link>
              <div class="collection-name-container">
                <p>Residential Houses</p>
              </div>
                  </a>
            </div>
        </span>
        <span>
            <div class="card col-xs-4 mr-4 mb-4">
                  <a class="collection-card">   
                <router-link :to="{name:'commercial'}"><img alt="Modern House Plans" src="https://cdn.houseplans.com/product/24grb9i4edkegpvh3rq0gmogl1/w300x200.jpg?v=3" width="300" height="200"></router-link>
              <div class="collection-name-container">
                <p>Commercial Houses</p>
              </div>
                  </a>
            </div>
        </span>
        <span>
            <div class="card col-xs-4 mr-4 mb-4">
                  <a class="collection-card">   
                <router-link :to="{name:'interior'}"><img alt="Modern House Plans" src="https://cdn.houseplans.com/product/24grb9i4edkegpvh3rq0gmogl1/w300x200.jpg?v=3" width="300" height="200"></router-link>
              <div class="collection-name-container">
                <p>Interior Designs</p>
              </div>
                  </a>
            </div>
        </span>
      </div>
    </div>

</div>

</template>


<style scoped>

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
    top: 60%;
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
.card:hover {
  box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11), 0 5px 15px 0 rgba(0,0,0,0.08);
}
</style>

<script>
  export default {

  data() {
    return {
      
       files: {},
        file: {},
        pagination: {},
        offset: 5,
        building: 'houses',
        loading: false,
        errors: {},
        empty_bin: '/image/empty.jpg',
        header_img: 'image/architectural-design.jpg',

        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Login',
              path: 'login'
            }
          ]     
        },

        logo: 'image/logo2.png',
        header_img: 'image/architectural-design.jpg',
        noti: true

      }
      
    },
     props: {
            source: String
        },
     methods: {
        isActive(tabItem) {
            return this.activeTab === tabItem;
        },

        setActive(tabItem) {
            this.activeTab = tabItem;
        },

        isCurrentPage(page) {
            return this.pagination.current_page === page;
        },   

        architects_portfolio_showcase(type, page) {
          this.loading = true;
          axios.get('architects/portfolio_showcase/' + type + '?page=' + page).then(result => {
              this.loading = false;
              this.files = result.data.data.data;
              this.pagination = result.data.pagination;
          }).catch(error => {
              console.log(error);
              this.loading = false;
          });

        },
        getFiles(type) {
            this.setActive(type);
            this.architects_portfolio_showcase(type);
        },
        changePage(page) {
            if (page > this.pagination.last_page) {
                page = this.pagination.last_page;
            }
            this.pagination.current_page = page;
            this.architects_portfolio_showcase(this.building, page);
        },
        anyError() {
            return Object.keys(this.errors).length > 0;
        },
        clearErrors() {
            this.errors = {};
        }
    },
    mounted() {
        
        this.architects_portfolio_showcase(this.building, this.pagination.current_page);
    },

    computed: {
        pages() {
            let pages = [];

            let from = this.pagination.current_page - Math.floor(this.offset / 2);

            if (from < 1) {
                from = 1;
            }

            let to = from + this.offset - 1;

            if (to > this.pagination.last_page) {
                to = this.pagination.last_page;
            }

            while (from <= to) {
                pages.push(from);
                from++;
            }

            return pages;
        }
    }
  }

</script>