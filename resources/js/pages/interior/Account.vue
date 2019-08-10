<template>
	  <div class="container card mb-5" style="margin-top: 100px">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2 mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-toggle="tab" class="nav-link active">Email and Password</a>
                    </li>
                </ul>

                <div class="row mt-3">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                        <h4>Email</h4>                         
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                        <form @submit.prevent="change_email" method="POST">
                        	<div class="form-row">
                                <div class="col form-group">
                                    <label>Current email</label>
                                    <input id="c_email" v-model="c_email" name="c_email" type="text" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>New email</label>
                                    <input id="n_email" v-model="n_email" name="n_email" type="text" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->

                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Enter your password to confirm change</label>
                                    <input id="password" v-model="password" name="password" type="password" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            
                            <button class="btn btn-primary mt-1" type="submit" style="color:#fff">Change email address</button>
                        </form>
                    </div>
                </div>  
                <div class="row mt-5">
	                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
	                    <h4>Password</h4>
	                    <small>
	                        <span class="help-block">Tips for a secure password</span>
	                        <ul class="list-bullet">
	                            <li>Use a mix of letters, numbers and symbols</li>
	                            <li>Don't use personal information or common words</li>
	                            <li>Make it long - the longer the better. We require a minimum of 12 characters</li>
	                        </ul>
	                    </small>	                    
	                </div>
	                <div class="col-lg-6 col-md-6 col-sm-12">
	                    <form @submit.prevent="change_password" method="POST">
	                        <div class="form-row">
	                            <div class="col form-group">
	                                <label>Current password</label>
	                                <input id="c_password" v-model="c_password" name="c_password" type="password" class="form-control" placeholder="">
	                            </div> <!-- form-group end.// -->
	                        </div> <!-- form-row end.// -->

	                        <div class="form-row">
	                            <div class="col form-group">
	                                <label>New password</label>
	                                <input id="n_password" v-model="n_password" name="n_password" type="password" class="form-control" placeholder="">
	                            </div> <!-- form-group end.// -->
	                        </div> <!-- form-row end.// -->

	                        <div class="form-row">
	                            <div class="col form-group">
	                                <label>Confirm new password</label>
	                                <input id="cn_password" v-model="cn_password" name="cn_password" type="password" class="form-control" placeholder="">
	                            </div> <!-- form-group end.// -->
	                        </div> <!-- form-row end.// -->
	                        
	                        <button type="submit" class="btn btn-primary mt-1">Change password</button><br>
	                        <a href="#"><small>I forgot my password</small></a>
	                    </form>
	                </div>
                </div>        
            </div>         
        </div>
    </div>
</template>
<script>

  export default {
    data() {
      return {

      	c_email: '',
      	n_email: '',
      	password: '',
      	c_password: '',
      	n_password: '',
      	cn_password: '',

      }
    },
    methods: {


      change_email() {

      	$('#c_email').css('border-color','');
        $('#n_email').css('border-color','');
        $('#password').css('border-color','');



        if(this.c_email && this.n_email && this.password) {

        this.formData = new FormData();
        this.formData.append('c_email', this.c_email);
        this.formData.append('n_email', this.n_email);
        this.formData.append('password', this.password);

            axios.post('interior/change_email', this.formData, {headers: {'content-Type': 'multipart/form-data'}})
                .then(response => {

                    if(response.data == "Email changed successfully!") {
                              swal("Good job!", response.data, "success");
                              this.resetForm();
                              return 0;
                     }else if(response.data == "Email doesn't recognized!") {
                     	 $('#c_email').css('border-color','red');
                        swal("Opps!", response.data, "error");
                        return 0;
                     }else if(response.data == "Incorrect password!") {
                     	$('#password').css('border-color','red');
                     	swal("Opps!", response.data, "error");
                        return 0;
                     }

                    console.log(response.data);
                   
                })
                .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });


            }       
            this.errors = [];

            if(!this.c_email) {
                    swal("Opps!", "Current email required.", "error");
                $('#c_email').css('border-color','red');
            }
            if(!this.n_email) {
                    swal("Opps!", "New email required.", "error");
                $('#n_email').css('border-color','red');
            }
            if(!this.password) {
                    swal("Opps!", "Password required.", "error");
                $('#password').css('border-color','red');
            }


      },

      change_password() {

      	$('#c_password').css('border-color','');
        $('#n_password').css('border-color','');
        $('#cn_password').css('border-color','');



        if(this.c_password && this.n_password && this.cn_password) {

        this.formData = new FormData();
        this.formData.append('c_password', this.c_password);
        this.formData.append('n_password', this.n_password);
        this.formData.append('cn_password', this.cn_password);

            axios.post('interior/change_password', this.formData, {headers: {'content-Type': 'multipart/form-data'}})
                .then(response => {

                    if(response.data == "Password changed successfully!") {
                              swal("Good job!", response.data, "success");
                              this.resetForm();
                              return 0;
                     }else if(response.data == "Password doesnt recognized!") {
                     	$('#c_password').css('border-color','red');
                     	this.n_password='';
                     	this.cn_password='';
                     	swal("Opps!", response.data, "error");
                        return 0;
                     }else if(response.data == "Incorrect confirm password!") {
                     	$('#cn_password').css('border-color','red');
                     	swal("Opps!", response.data, "error");
                        return 0;
                     }

                   
                })
                .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });


            }       
            this.errors = [];

            if(!this.c_password) {
                    swal("Opps!", "Current password required.", "error");
                $('#c_password').css('border-color','red');
            }
            if(!this.n_password) {
                    swal("Opps!", "New password required.", "error");
                $('#n_password').css('border-color','red');
            }
            if(!this.cn_password) {
                    swal("Opps!", "Confirm new password required.", "error");
                $('#cn_password').css('border-color','red');
            }


      },

      resetForm() {
            this.formData = {};
            this.c_email = '';
            this.n_email = '';
            this.password = '';
            this.c_password = '';
            this.n_password = '';
            this.cn_password = '';

        },
        get_interior_username() {
              axios.get('interior/username/').then(result => {
             

                var username = result.data.name

                $('#username').html(username);
                

                }).catch(error => {
                    console.log(error);
                });
        },
    },
    mounted() {

      this.get_interior_username();
   
    }
  }
</script>