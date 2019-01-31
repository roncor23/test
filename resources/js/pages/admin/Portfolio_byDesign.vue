<template>
	 <div class="container" style="margin-top:100px;">
         <div class="" style="float:right">
           <a class="btn btn-primary mt-3" style="cursor: pointer; color:#fff;" href="/architect" v-if="Home">Back to home</a>
         </div>
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
                                <label style="color: gray; font-size:8pt">Design #</label>
                                <input id="floor_plan_code" type="text" class="form-control mt-3" name="floor_plan_code" :value="display_portfolio.floor_plan_code" required>
                                <select id="design_type" class="form-control mt-3" name="design_type">
                                  <option value="" selected disabled hidden>Design Type</option>
                                  <option value="houses">Houses</option>
                                  <option value="commercial">Commercial Building</option>
                                  <option value="institutional">Institutional Building</option>
                                  <option value="industrial">Industrial Building</option>
                                  <option value="religious">Religious Building</option>
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
<!-- 
                    <div class="form-group mt-3" style="width:300px" >
                        <div class="mb-2" >
                              <label>Main</label>
                              <input class="form-control" type="file" ref="file" @change="addFile()">
                              <span class="" v-for="file in files" v-cloak>
                            	<img class="card-img-top img-taas"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.name + '.' + file.extension" :alt="file.name">
                              </span>
                              <button class="btn btn-danger btn-block" @click="update_main_image()">replace</button>
                        </div>
                        <div class="mb-2">
                              <label>Thumbnail 1</label>
                              <input class="form-control" type="file" ref="file1" @change="addFile()">
                              <span class="" v-for="file in files" v-cloak>
                                    <img class="card-img-top img-taas"  :src="'storage' + '/portfolio/thumbnail1/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.name + '.' + file.extension" :alt="file.name">
                              </span>
                               <button class="btn btn-danger btn-block" @click="remove_thumbnail1_image(file)">replace</button>
                        </div>
                        <div class="mb-2">
                            <label>Thumbnail 2</label>
                            <input class="form-control" type="file" ref="file2" @change="addFile()">
                             <span class="" v-for="file in files" v-cloak>
                                    <img class="card-img-top img-taas"  :src="'storage' + '/portfolio/thumbnail2/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.name + '.' + file.extension" :alt="file.name">
                             </span> 
                              <button class="btn btn-danger btn-block" @click="remove_thumbnail2_image(file)">replace</button>
                        </div>
                        <div class="mb-2">
                              <label>Thumbnail 3</label>
                              <input class="form-control" type="file" ref="file3" @change="addFile()">
                               <span class="" v-for="file in files" v-cloak>
                                    <img class="card-img-top img-taas"  :src="'storage' + '/portfolio/thumbnail3/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.name + '.' + file.extension" :alt="file.name">
                              </span> 
                               <button class="btn btn-danger btn-block" @click="remove_thumbnail3_image(file)">replace</button>
                        </div>
                        <div  class="mb-2">
                              <label>Thumbnail 4</label>
                              <input class="form-control" type="file" ref="file4" @change="addFile()">
                               <span class="" v-for="file in files" v-cloak>
                                    <img class="card-img-top img-taas"  :src="'storage' + '/portfolio/thumbnail4/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.name + '.' + file.extension" :alt="file.name">
                              </span>
                               <button class="btn btn-danger btn-block" @click="remove_thumbnail4_image(file)">replace</button>
                        </div>
                    </div>  -->
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
		        fileFloor_plan_code: '',
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
		        Home: true,

		        removingFile: {}
			}
		},
		methods: {


        update_main_image() {

            this.formData = new FormData();
            this.formData.append('file', this.attachment);


            axios.post('architect/update_main_image', this.formData)
                .then(response => {

                    // this.resetForm();
                    // alert(response.data);
                    //  this.fetchFile();
                   
                })
                .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });
        },






        	   addFile() {
	            this.attachment = this.$refs.file.files[0];


	           console.log(this.attachment);

	        },


			display_portfolio() {

				  axios.get('architect/display_portfolio/' + this.$route.params.portfolio_id).then(result => {

                    this.display_portfolios = result.data;
                    console.log(this.display_portfolios);
                }).catch(error => {
                    console.log(error);
                });

			},
			updateForm: function() {


	            var name_val = document.getElementById('name');
	            var description_val = document.getElementById('description');
	            var design_type_val = document.getElementById('design_type');
	            var garage_val = document.getElementById('garage');
	            var floors_val = document.getElementById('floors');
	            var floor_plan_code_val = document.getElementById('floor_plan_code');
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
             

            	      axios.post('architect/update_portfolio/' + this.$route.params.portfolio_id, {val_1: name_val.value, val_2: description_val.value, val_3: design_type_val.value, val_4: garage_val.value, val_5: floors_val.value, val_6: floor_plan_code_val.value, val_7: beds_val.value, val_8: baths_val.value, val_9: lot_size_val.value, val_10: price_val.value, val_11: depth_val.value, val_12: width_val.value, val_13: height_val.value, val_14: main_floor_area_val.value, val_15: lower_floor_area_val.value, val_16: garage_area_val.value, val_17: deck_area_val.value, val_18: main_ceiling_val.value, val_19: lower_ceiling_val.value, val_20: garage_ceiling_val.value, val_21: roof_val.value, val_22: master_bedroom_val.value, val_23: bedrooms_val.value, val_24: lower_level_bedrooms_val.value, val_25: walk_in_closet_val.value })
                    .then(response => {

                           console.log(response.data);
                           alert(response.data);
                    
                    })



			},
			fetchFile() {
		            this.loading = true;
		            axios.get('architect/display_image_all/' + this.$route.params.id).then(result => {
		                this.loading = false;
		                this.files = result.data;

		                console.log(this.files);
		          
		            }).catch(error => {
		                console.log(error);
		                this.loading = false;
		            });

		      },
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