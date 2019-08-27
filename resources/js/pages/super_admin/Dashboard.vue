<template>
     <div class="" style="margin-top:100px;">
       <hr id="building" class="hr-text" data-content="Admin Dashboard" style="">  
          <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-3 mt-4 ml-4">
                <div class="list-group">
<!--              <a class="list-group-item"  @click="open_table" style="cursor: pointer">Reserved designs</a>
 -->              <a class="list-group-item" href="/list-all/products" @click=""  style="cursor:pointer;text-decoration:none; color:black"> List of all products</a>
                  <a class="list-group-item" href="/list-all/designs" style="text-decoration:none; color:black; cursor:pointer"> List of all designs</a>
                  <a class="list-group-item"  href="/list/architects" style="text-decoration:none; color:black; cursor: pointer">List of all architects</a>
                  <a class="list-group-item" href="/list/interior-designers" style="text-decoration:none; color:black; cursor: pointer">List of all interior designers</a>
                  <a class="list-group-item" href="/list/individuals" style="text-decoration:none; color:black; cursor: pointer">List of all individuals</a>
                  <a class="list-group-item" href="/list/not-verified-users" style="text-decoration:none; color:black; cursor: pointer">List of all not verified/verified users</a>
                  <a class="list-group-item" href="/list-furnituresAccessories" style="text-decoration:none; color:black; cursor:pointer">My product</a>
                  <a class="list-group-item" href="/add_designer-account" style="text-decoration:none; color:black; cursor: pointer">Add account</a>
                  <a class="list-group-item" href="/upload-furniture-accessories" style="text-decoration:none; color:black; cursor: pointer">Upload product</a>
                </div>      
              </div>

               <div class="ml-4">
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

           </div>
      </div>
      
</template>

<script>

  export default {
    data () {
      return {
        interval: {},
        interval_noti: {},
        value1: 35,
        value2: 33,
        value3: 63,
        value4: 24,
        total_visits: 35,
        reserved_designs: 33,
        building_designs: 63,
        total_sales: 24,
    
      }
    },
    beforeDestroy () {
      clearInterval(this.interval)
    },
    methods: {




    },
    mounted () {

      // var obj1 = this.value1;
      // var obj2 = this.value2;
      // var obj3 = this.value3;
      // var obj4 = this.value4;


      // this.interval = setInterval(() => {
      //   if (this.total_visits === obj1) {
      //     return (this.total_visits = 0)
      //   }
      //   this.total_visits += 1
      // }, 1000)

      // this.interval = setInterval(() => {
      //   if (this.reserved_designs === obj2) {
      //     return (this.reserved_designs = 0)
      //   }
      //   this.reserved_designs += 1
      // }, 1000)

      // this.interval = setInterval(() => {
      //   if (this.building_designs === obj3) {
      //     return (this.building_designs = 0)
      //   }
      //   this.building_designs += 1
      // }, 1000)

      // this.interval = setInterval(() => {
      //   if (this.total_sales === obj4) {
      //     return (this.total_sales = 0)
      //   }
      //   this.total_sales += 1
      // }, 1000)

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
