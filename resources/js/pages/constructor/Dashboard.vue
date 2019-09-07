<template>
     <div class="" style="margin-top:100px;">
      <hr id="building" class="hr-text" data-content="Constructor Dashboard" style="">
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
        value4: 2,
        total_visits: 35,
        reserved_designs: 33,
        building_designs: 63,
        total_sales: 2,

      }
      
    },


     methods: {

        get_interior_username() {
              axios.get('interior/username/').then(result => {
             

                var username = result.data.name

                $('#username').html(username);
                

                }).catch(error => {
                    console.log(error);
                });
        },

    },
    mounted() {

      this.get_interior_username();



        
    },

  }

</script>
