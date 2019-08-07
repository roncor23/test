<template>
	<div style="margin-top:50px">
		<h1 style="text-align:center">Choose account type</h1>
		<div class="justify-content-center align-items-center row" style="margin-top:50px">
				<div class="mr-4">
					<a href="/login"><img class="user" :src="user" width="300" height="300"></a><br>
					<h3 style="text-align:center">Looking for designer</h3>
				</div>
				<div class="ml-4">
					<a href="/designer/choose-account"><img class="designer" :src="designer" width="300" height="300"></a><br>
					<h3 style="text-align:center">Architect & Interior Designer</h3>
				</div>
					
			
		</div>

		
	</div>

</template>
<script>

  export default {
    data() {
      return {
        user: './image/user.png',
        designer: './image/designer.png',

      }
    },
    methods: {



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


.designer {
  border: none;
  circle-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
  cursor:pointer;

}
.designer:hover {
  animation: bounce 1s;
}

.user {
  border: none;
  circle-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
  cursor:pointer;
}
.user:hover {
  animation: bounce 1s;


}

</style>