<template>
	<div style="margin-top:100px">
		       <div class="container" style="width:950px">
                  <div class="m-0">
                      <ul class="nav nav-tabs" role="tablist">
                      <!--   <li class="nav-item">
                          <a class="nav-link active" role="tab" data-toggle="tab" @click="getFiles('architecturalresidential')" style="cursor: pointer;color:black">Furnitures & Accessories</a>
                        </li>   -->    
                          <li class="nav-item">
                            <a class="nav-link active" role="tab" data-toggle="tab" style="cursor: pointer;color:black">Furnitures & Accessories</a>
                        </li>          
                      </ul>
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
                                        <span class="" v-if="file.type == 'furnituresAccessories'">
                                              <router-link :to="{ name: 'super_admin.preview_furnituresAccessories', params: { portfolio_id: file.id } }" ><img class="card-img-top img-taas"  :src="'storage' + '/furnitureAccessories/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id"></router-link>
                                        </span>
                                      </div>            
                                    </div>
                                    <ul class="preview-thumbnail nav nav-tabs">
                                      <li class="active">
                                        <span class="" v-if="file.type == 'furnituresAccessories'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/furnitureAccessories/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>                       
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'furnituresAccessories'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/furnitureAccessories/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>                    
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'furnituresAccessories'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/furnitureAccessories/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>   
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'furnituresAccessories'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/furnitureAccessories/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                      </li>
                                      <li>
                                        <span class="" v-if="file.type == 'furnituresAccessories'">
                                              <img class="card-img-top img-ubos"  :src="'storage' + '/furnitureAccessories/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.floor_plan_code + '.' + file.extension" :alt="file.id">
                                        </span>
                                      </li>
                                    </ul>
                                  </div><!-- end design -->
                                </div>
                              </div>
                              <button class="delete delete-file btn btn-danger m-3 " title="Delete" @click="deleteFile(file)">Delete</button>
                              <router-link id="preview" :to="{ name: 'super_admin.edit_furnituresAccessories', params: { portfolio_id: file.id } }" class="btn m-3" style="background-color:#008080"><button style="color:#fff">Edit</button></router-link>
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
</template>
<script>
export default {

  data() {
    return {
      
        files: [],
        display_reserved_design_per_interiors: [],
  

        pagination: {},
        pagination1: {},
        offset: 5,
        activeTab: 'furnituresAccessories',
        activeTabAll: 'furnituresAccessories',
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

        display_reserved_design_per_interior() {

          axios.get('individual/reserved_design_per_interior/').then(result => {

                  this.display_reserved_design_per_interiors = result.data;
                  // console.log(this.display_reserved_design_per_interiors);

              }).catch(error => {
                  console.log(error);
              });

      },
      noti_reserved_design_per_interior() {
          this.loading = true;
          axios.get('notification/noti_reserved_design_per_interior/').then(result => {

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

      text_noti_reserved_design_per_interior() {
        this.loading = true;
        axios.get('notification/text_noti_reserved_design_per_interior/').then(result => {

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
            axios.get('super_admin/display_furnitures_accessories/' + type + '?page=' + page).then(result => {
                this.loading = false;
                this.files = result.data.data.data;
                this.pagination = result.data.pagination;

                console.log( this.files);
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
                text: "Once deleted, you will not be able to recover this Product!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
               
              axios.post('super_admin/delete_product/' + this.deletingFile.id)
                .then(response => {
                   
                       swal("Your Product has been successfully deleted!", {
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
                  swal("Your Product is safe!");
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

              html+= '<span style="color:#696969">' +result.data[i].name+ '</span>'; 

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
        // this.display_reserved_design_per_interior()
        // this.noti_reserved_design_per_interior();
        // this.text_noti_reserved_design_per_interior();
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