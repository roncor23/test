<template>
      <div class="container mt-4">
        <v-card style="margin-top:100px">
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
				display_all_individuals: [],
				pagination1: {},
		        individual_headers: [
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

	      list_all_individuals() {

	        axios.get('display_all/individuals/').then(result => {

	                  this.display_all_individuals = result.data;
	                  console.log(this.display_all_individuals);

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
			this.list_all_individuals();
		}
	}

</script>