<template>
    <!-- Footer -->
	<section id="footer" style="margin-top:100px">
		<div class="container">
			<form class="form-inline justify-content-center">
				<div class="form-group mx-sm-3 mb-2">
					<input type="text" class="form-control" id="inputPassword2" placeholder="Email">
				</div>
				<button type="submit" class="btn btn-outline-primary mb-2">Subscribe</button>
			</form>
			<div class="text-center" style="color: #ddd;"><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				We’ll never share your email address with a third-party.</small></div>
			<hr />
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Customer Services</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Help Center</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Contact Us</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Report Abuse</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Policies & Rules</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>About Us</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About Senebu.co</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Sitemap</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Trade Services</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Secure Payment</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-facebook-square"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-twitter-square"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-google-plus-square"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="far fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr/>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p class="h6">&copy; 2019 All Rights Reserved <a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank"></a></p>
				</div>
				<hr/>
			</div>	
		</div>
	</section>
</template>

<style scoped>
/* Footer */

section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: #233542 !important;
    margin-bottom: -30px !important;
}
#footer h5{
	padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
	padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
	font-size:25px;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size:30px;
	margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#eeeeee;
}
#footer ul.quick-links li{
	padding: 3px 0;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:700;
}
#footer ul.quick-links li a i{
	margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
	#footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}

</style>

