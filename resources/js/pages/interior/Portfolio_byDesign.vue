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
                                <input id="name" type="text" class="form-control" name="name"  :value="display_portfolio.name" required >
                                <label style="color: gray; font-size:8pt">Description</label>
                                <textarea id="description" class="form-control mt-3" :value="display_portfolio.description" name="description"   required></textarea>
                                <label style="color: gray; font-size:8pt">Estimated price</label>
                                <input id="price" type="number" class="form-control mt-3" name="price" :value="display_portfolio.price" required>
                                <select id="design_type" class="form-control mt-3" name="design_type">
                                  <option value="" selected disabled hidden>Design Type</option>
                                  <option value="interior">Interior Design</option>
                                </select> 
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                        	 <label>Basic Features</label>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                               
                                <label style="color: gray; font-size:8pt">Bedrooms</label>
                                <input id="beds" type="number" class="form-control" name="beds" :value="display_portfolio.beds" required>
                                <label style="color: gray; font-size:8pt">Baths</label>
                                <input id="baths" type="number" class="form-control mt-3" name="baths" :value="display_portfolio.baths" required>
                                <label style="color: gray; font-size:8pt">Stories</label>
                                <input id="floors" type="number" class="form-control mt-3" name="floors" :value="display_portfolio.floors" required>
                                <label style="color: gray; font-size:8pt">Garage</label>
                                <input id="garage" type="number" class="form-control mt-3" name="garage" :value="display_portfolio.garage">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                        	 <label>Dimension</label>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">                             
                                <label style="color: gray; font-size:8pt">Height</label>
                                <input id="height" type="number" class="form-control" name="height" :value="display_portfolio.height">
                                <label style="color: gray; font-size:8pt">Width</label>
                                <input id="width" type="number" class="form-control mt-3" name="width" :value="display_portfolio.width">
                                <label style="color: gray; font-size:8pt">Depth</label>
                                <input id="depth" type="number" class="form-control mt-3" name="depth" :value="display_portfolio.depth">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->             
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6" style="margin-top:43px">
                	<div v-for="display_portfolio in display_portfolios" v-cloak>
            	   <div class="form-row">
                    	  <label>Area</label>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">                       
                            <label style="color: gray; font-size:8pt">Lot size</label>
                            <input id="lot_size" type="number" class="form-control" name="lot_size" :value="display_portfolio.lot_size">
                            <label style="color: gray; font-size:8pt">Main floor</label>
                            <input id="main_floor_area" type="number" class="form-control mt-3" name="main_floor_area" :value="display_portfolio.main_floor_area">
                            <label style="color: gray; font-size:8pt">Lower floor</label>
                            <input id="lower_floor_area" type="number" class="form-control mt-3" name="lower_floor_area" :value="display_portfolio.lower_floor_area">
                            <label style="color: gray; font-size:8pt">Garage</label>
                            <input id="garage_area" type="number" class="form-control mt-3" name="garage_area" :value="display_portfolio.garage_area">
                            <label style="color: gray; font-size:8pt">Deck</label>
                            <input id="deck_area" type="number" class="form-control mt-3" name="deck_area" :value="display_portfolio.deck_area">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->	
                    <div class="form-row">
                    	 <label>Ceiling</label>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">                       
                            <label style="color: gray; font-size:8pt">Main ceiling</label>
                            <input id="main_ceiling" type="number" class="form-control" name="main_ceiling" :value="display_portfolio.main_ceiling">
                            <label style="color: gray; font-size:8pt">Lower ceiling</label>
                            <input id="lower_ceiling" type="number" class="form-control mt-3" name="lower_ceiling" :value="display_portfolio.lower_ceiling">
                            <label style="color: gray; font-size:8pt">Garage ceiling</label>
                            <input id="garage_ceiling" type="number" class="form-control mt-3" name="garage_ceiling" :value="display_portfolio.garage_ceiling">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->


                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>Roof</label>
                            <input id="roof" type="text" class="form-control" name="roof" :value="display_portfolio.roof">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->


                    <div class="form-row">
                    	  <label>Bedroom Features</label>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">                        
                            <label style="color: gray; font-size:8pt">Master Bedroom</label>
                            <input id="master_bedroom" type="text" class="form-control" name="master_bedroom" :value="display_portfolio.master_bedroom">
                            <label style="color: gray; font-size:8pt">Bedrooms</label>
                            <input id="bedrooms" type="text" class="form-control mt-3" name="bedrooms" :value="display_portfolio.bedrooms">
                            <select id="lower_level_bedrooms" class="form-control mt-3" name="lower_level_bedrooms">
                              <option value="" selected disabled hidden>Lower Level Bedrooms</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select> 
                            <select id="walk_in_closet" class="form-control mt-3" name="walk_in_closet">
                              <option value="" selected disabled hidden>Walk in Closet</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select> 
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->
                	</div>
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
		        fileLot_size: '',
		        designType: '',
		        fileFloors: '',
		        fileGarage: '',
		        fileDepth: '',
		        fileWidth: '',
		        fileHeight: '',
		        fileMain_floor_area: '',
		        fileLower_floor_area: '',
		        fileGarage_area: '',
		        fileDeck_area: '',
		        fileRoof: '',
		        fileMaster_bedroom: '',
		        fileBedrooms: '',
		        fileLower_level_bed_rooms: '',
		        fileWalk_in_closet: '',
		        fileMain_ceiling: '',
		        fileLower_ceiling: '',
		        fileGarage_celing: '',
		     
		        message: '',
		        removingFile: {},
                errors: []
			}
		},
		methods: {


			display_portfolio() {

				  axios.get('interior/display_portfolio/' + this.$route.params.portfolio_id).then(result => {

                    this.display_portfolios = result.data;

                }).catch(error => {
                    console.log(error);
                });

			},
			updateForm: function(e) {

              $('#name').css('border-color','');
              $('#description').css('border-color','');
              $('#design_type').css('border-color','');
              $('#garage').css('border-color','');
              $('#floors').css('border-color','');
              $('#beds').css('border-color','');
              $('#baths').css('border-color','');
              $('#lot_size').css('border-color','');
              $('#price').css('border-color','');
              $('#depth').css('border-color','');
              $('#width').css('border-color','');
              $('#height').css('border-color','');
              $('#main_floor_area').css('border-color','');
              $('#lower_floor_area').css('border-color','');
              $('#garage_area').css('border-color','');
              $('#deck_area').css('border-color','');
              $('#main_ceiling').css('border-color','');
              $('#lower_ceiling').css('border-color','');
              $('#garage_ceiling').css('border-color','');
              $('#roof').css('border-color','');
              $('#master_bedroom').css('border-color','');
              $('#bedrooms').css('border-color','');
              $('#lower_level_bedrooms').css('border-color','');
              $('#walk_in_closet').css('border-color','');

	            var name_val = document.getElementById('name');
	            var description_val = document.getElementById('description');
	            var design_type_val = document.getElementById('design_type');
	            var garage_val = document.getElementById('garage');
	            var floors_val = document.getElementById('floors');
	            var beds_val = document.getElementById('beds');
	            var baths_val = document.getElementById('baths');
	            var lot_size_val = document.getElementById('lot_size');
	            var price_val = document.getElementById('price');
	            var depth_val = document.getElementById('depth');
	            var width_val = document.getElementById('width');
	            var height_val = document.getElementById('height');
	            var main_floor_area_val = document.getElementById('main_floor_area');
            	var lower_floor_area_val = document.getElementById('lower_floor_area');
             	var garage_area_val = document.getElementById('garage_area');
                var deck_area_val = document.getElementById('deck_area');
                var main_ceiling_val = document.getElementById('main_ceiling');
                var lower_ceiling_val = document.getElementById('lower_ceiling');
                var garage_ceiling_val = document.getElementById('garage_ceiling');
                var roof_val = document.getElementById('roof');
                var master_bedroom_val = document.getElementById('master_bedroom');
                var bedrooms_val = document.getElementById('bedrooms');
                var lower_level_bedrooms_val = document.getElementById('lower_level_bedrooms');
                var walk_in_closet_val = document.getElementById('walk_in_closet');
             

            	      axios.post('interior/update_portfolio/' + this.$route.params.portfolio_id, {val_1: name_val.value, val_2: description_val.value, val_3: design_type_val.value, val_4: garage_val.value, val_5: floors_val.value, val_7: beds_val.value, val_8: baths_val.value, val_9: lot_size_val.value, val_10: price_val.value, val_11: depth_val.value, val_12: width_val.value, val_13: height_val.value, val_14: main_floor_area_val.value, val_15: lower_floor_area_val.value, val_16: garage_area_val.value, val_17: deck_area_val.value, val_18: main_ceiling_val.value, val_19: lower_ceiling_val.value, val_20: garage_ceiling_val.value, val_21: roof_val.value, val_22: master_bedroom_val.value, val_23: bedrooms_val.value, val_24: lower_level_bedrooms_val.value, val_25: walk_in_closet_val.value })
                    .then(response => {

                           console.log(response.data);
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
                        if(garage_val.value == "") {
                this.errors.push('garage you want to edit?');
                $('#garage').css('border-color','red');
            }
                        if(beds_val.value == "") {
                this.errors.push('beds yo uwant to edit?');
                $('#floors').css('border-color','red');
            }
                        if(baths_val.value == "") {
                this.errors.push('baths you want to edit?');
                $('#beds').css('border-color','red');
            }
                        if(lot_size_val.value == "") {
                this.errors.push('lot size yo want to edit?');
                $('#lot_size').css('border-color','red');
            }
                        if(price_val.value == "") {
                this.errors.push('price you want to edit?');
                $('#price').css('border-color','red');
            }
                        if(depth_val.value == "") {
                this.errors.push('depth you want to edit?');
                $('#depth').css('border-color','red');
            }
                        if(width_val.value == "") {
                this.errors.push('width you want to edit?');
                $('#width').css('border-color','red');
            }
                        if(height_val.value == "") {
                this.errors.push('height you want to edit?');
                $('#height').css('border-color','red');
            }
                        if(main_floor_area_val.value == "") {
                this.errors.push('main floor area you want to edit?');
                $('#main_floor_area').css('border-color','red');
            }
                        if(lower_floor_area_val.value == "") {
                this.errors.push('lower floor area you want to edit?');
                $('#lower_floor_area').css('border-color','red');
            }
                        if(garage_area_val.value == "") {
                this.errors.push('garage area you want to edit?');
                $('#garage_area').css('border-color','red');
            }
                        if(deck_area_val.value == "") {
                this.errors.push('deck area you want to edit?');
                $('#deck_area').css('border-color','red');
            }
                        if(main_ceiling_val.value == "") {
                this.errors.push('main ceiling you want to edit?');
                $('#main_ceiling').css('border-color','red');
            }
                        if(lower_ceiling_val.value == "") {
                this.errors.push('lower ceiling you want to edit?');
                $('#lower_ceiling').css('border-color','red');
            }
                        if(garage_ceiling_val.value == "") {
                this.errors.push('garage ceiling you want to edit?');
                $('#garage_ceiling').css('border-color','red');
            }
                        if(roof_val.value == "") {
                this.errors.push('roof you want to edit?');
                $('#roof').css('border-color','red');
            }
                        if(master_bedroom_val.value == "") {
                this.errors.push('master bedroom you want to edit?');
                $('#master_bedroom').css('border-color','red');
            }
                        if(bedrooms_val.value == "") {
                this.errors.push('bedrooms you want to edit?');
                $('#bedrooms').css('border-color','red');
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

			}

		},
		mounted() {
			this.display_portfolio();
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