<?php
include('include/server.php');
/*if (isset($_SESSION['username'])){
 $username = $_SESSION['username'];
  $query=mysqli_query($db, "SELECT * FROM `User_tbl`  where username='$username'");
}*/
if(!isset($_SESSION['c_id']))
{
    header('location:./company_login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	  <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
</head>
<body>
	

                
                    <div class="span3" style="margin-top: 0.3%;">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="todays-orders.php"><i class="menu-icon icon-bullhorn"></i>
                                	<span>Today's Orders
                                	</span>
                                	 <?php
  $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$cmp_id = $_SESSION['c_id'];    
 $result = mysqli_query($db,"SELECT * FROM `orders` where orderDate AND `cmp_id`='$cmp_id' Between '$from' and '$to'");
$num_rows1 = mysqli_num_rows($result);
{
?>
<b class="label orange pull-right"><?php echo htmlentities($num_rows1); ?></b>
<?php } ?>
</a>
                                </li>



                                <li>
										<a href="pending-orders.php">
											<i class="icon-tasks"></i>
											Pending Orders
										<?php	
	$status='Delivered';							
$cmp_id = $_SESSION['c_id'];		 
$ret = mysqli_query($db,"SELECT * FROM `orders` where orderStatus!='$status' || orderStatus OR `cmp_id`='$cmp_id' is null ");
$num = mysqli_num_rows($ret);
{?><b class="label orange pull-right" style="background-color: #FF8C00;"><?php echo htmlentities($num); ?></b>
<?php } ?>
										</a>
									</li>

									<li>
										<a href="delivered-orders.php">
											<i class="icon-inbox"></i>
											Delivered Orders
								<?php	
	$status='Delivered';						
    $cmp_id = $_SESSION['c_id'];    	 
$rt = mysqli_query($db,"SELECT * FROM orders where orderStatus='$status' AND `cmp_id`='$cmp_id'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
									<li>
								<a href="manage-users.php">
									<i class="menu-icon icon-group"></i>
									Manage users
								</a>
							</li>

                            </ul>
                            <!--/.widget-nav-->
                            
                            
                           <ul class="widget widget-menu unstyled">
                                <li><a href="category.php"><i class="menu-icon icon-tasks"></i> Create Category </a></li>
                                <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Sub Category </a></li>
                                <li><a href="insert-product.php"><i class="menu-icon icon-paste"></i>Insert Product </a></li>
                                <li><a href="manage-products.php"><i class="menu-icon icon-table"></i>Manage Products </a></li>
                        
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							<li><a href="user-logs.php"><i class="menu-icon icon-tasks"></i>User Login Log </a></li>
							
							<li>
								<a href="company_login.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>
</div>
</div>


       <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
</body>
</html>