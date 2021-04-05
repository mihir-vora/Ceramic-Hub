
<?php
session_start();
$errors = array(); 
include('include/server.php');
if(strlen($_SESSION['c_id'])==0)
	{	
header('location:company_login.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{

	$category = mysqli_real_escape_string($db, $_POST['categoryName']);
  $description = mysqli_real_escape_string($db, $_POST['categoryDescription']);
		$category=$_POST['categoryName'];
	$description=$_POST['categoryDescription'];
	$id=$_SESSION['c_id'];
	 $category_check = "SELECT * FROM `category` WHERE categoryName='$category' OR categoryDescription='$description'";
  $result = mysqli_query($db, $category_check);
  $ctg = mysqli_fetch_assoc($result);
  
  if ($ctg) { // if user exists
    if ($ctg['categoryName'] === $category) {
      array_push($errors, "Username already exists");
    }

    if ($ctg['categoryDescription'] === $description) {
      array_push($errors, "email already exists");
    }
  }

$id = $_SESSION['c_id'];
$sql=mysqli_query($db,"INSERT INTO category(`categoryName`,`categoryDescription`,`cmp_id`) values('$category','$description', '$id') ") ;
$_SESSION['msg']="Category Created !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($db,"DELETE FROM category WHERE id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Category deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Company | Pending Orders</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	 <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        
<?php include('include/header.php'); ?>


        
<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
 <!-- <div class="span3" style="margin-top: 0.3%;"> -->
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
 $result = mysqli_query($db,"SELECT * FROM `orders` where orderDate Between '$from' and '$to'");
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
$ret = mysqli_query($db,"SELECT * FROM `orders` where orderStatus!='$status' || orderStatus is null ");
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
$rt = mysqli_query($db,"SELECT * FROM orders where orderStatus='$status'");
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
                <a href="logout.php">
                  <i class="menu-icon icon-signout"></i>
                  Logout
                </a>
              </li>
            </ul>
</div>
</div>

			
			<div class="span9">
					<div class="content" >

						<div class="module" style="background-color:;border:solid 1px black;">
							<div class="module-head" style="background-color: #FF8C00;padding: 15px;">
								<h3 style="font-size: 20px;color:white;"><b style="color:white;">Category</b></h3>
							</div>
							<div class="module-body">

<?php if(isset($_POST['submit']))
{?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="Category" method="post" >
									
<div class="control-group">
<label class="control-label" for="basicinput" style="font-size: 20px;"><b>Category Name</b></label>
<div class="controls">
<input type="text" placeholder="Enter category Name"  name="categoryName" class="span8 tip" required style="height: 40px;">
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput" style="font-size: 20px;"><b>Description</b></label>
<div class="controls">
<textarea class="span8" name="categoryDescription" rows="5" ></textarea>
											</div>
										</div>

	<div class="control-group">
<div class="controls">

<style type="text/css">
	.create-btn:hover{
		background-color: #FF8C00;
	}
</style>
<button type="submit" name="submit" class="btn create-btn" style="width: 20%;height: 40px;font-size: 18px;"
						><b><i class="fa fa-arrow-right"></i> Create</b></button>
											</div>
										</div>
									</form>
							</div>
						</div>


	<div class="module" style="background-color:;border:solid 1px black;">

							<div class="module-head" style="background-color: #FF8C00;padding: 15px;">
								<h3 style="font-size: 15px;"><b style="color:white;">Manage Categories</b></h3>
							</div>
<style type="text/css">
									.module-body{
										overflow: auto;
									}
								</style>
							<div class="module-body table" style="">

								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th><b>#</b></th>
											<th><b>Category</b></th>
											<th><b>Description</b></th>
											<th><b>Creation date</b></th>
											<th><b>Last Updated</b></th>
											<th><b>Action</b></th>
										</tr>
									</thead>
									<tbody>

<?php 

$cmp_id = $_SESSION['c_id'];
$query=mysqli_query($db,"SELECT * FROM `category` WHERE `cmp_id`='$cmp_id' ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
<td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($row['categoryName']);?></td>
<td><?php echo htmlentities($row['categoryDescription']);?></td>
<td> <?php echo htmlentities($row['creationDate']);?></td>
<td><?php echo htmlentities($row['updationDate']);?></td>
<td>
<a href="edit-category.php?id=<?php echo $row['id']?>" ><i class="icon-edit" style="font-size: 15px;"></i></a>
<a href="category.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign" style="font-size: 15px;"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>