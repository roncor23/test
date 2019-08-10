<template>
<div class="container" style="margin-top:100px">
  <v-card>
    <v-card-title>
      List of all not verified users
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
      :headers="not_verified_users_headers"
      :items="display_all_not_verified_users"
      :search="search"
    >
    	<template slot="items" slot-scope="props">
          <td>{{ props.item.user_name }}</td>
          <td class="text-xs-left">{{ props.item.email }}</td>
          <td class="text-xs-left">{{ props.item.verification_code }}</td>
          <td class="text-xs-left">{{ props.item.role }}</td>
          <td class="text-xs-left">{{ props.item.verified }}</td>
        </template>
    </v-data-table>
  </v-card>
</div>
</template>
<script>
	
	export default {
		data() {
			return {
				display_all_not_verified_users: [],
				pagination1: {},
		        not_verified_users_headers: [
		          {
		            text: 'User Name',
		            align: 'left',
		            sortable: false,
		            value: 'user_name'
		          },
		          { text: 'Email', value: 'email' },
		          { text: 'Verification Code', value: 'verification_code' },
		          { text: 'Role', value: 'role' },
		          { text: 'Verified', value: 'verified' },
		        ],
		        search: '',
	

			}
		},
		methods: {

	      list_all_not_verified_users() {

	        axios.get('display_all/not_verified_users/').then(result => {

	                  this.display_all_not_verified_users = result.data;
	                  console.log(this.display_all_not_verified_users);

	              }).catch(error => {
	                  console.log(error);
	              });

	      },
		},
		mounted() {
			this.list_all_not_verified_users();
		}
	}

</script>