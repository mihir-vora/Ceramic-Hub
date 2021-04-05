<?php 
session_start();
error_reporting(0);
include('includes/server.php');
if(strlen($_SESSION['u_id'])==0)
    {   
header('location:login.php');
}

else{
	if(isset($_POST['update']))
	{
		$username=$_POST['username'];
		$phone_number=$_POST['phone_number'];
		$password = $_POST['password'];
		$query=mysqli_query($db,"UPDATE User_tbl SET username='$username',phone_number='$phone_number', password='$password' where id='".$_SESSION['u_id']."'");
		if($query)
		{
echo "<script>alert('Your info has been updated');</script>";
		}
	}


date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($db,"SELECT password FROM  users where password='".md5($_POST['password'])."' && id='".$_SESSION['u_id']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $db=mysqli_query($db,"UPDATE users SET password='".md5($_POST['newpass'])."', updationDate='$currentTime' WHERE id='".$_SESSION['u_id']."'");
echo "<script>alert('Password Changed Successfully !!');</script>";
}
else
{
	echo "<script>alert('Current Password not match !!');</script>";
}
}

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

	    <title>My Account</title>

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
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
<script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
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
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>
<!-- ============================================== HEADER : END ============================================== -->
<style type="text/css">
	.breadcrumb ul li.active {
  color: #FF8C00;
}
</style>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#" style="font-size: 15px;"><b>Home</b></a></li>
				<li class='active' style="font-size: 15px;"><b>Checkout</b></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<style type="text/css">
.checkout-box .checkout-steps .panel .panel-heading .unicase-checkout-title > a:not(.collapsed) span {
  background-color: #FF8C00;
}
	.checkout-box .checkout-steps .panel .panel-heading .unicase-checkout-title {

  margin: 0px !important;
}
.checkout-box .checkout-steps .panel .panel-heading .unicase-checkout-title a {
  color: black;
  text-transform: uppercase;
  display: block;
}
.checkout-box .checkout-steps .panel .panel-heading .unicase-checkout-title a span {
  background-color: #FF8C00;
  color: #fff !important;
  display: inline-block;
  margin-right: 10px;
  padding: 15px 20px;
}
</style>
<div class="body-content outer-top-bd" >
	<div class="container" >
		<div class="checkout-box inner-bottom-sm" >
			<div class="row" >
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion" >
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01" style="border: solid 1px black; ">

	<!-- panel-heading -->
		<div class="panel-heading" style="background-color: ;" >
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne" >
	          <span>1</span><b>My Profile</b>
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in" >

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		
<h4>Personal info</h4>
				<div class="col-md-12 col-sm-12 already-registered-login">



<?php
				$id=$_SESSION['u_id'];
				$qur="SELECT * from `users` where `id`='$id'";
				$ret=mysqli_query($db,$qur);
				$cnt=1;
				while ($row=mysqli_fetch_array($ret)) {

			?>

<style type="text/css">
	.form-group:hover{
		color:#FF8C00;	
	}
</style>
					<form class="register-form" role="form" method="post">
<div class="form-group">
			<label class="info-title" for="name"><b><i class="fa fa-user" aria-hidden="true" style="font-size: 20px;"></i> Name</b><span> *</span></label>
			<input type="text" class="form-control unicase-form-control text-input" 
			value="<?php echo $row['username'];?>" id="username" name="username" required="required">
					  </div>



					
					  <div class="form-group">
					    <label class="info-title" for="Contact No."><b><i class="fa fa-mobile" style="font-size: 23px;"></i>  Contact No. </b><span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="contactno" name="phone_number" required="required" 
					    value="<?php echo $row['phone_number'];?>"  maxlength="10">
					  </div>

					  	<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b><i class="fa fa-envelope" style="font-size: 20px;"></i> Email Address </b><span>*</span></label>
			 <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email" value="<?php echo $row['email'];?>">	 
					  </div>
					  <style type="text/css">
					  	.checkout-page-button:hover{
					  		background-color: #FF8C00;
					  	}
					  </style>
					  <div class="form-group">
					    <label class="info-title" for="New Password"><b><i class="fa fa-unlock" style="font-size: 18px;"></i> Password </b><span>*</span></label>
			 <input type="password" class="form-control unicase-form-control text-input" name="password" id="psw" id="typepass"  name="password_1"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   required="required" value="<?php echo $row['password'];?>">
					  </div>
					  <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button"  style="font-size: 15px; width:20%;"><b>Update</b></button>
					</form>
					<?php } ?>
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					   
					  	
					</div><!-- /.checkout-steps -->
				</div>
			<?php include('includes/myaccount-sidebar.php');?>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->

</div>
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
</body>
</html>
<?php } ?>