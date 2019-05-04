<!--  <router-link :to="{ name: 'checkout', params: { portfolio_id: file.id } }"> --><button @click="checkout" type="button" class="btn btn-info btn-lg btn-block mt-3 mb-3" style="background-color:#f6710e;">RESERVE DESIGN</button><!-- </router-link> -->
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
                                <select id="design_type" class="form-control mt-3" name="design_type" v-model="fileDesignType">
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
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label>Area(M)</label>
                                <div>
                                    <label class="ml-2">Lot Area</label>
                                     <input id="lotarea_width" type="number" class="form-control" name="lotarea_width" placeholder="Width" v-model="fileLotArea_width">
                                     <input id="lotarea_length" type="number" class="form-control mt-2" name="lotarea_length" placeholder="Length" v-model="fileLotArea_length">
                                </div>
                                <div>
                                    <label class="ml-2 mt-2">Floor Area</label>
                                     <input id="floorarea_width" type="number" class="form-control" name="floorarea_width" placeholder="Width" v-model="fileFloorArea_width">
                                     <input id="floorarea_length" type="number" class="form-control mt-2" name="floorarea_length" placeholder="Length" v-model="fileFloorArea_length">
                                     <input id="floorarea_height" type="number" class="form-control mt-2" name="floorarea_height" placeholder="Height" v-model="fileFloorArea_height">
                                </div>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6" style="margin-top:43px">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>Bedroom Location</label>
                            <input id="ground_floor" type="number" class="form-control" name="ground_floor" placeholder="Ground Floor" v-model="fileLocationBedroomGround">
                            <input id="second_floor" type="number" class="form-control mt-3" name="second_floor" placeholder="Second Floor" v-model="fileLocationBedroomSecond">
                            <input id="third_floor" type="number" class="form-control mt-3" name="third_floor" placeholder="Third Floor" v-model="fileLocationBedroomThird">
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
            
            

            if(this.fileName && this.fileDescription && this.fileDesignType && this.fileBeds && this.fileBaths  && this.filePrice && this.fileLotArea_width && this.fileLotArea_length && this.fileFloorArea_width && this.fileFloorArea_length && this.fileFloorArea_height  && this.fileLocationBedroomGround && this.fileLocationBedroomSecond  && this.fileLocationBedroomThird && this.fileLower_level_bed_rooms && this.fileWalk_in_closet) {

            this.formData = new FormData();
            this.formData.append('name', this.fileName);
            this.formData.append('description', this.fileDescription);
            this.formData.append('price', this.filePrice);
            this.formData.append('design_type', this.fileDesignType);
            this.formData.append('beds', this.fileBeds);
            this.formData.append('baths', this.fileBaths);

            this.formData.append('lotarea_width', this.fileLotArea_width);
            this.formData.append('lotarea_length', this.fileLotArea_length);
            this.formData.append('floorarea_width', this.fileFloorArea_width);
            this.formData.append('floorarea_length', this.fileFloorArea_length);
            this.formData.append('floorarea_height', this.fileFloorArea_height);

            this.formData.append('ground_floor', this.fileLocationBedroomGround);
            this.formData.append('second_floor', this.fileLocationBedroomSecond);
            this.formData.append('third_floor', this.fileLocationBedroomThird);
            this.formData.append('lower_level_bedrooms', this.fileLower_level_bed_rooms);
            this.formData.append('walk_in_closet', this.fileWalk_in_closet);

            this.formData.append('file', this.attachment);
            this.formData.append('file1', this.attachment1);
            this.formData.append('file2', this.attachment2);
            this.formData.append('file3', this.attachment3);
            this.formData.append('file4', this.attachment4);

            axios.post('architect/upload_portfolio', this.formData, {headers: {'Content-Type': 'multipart/form-data'}})
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
            if(!this.fileDesignType) {
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
            if(!this.fileLotArea_width) {
                this.errors.push('Lot Width required.');
                $('#lotarea_width').css('border-color','red');
            }
            if(!this.fileLotArea_length) {
                this.errors.push('Lot Length required.');
                $('#lotarea_length').css('border-color','red');
            }
            if(!this.fileFloorArea_width) {
                this.errors.push('Floor Width required.');
                $('#floorarea_width').css('border-color','red');
            }
            if(!this.fileFloorArea_length) {
                this.errors.push('Floor Length required.');
                $('#floorarea_length').css('border-color','red');
            }
            if(!this.fileFloorArea_height) {
                this.errors.push('Floor Height required.');
                $('#floorarea_height').css('border-color','red');
            }
            if(!this.fileLocationBedroomGround) {
                this.errors.push('Ground floor required.');
                $('#ground_floor').css('border-color','red');
            }
            if(!this.fileLocationBedroomSecond) {
                this.errors.push('Second floor required.');
                $('#second_floor').css('border-color','red');
            }
            if(!this.fileLocationBedroomThird) {
                this.errors.push('Third floor required.');
                $('#third_floor').css('border-color','red');
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
            this.fileDesignType = '';
            this.fileBeds = '';
            this.fileBaths = '';
            this.fileLotArea_width = '';
            this.fileLotArea_length
            this.fileFloorArea_width = '',
            this.fileFloorArea_length = '',
            this.fileFloorArea_height = '',
            this.fileLocationBedroomGround = '',
            this.fileLocationBedroomSecond = '',
            this.fileLocationBedroomThird = '',
            this.fileLower_level_bed_rooms = '',
            this.fileWalk_in_closet = '',
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





