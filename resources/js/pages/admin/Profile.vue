<template>
    <div>
	  <div class="container card mb-5" style="margin-top: 100px" v-show="empty">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2 mt-3">
                <ul class="nav nav-tabs">
                     <li class="nav-item">
                        <a href="" data-target="#1tab" data-toggle="tab" class="nav-link active">Personal Information</a>
                    </li>
                </ul>
                    <div class="" id="1tab">
                        <div class="row mt-3">
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                <h4>Contact Information</h4>
                                <small>Your contact information is strictly private, visible to you and the admins. </small>
                                <hr>
                                <div class="mt-2">
                                    <small>Choose profile pic.</small><br>
                                    <small>Profile photos must be at least a minimum size of <b>180 x 180 pixels</b></small><br>
                                      <div class="container" style="">
                                        <div class="cb_img_profile">                                   
                                            <img :src="previewUrl" v-if="previewUrl" class="card_id">   
                                            <p v-else style="margin-top:50px;margin-left:20px">No image...</p>                            
                                        </div>
                                        <input id="profile" class="mt-2" type="file" ref="prof" @change="onFileChange" accept="image/*">
                                      </div>
                                </div>   
                            </div>
                            <div class="col-lg-9 col-md-6 col-sm-12">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Full name</label>
                                            <input id="fullname" type="text" name="fullname" v-model="fullnameInfo"  class="form-control" >
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Phone</label>
                                            <input id="phone" type="text" name="phone"  v-model="phoneInfo" class="form-control" >
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row end.// -->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Address</label>
                                            <input id="address1" type="text" name="address1"  v-model="address1Info" class="form-control">
                                        </div> <!-- form-group end.// -->
                                        <div class="col form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Address line 2</label>
                                            <input id="address2" type="text" name="address2"  v-model="address2Info" class="form-control">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>City / Town</label>
                                        <input id="city" type="text" name="city" v-model="cityInfo" class="form-control" >
                                        </div> <!-- form-group end.// -->
                                        <div class="col form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Province</label>
                                            <input id="province" type="text" v-model="provinceInfo" name="province"  class="form-control" >
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Postcode / ZIP</label>
                                        <input id="postcode" type="text" v-model="postcodeInfo" name="postcode" class="form-control">
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Country</label>
                                        <select id="country" class="form-control" v-model="countryInfo" name="country" >
                                            <option value="" selected disabled hidden></option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Russia">Russia</option>
                                            <option value="States">United States</option>
                                            <option value="India">India</option>
                                            <option value="Afganistan">Afganistan</option>
                                        </select>
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <div class="form-row">

                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Birthday</label>
                                            <input v-model="birthdayInfo" id="birthday" type="date" name="birthday"  class="form-control">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// --> 
                                </form>
                                <p class="btn btn-primary mt-1" @click="Save_profile" style="color:#fff">Save</p>
                            </div>
                        </div>
                    </div><!-- 1st tab -->
                 </div>   
            </div>
        </div>
        <div class="container card mb-5" style="margin-top: 100px" v-show="not_empty">
            <div class="col-lg-12 order-lg-2 mt-3" v-for="show_profile in show_profiles" v-cloak>
                    <ul class="nav nav-tabs">
                         <li class="nav-item">
                            <a href="" data-target="#1tab" data-toggle="tab" class="nav-link active">Personal Information</a>
                        </li>
                    </ul>
                        <div class="tab-pane active" id="1tab">
                            <div class="row mt-3">

                                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                    <h4>Contact Information</h4>
                                    <small>Your contact information is strictly private, visible to you and the admins. </small>
                                    <hr>
                                    <div class="mt-2">
                                        <small>Profile pic.</small><br>
                                        <small>Profile photos must be at least a minimum size of <b>180 x 180 pixels</b></small><br>
                                      <div class="container" style="">
                                        <div class="cb_img_profile">               
                                            <img v-show="hide_img" class="card_id"  :src="'../../storage' + '/Profile/' + '/' + show_profile.username + '.jpg'">       
                                            <!-- <img :src="previewUrl" v-if="previewUrl" class="card_id">  -->      
                                        </div>
                                       <!--  <input class="mt-2" type="file" ref="prof" @change="onFileChange1" accept="image/*">    -->      
                                      </div>
                                    </div>                               
                                </div>
                                <div class="col-lg-9 col-md-6 col-sm-12">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                                <label>Full name</label>
                                                <input id="fullname_u" type="text" name="fullname" :value="show_profile.full_name" class="form-control">
                                            </div> <!-- form-group end.// -->
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Phone</label>
                                                <input id="phone_u" type="text" name="phone"  :value="show_profile.phone" class="form-control">
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row end.// -->
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                                <label>Address</label>
                                                <input id="address1_u" type="text" name="address1" :value="show_profile.address" class="form-control">
                                            </div> <!-- form-group end.// -->
                                            <div class="col form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                                <label>Address line 2</label>
                                                <input id="address2_u" type="text" name="address2" :value="show_profile.address2" class="form-control">
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row.// -->
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>City / Town</label>
                                            <input id="city_u" type="text" :value="show_profile.city_town" name="city" class="form-control" >
                                            </div> <!-- form-group end.// -->
                                            <div class="col form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                                <label>Province</label>
                                                <input id="province_u" type="text"  :value="show_profile.state_country_province" name="province"  class="form-control" >
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row.// -->

                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Postcode / ZIP</label>
                                            <input id="postcode_u" type="text" :value="show_profile.postcode" name="postcode" class="form-control">
                                            </div> <!-- form-group end.// -->
                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Country</label>
                                            <select id="country_u" :value="show_profile.country" class="form-control" name="country" >
                                                <option value="Choose" selected disabled hidden></option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Russia">Russia</option>
                                                <option value="States">United States</option>
                                                <option value="India">India</option>
                                                <option value="Afganistan">Afganistan</option>
                                            </select>
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row.// -->

                                        <div class="form-row">

                                            <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Birthday</label>
                                                <input id="birthday_u" type="text" :value="show_profile.birthday" name="birthday"  class="form-control">
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row.// --> 
                                    </form>
                                    <p class="btn btn-primary mt-1" @click="updateProf" style="color:#fff">Update</p>
                                </div>

                            </div>
                        </div><!-- 1st tab -->
                    </div> 
            </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {

  data() {
    return {
      
        formData: {},
        infos: [],
        users: '',
        ver_status: '',
        identity_licenses: [],
        files: [],
        fullnameInfo: '',
        address1Info: '',
        address2Info: '',
        cityInfo: '',
        postcodeInfo: '',
        phoneInfo: '',
        licenseInfo: '',
        provinceInfo: '',
        countryInfo: '',
        birthdayInfo: '',
        prof_pic: '',
        show_profiles: [],
        empty: true,
        hide_img: true,
        not_empty: false,
        previewUrl: ''

      }
      
    },
     methods: {

        Save_profile: function(e) {

            
                $('#fullname').css('border-color','');
                $('#address1').css('border-color','');
                $('#address2').css('border-color','');
                $('#city').css('border-color','');
                $('#postcode').css('border-color','');
                $('#phone').css('border-color','');
                $('#province').css('border-color','');
                $('#country').css('border-color','');
                $('#birthday').css('border-color','');

            if(this.fullnameInfo && this.address1Info && this.cityInfo && this.postcodeInfo  && this.phoneInfo && this.provinceInfo && this.countryInfo && this.birthdayInfo) {

                this.formData = new FormData();
                this.formData.append('fullname', this.fullnameInfo);
                this.formData.append('address1', this.address1Info);
                this.formData.append('address2', this.address2Info);
                this.formData.append('city', this.cityInfo);
                this.formData.append('postcode', this.postcodeInfo);
                this.formData.append('phone', this.phoneInfo);
                this.formData.append('province', this.provinceInfo);
                this.formData.append('country', this.countryInfo);
                this.formData.append('birthday', this.birthdayInfo);
                this.formData.append('profile', this.prof_pic);

            axios.post('profile_info/architect', this.formData, {headers: {'content-Type': 'multipart/form-data'}})
                .then(response => {
                    swal("Opps!", response.data, "success");
                   this.showProf();

                })
                .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });


            } 
            this.errors = [];
         
            if(!this.fullnameInfo) {
                    swal("Opps!", "Full Name required.", "error");
                $('#fullname').css('border-color','red');
            }
            if(!this.address1Info) {
                    swal("Opps!", "Address required.", "error");
                $('#address1').css('border-color','red');
            }
            if(!this.postcodeInfo) {
                  swal("Opps!", "Post code required.", "error");
                $('#postcode').css('border-color','red');
            }
            if(!this.phoneInfo) {
                  swal("Opps!", "Phone required.", "error");
                $('#phone').css('border-color','red');
            }
            if(!this.provinceInfo) {
                  swal("Opps!", "Province required.", "error");
                $('#province').css('border-color','red');
            }
            if(!this.countryInfo) {
                  swal("Opps!", "Country required.", "error");
                $('#country').css('border-color','red');
            }
            if(!this.birthdayInfo) {
                  swal("Opps!", "Birthday required.", "error");
                $('#birthday').css('border-color','red');
            }
            if(!this.cityInfo) {
                  swal("Opps!", "City required.", "error");
                $('#city').css('border-color','red');
            }

       
            e.preventDefault();
        },

            onFileChange: function (event) {
              const file = event.target.files[0];
              if (!file) {
                return false
              }
              if (!file.type.match('image.*')) {
                return false
              }
              const reader = new FileReader();
              const that = this;
              reader.onload = function (e) {
                that.previewUrl = e.target.result;
              }
              reader.readAsDataURL(file);

            $('#profile').css('border-color','');
            if(this.$refs.prof.files[0].size > 179999) {
                $('#profile').css('border-color','red');
                $('#profile').val("");
                swal("Opps!", "File size required less than 180x180 pixels.", "error");
                return 0;
            }else{
                this.prof_pic = this.$refs.prof.files[0];
                console.log(this.prof_pic);
            }

              console.log(file);
         },

            onFileChange1: function (event) {

                this.hide_img=false;  
                const file = event.target.files[0];
                if (!file) {
                return false
                }
                if (!file.type.match('image.*')) {
                return false
                }
                const reader = new FileReader();
                const that = this;
                reader.onload = function (e) {
                that.previewUrl = e.target.result;
                }
                reader.readAsDataURL(file);
     

                $('#profile').css('border-color','');
                if(this.$refs.prof.files[0].size > 179999) {
                    $('#profile').css('border-color','red');
                    $('#profile').val("");
                    swal("Opps!", "File size required less than 180x180 pixels.", "error");
                    return 0;
                }else{
                    this.prof_pic = this.$refs.prof.files[0];
                    console.log(this.prof_pic);
                }

                console.log(file);
          
         },

        showProf() {
                axios.get('architects/show_profile/' + this.$route.params.architect_id).then(result => {

                    this.show_profiles = result.data;
                    this.empty = false;
                    this.not_empty = true;

                    console.log(this.show_profiles);
              
                }).catch(error => {
                    console.log(error);
                });

        },
        updateProf() {

            $('#fullname_u').css('border-color','');
            $('#address1_u').css('border-color','');
            $('#address2_u').css('border-color','');
            $('#city_u').css('border-color','');
            $('#postcode_u').css('border-color','');
            $('#phone_u').css('border-color','');
            $('#province_u').css('border-color','');
            $('#country_u').css('border-color','');
            $('#birthday_u').css('border-color','');

            var full_name = document.getElementById('fullname_u');
            var address1 = document.getElementById('address1_u');
            var address2 = document.getElementById('address2_u');
            var city = document.getElementById('city_u');
            var postcode = document.getElementById('postcode_u');
            var phone = document.getElementById('phone_u');
            var province = document.getElementById('province_u');
            var country = document.getElementById('country_u');
            var birthday = document.getElementById('birthday_u');
            this.formData = new FormData();
            this.formData.append('profile', this.prof_pic);

                        if(full_name.value == "") {
                swal("Opps!", "full name you want to edit?!", "error");
                $('#fullname_u').css('border-color','red');
                return 0;
            }
                        if(address1.value == "") {
                swal("Opps!", "address you want to edit?!", "error");
                $('#address1_u').css('border-color','red');
                return 0;
            }
                        if(address2.value == "") {
                swal("Opps!", "address line 2 you want to edit?!", "error");
                $('#address2_u').css('border-color','red');
                return 0;
            }
                        if(city.value == "") {
                swal("Opps!", "city you want to edit?!", "error");
                $('#city_u').css('border-color','red');
                return 0;
            }
                        if(postcode.value == "") {
                swal("Opps!", "postcode you want to edit?!", "error");
                $('#postcode_u').css('border-color','red');
                return 0;
            }
                        if(phone.value == "") {
                swal("Opps!", "phone you want to edit?!", "error");
                $('#phone_u').css('border-color','red');
                return 0;
            }
                        if(province.value == "") {
                swal("Opps!", "province you want to edit?!", "error");
                $('#province_u').css('border-color','red');
                return 0;
            }
                        if(country.value == "") {
                swal("Opps!", "country you want to edit?!", "error");
                $('#country_u').css('border-color','red');
                return 0;
            }
                        if(birthday.value == "") {
                swal("Opps!", "birthday you want to edit?!", "error");
                $('#birthday_u').css('border-color','red');
                return 0;
            }

            axios.post('architect/update_profile/', {val_1: full_name.value, val_2: address1.value, val_3: address2.value, val_4: city.value, val_5: postcode.value, val_6: phone.value, val_7: province.value, val_8: country.value, val_9: birthday.value })
                    .then(response => {

                        this.showProf();
                        swal("Good job!", response.data, "success");
                    
                    })
                    .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });

    

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

        },
    get_user_info() {
        axios.get('user/info/').then(result => {
           
            var i;
            var html=''         
            for(i=0;i<result.data.length;i++) {

              html+= '<span>' +result.data[i].name+ '</span>'; 

              $('#username').html(html);

             
            } 

              }).catch(error => {
                  console.log(error);
              });

      },

 
    },
    mounted() {
        this.showProf();
        this.get_user_info();
    }
  }

</script>
<style scoped>
    .cb_img_profile {
        border:1px solid #3b5998;
        width:120px;
        height:120px;
        border-style:dashed;
    }
    .card_id {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


h1 {
  font-weight: normal;
}

input {
  border: 1px solid #e9e9e9;
  border-radius: 4px;
  font-size: .825rem;
  padding: .5rem;
  margin-bottom: .5rem;
  width: 100%;
}

output img {
  max-width: 100%;
}

output p {
  background: #f7f7f7;
  border-radius: 4px;
  padding: 2rem;
  text-align: center;
}

</style>

     