<template>
	 <div class="container" style="margin-top:100px;">
         <div class="" style="float:right">
           <a class="btn btn-primary mt-3" style="cursor: pointer; color:#fff;" href="/super_admin">Back to home</a>
         </div>
            <div class="row mt-3" novalidate="true">
                <div class="col-sm-12 col-md-12 col-lg-6">
                   
                    <h1 style="color: black">Furnitures & Accessories</h1>               
                        <div class="form-row mt-3">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <input id="name" type="text" class="form-control" name="name" v-model="fileName" placeholder="Name">
                                <textarea id="description" class="form-control mt-3" placeholder="Description" name="description" v-model="fileDescription"></textarea>
                                <input id="price" type="number" class="form-control mt-3" name="price" v-model="filePrice" placeholder="Price" >
                                <select id="type" class="form-control mt-3" name="design_type" v-model="fileDesignType">
                                  <option value="" selected disabled hidden>Choose Design Type</option>
                                  <option value="furnituresAccessories">Furnitures & Accessories</option>
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


        submitForm: function(e) {

            
                $('#name').css('border-color','');
                $('#description').css('border-color','');
                $('#price').css('border-color','');
                $('#type').css('border-color','');
   
            
            

            if(this.fileName && this.fileDescription && this.fileDesignType && this.filePrice) {

            this.formData = new FormData();
            this.formData.append('name', this.fileName);
            this.formData.append('description', this.fileDescription);
            this.formData.append('price', this.filePrice);
            this.formData.append('type', this.fileDesignType);

            this.formData.append('file', this.attachment);
            this.formData.append('file1', this.attachment1);
            this.formData.append('file2', this.attachment2);
            this.formData.append('file3', this.attachment3);
            this.formData.append('file4', this.attachment4);

            axios.post('super_admin/upload_furniture_accessories', this.formData, {headers: {'Content-Type': 'multipart/form-data'}})
                .then(response => {

                    this.resetForm();
                    swal("Good job!", response.data, "success");
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
                $('#type').css('border-color','red');
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
            this.attachment = null;
            this.attachment1 = null;
            this.attachment2 = null;
            this.attachment3 = null;
            this.attachment4 = null;

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
        this.get_user_info();
    }
  }

</script>





