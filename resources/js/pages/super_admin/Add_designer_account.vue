<template>
    <div class="container card mb-5" style="margin-top: 100px">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2 mt-3">
                <ul class="nav nav-tabs">
                     <li class="nav-item">
                        <a href="" data-target="#1tab" data-toggle="tab" class="nav-link active" style="font-weight:bold">Add Designer Account</a>
                    </li>
                </ul>
                    <div class="tab-pane active" id="1tab">
                        <div class="row mt-3">
                            <div class="col-lg-9 col-md-6 col-sm-12">
                                <form @submit.prevent="save_account" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Username</label>
                                            <input id="usernames" type="text" v-model="username" name="username"  class="form-control" >
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row end.// -->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Email</label>
                                            <input id="email" type="text" v-model="email" name="email"  class="form-control">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Verification Code</label>
                                        <input id="verification_code" type="text" v-model="verification_code" name="verification_code"  class="form-control">
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Copy this generated verification code</label>
                                             <div id="verification_code" style="border:1px solid #dcdcdc;height:35px;color:red">{{generate_codes}}</div>
                                            <p type="button" name="province"  class="btn btn-secondary form-control mt-2" @click="generate_code_for_designer" style="">Generate</p>
                                        </div> <!-- form-group end.// -->

                                    </div> <!-- form-row.// -->



                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Role</label>
                                        <select id="choose" v-model="role" class="form-control" name="role">
                                            <option value="" selected disabled hidden>Choose</option>
                                            <option value="2">Architect</option>
                                            <option value="4">Interior Designer</option>
                                        </select>
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
                                      <button class="btn btn-primary mt-1" type="submit" style="color:#fff">Save</button>
                                </form>
                              
                            </div>

                        </div>
                    </div><!-- 1st tab -->
      
            </div>         
        </div>
    </div>
</template>

<script>

  export default {
    data() {
      return {
        generate_codes:'',
        verification_code: '',
        role: '' ,
        verification_code: '',
        username: '',
        email: '',
      }
    },
    methods: {


      generate_code_for_designer() {

        axios.get('add_account/generate_code/').then(result => {

            this.generate_codes = result.data;

            console.log(this.generate_codes);

              }).catch(error => {
                  console.log(error);
              });
      },

      save_account() {
        $('#usernames').css('border-color','');
        $('#email').css('border-color','');
        $('#verification_code').css('border-color','');
        $('#choose').css('border-color','');


            if(this.username && this.email && this.verification_code && this.role) {

        this.formData = new FormData();
        this.formData.append('username', this.username);
        this.formData.append('email', this.email);
        this.formData.append('verification_code', this.verification_code);
        this.formData.append('role', this.role);



            axios.post('designer/save_account', this.formData, {headers: {'content-Type': 'multipart/form-data'}})
                .then(response => {
                    swal("Good job!", response.data, "success");
                   
                })
                .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });


            }       
            this.errors = [];

            if(!this.username) {
                    swal("Opps!", "Username required.", "error");
                $('#username').css('border-color','red');
            }
            if(!this.email) {
                    swal("Opps!", "Email required.", "error");
                $('#email').css('border-color','red');
            }
            if(!this.verification_code) {
                    swal("Opps!", "Verification required.", "error");
                $('#verification_code').css('border-color','red');
            }
            if(!this.role) {
                  swal("Opps!", "Role required.", "error");
                $('#choose').css('border-color','red');
            }
      }
    },
    mounted() {

   
    }
  }
</script>