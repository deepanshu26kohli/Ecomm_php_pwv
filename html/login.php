<?php
require "inc.files/top.inc.php";
?>
<!-- End Offset Wrapper -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background-image:url('./images/bg/loginBannerImg.jpg');background-repeat:no-repeat;background-position:center;background-size:cover;margin-top:3rem;"
>
	<div class="ht__bradcaump__wrap">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bradcaump__inner">
						<nav class="bradcaump-inner">
							<a class="breadcrumb-item" href="index.html">Home</a>
							<span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
							<span class="breadcrumb-item active">Login/Register</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="contact-form-wrap mt--60">
					<div class="col-xs-12">
						<div class="contact-title">
							<h2 class="title__line--6">Login</h2>
						</div>
					</div>
					<div class="col-xs-12">
						<form id="login-form"  method="post">
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="text" name="login_name" id="login_email" placeholder="Your Email*" style="width:100%">
								</div>
							</div>
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="password"  name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
								</div>
							</div>

							<div class="contact-btn">
								<button type="button" class="fv-btn" onclick = "user_login()">Login</button>
							</div>
						</form>
						<div class="form-output">
							<p class="form-messege"></p>
						</div>
					</div>
				</div>

			</div>


			<div class="col-md-6">
				<div class="contact-form-wrap mt--60">
					<div class="col-xs-12">
						<div class="contact-title">
							<h2 class="title__line--6">Register</h2>
						</div>
					</div>
					<div class="col-xs-12">
						<form id="register-form" method="post">
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
									
								</div>
							</div>
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
								</div>
							</div>
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
								</div>
							</div>
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
								</div>
							</div>

							<div class="contact-btn">
								<button type="button" class="fv-btn" onclick="user_register()">Register</button>
							</div>
						</form>
						<div class="form-output">
							<p class="form-messege"></p>
						</div>
					</div>
				</div>

			</div>

		</div>
</section>
<script>
	function user_register(){
		var name = jQuery("#name").val();
		var email = jQuery("#email").val();
		var mobile = jQuery("#mobile").val();
		var password = jQuery("#password").val();
		var is_error = "";
		if (name == "" || email == "" || mobile == "" || password == "") {
			alert("Please enter all fields");
		} else {
			jQuery.ajax({
				url: 'register_submit.php',
				type: 'post',
				data: '&name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password ,
				success: function(result) {
					alert(result);
				}
			});
		}
	}
	function user_login(){
		var email = jQuery("#login_email").val();
		var password = jQuery("#login_password").val();
		var is_error = "";
		if (email == "" || password == "" ) {
			alert("Please enter all fields");
		} else {
			jQuery.ajax({
				url: 'login_submit.php',
				type: 'post',
				data: 'email=' + email + '&password=' + password ,
				success: function(result) {
					alert(result);
				}
			});
		}
		window.location.href = "index.php";
	}
</script>
<!-- End Contact Area -->
<!-- End Banner Area -->
<!-- Start Footer Area -->
<?php
require "inc.files/footer.inc.php";
?>