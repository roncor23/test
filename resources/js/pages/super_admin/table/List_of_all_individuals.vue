<template>
<div class="container" style="margin-top:100px">
  <v-card>
    <v-card-title>
      List of all individuals
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="individual_headers"
      :items="display_all_individuals"
      :search="search"
    >
    	<template slot="items" slot-scope="props">
          <td>{{ props.item.name }}</td>
          <td class="text-xs-left">{{ props.item.email }}</td>
          <td class="text-xs-left">{{ props.item.full_name }}</td>
          <td class="text-xs-left">{{ props.item.phone }}</td>
          <td class="text-xs-left">{{ props.item.address }}</td>
          <td class="text-xs-left">{{ props.item.address2 }}</td>
          <td class="text-xs-left">{{ props.item.city_town }}</td>
          <td class="text-xs-left">{{ props.item.state_country_province }}</td>
          <td class="text-xs-left">{{ props.item.postcode }}</td>
          <td class="text-xs-left">{{ props.item.country }}</td>
          <td class="text-xs-left">{{ props.item.birthday }}</td>
        </template>
    </v-data-table>
  </v-card>
</div>
</template>
<script>
	
	export default {
		data() {
			return {
				display_all_individuals: [],
		        individual_headers: [
		          {
		            text: 'Name',
		            align: 'left',
		            sortable: false,
		            value: 'name'
		          },
		          { text: 'Email', value: 'email' },
		          { text: 'Full Name', value: 'full_name' },
		          { text: 'Phone', value: 'phone' },
		          { text: 'Address', value: 'address' },
		          { text: 'Address1', value: 'address2' },
		          { text: 'City', value: 'city_town' },
		          { text: 'Province', value: 'state_country_province' },
		          { text: 'Post Code', value: 'postcode' },
		          { text: 'Country', value: 'country' },
		          { text: 'Birthday', value: 'birthday' },

		        ],
		        search: '',

			}
		},
		methods: {

	      list_all_individuals() {

	        axios.get('display_all/individuals/').then(result => {

	                  this.display_all_individuals = result.data;
	                  console.log(this.display_all_individuals);

	              }).catch(error => {
	                  console.log(error);
	              });

	      },
		},
		mounted() {
			this.list_all_individuals();
		}
	}

</script>