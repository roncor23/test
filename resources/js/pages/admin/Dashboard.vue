<template>
     <div class="" style="margin-top:100px;">
      <hr id="building" class="hr-text" data-content="Architect Dashboard" style="">
      <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-3 mt-4 ml-4">
            <div class="list-group">
              <a class="list-group-item" @click="backto_home" style="cursor: pointer">Home</a>
              <a class="list-group-item" @click="my_designs" style="cursor: pointer">My designs</a>
              <a class="list-group-item" @click="open_table" style="cursor: pointer">Reserved design</a>
            </div>    
          </div>

          <div class="ml-4" v-if="chart">
           <div class="text-xs-center">
              <v-progress-circular
                :rotate="360"
                :size="120"
                :width="15"
                :value="total_visits"
                color="teal"
              >
              <span>Total Visits</span>
                {{ value1 }}%
              </v-progress-circular>

              <v-progress-circular
                :rotate="-90"
                :size="120"
                :width="15"
                :value="reserved_designs"
                color="primary"
              >
              <span>Reserved Designs</span>
                {{ value2 }}%
              </v-progress-circular>

              <v-progress-circular
                :rotate="90"
                :size="120"
                :width="15"
                :value="building_designs"
                color="red"
              >
              <span>Building Designs</span>
                {{ value3 }}%
              </v-progress-circular>

              <v-progress-circular
                :rotate="180"
                :size="120"
                :width="15"
                :value="total_sales"
                color="pink"
              >
                <span>Total Sales</span>
                {{ value4 }}%
              </v-progress-circular>
            </div>
          </div>

                <div v-if="architect_designs" class="" style="width:950px">
                  <div  class="loading column is-4 is-offset-4 justify-content-center align-items-center row" v-if="loading" v-cloak>
                    <i class="fa fa-cog fa-spin fa-3x fa-fw margin-bottom"></i>
                    <span class="sr-only">Loading...</span>
                   
                  </div>  
                  <div class="m-0">
                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" role="tab" data-toggle="tab" @click="getFiles('architecturalresidential')" style="cursor: pointer;color:black">Residential Design</a>
                        </li>   
                          <li class="nav-item">
                          <a class="nav-link" role="tab" data-toggle="tab" @click="getFiles('architecturalcommercial')" style="cursor: pointer;color:black">Commercial Design</a>
                          </li>  
                          <li class="nav-item">
                          <a class="nav-link" role="tab" data-toggle="tab" @click="getFiles('architecturalhospitality')" style="cursor: pointer;color:black">Hospitality Design</a>
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
                          <div class="col-lg-4 col-md-6" v-for="file in files" v-cloak>
                            <div class="card" v-if="image">
                              <div class="container-fluid mt-3">
                                <div class="wrapper">

                                  <div class="preview"><!-- start residential -->                                 
                                    <div class="preview-pic tab-content">
                                      <div class="tab-pane active" id="pic-1">
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <router-link :to="{ name: 'admin.preview_design', params: { portfolio_id: file.id } }" ><img class="card-img-top img-taas"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id"></router-link>
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <router-link :to="{ name: 'admin.portfolio_byDesign', params: { portfolio_id: file.id } }" ><img class="card-img-top img-taas"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id"></router-link>
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <router-link :to="{ name: 'admin.portfolio_byDesign', params: { portfolio_id: file.id } }" ><img class="card-img-top img-taas"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id"></router-link>
                                        </span>
                                      </div>            
                                    </div>
                                    <ul class="preview-thumbnail nav nav-tabs">
                                      <li class="active">
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>                              
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span> 
                                        <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>                                                                 
                                     </li>
                                      <li>
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>
                                         <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>                                       
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>                                     
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'architecturalresidential'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                        </span>
                                        <span class="" v-if="file.type == 'architecturalcommercial'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                       </span>
                                        <span class="" v-if="file.type == 'architecturalhospitality'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/portfolio/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.id + '.' + file.extension" :alt="file.id">
                                       </span>                                  
                                      </li>
                                    </ul>
                                  </div><!-- end residential -->
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

            <div class="mt-4" v-if="table" style="margin-left:50;">
              <v-card>
                 <v-card-title>
                  Reserved Design
                  <v-spacer></v-spacer>
                  <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Search"
                    single-line
                    hide-details
                  ></v-text-field>
                </v-card-title>
                <v-data-table
                  :headers="headers"
                  :items="display_reserved_design_per_architects"
                  :search="search"
                  hide-actions
                  :pagination.sync="pagination1"
                  class="elevation-1"
                >
                  <template slot="items" slot-scope="props">
                    <td>{{ props.item.billing_name }}</td>
                    <td class="text-xs-right">{{ props.item.billing_address_country }}</td>
                    <td class="text-xs-right">{{ props.item.billing_address_country_code }}</td>
                    <td class="text-xs-right">{{ props.item.billing_address_zip }}</td>
                    <td class="text-xs-right">{{ props.item.billing_address_line1 }}</td>
                    <td class="text-xs-right">{{ props.item.design_name }}</td>
                    <td class="text-xs-right">{{ props.item.designer_name }}</td>
                  </template>
                  <v-alert slot="no-results" :value="true" color="error" icon="warning">
                    Your search for "{{ search }}" found no results.
                  </v-alert>
                </v-data-table>
                <div class="text-xs-center pt-2">
                  <v-pagination v-model="pagination1.page" :length="pagesa"></v-pagination>
                </div>
              </v-card>
              </div>
        </div>

  

      </div>
      
</template>

<style scoped>

.v-progress-circular {
  margin: 2rem
}

div a:hover {
  background-color: #E6E6FA;
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
        display_reserved_design_per_architects: [],
        interval_noti: {},
        interval: {},
        pagination: {},
        pagination1: {},
        offset: 5,

        activeTab: 'houses',
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
          { text: 'Design name', value: 'design_name' },
          { text: 'Designer name', value: 'designer_name' }
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

        my_designs() {
          this.chart = false;
          this.architect_designs = true;
          this.table = false;
        },

        open_table() {
          this.table = true;
          this.chart = false;
          this.architect_designs = false;
        },

        display_reserved_design_per_architect() {

          axios.get('individual/reserved_design_per_architect/').then(result => {

                  this.display_reserved_design_per_architects = result.data;
                  console.log(this.display_reserved_design_per_architects);

              }).catch(error => {
                  console.log(error);
              });

      },
      noti_reserved_design_per_architect() {
          this.loading = true;
          axios.get('notification/noti_reserved_design_per_architect/').then(result => {

            var i;
            var html='';

            if(result.data == 0) {

             $('.badge_n').html('');

            }else {
                $('.badge_n').html(result.data);
            }


              }).catch(error => {
                  console.log(error);
              });

      },

      text_noti_reserved_design_per_architect() {
        this.loading = true;
        axios.get('notification/text_noti_reserved_design_per_architect/').then(result => {

            var i;
            var html='';


            for(i=0;i<result.data.length;i++) {

              html+= '<p style="">' + '<b>' +result.data[i].billing_name+ '</b>' + '&nbsp; have successfully reserved your design.</p><div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>'; 

              $('.notification').html(html);

             
            } 

            console.log(result.data);

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
        get_user_info() {
        axios.get('user/info/').then(result => {
           
            var i;
            var html=''         
            for(i=0;i<result.data.length;i++) {

              html+= '<span>' +result.data[i].name+ '</span>'; 

              $('#username').html(html);

             
            } 

              }).catch(error => {
                  console.log(error);
              });

      },

    },
    mounted() {

      var obj1 = this.value1;
      var obj2 = this.value2;
      var obj3 = this.value3;
      var obj4 = this.value4;

      // this.interval_noti = setInterval(() => {
      //     this.noti_reserved_design_per_architect();
      //     console.log("asd");
      // }, 1000)


      this.interval = setInterval(() => {
        if (this.total_visits === obj1) {
          return (this.total_visits = 0)
        }
        this.total_visits += 1
      }, 1000)

      this.interval = setInterval(() => {
        if (this.reserved_designs === obj2) {
          return (this.reserved_designs = 0)
        }
        this.reserved_designs += 1
      }, 1000)

      this.interval = setInterval(() => {
        if (this.building_designs === obj3) {
          return (this.building_designs = 0)
        }
        this.building_designs += 1
      }, 1000)

      this.interval = setInterval(() => {
        if (this.total_sales === obj4) {
          return (this.total_sales = 0)
        }
        this.total_sales += 1
      }, 1000)
        
        this.fetchFile(this.activeTabAll, this.pagination.current_page);
        this.display_reserved_design_per_architect();
        this.noti_reserved_design_per_architect();
        this.text_noti_reserved_design_per_architect();
        this.get_user_info();

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
