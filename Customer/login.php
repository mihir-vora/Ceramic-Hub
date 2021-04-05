
<?php
session_start();
include('includes/server.php');

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Ceramic Hub | Signi-in | Signup</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
<script type="text/javascript">
function valid()
{
 if(document.register.password_1.value!= document.register.password_2.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.password_2.focus();
return false;
}
return true;
}
</script>
    	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>



	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
	<!-- ============================================== NAVBAR ============================================== -->

 	<!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
<style type="text/css">
	.active-lk li:hover{
		color:#FF8C00;
	}
</style>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li ><a href="home.html" class='active-lk' style="font-size: 15px;" ><b>Home</b></a></li>
				<li class='active' style="font-size: 15px;color:#FF8C00;"><b>Authentication</b></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class=""><b>sign in</b></h4>
	<p class="" style="color:black;"><b>Hello, Welcome to your account...</b></p>
	<form class="register-form outer-top-xs" action="login.php" method="post">
	<span style="color:red;" >

	</span>

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1"><b><i class="fa fa-envelope" style="font-size: 18px;"></i> Email Address </b><span>*</span></label>
		    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
		
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1"><b><i class="fa fa-lock" style="font-size: 20px;"></i> Password </b><span>*</span></label>
		 <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >

		</div>
		<style type="text/css">
			.checkout-page-button:hover{
				background-color: #FF8C00;
			}
		</style>
			<button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="login_usr" style="font-size: 15px; width: 20%"><b>Login</b></button>

		

		  	<a href="forgot-password.php" class="forgot-password pull-right" style="font-size: 15px;color: #FF8C00;"><b>Forgot your Password?</b></a>
		

		
		  	<a href="register.php" class="forgot-password pull-right" style="padding-right:20px; font-size: 15px;color: #FF8C00;"><b>Create New Account?</b></a>
	
	  
	</form>					
</div>
<!-- Sign-in -->
</div>
</div>

<!-- <?php include('includes/brands-slider.php');?>
 --></div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>