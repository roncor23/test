<template>

  <div>
      <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
        <img class="w3-image" :src="header_img" alt="Architecture">
        <div class="w3-display-middle w3-margin-top w3-center">
          <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>CB</b></span> <span style="color:#fff" class="w3-hide-small w3-text-light-grey">Designs</span></h1>
        </div>
      </header>
    <div class="container">
      <!-- BUILDING DESIGNS AREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
      <hr id="building" class="hr-text mt-5" data-content="Building Designs">
      <div  class="loading column is-4 is-offset-4 justify-content-center align-items-center row" v-if="loading" v-cloak>
        <i class="fa fa-cog fa-spin fa-3x fa-fw margin-bottom"></i>
        <span class="sr-only">Loading...</span>   
      </div> 
            <!-- TAB NAV -->
      <div class="m-0">
         <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" href="#houses" role="tab" data-toggle="tab" @click="getFiles('houses')" style="cursor: pointer;color:black">Residential Houses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" role="tab" data-toggle="tab" @click="getFiles('infrastructures')" style="cursor: pointer;color:black">Commercial</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#other" role="tab" data-toggle="tab" @click="getFiles('others')" style="cursor: pointer; color:black">Institutional</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="" role="tab" data-toggle="tab" @click="getFiles('infrastructures')" style="cursor: pointer; color: black">Hospitality</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#other" role="tab" data-toggle="tab" @click="getFiles('others')" style="cursor: pointer;color:black">Corporate</a>
              </li>
          </ul>
      </div> 

      <div class="tab-content" >
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
              <span class="" v-if="file.type == 'houses'" style="cursor: pointer;">
                 <router-link :to="{ name: 'user.portfolio_byDesign', params: { portfolio_id: file.id } }"><img class="card-img-top"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code"></router-link>
              </span>
              <span class="" v-if="file.type == 'infrastructures'" style="cursor: pointer;">
                  <a :href="'/building/by_design/' + file.id"><img class="card-img-top"  :src="'storage' + '/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code" ></a>
              </span>
              <span class="" v-if="file.type == 'others'" style="cursor: pointer;">
                  <a :href="'/building/by_design/' + file.id"><img class="card-img-top"  :src="'storage' + '/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code" ></a>
              </span>
              <div class="card-body" v-if="file.type == 'houses'">
                <h6 class="card-title">
                  <a href="#"><b>{{ file.name }}</b></a>
                  <a class="fa fa-bed" style="float:right">&nbsp;&nbsp;&nbsp;{{ file.beds }}</a>
                </h6>
                <h6>
                  <a>Design #:&nbsp;&nbsp;{{ file.floor_plan_code }}</a>
                  <a class="fa fa-bath" style="float:right">&nbsp;&nbsp;&nbsp;{{ file.baths }}</a>
                </h6>
                <h6>
                  <a class="fa fa-home" style="float:right">&nbsp;&nbsp;&nbsp;{{ file.floors }}</a>
                </h6>
              </div>
            </div>
          </div>
          </div>                                     
        </div><!-- end sa houses TAB -->
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
</template>
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
        header_img: 'image/architectural-design.jpg'

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
        noti_reserved_design_per_user() {
        this.loading = true;
        axios.get('individual/reserved_design_per_user/').then(result => {

                  this.reserved_design_per_users = result.data;
                  console.log(this.reserved_design_per_users);
                  console.log(result.data.length);

            var i;
            var html='';


            for(i=0;i<result.data.length;i++) {

              // html+= '<p style="border:1px solid;color:black">' +result.data[i].user_name+  '&nbsp;  submitted the following: ID and PRC license for verification.</p>'; 

              // $('.notification').html(html);

              $('.badge_n').html(result.data.length);
            } 


              }).catch(error => {
                  console.log(error);
              });

      },
        getFiles(type) {
            this.setActive(type);
            this.fetchFileAll(type);
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
        this.noti_reserved_design_per_user();
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
}
img {
    vertical-align: middle;
}
img {
    border-style: none;
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
.w3-padding {
    padding: 8px 16px!important;
}
.w3-opacity-min {
    opacity: 0.75;
}
</style>

