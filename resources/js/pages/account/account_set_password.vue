<template>
	<div class="container">
		<div class="justify-content-center align-items-center row">
			<a href="/"><img class="w3-bar-item ml-4" :src="logo" id="logo"></a>
		</div>  
	     <div class="justify-content-center align-items-center row" style="margin-top:20px">
	        <h1 style="font-size:24px;  letter-spacing: -.5px; color:#696969; margin-top:0;font-weight:100">Account set password</h1>
	        <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center align-items-center row" style="margin-top:5px;margin-bottom:100px">
	            <div class="card card-default col-lg-3 col-md-3 col-sm-3">
	                <div class="card-body"  style="padding:20px">
	                    <form autocomplete="off" @submit.prevent="set_password" method="post">
	                        <div class="form-group">
	                            <label for="email" style="font-weight:bold">Email</label>
	                            <input type="email" id="email" v-model="email" name="email" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="password" style="font-weight:bold">Password</label>
	                            <input type="password" id="password" v-model="password" name="password" class="form-control">
	                        </div>
                          <div class="form-group">
                              <label for="password" style="font-weight:bold">Confirm password</label>
                              <input type="password" id="con_passworda" v-model="con_passworda" class="form-control">
                          </div>
	                        <button type="submit" class="btn " style="background-color:#6495ED; color:#fff">Set password</button>
	                    </form><br>
	                     <span>Account set password done? <a href="/login">Signin</a></span>
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
        verified: '../image/verified.png',
        not_verified: '../image/not_verified.png',
        logo: '../image/logo2_re.png',
        email: '',
        password: '',
        con_passworda: ''

      }
    },
    methods: {

        set_password() {

        // get the redirect object
        var redirect = this.$auth.redirect()  

        $('#email').css('border-color','');
        $('#password').css('border-color','');
        $('#con_passworda').css('border-color','');

        if(this.password != this.con_passworda) {

            $('#con_passworda').css('border-color','red');
             swal("Opps!", 'Password does not match!', "error");
            return 0;
        }


            if(this.email && this.password) {

        this.formData = new FormData();
        this.formData.append('email', this.email);
        this.formData.append('password', this.password);


          axios.post('designers/set_password', this.formData, {headers: {'content-Type': 'multipart/form-data'}})
                    .then(response => {
       
                           if(response.data == "Check your email!") {
                              swal("Opps!", response.data, "error");
                              $('#emaila').css('border-color','red');
                              return 0;

                           }else if(response.data == "Account not verified!") {
                              swal("Opps!", response.data, "error");
                              $('#emaila').css('border-color','red');
                              return 0;

                           }else if(response.data == "Password set successfully!") {
                              swal("Good job!", response.data, "success");
                              this.resetForm();

                                                             // handle redirection
                              const redirectTo = redirect ? redirect.from.name : 'login'
                              this.$router.push({name: redirectTo})

                              return 0;
                           }
                           else if(response.data == "You have already set the password!") {
                              swal("Opps!", response.data, "error");
                              $('#passworda').css('border-color','red');
                              return 0;
                           }else if(response.data == "Email required!") {
                              swal("Opps!", response.data, "error");
                              $('#emaila').css('border-color','red');
                              return 0;
                           }else if(response.data == "Password required!") {
                              swal("Opps!", response.data, "error");
                              $('#passworda').css('border-color','red');
                              return 0;
                           }
                        
                          
                          
                    })
                    .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });

            }
            this.errors = [];

            if(!this.email) {
                    swal("Opps!", "Email required.", "error");
                $('#email').css('border-color','red');
            }
            if(!this.password) {
                    swal("Opps!", "Password required.", "error");
                $('#password').css('border-color','red');
            }

      },
      resetForm() {
            this.formData = {};
            this.email = '';
            this.password = '';
            this.con_passworda = '';

        },
    },
    mounted() {

   
    }
  }
</script>
<style scoped>

@keyframes bounce {
	0%, 20%, 60%, 100% {
		-webkit-transform: translateY(0);
		transform: translateY(0);
	}

	40% {
		-webkit-transform: translateY(-20px);
		transform: translateY(-20px);
	}

	80% {
		-webkit-transform: translateY(-10px);
		transform: translateY(-10px);
	}
}


.verified {
  border: none;
  circle-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
  cursor:pointer;

}
.verified:hover {
  animation: bounce 1s;
}

.not_verified {
  border: none;
  circle-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
  cursor:pointer;
}
.not_verified:hover {
  animation: bounce 1s;


}

</style>