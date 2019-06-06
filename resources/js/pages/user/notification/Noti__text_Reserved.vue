<template>
	<div class="container" style="margin-top:100px">
		    <div class="is-empty column is-4 is-offset-4" v-if="reserved_design_per_users == 0" v-cloak>
              <figure >
                <img :src="empty_bin" alt="Folder empty" id="folder_empty">
                  <figcaption>
                    <p class="title is-2">
                    No reservation yet. Reserve now!
                    </p>
                  </figcaption>
              </figure>
            </div> 
		<div class=" card shadow-sm col-lg-12 col-md-12 col-sm-12" v-for="reserved_design_per_user in reserved_design_per_users" v-cloak>
			<div style="padding:10px"><i class="fa fa-print" style="font-size:20px; float:right"><a class="ml-2" style="color:blue">Print</a></i></div>
			<div class="row">
				<div class="col-lg-6">
					<div class="col-lg-12" style="padding:20px">
					<p>You have successfully reserved your selected design with Reference <b>#SENEBU-{{reserved_design_per_user.reference_number}}</b>. Your designer is Architect/Interior <b>{{reserved_design_per_user.designer_name}}</b>, Kindly wait for the confirmation we will contact you within 24hours with the time and meeting place for negotiation. We will notify you via email or SMS. Thank you!</p>

					<p style="margin-top:170px">-regards senebu</p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-12" style="border: 1px solid #FF8C00; padding:20px">
						<h4>Your Billing Details</h4><br>
						<div class="col-lg-9">
							<label>Billing name:</label>
							<span style="float:right">{{reserved_design_per_user.billing_name}}</span>
						</div>
						<div class="col-lg-9">
							<label>Billing country:</label>
							<span style="float:right">{{reserved_design_per_user.billing_address_country}}</span>
						</div>
						<div class="col-lg-9">
							<label>Country code:</label>
							<span style="float:right">{{reserved_design_per_user.billing_address_country_code}}</span>
						</div>
						<div class="col-lg-9">
							<label>Zip code:</label>
							<span style="float:right">{{reserved_design_per_user.billing_address_zip}}</span>
						</div>
						<div class="col-lg-9">
							<label>Billing address:</label>
							<span style="float:right">{{reserved_design_per_user.billing_address_line1}}</span>
						</div>
						<div class="col-lg-9">
							<label>Design code:</label>
							<span style="float:right">{{reserved_design_per_user.design_code}}</span>
						</div>
						<div class="col-lg-9">
							<label>Designer name:</label>
							<span style="float:right">{{reserved_design_per_user.designer_name}}</span>
						</div>
						<div class="col-lg-9">
							<label>Amount:</label>
							<span style="float:right"><b>&#8369;1,000.00</b></span>
						</div>
			
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
    	reserved_design_per_users: [],
    	empty_bin: '/image/empty.jpg',
    	loading: false
      }
    },
    mounted() {
    	this.reserved_design_per_user();
    	this.get_user_info();
    },
    methods: {
    reserved_design_per_user() {
    	  this.loading = true;
        axios.get('individual/reserved_design_per_user/').then(result => {

                  this.reserved_design_per_users = result.data;
                  console.log(this.reserved_design_per_users);

              }).catch(error => {
                  console.log(error);
              });

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
    }
  }
</script>