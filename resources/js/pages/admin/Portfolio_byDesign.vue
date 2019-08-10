<template>
   <div class="container" style="margin-top:100px;">
         <div class="" style="float:right">
           <a class="btn btn-primary mt-3" style="cursor: pointer; color:#fff;" href="/architect">Back to home</a>
         </div>
          <p class="alert alert-danger" v-if="errors.length">
            <b>Please correct the following error(s):</b>
            <ul>
              <li v-for="error in errors">{{ error }}</li>
            </ul>
          </p>
            <div class="row mt-3" >
                  <div class="col-sm-12 col-md-12 col-lg-6" v-for="display_portfolio in display_portfolios" v-cloak>           
                    <h1 style="color: black">Building Design</h1>               
                        <div class="form-row mt-3">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                              <label style="color: gray; font-size:8pt;">Name</label>
                                <input id="name" type="text" class="form-control" name="name" :value="display_portfolio.name" required>
                              <label style="color: gray; font-size:8pt;">Design Concept</label>
                                <textarea id="description" class="form-control mt-3" name="description" :value="display_portfolio.description"></textarea>
                              <label style="color: gray; font-size:8pt;">Design Estimated Price</label>
                                <input id="price" type="number" class="form-control mt-3" name="price" :value="display_portfolio.price">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label>Number of Areas</label><br>
                                <label style="color: gray; font-size:8pt;">Beds</label>
                                <textarea id="beds" type="text" class="form-control" name="beds" :value="display_portfolio.beds"></textarea>
                                <label style="color: gray; font-size:8pt;">Toilet & Baths</label>
                                <textarea id="baths" type="text" class="form-control mt-3" name="baths" :value="display_portfolio.baths"></textarea>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label>Area(M)</label><br>
                                <div>
                                    <label class="ml-2">Lot Area</label>
                                    <label style="color: gray; font-size:8pt;">Lot Area Width</label>
                                     <input id="lotarea_width" type="number" class="form-control" name="lotarea_width" :value="display_portfolio.lot_area_width">
                                    <label style="color: gray; font-size:8pt;">Lot Area Length</label>
                                    <input id="lotarea_length" type="number" class="form-control mt-2" name="lotarea_length" :value="display_portfolio.lot_area_length">
                                </div>
                                <div>
                                    <label class="ml-2 mt-2">Floor Area</label>
                                    <label style="color: gray; font-size:8pt;">Floor Area Width</label>
                                     <input id="floorarea_width" type="number" class="form-control" name="floorarea_width" :value="display_portfolio.floor_area_width">
                                    <label style="color: gray; font-size:8pt;">Floor Area Length</label>
                                     <input id="floorarea_length" type="number" class="form-control mt-2" name="floorarea_length" :value="display_portfolio.floor_area_length">
                                    <label style="color: gray; font-size:8pt;">Floor Area Height</label>
                                    <input id="floorarea_height" type="number" class="form-control mt-2" name="floorarea_height" :value="display_portfolio.floor_area_height">
                                </div>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6" style="margin-top:43px">
                      <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12" v-for="display_portfolio in display_portfolios" v-cloak>
                            <label>Location</label><br>
                            <label style="color: gray; font-size:8pt;">Ground Floor</label>
                            <textarea id="ground_floor" type="text" class="form-control" name="ground_floor" :value="display_portfolio.ground_floor"></textarea>
                            <label style="color: gray; font-size:8pt;">Second Floor</label>
                            <textarea id="second_floor" type="text" class="form-control mt-3" name="second_floor" :value="display_portfolio.second_floor"></textarea> 
                            <label style="color: gray; font-size:8pt;">Third Floor</label>
                            <textarea id="third_floor" type="text" class="form-control mt-3" name="third_floor" :value="display_portfolio.third_floor"></textarea>
                            <label style="color: gray; font-size:8pt;">Features</label>
                            <textarea id="features" type="text" class="form-control mt-3" name="features" :value="display_portfolio.features"></textarea>

                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->
                   <button type="button" class="btn btn-primary btn-lg btn-block float-right" @click="updateForm">UPDATE</button> 
                </div>
            </div>
      </div>
</template>

<script>
  export default {

    data() {
      return {
            display_portfolios: [],
            files: [],
            formData: {},
            fileName: '',
            fileDescription: '',
            filePrice: '',
            fileBeds: '',
            fileBaths: '',
            fileLotArea_width: '',
            fileLotArea_length: '',
            fileFloorArea_width: '',
            fileFloorArea_length: '',
            fileFloorArea_height: '',
            fileLocationBedroomGround: '',
            fileLocationBedroomSecond: '',
            fileLocationBedroomThird: '',
            fileFeatures: '',
         
            message: '',
            removingFile: {},
            errors: []
      }
    },
    methods: {


      display_portfolio() {

          axios.get('architect/display_portfolio/' + this.$route.params.portfolio_id).then(result => {

                    this.display_portfolios = result.data;
                    console.log(this.display_portfolios);


                }).catch(error => {
                    console.log(error);
                });

      },
      updateForm: function(e) {

              $('#name').css('border-color','');
              $('#description').css('border-color','');
              $('#price').css('border-color','');
              $('#beds').css('border-color','');
              $('#baths').css('border-color','');
              $('#lotarea_width').css('border-color','');
              $('#lotarea_length').css('border-color','');
              $('#floorarea_width').css('border-color','');
              $('#floorarea_length').css('border-color','');
              $('#floorarea_height').css('border-color','');
              $('#ground_floor').css('border-color','');
              $('#second_floor').css('border-color','');
              $('#third_floor').css('border-color','');
              $('#features').css('border-color','');
              $('#file').css('border-color','');
              $('#file1').css('border-color','');
              $('#file2').css('border-color','');
              $('#file3').css('border-color','');
              $('#file4').css('border-color','');

              var name_val = document.getElementById('name');
              var description_val = document.getElementById('description');
              var price_val = document.getElementById('price');
              var beds_val = document.getElementById('beds');
              var baths_val = document.getElementById('baths');

              var lotarea_width_val = document.getElementById('lotarea_width');
              var lotarea_length_val = document.getElementById('lotarea_length');

              var floorarea_width_val = document.getElementById('floorarea_width');
              var floorarea_length_val = document.getElementById('floorarea_length');
              var floorarea_height_val = document.getElementById('floorarea_height');

              var ground_floor_val = document.getElementById('ground_floor');
              var second_floor_val = document.getElementById('second_floor');
              var third_floor_val = document.getElementById('third_floor');

              var features = document.getElementById('features');
             

                    axios.post('architect/update_portfolio/' + this.$route.params.portfolio_id, {val_1: name_val.value, val_2: description_val.value, val_3: price_val.value, val_5: beds_val.value, val_7: baths_val.value, val_8: lotarea_width_val.value, val_9: lotarea_length_val.value, val_10: floorarea_width_val.value, val_11: floorarea_length_val.value, val_12: floorarea_height_val.value, val_13: ground_floor_val.value, val_14: second_floor_val.value, val_15: third_floor_val.value, val_16: features.value })
                    .then(response => {

                           this.display_portfolio();
                           swal("Good job!", response.data, "success");
                    
                    })
                    .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });


                this.errors = [];

            if(name_val.value == "") {
                this.errors.push('name you want to edit?');
                $('#name').css('border-color','red');
            }
                        if(description_val.value == "") {
                this.errors.push('description you want to edit?');
                $('#description').css('border-color','red');
            }
                        if(price_val.value == "") {
                this.errors.push('price you want to edit?');
                $('#price').css('border-color','red');
            }
                        if(beds_val.value == "") {
                this.errors.push('beds yo uwant to edit?');
                $('#beds').css('border-color','red');
            }
                        if(baths_val.value == "") {
                this.errors.push('baths you want to edit?');
                $('#baths').css('border-color','red');
            }
                        if(lotarea_width_val.value == "") {
                this.errors.push('lot area width yo want to edit?');
                $('#lotarea_width').css('border-color','red');
            }
                        if(lotarea_length_val.value == "") {
                this.errors.push('lot area width you want to edit?');
                $('#lotarea_length').css('border-color','red');
            }
                        if(floorarea_width_val.value == "") {
                this.errors.push('floor area width you want to edit?');
                $('#floorarea_width').css('border-color','red');
            }
                        if(floorarea_length_val.value == "") {
                this.errors.push('floor area length you want to edit?');
                $('#floorarea_length').css('border-color','red');
            }
                        if(floorarea_height_val.value == "") {
                this.errors.push('floor area height you want to edit?');
                $('#floorarea_height').css('border-color','red');
            }
                        if(ground_floor_val.value == "") {
                this.errors.push('ground floor area you want to edit?');
                $('#ground_floor').css('border-color','red');
            }
                        if(second_floor_val.value == "") {
                this.errors.push('second floor area you want to edit?');
                $('#second_floor').css('border-color','red');
            }
                        if(third_floor.value == "") {
                this.errors.push('garage area you want to edit?');
                $('#third_floor').css('border-color','red');
            }
                       
                        if(features.value == "") {
                this.errors.push('features you want to edit?');
                $('#features').css('border-color','red');
            }
                  
             e.preventDefault();

      },
        get_architect_username() {
              axios.get('architect/username/').then(result => {
             

                var username = result.data.name

                $('#username').html(username);
                

                }).catch(error => {
                    console.log(error);
                });
        },

    },
    mounted() {
      this.display_portfolio();
      this.get_architect_username();
    }
  }
</script>

<style scoped>
  
.img-taas {
    width: 100%;
    height: 23vh;
    object-fit: cover;
}
  
</style>