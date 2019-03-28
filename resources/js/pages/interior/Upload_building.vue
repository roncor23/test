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
            <div class="row mt-3" novalidate="true">
                <div class="col-sm-12 col-md-12 col-lg-6">
                   
                    <h1 style="color: black">Building Design</h1>               
                        <div class="form-row mt-3">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <input id="name" type="text" class="form-control" name="name" v-model="fileName" placeholder="Name">
                                <textarea id="description" class="form-control mt-3" placeholder="Design Concept in your Building design" name="description" v-model="fileDescription"></textarea>
                                <input id="price" type="number" class="form-control mt-3" name="price" v-model="filePrice" placeholder="Estimated price" >
                                <select id="design_type" class="form-control mt-3" name="design_type" v-model="designType">
                                  <option value="" selected disabled hidden>Choose Design Type</option>
                                  <option value="interiorresidential">Residential Design</option>
                                  <option value="interiorcommercial">Commercial Design</option>
                                  <option value="interiorhospitality">Hospitality Design</option>
                                </select> 
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label>Number of Areas</label>
                                <input id="beds" type="number" class="form-control" name="beds" placeholder="Bedrooms" v-model="fileBeds">
                                <input id="baths" type="number" class="form-control mt-3" name="baths" placeholder="Toilet & Bath" v-model="fileBaths">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                   <!--      <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label>Dimension</label>
                                <input id="height" type="number" class="form-control" name="height" placeholder="Height" v-model="fileHeight">
                                <input id="width" type="number" class="form-control mt-3" name="width" placeholder="Width" v-model="fileWidth">
                                <input id="depth" type="number" class="form-control mt-3" name="depth" placeholder="Depth" v-model="fileDepth">
                            </div>  form-group end.// -->
                       <!--  </div> --><!-- form-row end.// -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label>Area(M)</label>
                                <div>
                                    <label class="ml-2">Lot Area</label>
                                     <input id="lotarea_width" type="number" class="form-control" name="lotarea_width" placeholder="Width" v-model="lotarea_width">
                                     <input id="lotarea_length" type="number" class="form-control mt-2" name="lotarea_length" placeholder="Length" v-model="lotarea_width">
                                </div>
                                <div>
                                    <label class="ml-2 mt-2">Floor Area</label>
                                     <input id="floorarea_width" type="number" class="form-control" name="floorarea_width" placeholder="Width" v-model="lotarea_width">
                                     <input id="floorarea_length" type="number" class="form-control mt-2" name="floorarea_length" placeholder="Length" v-model="floorarea_width">
                                     <input id="floorarea_height" type="number" class="form-control mt-2" name="floorarea_height" placeholder="Height" v-model="floorarea_height">
                                </div>
                        <!--         <input id="lot_size" type="number" class="form-control" name="lot_size" placeholder="Lot Size" v-model="fileLot_size">
                                <input id="main_floor_area" type="number" class="form-control mt-3" name="main_floor_area" placeholder="Main Floor" v-model="fileMain_floor_area">
                                <input id="lower_floor_area" type="number" class="form-control mt-3" name="lower_floor_area" placeholder="Lower Floor" v-model="fileLower_floor_area">
                                <input id="garage_area" type="number" class="form-control mt-3" name="garage_area" placeholder="Garage" v-model="fileGarage_area">
                                <input id="deck_area" type="number" class="form-control mt-3" name="deck_area" placeholder="Deck" v-model="fileDeck_area"> -->
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6" style="margin-top:43px">
                 <!--    <p class="" style="color: black"><small><span style="color:red;">IMPORTANT</span>: Image must be landscape and the size of the image should be max 900kb.</small></p> -->


          <!--           <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>Ceiling</label>
                            <input id="main_ceiling" type="number" class="form-control" name="main_ceiling" placeholder="Main Ceiling" v-model="fileMain_ceiling">
                            <input id="lower_ceiling" type="number" class="form-control mt-3" name="lower_ceiling" placeholder="Lower Ceiling" v-model="fileLower_ceiling">
                            <input id="garage_ceiling" type="number" class="form-control mt-3" name="garage_ceiling" placeholder="Garage Ceiling" v-model="fileGarage_celing">
                        </div>  form-group end.// -->
                   <!--  </div>  --> <!-- form-row end.// -->


                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>Roof Type</label>
                            <input id="roof" type="text" class="form-control" name="roof" placeholder="Roof Framing ex: rafter" v-model="fileRoof">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->


                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>Bedroom Location</label>
                            <input id="master_bedroom" type="number" class="form-control" name="master_bedroom" placeholder="Ground Floor" v-model="fileMaster_bedroom">
                            <input id="bedrooms" type="number" class="form-control mt-3" name="bedrooms" placeholder="Second Floor" v-model="fileBedrooms">
                            <input id="bedrooms" type="number" class="form-control mt-3" name="bedrooms" placeholder="Third Floor" v-model="fileBedrooms">
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

                    <div class="form-group mt-3">
                        <div class="mb-2">
                              <label>Main</label>
                              <input id="file" class="form-control" type="file" ref="file" @change="addFile()">
                        </div>
                        <div class="mb-2">
                              <label>Thumbnail 1</label>
                              <input id="file1" class="form-control" type="file" ref="file1" @change="addFile()">
                        </div>
                        <div class="mb-2">
                            <label>Thumbnail 2</label>
                            <input id="file2" class="form-control" type="file" ref="file2" @change="addFile()">
                        </div>
                        <div class="mb-2">
                              <label>Thumbnail 3</label>
                              <input id="file3" class="form-control" type="file" ref="file3" @change="addFile()">
                        </div>
                        <div  class="mb-2">
                              <label>Thumbnail 4</label>
                              <input id="file4" class="form-control" type="file" ref="file4" @change="addFile()">
                        </div>
                    </div> 
                   <button type="button" class="btn btn-primary btn-lg btn-block float-right" @click="submitForm">SUBMIT</button> 
                </div>
            </div>
    	</div>
</template>

<script>
import axios from 'axios'

export default {

  data() {
    return {
      
        files: [],

        errors: [],

        loading: false,

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

        name: null,
        description: null,

        display_portfolios: []
    

      }
      
    },
     methods: {

        // designNumber: function(designNumber) {
            
        //     $('#design_number').css('border-color','');

        //     axios.get('interior/all_portfolio/').then(result => {
             
        //      var len = result.data.length;
        //      var i;

        //      for(i=0;i<len;i++) {

        //         if(designNumber == result.data[i].floor_plan_code) {
        //             swal("Something wrong!", "Design number is existing! Pls. Choose another one!", "error");
        //             $('#design_number').css('border-color','red');
        //         }

        //      }

        //     }).catch(error => {
        //         console.log(error);
        //         this.loading = false;
        //     });


        // },
        display_portfolio: function() {

              axios.get('architect/display_portfolio/' + this.$route.params.portfolio_id).then(result => {

                this.display_portfolios = result.data;

            }).catch(error => {
                console.log(error);
            });

        },
        submitForm: function(e) {

            
                $('#name').css('border-color','');
                $('#description').css('border-color','');
                $('#price').css('border-color','');
                $('#design_type').css('border-color','');
                $('#beds').css('border-color','');
                $('#baths').css('border-color','');
                $('#stories').css('border-color','');
                $('#height').css('border-color','');
                $('#width').css('border-color','');
                $('#depth').css('border-color','');
                $('#lot_size').css('border-color','');
                $('#main_floor_area').css('border-color','');
                $('#lower_floor_area').css('border-color','');
                $('#main_ceiling').css('border-color','');
                $('#lower_ceiling').css('border-color','');
                $('#master_bedroom').css('border-color','');
                $('#bedrooms').css('border-color','');
                $('#roof').css('border-color','');
                $('#lower_level_bedrooms').css('border-color','');
                $('#walk_in_closet').css('border-color','');
                $('#file').css('border-color','');
                $('#file1').css('border-color','');
                $('#file2').css('border-color','');
                $('#file3').css('border-color','');
                $('#file4').css('border-color','');
            
            

            if(this.fileName && this.fileDescription && this.designType && this.fileFloors && this.fileBeds && this.fileBaths && this.fileLot_size && this.filePrice && this.fileDepth && this.fileWidth && this.fileHeight && this.fileMain_floor_area && this.fileLower_floor_area  && this.fileMain_ceiling && this.fileLower_ceiling  && this.fileRoof && this.fileMaster_bedroom && this.fileBedrooms && this.fileLower_level_bed_rooms && this.fileWalk_in_closet) {

            this.formData = new FormData();
            this.formData.append('name', this.fileName);
            this.formData.append('description', this.fileDescription);
            this.formData.append('design_type', this.designType);
            this.formData.append('garage', this.fileGarage);
            this.formData.append('floors', this.fileFloors);
            this.formData.append('beds', this.fileBeds);
            this.formData.append('baths', this.fileBaths);
            this.formData.append('lot_size', this.fileLot_size);
            this.formData.append('price', this.filePrice);

            this.formData.append('depth', this.fileDepth);
            this.formData.append('width', this.fileWidth);
            this.formData.append('height', this.fileHeight);
            this.formData.append('main_floor_area', this.fileMain_floor_area);
            this.formData.append('lower_floor_area', this.fileLower_floor_area);
            this.formData.append('garage_area', this.fileGarage_area);
            this.formData.append('deck_area', this.fileDeck_area);

            this.formData.append('main_ceiling', this.fileMain_ceiling);
            this.formData.append('lower_ceiling', this.fileLower_ceiling);
            this.formData.append('garage_ceiling', this.fileGarage_celing);

            this.formData.append('roof', this.fileRoof);
            this.formData.append('master_bedroom', this.fileMaster_bedroom);
            this.formData.append('bedrooms', this.fileBedrooms);
            this.formData.append('lower_level_bedrooms', this.fileLower_level_bed_rooms);
            this.formData.append('walk_in_closet', this.fileWalk_in_closet);

            this.formData.append('file', this.attachment);
            this.formData.append('file1', this.attachment1);
            this.formData.append('file2', this.attachment2);
            this.formData.append('file3', this.attachment3);
            this.formData.append('file4', this.attachment4);

            axios.post('interior/upload_portfolio', this.formData, {headers: {'Content-Type': 'multipart/form-data'}})
                .then(response => {

                    this.resetForm();
                    swal("Good job!", "Portfolio upload successfully!", "success");
                })
                .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });


            } 
            this.errors = [];
         

            if(!this.fileName) {
                this.errors.push('Name required.');
                $('#name').css('border-color','red');
            }
            if(!this.fileDescription) {
                this.errors.push('Description required.');
                $('#description').css('border-color','red');
            }
            if(!this.filePrice) {
                this.errors.push('Estimated price required.');
                $('#price').css('border-color','red');
            }
            if(!this.designType) {
                this.errors.push('Design type required.');
                $('#design_type').css('border-color','red');
            }
            if(!this.fileBeds) {
                this.errors.push('Bedrooms required.');
                $('#beds').css('border-color','red');
            }
            if(!this.fileBaths) {
                this.errors.push('Baths required.');
                $('#baths').css('border-color','red');
            }
            if(!this.fileFloors) {
                this.errors.push('Stories required.');
                $('#stories').css('border-color','red');
            }
            if(!this.fileHeight) {
                this.errors.push('Height required.');
                $('#height').css('border-color','red');
            }
            if(!this.fileWidth) {
                this.errors.push('Width required.');
                $('#width').css('border-color','red');
            }
            if(!this.fileDepth) {
                this.errors.push('Depth required.');
                $('#depth').css('border-color','red');
            }
            if(!this.fileLot_size) {
                this.errors.push('Lot size required.');
                $('#lot_size').css('border-color','red');
            }
            if(!this.fileMain_floor_area) {
                this.errors.push('Main floor area required.');
                $('#main_floor_area').css('border-color','red');
            }
            if(!this.fileLower_floor_area) {
                this.errors.push('Lower floor area required.');
                $('#lower_floor_area').css('border-color','red');
            }
            if(!this.fileMain_ceiling) {
                this.errors.push('Main ceiling required.');
                $('#main_ceiling').css('border-color','red');
            }
            if(!this.fileLower_ceiling) {
                this.errors.push('Lower ceiling required.');
                $('#lower_ceiling').css('border-color','red');
            }
            if(!this.fileMaster_bedroom) {
                this.errors.push('Master bedroom required.');
                $('#master_bedroom').css('border-color','red');
            }
            if(!this.fileBedrooms) {
                this.errors.push('Bedrooms required.');
                $('#bedrooms').css('border-color','red');
            }
            if(!this.fileRoof) {
                this.errors.push('Roof framing required.');
                $('#roof').css('border-color','red');
            }
            if(!this.fileLower_level_bed_rooms) {
                this.errors.push('Lower bedrooms required.');
                $('#lower_level_bedrooms').css('border-color','red');
            }
            if(!this.fileWalk_in_closet) {
                this.errors.push('Walkin closet required.');
                $('#walk_in_closet').css('border-color','red');
            }
            if(!this.attachment) {
                this.errors.push('Main image required.');
                $('#file').css('border-color','red');
            }
            if(!this.attachment1) {
                this.errors.push('Thumbnail 1 required.');
                $('#file1').css('border-color','red');
            }
            if(!this.attachment2) {
                this.errors.push('Thumbnail 2 required.');
                $('#file2').css('border-color','red');
            }
            if(!this.attachment3) {
                this.errors.push('Thumbnail 3 required.');
                $('#file3').css('border-color','red');
            }
            if(!this.attachment4) {
                this.errors.push('Thumbnail 4 required.');
                $('#file4').css('border-color','red');
            }

            e.preventDefault();
        },

        addFile() {
            this.attachment = this.$refs.file.files[0];
            this.attachment1 = this.$refs.file1.files[0];
            this.attachment2 = this.$refs.file2.files[0];
            this.attachment3 = this.$refs.file3.files[0];
            this.attachment4 = this.$refs.file4.files[0];

           console.log(this.attachment);
           console.log(this.attachment1);
           console.log(this.attachment2);
           console.log(this.attachment3);
           console.log(this.attachment4);
        },

        resetForm() {
            this.formData = {};
            this.fileName = '';
            this.fileDescription = '';
            this.filePrice = '';
            this.designType = '';
            this.attachment = '';
            this.fileFloor_plan_code = '';
            this.fileBeds = '';
            this.fileBaths = '';
            this.fileLot_size = '';
            this.fileDepth
            this.fileGarage = '',
            this.fileDepth = '',
            this.fileWidth = '',
            this. fileFloors = '',
            this.fileHeight = '',
            this.fileMain_floor_area = '',
            this.fileLower_floor_area = '',
            this.fileGarage_area = '',
            this.fileDeck_area = '',
            this.fileRoof = '',
            this.fileMaster_bedroom = '',
            this.fileBedrooms = '',
            this.fileLower_level_bed_rooms = '',
            this.fileWalk_in_closet = '',
            this.fileMain_ceiling = '',
            this.fileLower_ceiling = '',
            this.fileGarage_celing = '',
            this.attachment = null,
            this.attachment1 = null,
            this.attachment2 = null,
            this.attachment3 = null,
            this.attachment4 = null

        }

 
    },
    mounted() {
        
    }
  }

</script>





