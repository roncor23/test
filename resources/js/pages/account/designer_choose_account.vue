<template>
	<div style="margin-top:50px">
		<h1 style="text-align:center">Choose account type</h1>
		<div class="justify-content-center align-items-center row" style="margin-top:50px">
			<div class="mr-4">
				<router-link :to="{name:'login'}"><img class="verified" :src="verified" width="300" height="300"></router-link><br>
				<h3 style="text-align:center">Account verified</h3>
			</div>
			<div class="ml-4">
				<router-link :to="{name:'account.not_verified'}"><img class="not_verified" :src="not_verified" width="300" height="300"></router-link><br>
				<h3 style="text-align:center">Account not verified</h3>
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