<template>
	 <div class="container" style="margin-top:100px;">
         <div class="" style="float:right">
           <a class="btn btn-primary mt-3" style="cursor: pointer; color:#fff;" href="/super_admin">Back to home</a>
         </div>
          <p class="alert alert-danger" v-if="errors.length">
            <b>Please correct the following error(s):</b>
            <ul>
              <li v-for="error in errors">{{ error }}</li>
            </ul>
          </p>
            <div class="row mt-3" >
                  <div class="col-sm-12 col-md-12 col-lg-6" v-for="display_portfolio in display_portfolios" v-cloak>           
                    <h1 style="color: black">Furnitures & Accessories</h1>               
                        <div class="form-row mt-3">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                              <label style="color: gray; font-size:8pt;">Name</label>
                                <input id="name" type="text" class="form-control" name="name" :value="display_portfolio.name" required>
                              <label style="color: gray; font-size:8pt;">Design Concept</label>
                                <textarea id="description" class="form-control" name="description" :value="display_portfolio.description"></textarea>
                              <label style="color: gray; font-size:8pt;">Design Estimated Price</label>
                                <input id="price" type="number" class="form-control" name="price" :value="display_portfolio.price">
                              <label style="color: gray; font-size:8pt;">Design Type</label>
                                <select id="design_type" class="form-control " name="design_type" >
                                  <option  selected disabled hidden >Choose Design Type</option>
                                  <option value="interiorresidential">furnituresAccessories</option>
                                </select> 
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <button type="button" class="btn btn-primary btn-lg btn-block float-right" @click="updateForm">UPDATE</button> 
                </div>
            </div>
    	</div>
</template>

<script>
	export default {

		data() {
			return {
			      display_portfolios: [],
			      files: [],
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
		     
		        message: '',
		        removingFile: {},
            errors: []
			}
		},
		methods: {


			display_portfolio() {

				  axios.get('super_admin/details_per_furnituresAccessories/' + this.$route.params.portfolio_id).then(result => {

                    this.display_portfolios = result.data;
                    console.log(this.display_portfolios);


                }).catch(error => {
                    console.log(error);
                });

			},
			updateForm: function(e) {

              $('#name').css('border-color','');
              $('#description').css('border-color','');
              $('#price').css('border-color','');
              $('#design_type').css('border-color','');

              $('#file').css('border-color','');
              $('#file1').css('border-color','');
              $('#file2').css('border-color','');
              $('#file3').css('border-color','');
              $('#file4').css('border-color','');

	            var name_val = document.getElementById('name');
	            var description_val = document.getElementById('description');
              var price_val = document.getElementById('price');
	            var design_type_val = document.getElementById('design_type');
	
             
            	      axios.post('super_admin/update_product/' + this.$route.params.portfolio_id, {val_1: name_val.value, val_2: description_val.value, val_3: price_val.value, val_4: design_type_val.value })
                    .then(response => {

                           this.display_portfolio();
                           alert(response.data);
                    
                    })
                    .catch(error => {

                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });


                this.errors = [];

            if(name_val.value == "") {
                this.errors.push('name you want to edit?');
                $('#name').css('border-color','red');
            }
                        if(description_val.value == "") {
                this.errors.push('description you want to edit?');
                $('#description').css('border-color','red');
            }
                        if(design_type_val.value == "") {
                this.errors.push('design type you want to edit?');
                $('#design_type').css('border-color','red');
            }
                        if(price_val.value == "") {
                this.errors.push('price you want to edit?');
                $('#price').css('border-color','red');
            }
              

             e.preventDefault();

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
			this.display_portfolio();
      this.get_user_info();
		}
	}
</script>

<style scoped>
	
.img-taas {
    width: 100%;
    height: 23vh;
    object-fit: cover;
}
	
</style>