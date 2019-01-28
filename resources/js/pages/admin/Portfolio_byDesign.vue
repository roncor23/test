<template>
	 <div class="container">
         <div class="" style="float:right">
           <a class="btn btn-primary mt-3" style="cursor: pointer; color:#fff;" href="/architect" v-if="Home">Back to home</a>
         </div>
            <div class="row mt-3" v-for="display_portfolio in display_portfolios">
                <div class="col-sm-12 col-md-12 col-lg-6">
                   
                    <h1 style="color: black">Building Design</h1>               
                        <div class="form-row mt-3">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            	<label style="color: gray; font-size:8pt;">Name</label>
                                <input type="text" class="form-control" name="name" v-model="fileName" :placeholder="display_portfolio.name" required>
                                <label style="color: gray; font-size:8pt">Description</label>
                                <textarea class="form-control mt-3" :placeholder="display_portfolio.description" name="description" v-model="fileDescription" required></textarea>
                                <label style="color: gray; font-size:8pt">Estimated price</label>
                                <input type="number" class="form-control mt-3" name="price" v-model="filePrice" :placeholder="display_portfolio.price" required>
                                <label style="color: gray; font-size:8pt">Design #</label>
                                <input type="text" class="form-control mt-3" name="floor_plan_code" v-model="fileFloor_plan_code" :placeholder="display_portfolio.floor_plan_code" required>
                                <select class="form-control mt-3" name="design_type" v-model="designType">
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
                                <input type="number" class="form-control" name="beds" :placeholder="display_portfolio.beds" v-model="fileBeds">
                                <label style="color: gray; font-size:8pt">Baths</label>
                                <input type="number" class="form-control mt-3" name="baths" :placeholder="display_portfolio.baths" v-model="fileBaths">
                                <label style="color: gray; font-size:8pt">Stories</label>
                                <input type="number" class="form-control mt-3" name="floors" :placeholder="display_portfolio.floors" v-model="fileFloors">
                                <label style="color: gray; font-size:8pt">Garage</label>
                                <input type="number" class="form-control mt-3" name="garage" :placeholder="display_portfolio.garage" v-model="fileGarage">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                        	 <label>Dimension</label>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">                             
                                <label style="color: gray; font-size:8pt">Height</label>
                                <input type="number" class="form-control" name="height" :placeholder="display_portfolio.height" v-model="fileHeight">
                                <label style="color: gray; font-size:8pt">Width</label>
                                <input type="number" class="form-control mt-3" name="width" :placeholder="display_portfolio.width" v-model="fileWidth">
                                <label style="color: gray; font-size:8pt">Depth</label>
                                <input type="number" class="form-control mt-3" name="depth" :placeholder="display_portfolio.depth" v-model="fileDepth">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                        	  <label>Area</label>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">                       
                                <label style="color: gray; font-size:8pt">Lot size</label>
                                <input type="number" class="form-control" name="lot_size" :placeholder="display_portfolio.lot_size" v-model="fileLot_size">
                                <label style="color: gray; font-size:8pt">Main floor</label>
                                <input type="number" class="form-control mt-3" name="main_floor_area" :placeholder="display_portfolio.main_floor_area" v-model="fileMain_floor_area">
                                <label style="color: gray; font-size:8pt">Lower floor</label>
                                <input type="number" class="form-control mt-3" name="lower_floor_area" :placeholder="display_portfolio.lower_floor_area" v-model="fileLower_floor_area">
                                <label style="color: gray; font-size:8pt">Garage</label>
                                <input type="number" class="form-control mt-3" name="garage_area" :placeholder="display_portfolio.garage_area" v-model="fileGarage_area">
                                <label style="color: gray; font-size:8pt">Deck</label>
                                <input type="number" class="form-control mt-3" name="deck_area" :placeholder="display_portfolio.deck_area" v-model="fileDeck_area">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6" style="margin-top:43px">
                    <div class="form-row">
                    	 <label>Ceiling</label>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">                       
                            <label style="color: gray; font-size:8pt">Main ceiling</label>
                            <input type="number" class="form-control" name="main_ceiling" :placeholder="display_portfolio.main_ceiling" v-model="fileMain_ceiling">
                            <label style="color: gray; font-size:8pt">Lower ceiling</label>
                            <input type="number" class="form-control mt-3" name="lower_ceiling" :placeholder="display_portfolio.lower_ceiling" v-model="fileLower_ceiling">
                            <label style="color: gray; font-size:8pt">Garage ceiling</label>
                            <input type="number" class="form-control mt-3" name="garage_ceiling" :placeholder="display_portfolio.garage_ceiling" v-model="fileGarage_celing">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->


                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>Roof</label>
                            <input type="text" class="form-control" name="roof" :placeholder="display_portfolio.roof" v-model="fileRoof">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->


                    <div class="form-row">
                    	  <label>Bedroom Features</label>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">                        
                            <label style="color: gray; font-size:8pt">Master Bedroom</label>
                            <input type="text" class="form-control" name="master_bedroom" :placeholder="display_portfolio.master_bedroom" v-model="fileMaster_bedroom">
                            <label style="color: gray; font-size:8pt">Bedrooms</label>
                            <input type="text" class="form-control mt-3" name="bedrooms" :placeholder="display_portfolio.bedrooms" v-model="fileBedrooms">
                            <select class="form-control mt-3" name="lower_level_bedrooms" v-model="fileLower_level_bed_rooms">
                              <option value="" selected disabled hidden>Lower Level Bedrooms</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select> 
                            <select class="form-control mt-3" name="walk_in_closet" v-model="fileWalk_in_closet">
                              <option value="" selected disabled hidden>Walk in Closet</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select> 
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->

                    <div class="form-group mt-3" style="width:300px" v-for="file in files" v-cloak>
                        <div class="mb-2">
                              <label>Main</label>
                              <input class="form-control" type="file" ref="file" @change="addFile()">
                              <span class="">
                            	<img class="card-img-top img-taas"  :src="'storage' + '/portfolio/main_pic/' + file.user_name + '_' + file.user_id + '/' + file.type + '/' + file.name + '.' + file.extension" :alt="file.name">
                              </span>
                        </div>
                        <div class="mb-2">
                              <label>Thumbnail 1</label>
                              <input class="form-control" type="file" ref="file1" @change="addFile()">
                        </div>
                        <div class="mb-2">
                            <label>Thumbnail 2</label>
                            <input class="form-control" type="file" ref="file2" @change="addFile()">
                        </div>
                        <div class="mb-2">
                              <label>Thumbnail 3</label>
                              <input class="form-control" type="file" ref="file3" @change="addFile()">
                        </div>
                        <div  class="mb-2">
                              <label>Thumbnail 4</label>
                              <input class="form-control" type="file" ref="file4" @change="addFile()">
                        </div>
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
		        Home: true
			}
		},
		methods: {

			display_portfolio() {

				  axios.get('architect/display_portfolio/' + this.$route.params.id).then(result => {

                    this.display_portfolios = result.data;
                    console.log(this.display_portfolios);
                }).catch(error => {
                    console.log(error);
                });

			},
			updateForm() {

			},
			fetchFile() {
		            this.loading = true;
		            axios.get('architect/display_image_all/' + this.$route.params.id + '?page='  ).then(result => {
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
			this.fetchFile();
		}
	}
</script>