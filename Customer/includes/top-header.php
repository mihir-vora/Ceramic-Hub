<?php
// session_start();
error_reporting(0);
include('includes/server.php');

?>
<style type="text/css">
	/*li.wl:hover{
		color: #ff0000;
	}*/
</style>
<div class="top-bar animate-dropdown" style="background-color: black">
	<div class="container">
		<div class="header-top-inner" >
			<div class="cnt-account">
				<ul class="list-unstyled" >

<?php 
				$id=$_SESSION['u_id'];
				$qur="SELECT * from `User_tbl`where `id`='$id'";
				$ret=mysqli_query($db,$qur);
				$cnt=1;
				while ($row=mysqli_fetch_array($ret)) {

			?>
				<li><a href="#" style="color:white;font-size: 15px;"></i><b>Welcome - <?php  echo $row['username'];?></b></a></li>
				
				<?php } ?>

					<li><a href="my-account.php" style="color:white;font-size: 15px;"><i class="icon fa fa-user" style="font-size: 15px;"></i><b>My Account</b></a></li>
					<li><a href="my-wishlist.php" style="color:white;font-size: 15px;"><i class="icon fa fa-heart" style="font-size: 15px;"></i><b>Wishlist</b></a></li>
					<li><a href="my-cart.php" style="color:white; font-size: 15px;"><i class="icon fa fa-shopping-cart" style="font-size: 15px;"></i><b>My Cart</b></a></li>
				<?php if(strlen($_SESSION['u_id'])==0)
    {   ?>
<li><a href="login.php" style="color:white; font-size: 15px;"><i class="icon fa fa-sign-in" style="font-size: 15px;"></i><b >Login</b></a></li>
<?php }
else{ ?>	
	
				<li><a href="logout.php" style="color:white; font-size: 15px;"><i class="icon fa fa-sign-out" style="font-size: 15px;"></i><b>Logout</b></a></li>	
				</ul>
				<?php } ?>
			</div><!-- /.cnt-account -->

<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					<li class="dropdown dropdown-small" style="border-color: red;">
						<a href="track-orders.php" class="dropdown-toggle" style="color:white;font-size: 15px;border-width:2px;border-color: green;"><span class="key"><b>Track Order</b></a>
						
					</li>

				
				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->