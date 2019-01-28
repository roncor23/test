<template>
	 <div class="container">
         <div class="" style="float:right">
           <a class="btn btn-primary mt-3" style="cursor: pointer; color:#fff;" href="/architect" v-if="Home">Back to home</a>
         </div>
            <div class="row mt-3">
                <div class="col-sm-12 col-md-12 col-lg-6">
                   
                    <h1 style="color: black">Building Design</h1>               
                        <div class="form-row mt-3">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <input type="text" class="form-control" name="name" v-model="fileName" placeholder="Name" required>
                                <textarea class="form-control mt-3" placeholder="Description in your Building design" name="description" v-model="fileDescription" required></textarea>
                                <input type="number" class="form-control mt-3" name="price" v-model="filePrice" placeholder="Estimated price" required>
                                <input type="text" class="form-control mt-3" name="floor_plan_code" v-model="fileFloor_plan_code" placeholder="Design #" required>
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
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label>Basic Features</label>
                                <input type="number" class="form-control" name="beds" placeholder="Bedrooms" v-model="fileBeds">
                                <input type="number" class="form-control mt-3" name="baths" placeholder="Baths" v-model="fileBaths">
                                <input type="number" class="form-control mt-3" name="floors" placeholder="Stories" v-model="fileFloors">
                                <input type="number" class="form-control mt-3" name="garage" placeholder="Garage" v-model="fileGarage">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label>Dimension</label>
                                <input type="number" class="form-control" name="height" placeholder="Height" v-model="fileHeight">
                                <input type="number" class="form-control mt-3" name="width" placeholder="Width" v-model="fileWidth">
                                <input type="number" class="form-control mt-3" name="depth" placeholder="Depth" v-model="fileDepth">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label>Area</label>
                                <input type="number" class="form-control" name="lot_size" placeholder="Lot Size" v-model="fileLot_size">
                                <input type="number" class="form-control mt-3" name="main_floor_area" placeholder="Main Floor" v-model="fileMain_floor_area">
                                <input type="number" class="form-control mt-3" name="lower_floor_area" placeholder="Lower Floor" v-model="fileLower_floor_area">
                                <input type="number" class="form-control mt-3" name="garage_area" placeholder="Garage" v-model="fileGarage_area">
                                <input type="number" class="form-control mt-3" name="deck_area" placeholder="Deck" v-model="fileDeck_area">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6" style="margin-top:43px">
                 <!--    <p class="" style="color: black"><small><span style="color:red;">IMPORTANT</span>: Image must be landscape and the size of the image should be max 900kb.</small></p> -->


                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>Ceiling</label>
                            <input type="number" class="form-control" name="main_ceiling" placeholder="Main Ceiling" v-model="fileMain_ceiling">
                            <input type="number" class="form-control mt-3" name="lower_ceiling" placeholder="Lower Ceiling" v-model="fileLower_ceiling">
                            <input type="number" class="form-control mt-3" name="garage_ceiling" placeholder="Garage Ceiling" v-model="fileGarage_celing">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->


                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>Roof</label>
                            <input type="text" class="form-control" name="roof" placeholder="Roof Framing ex: rafter" v-model="fileRoof">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->


                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>Bedroom Features</label>
                            <input type="text" class="form-control" name="master_bedroom" placeholder="Master Bedroom ex: Main Floor" v-model="fileMaster_bedroom">
                            <input type="text" class="form-control mt-3" name="bedrooms" placeholder="Bedrooms ex: Main Floor" v-model="fileBedrooms">
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

                    <div class="form-group mt-3">
                        <div class="mb-2">
                              <label>Main</label>
                              <input class="form-control" type="file" ref="file" @change="addFile()">
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
                   <button type="button" class="btn btn-primary btn-lg btn-block float-right" @click="submitForm">SUBMIT</button> 
                </div>
            </div>
    	</div>
</template>

<style>
    @import "//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.css";
</style>

<script>
import axios from 'axios'

export default {

  data() {
    return {
      
        files: [],

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
     
        message: '',
        Home: true
    

      }
      
    },
     methods: {

        submitForm() {
            this.formData = new FormData();
            this.formData.append('name', this.fileName);
            this.formData.append('description', this.fileDescription);
            this.formData.append('design_type', this.designType);
            this.formData.append('garage', this.fileGarage);
            this.formData.append('floors', this.fileFloors);
            this.formData.append('floor_plan_code', this.fileFloor_plan_code);
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

            axios.post('architect/upload_portfolio', this.formData, {headers: {'Content-Type': 'multipart/form-data'}})
                .then(response => {

                    this.resetForm();
                    alert(response.data);
                     this.fetchFile();
                   
                })
                .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });
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

        fetchFile(type, page) {
            this.loading = true;
            axios.get('architect/display_portfolio/' + type + '?page=' + page).then(result => {
                this.loading = false;
                this.files = result.data.data.data;
                this.pagination = result.data.pagination;
            }).catch(error => {
                console.log(error);
                this.loading = false;
            });

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
            this.fileGarage_celing = ''

        }

 
    },
    mounted() {
         this.fetchFile(this.activeTabAll, this.pagination.current_page);
    }
  }

</script>





