<template>
     <div class="" style="margin-top:100px;">
      <div  class="loading column is-4 is-offset-4 justify-content-center align-items-center row" v-if="loading" v-cloak>
        <i class="fa fa-cog fa-spin fa-3x fa-fw margin-bottom"></i>
        <span class="sr-only">Loading...</span>                  
      </div>  
      <hr id="building" class="hr-text" data-content="Architectural Designs" style="">
      <div class="row">
<!--           <div class="col-sm-12 col-md-12 col-lg-3 mt-4 ml-4">
            <div class="list-group">
              <a class="list-group-item" @click="my_designs" style="cursor: pointer">My designs</a>
              <a class="list-group-item" @click="open_table" style="cursor: pointer">Reserved design</a>
            </div>    
          </div> -->

                <div class="container">

                  <div class="m-0">
                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" role="tab" data-toggle="tab" @click="getFiles('architecturalresidential')" style="cursor: pointer;color:black">Residential Designs</a>
                        </li> 
                        <li class="nav-item">
                          <a class="nav-link " role="tab" data-toggle="tab" @click="getFiles('architecturalcommercial')" style="cursor: pointer;color:black">Commercial Designs</a>
                        </li> 
                        <li class="nav-item">
                          <a class="nav-link " role="tab" data-toggle="tab" @click="getFiles('architecturalhospitality')" style="cursor: pointer;color:black">Hospitality Designs</a>
                        </li>
                         <li class="nav-item">
                          <a class="nav-link " role="tab" data-toggle="tab" @click="getFiles('architecturalinstitutional')" style="cursor: pointer;color:black">Institutional Designs</a>
                        </li>
                       <li class="nav-item">
                          <a class="nav-link " role="tab" data-toggle="tab" @click="getFiles('architecturalindustrial')" style="cursor: pointer;color:black">Industrial Designs</a>
                        </li>            
                      </ul>
                      <div class="" style="float:right">
                        <a class="btn btn-primary mt-3" href="/architect/upload_building" style="cursor: pointer; color:#fff;" v-if="visible">Upload</a>
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
                          <div class="col-lg-4 col-md-6" v-for="file in files" v-cloak>
                            <div class="card" v-if="image">
                              <div class="container-fluid mt-3">
                                <div class="wrapper">

                                  <div class="preview"><!-- start design -->                                 
                                    <div class="preview-pic tab-content">
                                      <div class="tab-pane active" id="pic-1">
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <router-link :to="{ name: 'admin.preview_design', params: { portfolio_id: file.id } }" ><img class="card-img-top img-taas"  :src="'../storage' + '/thumbnail/main_pic/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id"></router-link>
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <router-link :to="{ name: 'admin.preview_design', params: { portfolio_id: file.id } }" ><img class="card-img-top img-taas"  :src="'../storage' + '/thumbnail/main_pic/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id"></router-link>
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <router-link :to="{ name: 'admin.preview_design', params: { portfolio_id: file.id } }" ><img class="card-img-top img-taas"  :src="'../storage' + '/thumbnail/main_pic/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id"></router-link>
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalinstitutional'">
                                              <router-link :to="{ name: 'admin.preview_design', params: { portfolio_id: file.id } }" ><img class="card-img-top img-taas"  :src="'../storage' + '/thumbnail/main_pic/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id"></router-link>
                                        </span>
                                      </div>            
                                    </div>
                                    <ul class="preview-thumbnail nav nav-tabs">
                                      <li class="active">
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/main_pic/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/main_pic/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/main_pic/' + file.user_name + '_' + file.user_id +  file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                         <span class="" v-if="file.type == 'architecturalinstitutional'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/main_pic/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail1/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail1/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail1/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                         <span class="" v-if="file.type == 'architecturalinstitutional'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail1/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail2/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail2/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail2/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                         <span class="" v-if="file.type == 'architecturalinstitutional'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail2/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>   
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail3/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                         <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail3/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                         <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail3/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                         <span class="" v-if="file.type == 'architecturalinstitutional'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail3/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail4/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail4/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail4/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                         <span class="" v-if="file.type == 'architecturalinstitutional'">
                                              <img class="card-img-top img-ubos"  :src="'../storage' + '/thumbnail/thumbnail4/' + file.user_name + '_' + file.user_id + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                      </li>
                                    </ul>
                                  </div><!-- end design -->
                                </div>
                              </div>
                              <button class="delete delete-file btn btn-danger m-3 " title="Delete" @click="deleteFile(file)">Delete</button>
                              <router-link id="preview" :to="{ name: 'admin_edit.portfolio_byDesign', params: { portfolio_id: file.id } }" class="btn m-3" style="background-color:#008080"><button style="color:#fff">Edit</button></router-link>
                            </div>
                          </div>
                        </div>                                     
                      </div><!-- end sa houses TAB -->
                    </div>

                  </div>
                <!-- /.row -->
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

<style scoped>

.v-progress-circular {
  margin: 2rem
}



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


.card:hover {
  box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11), 0 5px 15px 0 rgba(0,0,0,0.08);
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
        display_reserved_design_per_architects: [],
  

        pagination: {},
        pagination1: {},
        offset: 5,

        activeTab: 'architecturalresidential',
        activeTabAll: 'architecturalresidential',
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
        image: true,
        architect_designs: false,
        table: false,
        chart: true,
        interval: {},
        value1: 35,
        value2: 33,
        value3: 63,
        value4: 24,
        total_visits: 0,
        reserved_designs: 0,
        building_designs: 0,
        total_sales: 0,
        search: '',

         headers: [
          {
            text: 'Billing name',
            align: 'left',
            sortable: false,
            value: 'billing_name'
          },
          { text: 'Billing address country', value: 'billing_address_country' },
          { text: 'Country code', value: 'billing_address_country_code' },
          { text: 'Zip code', value: 'billing_address_zip' },
          { text: 'Address', value: 'billing_address_line1' },
          { text: 'Design code', value: 'design_name' }
        ]

      }
      
    },
    beforeDestroy () {
      clearInterval(this.interval)
    },

     methods: {

        backto_home() {
          this.chart = true;
          this.architect_designs = false;
          this.table = false;
        },

        get_architect_username() {
              axios.get('architect/username/').then(result => {
             

                var username = result.data.name

                $('#username').html(username);
                

                }).catch(error => {
                    console.log(error);
                });
        },

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

                // console.log( this.files);
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
              swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Portfolio!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
               
              axios.post('architect/delete_portfolio/' + this.deletingFile.id)
                .then(response => {
                   
                       swal("Your Portfolio has been successfully deleted!", {
                        icon: "success",
                      });
                     this.fetchFile(this.activeTab, this.pagination.current_page);
                })
                .catch(error => {
                    this.errors = error.response.data.errors();
                    this.showNotification('Something went wrong! Please try again later.', false);
                    this.fetchFile(this.activeTab, this.pagination.current_page);
                });
                } else {
                  swal("Your Portfolio is safe!");
                }
              });
            
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
        },


    },
    mounted() {

      this.get_architect_username();

        
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
        },
       pagesa () {
        if (this.pagination1.rowsPerPage == null ||
          this.pagination1.totalItems == null
        ) return 0

        return Math.ceil(this.pagination1.totalItems / this.pagination1.rowsPerPage)
      }
    }
  }

</script>
