<template>
	<div class="container" style="margin-top:100px">

		<a href="/individuals" style="text-decoration:none; color: black" v-if="$auth.check(1)"><h1 class="back" style="text-align:center; cursor:pointer">BACK TO HOME</h1></a>

	</div>
</template>
<style>
	.back:hover {
		color: #000!important;
    	color: #e67e00!important;
	}
</style>