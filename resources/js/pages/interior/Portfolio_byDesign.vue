<template>
	 <div class="container" style="margin-top:100px;">
         <div class="" style="float:right">
           <a class="btn btn-primary mt-3" style="cursor: pointer; color:#fff;" href="/interior">Back to home</a>
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
                              <label style="color: gray; font-size:8pt;">Design Type</label>
                                <select id="design_type" class="form-control mt-3" name="design_type">
                                  <option value="" selected disabled hidden>Choose Design Type</option>
                                  <option value="interiorresidential">Residential Design</option>
                                  <option value="interiorcommercial">Commercial Design</option>
                                  <option value="interiorhospitality">Hospitality Design</option>
                                </select> 
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label>Number of Areas</label><br>
                                <label style="color: gray; font-size:8pt;">Beds</label>
                                <input id="beds" type="number" class="form-control" name="beds" :value="display_portfolio.beds">
                                <label style="color: gray; font-size:8pt;">Toilet & Baths</label>
                                <input id="baths" type="number" class="form-control mt-3" name="baths" :value="display_portfolio.baths">
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
                            <label>Bedroom Location</label><br>
                            <label style="color: gray; font-size:8pt;">Ground Floor</label>
                            <input id="ground_floor" type="number" class="form-control" name="ground_floor" :value="display_portfolio.ground_floor">
                            <label style="color: gray; font-size:8pt;">Second Floor</label>
                            <input id="second_floor" type="number" class="form-control mt-3" name="second_floor" :value="display_portfolio.second_floor">
                            <label style="color: gray; font-size:8pt;">Third Floor</label>
                            <input id="third_floor" type="number" class="form-control mt-3" name="third_floor" :value="display_portfolio.third_floor">
                            <select id="lower_level_bedrooms" class="form-control mt-3" name="lower_level_bedrooms" v-model="fileLower_level_bed_rooms">
                              <option value="" selected disabled hidden>Lower Level Bedrooms</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select> 
                            <select id="walk_in_closet" class="form-control mt-3" name="walk_in_closet" v-model="fileWalk_in_closet">
                              <option value="" selected disabled hidden>Walk in Closet</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select> 
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
            fileDesignType: '',
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
            fileLower_level_bed_rooms: '',
            fileWalk_in_closet: '',
		     
		        message: '',
		        removingFile: {},
            errors: []
			}
		},
		methods: {


			display_portfolio() {

				  axios.get('interior/display_portfolio/' + this.$route.params.portfolio_id).then(result => {

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
              $('#design_type').css('border-color','');
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
              $('#lower_level_bedrooms').css('border-color','');
              $('#walk_in_closet').css('border-color','');
              $('#file').css('border-color','');
              $('#file1').css('border-color','');
              $('#file2').css('border-color','');
              $('#file3').css('border-color','');
              $('#file4').css('border-color','');

	            var name_val = document.getElementById('name');
	            var description_val = document.getElementById('description');
              var price_val = document.getElementById('price');
	            var design_type_val = document.getElementById('design_type');
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

              var lower_level_bedrooms_val = document.getElementById('lower_level_bedrooms');
              var walk_in_closet_val = document.getElementById('walk_in_closet');
             

            	      axios.post('interior/update_portfolio/' + this.$route.params.portfolio_id, {val_1: name_val.value, val_2: description_val.value, val_3: price_val.value, val_4: design_type_val.value, val_5: beds_val.value, val_7: baths_val.value, val_8: lotarea_width_val.value, val_9: lotarea_length_val.value, val_10: floorarea_width_val.value, val_11: floorarea_length_val.value, val_12: floorarea_height_val.value, val_13: ground_floor_val.value, val_14: second_floor_val.value, val_15: third_floor_val.value, val_16: lower_level_bedrooms_val.value, val_17: walk_in_closet_val.value })
                    .then(response => {

                           this.display_portfolio();
                           alert(response.data);
                    
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
                        if(design_type_val.value == "") {
                this.errors.push('design type you want to edit?');
                $('#design_type').css('border-color','red');
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
                       
                        if(lower_level_bedrooms_val.value == "") {
                this.errors.push('lower bedrooms you want to edit?');
                $('#lower_level_bedrooms').css('border-color','red');
            }
                        if(walk_in_closet_val.value == "") {
                this.errors.push('walkin closet you want to edit?');
                $('#walk_in_closet').css('border-color','red');
            }

             e.preventDefault();

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
			this.display_portfolio();
      this.get_user_info();
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