<template>
      <div class="container mt-4">
        <v-card style="margin-top:100px">
           <v-card-title>
            List of all architects
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
            :headers="architect_headers"
            :items="display_all_architects"
            :search="search"
            hide-actions
            :pagination.sync="pagination1"
            class="elevation-1"
          >
            <template slot="items" slot-scope="props">
              <td>{{ props.item.name }}</td>
              <td class="text-xs-left">{{ props.item.email }}</td>
            </template>
            <v-alert slot="no-results" :value="true" color="error" icon="warning">
              Your search for "{{ search }}" found no results.
            </v-alert>
          </v-data-table>
          <div class="text-xs-center pt-2">
            <v-pagination v-model="pagination1.page" :length="pagesa"></v-pagination>
          </div>
        </v-card>
      </div>
</template>
<script>
	
	export default {
		data() {
			return {
				display_all_architects: [],
				pagination1: {},
		        architect_headers: [
		          {
		            text: 'Name',
		            align: 'left',
		            sortable: false,
		            value: 'name'
		          },
		          { text: 'Email', value: 'email' },
		        ],
		        search: '',
		        pagination1: {},

			}
		},
		methods: {

		  list_all_architects() {

		        axios.get('display_all/architects/').then(result => {

		                  this.display_all_architects = result.data;
		                  console.log(this.display_all_architects);

		              }).catch(error => {
		                  console.log(error);
		              });

		      },
		},
		computed: {
	      pagesa () {
	        if (this.pagination1.rowsPerPage == null ||
	          this.pagination1.totalItems == null
	        ) return 0

	        return Math.ceil(this.pagination1.totalItems / this.pagination1.rowsPerPage)
	      }
	    },
		mounted() {
			this.list_all_architects();
		}
	}

</script>