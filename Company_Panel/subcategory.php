
<?php
session_start();
include('include/server.php');
if(strlen($_SESSION['c_id'])==0)
	{	
header('location:company_login.php');
}
else{
if(isset($_POST['submit']))
{
	// $cate = $_SESSION['id'];
	$cmp_id = $_SESSION['c_id'];
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
$sql=mysqli_query($db,"INSERT INTO `subcategory`(category,subcategory, cmp_id) VALUES('$category','$subcat', '$cmp_id')");
$_SESSION['msg']="SubCategory Created !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($db,"DELETE FROM subcategory WHERE id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="SubCategory deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| SubCategory</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		 <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module" style="background-color:;border:solid 1px black;">
							<div class="module-head" style="background-color: #FF8C00;padding: 15px;">
								<h3 style="font-size: 20px;color:white;"><b style="color:white;">Sub Category</b></h3>
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

			<form class="form-horizontal row-fluid" name="subcategory" method="post" >

<div class="control-group">
<label class="control-label" for="basicinput" style="font-size: 15px;">Category</label>
<div class="controls">
<select name="category" class="span8 tip" required>
<option value="" >Select Category</option> 
<?php 
$cmp_id = $_SESSION['c_id'];
$query=mysqli_query($db,"SELECT * FROM category WHERE `cmp_id`='$cmp_id'");
while($row=mysqli_fetch_array($query))
{?>

<option style="height: 0%;" value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
<?php } ?>
</select>
</div>
</div>

									
<div class="control-group">
<label class="control-label" for="basicinput" style="font-size: 15px;">SubCategory Name</label>
<div class="controls">
<input type="text" placeholder="Enter SubCategory Name"  name="subcategory" class="span8 tip" style="height: 40px;" required>
</div>
</div>


<style type="text/css">
	.sub-btn:hover{
		background-color: #FF8C00;
	}
</style>
<div class="control-group">
<div class="controls">

<style type="text/css">
	.create-btn:hover{
		background-color: #FF8C00;
	}
</style>
<button type="submit" name="submit" class="btn create-btn" style="width: 20%;height: 40px;font-size: 18px;margin-top: 20px;"
						><b><i class="fa fa-arrow-right"></i> Create</b></button>
											</div>
						
											</div>
										</div>
									</form>
							</div>
						</div>


	<div class="module" style="background-color:;border:solid 1px black;">
							<div class="module-head" style="background-color: #FF8C00;padding: 15px;">
								<h3 style="font-size: 20px;color:white;"><b style="color:white;"> Sub Category</b></h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<b><tr>
											<th><b>#</b></th>
											<th><b>Category</b></th>
											
											<th><b>Creation date</b></th>
											<th><b>Last Updated</b></th>
											<th><b>Action</b></th>
										</tr></b>
									</thead>
									<tbody>

<?php 
$query=mysqli_query($db,"SELECT subcategory.id,category.categoryName,subcategory.subcategory,subcategory.creationDate,subcategory.updationDate FROM subcategory JOIN category ON category.id=subcategory.categoryid");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
<tr>
<td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($row['categoryName']);?></td> 
<td><?php echo htmlentities($row['subcategory']);?></td>
<td> <?php echo htmlentities($row['creationDate']);?></td>
<td><?php echo htmlentities($row['updationDate']);?></td>
<td>
<a href="edit-subcategory.php?id=<?php echo $row['id']?>" ><i class="icon-edit"  style="font-size: 15px;"></i></a>
<a href="subcategory.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign" style="font-size: 15px;"></i></a></td>
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