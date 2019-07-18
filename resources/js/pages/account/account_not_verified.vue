<template>
	<div class="container">
		<div class="justify-content-center align-items-center row">
			<router-link v-if="!$auth.check()" :to="{name: 'home'}"><img class="w3-bar-item ml-4" :src="logo" id="logo"></router-link>
		</div>  
	     <div class="justify-content-center align-items-center row" style="margin-top:20px">
	        <h1 style="font-size:24px;  letter-spacing: -.5px; color:#696969; margin-top:0;font-weight:100">Account verification</h1>
	        <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center align-items-center row" style="margin-top:5px;margin-bottom:100px">
	            <div class="card card-default col-lg-3 col-md-3 col-sm-3">
	                <div class="card-body"  style="padding:20px">
	                    <form autocomplete="off" @submit.prevent="verify_account" method="POST">
	                        <div class="form-group">
	                            <label for="email" style="font-weight:bold">E-mail</label>
	                            <input type="email" id="email" v-model="email" name="email" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label  style="font-weight:bold">Verification code</label>
	                            <input type="password" id="verification_code" v-model="verification_code" name="verification_code" class="form-control">
	                        </div>
	                        <button type="submit" class="btn " style="background-color:#6495ED; color:#fff">Verify</button>
	                    </form><br>
	                     <span>Account verified? <a href="/account/set-password">Set password</a></span>
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
        verification_code: ''

      }
    },
    methods: {

    	verify_account() {
    	  $('#email').css('border-color','');
        $('#verification_code').css('border-color','');

        if(this.email && this.verification_code) {

        this.formData = new FormData();
        this.formData.append('email', this.email);
        this.formData.append('verification_code', this.verification_code);

          axios.post('designers/verification',  this.formData, {headers: {'content-Type': 'multipart/form-data'}})
                    .then(response => {

                           if(response.data == "Account verified sucessfully!") {
                           		swal("Good job!", response.data, "success");
                              this.resetForm();
                           		return 0;
                           }else if(response.data == "Account is already verified!") {
                           	    $('#email').css('border-color','red');
                                $('#verification_code').css('border-color','red');
                           		swal("Opps!", response.data, "error");
                           		return 0;
                           }else if(response.data == "Invalid! Check your email and verification code!") {
                           		swal("Opps!", response.data, "error");
                           		$('#email').css('border-color','red');
                           		$('#verification_code').css('border-color','red');
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
            if(!this.verification_code) {
                    swal("Opps!", "Verification code required.", "error");
                $('#verification_code').css('border-color','red');
            }

      },
        resetForm() {
            this.formData = {};
            this.email = '';
            this.verification_code = '';

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