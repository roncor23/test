<template>
     <div class="" style="margin-top:100px;">
       <hr id="building" class="hr-text" data-content="Admin Dashboard" style="">
     
          <div class="row">

              <div class="col-sm-12 col-md-12 col-lg-3 mt-4 ml-4">
                <div class="list-group">
                  <a class="list-group-item" @click="backto_home" style="cursor: pointer">Home</a>
                  <a class="list-group-item"  @click="open_table" style="cursor: pointer">Reserved designs</a>
                  <a class="list-group-item" @click="" style="cursor: pointer">List of architects</a>
                  <a class="list-group-item" @click="" style="cursor: pointer">List of interior designer</a>
                  <a class="list-group-item" style="cursor: pointer">List of individuals</a>
                  <a class="list-group-item" style="cursor: pointer">Building designs</a>
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

             <div class="mt-4" v-if="table" style="margin-left:50;">
              <v-card>
                 <v-card-title>
                  Reserved
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
                  :items="display_reserved_designs"
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

<script>

  export default {
    data () {
      return {
        interval: {},
        value1: 35,
        value2: 33,
        value3: 63,
        value4: 24,
        total_visits: 0,
        reserved_designs: 0,
        building_designs: 0,
        total_sales: 0,
        table: false,
        chart: true,
        search: '',
        table: false,
        display_reserved_designs: [],

        pagination1: {},
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

      open_table() {
        this.table = true;
        this.chart = false;
      },
      backto_home() {
        this.chart = true;
        this.table = false;
      },
      display_reserved_design() {

        axios.get('individual/reserved_design/').then(result => {

                  this.display_reserved_designs = result.data;
                  console.log(this.display_reserved_designs);

              }).catch(error => {
                  console.log(error);
              });

      },
      noti_reserved_design_per_admin() {
          this.loading = true;
          axios.get('notification/noti_reserved_design_per_admin/').then(result => {

            var i;
            var html='';

            if(result.data == 0) {

             $('.badge_n').html('');

            }else {
                $('.badge_n').html(result.data);
            }
            console.log(result.data);

              }).catch(error => {
                  console.log(error);
              });

      },
      text_noti_reserved_design_per_admin() {
        this.loading = true;
        axios.get('notification/text_noti_reserved_design_per_admin/').then(result => {

            var i;
            var html='';


            for(i=0;i<result.data.length;i++) {

              html+= '<p style="">' + '<b>' + result.data[i].billing_name + '</b>' + '&nbsp; have successfully reserved design of Architect/Interior&nbsp;'+ '<b>' + result.data[i].designer_name + '</b>' + '.</p><div class="vl col-lg-12 mb-2 mt-1" style="color: gray; border: 0.5px solid; opacity: 0.1"></div>'; 

              $('.notification').html(html);

             
            } 

            console.log(result.data);

              }).catch(error => {
                  console.log(error);
              });

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
    computed: {
      pagesa () {
        if (this.pagination1.rowsPerPage == null ||
          this.pagination1.totalItems == null
        ) return 0

        return Math.ceil(this.pagination1.totalItems / this.pagination1.rowsPerPage)
      }
    },
    mounted () {
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

      this.display_reserved_design();
      this.noti_reserved_design_per_admin();
      this.text_noti_reserved_design_per_admin();
      this.get_user_info();
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
