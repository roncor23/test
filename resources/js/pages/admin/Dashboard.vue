<template>
     <div class="container" style="margin-top:100px;">
       <hr id="building" class="hr-text" data-content="Architect Dashboard" style="">
        <div class="m-0">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" href="#houses" role="tab" data-toggle="tab" @click="getFiles('houses')" style="cursor: pointer;color:black">Residential Houses</a>
              </li>       
            </ul>
            <div class="" style="float:right">
              <router-link :to=" {name: 'admin.upload_building'} "><a class="btn btn-primary mt-3" style="cursor: pointer; color:#fff;" v-if="visible">Upload</a></router-link>
            </div>
        </div>       
        <div class="row">
          <div class="tab-content" >
            <div role="tabpanel" class="tab-pane active" id="houses" >
              <div class="row ml-auto mt-3 mb-5" >        
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
                <div  class="loading column is-4 is-offset-4" v-if="loading" v-cloak>
                  <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                  <span class="sr-only">Loading...</span>
                </div>                    
                <div class="col-lg-4 col-md-6" v-for="file in files" v-cloak>
                  <div class="card" v-if="image">
                    <div class="container-fluid mt-3">
                      <div class="wrapper">

                        <div class="preview">                                 
                          <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                              <span class="" v-if="file.type == 'houses'">
                                    <router-link :to="{ name: 'admin.portfolio_byDesign', params: { portfolio_id: file.id } }" ><img class="card-img-top img-taas"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code"></router-link>
                              </span>
                            </div>            
                          </div>
                          <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active">
                              <span class="" v-if="file.type == 'houses'">
                                    <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code">
                              </span>
                            </li>
                            <li>
                              <span class="" v-if="file.type == 'houses'">
                                    <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code">
                              </span> 
                            </li>
                            <li>
                              <span class="" v-if="file.type == 'houses'">
                                    <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code">
                              </span> 
                            </li>
                            <li>
                              <span class="" v-if="file.type == 'houses'">
                                    <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code">
                              </span>
                            </li>
                            <li>
                              <span class="" v-if="file.type == 'houses'">
                                    <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.floor_plan_code">
                              </span>
                            </li>
                          </ul>
                        </div><!-- end residential -->
                      </div>
                    </div>
                    <button class="delete delete-file btn btn-danger m-3 " title="Delete" @click="deleteFile(file)">Delete</button>
                  </div>
                </div>
              </div>                                     
            </div><!-- end sa houses TAB -->
          </div>
        <!-- Pagination start -->
           <nav  v-if="pagination.last_page > 1" v-cloak>
              <ul class="pagination" style="border: 1px solid blue; position: ">
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
        <!-- Pagination End -->
            </nav> 
        </div>
      <!-- /.row -->
     </div>
      
</template>

<style scoped>

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; 
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


.img-taas {
    width: 100%;
    height: 23vh;
    object-fit: cover;
}

.img-ubos {
    width: 100%;
    height: 7vh;
    object-fit: cover;
}

h1,p {
    color: #444;
}
.card:hover {
  box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11), 0 5px 15px 0 rgba(0,0,0,0.08);
}

body {
  padding-top: 54px;
}

@media (min-width: 992px) {
  body {
    padding-top: 56px;
  }
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

</style>

<script>
export default {

  data() {
    return {
      
       files: [],
  

        pagination: {},
        offset: 5,

        activeTab: 'houses',
        activeTabAll: 'houses',
        isVideo: false,
        loading: false,

        editingFile: {},
        deletingFile: {},
        message: '',
        errors: {},
        empty_bin: '/image/empty.jpg',
        identity_licenses: [],
        open_modal: false,
        visible: true,
        image: true

      }
      
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

        fetchFile(type, page) {
            this.loading = true;
            axios.get('architect/display_portfolio_all/' + type + '?page=' + page).then(result => {
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
            this.fetchFile(type);
        }, 
        deleteFile(file) {
              this.deletingFile = file;
               let conf = confirm("Are you sure you want to delete?");
                if (conf === true) {

            axios.post('architect/delete_portfolio/' + this.deletingFile.id)
                .then(response => {
                   
                    alert("Portfolio deleted successfully!");
                     this.fetchFile(this.activeTab, this.pagination.current_page);
                })
                .catch(error => {
                    this.errors = error.response.data.errors();
                    this.showNotification('Something went wrong! Please try again later.', false);
                    this.fetchFile(this.activeTab, this.pagination.current_page);
                });

            }
        },

        editFile(file) {
            this.editingFile = file;
        },

        endEditing(file) {
            this.editingFile = {};

            if (file.name.trim() === '') {
                alert('Filename cannot be empty!');
                this.fetchFile(this.activeTab);
            } else {
                let formData = new FormData();
                formData.append('name', file.name);
                formData.append('type', file.type);
                formData.append('extension', file.extension);

                axios.post('files/edit/' + file.id, formData)
                    .then(response => {
                        if (response.data === true) {
                            this.showNotification('Filename successfully changed!', true);

                            var src = document.querySelector('[alt="' + file.name +'"]').getAttribute("src");
                            document.querySelector('[alt="' + file.name +'"]').setAttribute('src', src);
                        }
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                        this.showNotification(error.response.data.message, false);
                    });

                this.fetchFile(this.activeTab, this.pagination.current_page);
            }
        },  
        changePage(page) {
            if (page > this.pagination.last_page) {
                page = this.pagination.last_page;
            }
            this.pagination.current_page = page;
            this.fetchFile(this.activeTab, page);
        },
        anyError() {
            return Object.keys(this.errors).length > 0;
        },

        clearErrors() {
            this.errors = {};
        }
    },
    mounted() {
        
        this.fetchFile(this.activeTabAll, this.pagination.current_page);

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
