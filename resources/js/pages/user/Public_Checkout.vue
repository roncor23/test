<template>
    <div class="container" style="margin-top:100px">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <h1>Billing details</h1>
                <form class="mt-4">
                    <div class="form-row">

                        <div class="form-group col-sm-12 col-md-12 col-lg-6">
                            <label>FIRST NAME</label>
                            <input type="text" class="form-control">
                        </div> <!-- form-group end.// -->

                        <div class="col form-group col-sm-12 col-md-12 col-lg-6">
                            <label>LAST NAME</label>
                            <input type="text" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->

                    </div> <!-- form-row end.// -->

                    <div class="form-row">

                        <div class="form-group col-sm-12 col-md-12 col-lg-6">
                            <label>EMAIL ADDRESS</label>
                            <input type="text" class="form-control">
                        </div> <!-- form-group end.// -->

                        <div class="col form-group col-sm-12 col-md-12 col-lg-6">
                            <label>PHONE</label>
                            <input type="text" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->

                    </div> <!-- form-row end.// -->

                    <div class="form-row">

                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>COUNTRY</label><br>
                            <small><b>Philippines</b></small>
                        </div> <!-- form-group end.// -->

                    </div> <!-- form-row end.// -->

                    <div class="form-row">

                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>STREET ADDRESS</label>
                            <input type="text" class="form-control" placeholder="House number and street name"><br>
                            <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                        </div> <!-- form-group end.// -->

                    </div> <!-- form-row end.// -->

                    <div class="form-row">

                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>TOWN / CITY</label>
                            <input type="text" class="form-control">
                        </div> <!-- form-group end.// -->

                    </div> <!-- form-row end.// -->

                    <div class="form-row">

                        <div class="form-group col-sm-12 col-md-12 col-lg-6">
                            <label>STATE / COUNTRY</label>
                            <select class="form-control">
                                <option selected="">Agusan del Sur</option>
                                <option>Agusan del Norte</option>
                                <option>Aklan</option>
                                <option>Albay</option>
                                <option>Abra</option>
                                <option>Antique</option>
                            </select>
                        </div> <!-- form-group end.// -->

                        <div class="col form-group col-sm-12 col-md-12 col-lg-6">
                            <label>POSTAL / ZIP CODE</label>
                            <input type="text" class="form-control" placeholder="Optional">
                        </div> <!-- form-group end.// -->

                    </div> <!-- form-row end.// -->

                    <div class="form-row">

                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <input type="checkbox" name="" id="" > <small>Ship to a different address?</small>
                        </div> <!-- form-group end.// -->

                    </div> <!-- form-row end.// -->

                    <div class="form-row">

                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>ORDER NOTES</label>
                            <textarea class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div> <!-- form-group end.// -->

                    </div> <!-- form-row end.// -->

                </form>

            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 cb_bgcolor">
                <h6 class="mt-3 mb-4">Reserved design</h6>
                 <!-- Cart -->
                <ul class="list-group mb-3 z-depth-1" v-for="file in files">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{file.name}}</h6>
                        <small class="text-muted">{{file.description}}</small>
                    </div>
                    <span class="text-muted">₱2000.00</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Total (Php)</h6>
                    </div>
                    <span class="text-success">₱2000.00</span>
                    </li>
                </ul>
                <!-- Cart -->
                <br>
            <form>
                <div id="accordion">
                    <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        OVER-THE-COUNTER BANK DEPOSIT (BDO & BPI)
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion" style="background-color:#EFEBEB">

                        <div class="card-body">
                            <input type="radio" name="payment" value="deposit"> USE over-the-counter bank deposit (BDO & BPI)<br>
                            <p class="mt-3"><small><span style="color:red;">IMPORTANT:</span> Please deposit your payment within 3 banking days. 
                            Instructions will be sent to your email to complete your transaction.</small></p>
                        </div>

                    </div>
                    </div>


                    <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        STRIPE ONLINE PAYMENT
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion" style="background-color:#EFEBEB">
                    	<img width="300px" :src="stripe">
                        <div class="card-body">
                        	<div class="form-row">
	                        	<div class="form-group col-sm-12 col-md-12 col-lg-12">
	                        		<span style="float:left">Card Number<span style="color:red">*</span></span>
	                         		<input type="" class="form-control" name="">
	                        	</div>
	                        	<div class="form-group col-sm-12 col-md-12 col-lg-6 mt-2">
	                        		<span style="float:left">Expiry (MM/YY)<span style="color:red">*</span></span>
	                         		<input type="" class="form-control" name="">
	                        	</div>   
	                        	<div class="col form-group col-sm-12 col-md-12 col-lg-6 mt-2">
	                        		<span style="float:left">Card Code<span style="color:red">*</span></span>
	                         		<input type="" class="form-control" name="">
	                        	</div>   
                        	</div>                  	
                        </div>
                    </div>
                    </div>


                    <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        G-CASH
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion" style="background-color:#EFEBEB">
                        <div class="card-body">
                            <input type="radio" name="payment" value="cod"> USE cash on delivery (+P50 courier fee)
                            <p class="mt-3"><small><span style="color:red;">IMPORTANT:</span> 
                                <span style="color:red;">We DO NOT accept COD for Provincial orders. Cash-on-Delivery is only applicable for Manila orders. </span>
                                <br><br> An additional P50 will be charged for the courier fee on top of the total price.
                                <br><br> We will not be able to cancel or make any changes to your order once it has been submitted to us for processing. Please double check the items, complete address and mobile number before placing your order.
                                <br><br> We do not accept for pick up at any Courier Branch. Door to door delivery only.
                                </small>
                            </p>
                        </div>
                    </div>
                    </div>

                    <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                        PAYPAL ONLINE PAYMENT (+P50 PROCESSING FEE)
                        </a>
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#accordion" style="background-color:#EFEBEB">
                        <div class="card-body">
                            <img width="300px" src="https://d2mckvlpm046l3.cloudfront.net/5c2fb277527c818d3b2ab78e815b46bb3b92078c/http%3A%2F%2Fnobcontrol.com%2Fsites%2Fall%2Fthemes%2Fbootstrap_subtheme%2Fimages%2Fpaypal-payment-option.png" alt="">
                            <br><input type="radio" name="payment" value="paypal"> USE paypal online payment (+P50 processing fee)
                            <p class="mt-3"><small><span style="color:red;">IMPORTANT:</span> 
                                An additional P50 will be charged for the processing fee on top of the total price.
                                We will not be able to cancel or make any changes to your order once it has been submitted to us for processing. Please double check the items, complete address and mobile number before placing your order.
                                </small>
                            </p>
                        </div>
                    </div>
                    </div>
                </div><br><br>
                <input type="checkbox" name="" id="" > <small>I've read and accept <span style="color:red">terms & conditions</span></small><br><br>
                <button type="button" class="btn btn-info btn-lg btn-block mt-3 mb-3" style="background-color:#f6710e;">Place order</button><br><br><br>
            </form>
                    

            </div>

        </div>

    </div>
</template>

<style scoped>
h1,p, a {
    color: #444;
}
label {
    font-size: 10px
}
.cb_bgcolor {
    background-color: rgb(239, 239, 239);
}
ul li {
    list-style: none;
}
.labelcheck {
    font-size: 15px;
}


</style>

<script>

// import "bootstrap/dist/js/bootstrap.min.js";


export default {

  data() {
    return {
      
        files: [],
  
  
        loading: false,

 
        message: '',
        errors: {},
        stripe: '/image/stripe.png'


      }
      
    },

     methods: {


        fetchFile() {
         this.loading = true;
	            axios.get('architects/details_per_portfolio/' + this.$route.params.portfolio_id).then(result => {
	                this.loading = false;
	                this.files = result.data;

	                console.log(this.files);
	          
	            }).catch(error => {
	                console.log(error);
	                this.loading = false;
	            });

        },

   
   
     
        anyError() {
            return Object.keys(this.errors).length > 0;
        },

        clearErrors() {
            this.errors = {};
        }
    },
    mounted() {
        
        this.fetchFile();

    },


  }

</script>
