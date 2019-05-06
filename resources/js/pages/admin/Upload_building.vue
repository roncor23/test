<template>
     <div class="container" style="margin-top:100px;">
         <div class="" style="float:right">
           <a class="btn btn-primary mt-3" style="cursor: pointer; color:#fff;" href="/interior">Back to home</a>
         </div>
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
                                  <option value="architecturalresidential">Architectural Residential Design</option>
                                  <option value="architecturalcommercial">Architectural Commercial Design</option>
                                  <option value="architecturalhospitality">Architectural Hospitality Design</option>
                                  <option value="architecturalinstitutional">Architectural Institutional Design</option>
                                  <option value="interiorresidential">Interior Residential Design</option>
                                  <option value="interiorcommercial">Interior Commercial Design</option>
                                  <option value="interiorhospitality">Interior Hospitality Design</option>
                                  <option value="interiorinstitutional">Interior Institutional Design</option>
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
                              <input id="file1" class="form-control" type="file" ref="file1" @change="addFile1()">
                        </div>
                        <div class="mb-2">
                            <label>Thumbnail 2</label>
                            <input id="file2" class="form-control" type="file" ref="file2" @change="addFile2()">
                        </div>
                        <div class="mb-2">
                              <label>Thumbnail 3</label>
                              <input id="file3" class="form-control" type="file" ref="file3" @change="addFile3()">
                        </div>
                        <div  class="mb-2">
                              <label>Thumbnail 4</label>
                              <input id="file4" class="form-control" type="file" ref="file4" @change="addFile4()">
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
                    $('#file').val("");
                    $('#file1').val("");
                    $('#file2').val("");
                    $('#file3').val("");
                    $('#file4').val("");
                })
                .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });


            } 
            this.errors = [];
         
            if(!this.fileName) {
                    swal("Opps!", "Name required.", "error");
                $('#name').css('border-color','red');
            }
            if(!this.fileDescription) {
                    swal("Opps!", "Description required.", "error");
                $('#description').css('border-color','red');
            }
            if(!this.filePrice) {
                    swal("Opps!", "Estimated price required.", "error");
                $('#price').css('border-color','red');
            }
            if(!this.fileDesignType) {
                  swal("Opps!", "Design type required.", "error");
                $('#design_type').css('border-color','red');
            }
            if(!this.fileBeds) {
                  swal("Opps!", "Bedrooms required.", "error");
                $('#beds').css('border-color','red');
            }
            if(!this.fileBaths) {
                  swal("Opps!", "Toilet & Baths required.", "error");
                $('#baths').css('border-color','red');
            }
            if(!this.fileLotArea_width) {
                  swal("Opps!", "Lot Width required.", "error");
                $('#lotarea_width').css('border-color','red');
            }
            if(!this.fileLotArea_length) {
                  swal("Opps!", "Lot Length required.", "error");
                $('#lotarea_length').css('border-color','red');
            }
            if(!this.fileFloorArea_width) {
                  swal("Opps!", "Floor Width required.", "error");
                $('#floorarea_width').css('border-color','red');
            }
            if(!this.fileFloorArea_length) {
                  swal("Opps!", "Floor Length required.", "error");
                $('#floorarea_length').css('border-color','red');
            }
            if(!this.fileFloorArea_height) {
                  swal("Opps!", "Floor Height required.", "error");
                $('#floorarea_height').css('border-color','red');
            }
            if(!this.fileLocationBedroomGround) {
                  swal("Opps!", "Ground floor required.", "error");
                $('#ground_floor').css('border-color','red');
            }
            if(!this.fileLocationBedroomSecond) {
                  swal("Opps!", "Second floor required.", "error");
                $('#second_floor').css('border-color','red');
            }
            if(!this.fileLocationBedroomThird) {
                  swal("Opps!", "Third floor required.", "error");
                $('#third_floor').css('border-color','red');
            }
            if(!this.fileLower_level_bed_rooms) {
                  swal("Opps!", "Lower bedrooms required.", "error");
                $('#lower_level_bedrooms').css('border-color','red');
            }
            if(!this.fileWalk_in_closet) {
                  swal("Opps!", "Walkin closet required.", "error");
                $('#walk_in_closet').css('border-color','red');
            }
            if(!this.attachment) {
                  swal("Opps!", "Main image required.", "error");
                $('#file').css('border-color','red');
            }
            if(!this.attachment1) {
                  swal("Opps!", "Thumbnail 1 required.", "error");
                $('#file1').css('border-color','red');
            }
            if(!this.attachment2) {
                  swal("Opps!", "Thumbnail 2 required.", "error");
                $('#file2').css('border-color','red');
            }
            if(!this.attachment3) {
                  swal("Opps!", "Thumbnail 3 required.", "error");
                $('#file3').css('border-color','red');
            }
            if(!this.attachment4) {
                  swal("Opps!", "Thumbnail 4 required.", "error");
                $('#file4').css('border-color','red');
            }
            e.preventDefault();
        },

        addFile() {

            $('#file').css('border-color','');
            $('#file1').css('border-color','');
            $('#file2').css('border-color','');
            $('#file3').css('border-color','');
            $('#file4').css('border-color','');
            if(this.$refs.file.files[0].size > 999999) {
                $('#file').css('border-color','red');
                $('#file').val("");
                swal("Opps!", "File size required less than 1mb.", "error");
                return 0;
            }else{
                this.attachment = this.$refs.file.files[0];
                console.log(this.attachment);
            }
      
        },
        addFile1() {

            $('#file').css('border-color','');
            $('#file1').css('border-color','');
            $('#file2').css('border-color','');
            $('#file3').css('border-color','');
            $('#file4').css('border-color','');
            if(this.$refs.file1.files[0].size > 999999) {
                $('#file1').css('border-color','red');
                $('#file1').val("");
                swal("Opps!", "File size required less than 1mb.", "error");
                return 0;
            }else{
                this.attachment1 = this.$refs.file1.files[0];
                console.log(this.attachment1);
            }
          
        },
        addFile2() {

            $('#file').css('border-color','');
            $('#file1').css('border-color','');
            $('#file2').css('border-color','');
            $('#file3').css('border-color','');
            $('#file4').css('border-color','');
            if(this.$refs.file2.files[0].size > 999999) {
                $('#file2').css('border-color','red');
                $('#file2').val("");
                swal("Opps!", "File size required less than 1mb.", "error");
                return 0;
            }else{
                this.attachment2 = this.$refs.file2.files[0];
                console.log(this.attachment2);
            }
          
        },
        addFile3() {
            $('#file').css('border-color','');
            $('#file1').css('border-color','');
            $('#file2').css('border-color','');
            $('#file3').css('border-color','');
            $('#file4').css('border-color','');
            if(this.$refs.file3.files[0].size > 999999) {
                $('#file3').css('border-color','red');
                $('#file3').val("");
                swal("Opps!", "File size required less than 1mb.", "error");
                return 0;
            }else{
                this.attachment3 = this.$refs.file3.files[0];
                console.log(this.attachment3);
            }
          
        },
        addFile4() {

            $('#file').css('border-color','');
            $('#file1').css('border-color','');
            $('#file2').css('border-color','');
            $('#file3').css('border-color','');
            $('#file4').css('border-color','');

            if(this.$refs.file4.files[0].size > 999999) {
                $('#file4').css('border-color','red');
                $('#file4').val("");
                swal("Opps!", "File size required less than 1mb.", "error");
                return 0;
            }else{
                this.attachment4 = this.$refs.file4.files[0];
                console.log(this.attachment4);
            }
          
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
            this.fileLotArea_length = '';
            this.fileFloorArea_width = '';
            this.fileFloorArea_length = '';
            this.fileFloorArea_height = '';
            this.fileLocationBedroomGround = '';
            this.fileLocationBedroomSecond = '';
            this.fileLocationBedroomThird = '';
            this.fileLower_level_bed_rooms = '';
            this.fileWalk_in_closet = '';
            this.attachment = '';
            this.attachment1 = '';
            this.attachment2 = '';
            this.attachment3 = '';
            this.attachment4 = '';

        }

 
    },
    mounted() {
        
    }
  }

</script>





