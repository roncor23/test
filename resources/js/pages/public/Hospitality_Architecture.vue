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
                    <div class="input-group ml-4" style="width:700px">
                      <input id="search" type="text" class="form-control" placeholder="Ex: One storey" aria-describedby="basic-addon2" style="border-color: #e67e00" @change="list_of_designs">
                      <div class="input-group-append">
                        <button class="btn" type="button" style="width:150px; background-color: #e67e00; color:#fff;" @click="list_of_designs">Search</button>
                      </div>
                    </div>
                    <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                        <li class="nav-item">
                          <a class="w3-bar-item w3-button" href="#building" style="color:#696969; text-decoration: none"><router-link  style="color:#696969;text-decoration:none" :to="{name: 'home'}">Home</router-link>
                          </a>                        
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

  <div class="container" style="margin-top:50px">
      <div  class="loading column is-4 is-offset-4 justify-content-center align-items-center row mt-4" v-if="loading" v-cloak>
          <i class="fa fa-cog fa-spin fa-3x fa-fw margin-bottom"></i>
          <span class="sr-only">Loading...</span>
         
      </div> 
  	           <!-- Content Header-->

    <div v-show="main" class="tab-content" style="margin-top:50px">
        <hr id="building" class="hr-text" data-content="Hospitality Architectural Designs" style="margin-top:50px">
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
          <div class="col-lg-4 col-md-6 mb-4" v-for="file in files" v-cloak>
            <div class="card">
              <span class="" v-if="file.type == 'architecturalhospitality'" style="cursor: pointer;">
                 <router-link :to="{ name: 'public_user.portfolio_byDesign', params: { portfolio_id: file.id } }"><img class="card-img-top"  :src="'../storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></router-link>
              </span>
             
              <div class="card-body" v-if="file.type == 'architecturalhospitality'">
                <h6 class="card-title">
                  <a href="#"><b>{{ file.name }}</b></a>
                  <a class="fa fa-bed" style="float:right">&nbsp;&nbsp;&nbsp;{{ file.beds }}</a>
                </h6>
                <h6>
                  <a>Design #:&nbsp;&nbsp;{{ file.floor_plan_code }}</a>
                  <a class="fa fa-bath" style="float:right">&nbsp;&nbsp;&nbsp;{{ file.baths }}</a>
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
      <div v-show="list_of_all_designs_page" class="tab-content" style="margin-top:50px">
                           <!-- Content Header-->
        <hr id="building" class="hr-text" data-content="Building Designs" style="margin-top:50px">
          <div class="tab-content" style="margin-top:50px">
            <div role="tabpanel" class="tab-pane active" id="houses" >
              <div class="row mt-3 mb-5" >                         
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
  </div>
</template>

<script>
  export default {

  data() {
    return {
      
       files: {},
        file: {},
        pagination: {},
        offset: 5,
        building: 'architecturalhospitality',
        loading: false,
        errors: {},
        empty_bin: '../image/empty.jpg',
        main: true,
        list_of_all_designs_page: false,
        list_of_buildings: {},
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Login',
              path: 'login'
            }
          ]     
        },

        logo: '../image/logo2.png',
        noti: true

      }
      
    },
     props: {
            source: String
        },
     methods: {
        // isActive(tabItem) {
        //     return this.activeTab === tabItem;
        // },

        // setActive(tabItem) {
        //     this.activeTab = tabItem;
        // },

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

                this.main = false;
                this.list_of_all_designs_page = true;
                this.loading = false;

              }).catch(error => {
                  console.log(error);
              });
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

.btn:hover {
   background-color: #b36200 !important;
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
</style>