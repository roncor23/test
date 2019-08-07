<template>
     <div class="" style="margin-top:100px;">
      <hr id="building" class="hr-text" data-content="Interior Dashboard" style="">
      <div class="row">
          <div class="container">
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

<style scoped>

.v-progress-circular {
  margin: 2rem
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
      
       
        value1: 35,
        value2: 33,
        value3: 63,
        value4: 24,
        total_visits: 0,
        reserved_designs: 0,
        building_designs: 0,
        total_sales: 0,

      }
      
    },
    beforeDestroy () {
      clearInterval(this.interval)
    },

     methods: {



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
        
    },

  }

</script>
