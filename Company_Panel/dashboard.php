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



?>
<!DOCTYPE html>
<html lang="en">
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
            <link href="css/font-awesome.min.css" rel="stylesheet">
            <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  
  <link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228">
  <!--Custom Font-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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



                    <!--/.span3-->
<div class="span9"  style="margin-top: 5%;">
                       
<div class="btn-controls">
<div class="btn-box-row row-fluid">

<?php 
  
     // $id= $_SESSION['u_id'];
   $query2=mysqli_query($db,"SELECT count(id) as id from `users`");
    // $result=mysqli_fetch_array($query);

$result=mysqli_fetch_array($query2);
        $user_id=$result['id'];

?>
</a><a href="manage-users.php" class="btn-box big span4"><i class="icon-user"></i><b><?php echo htmlentities($user_id);?></b>

<p class="text-muted"><b>Total users</b></p>


</a>

  <?php 
  
     // $id= $_SESSION['u_id'];
   $query1=mysqli_query($db,"SELECT count(category) as category from `products`");
    // $result=mysqli_fetch_array($query);

$result=mysqli_fetch_array($query1);
        $category_id=$result['category'];

?>
 <a href="#" class="btn-box big span4"><i class=" icon-random"></i><b><?php echo htmlentities($category_id);?></b>
<p class="text-muted" ><b>Total categorys</b></p>

</a>





 <?php 
  
     $cmp_id= $_SESSION['c_id'];
   $query3=mysqli_query($db,"SELECT sum(productPrice+shippingCharge) as totalprice FROM `products` WHERE `cmp_id`='$cmp_id'");
    // $result=mysqli_fetch_array($query);

$result=mysqli_fetch_array($query3);
        $pructPrice_id=$result['totalprice'];

?>
</a><a href="#" class="btn-box big span4"><i class="icon-money"></i><b>0<?php echo htmlentities($pructPrice_id);?></b>
<p class="text-muted"><b>Total profits</b></p>

</a>



</div>

                       
<div class="btn-controls">
<div class="btn-box-row row-fluid">


  <?php 
  
     $cmp_id= $_SESSION['c_id'];
   $query6=mysqli_query($db,"SELECT count(id) as totalproduct from `products` WHERE `cmp_id`='$cmp_id'");
    // $result=mysqli_fetch_array($query);

$result=mysqli_fetch_array($query6);
        $product_id=$result['totalproduct'];

?>
 <a href="#" class="btn-box big span4"><i class=" icon-tasks"></i><b><?php echo htmlentities($product_id);?></b>
<p class="text-muted" ><b>Total products</b></p>

</a>

<?php 
  
     $cmp_id= $_SESSION['c_id'];
   $query7=mysqli_query($db,"SELECT count(id) as order_id from `orders` WHERE `cmp_id`='$cmp_id'");
    // $result=mysqli_fetch_array($query);

$result=mysqli_fetch_array($query7);
        $order_id=$result['order_id'];

?>
</a>

<a href="manage-users.php" class="btn-box big span4"><i class="icon-inbox"></i><b><?php echo htmlentities($order_id);?></b>

<p class="text-muted"><b>Total Orders</b></p>


</a>



 <?php 
  
     // $cmp_id= $_SESSION['u_id'];
   $query9=mysqli_query($db,"SELECT count(id) as subcategory FROM `subcategory`");
    // $result=mysqli_fetch_array($query);

$result=mysqli_fetch_array($query9);
        $subcategory=$result['subcategory'];

?>
</a>

<a href="#" class="btn-box big span4"><i class="icon-envelope"></i><b><?php echo htmlentities($subcategory);?></b>
<p class="text-muted"><b>Total SubCategory</b></p>

</a>



</div>

  



<div class="btn-box-row row-fluid">
<div class="span8">
 <div class="row-fluid">
 <div class="span12">


<?php 
  
     // $cmp_id= $_SESSION['u_id'];
   $query9=mysqli_query($db,"SELECT count(productId) as productId FROM `productreviews`");
    // $result=mysqli_fetch_array($query);

$result=mysqli_fetch_array($query9);
        $productId=$result['productId'];

?>
 <a href="#" class="btn-box small span4"><i class="icon-envelope"></i><b><?php echo htmlentities($productId);?></b>
<b>total product reviews</b>
</a>


<?php 
 $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$query_p=mysqli_query($db,"SELECT  COUNT(productId) as today_oreder * FROM orders where orderDate BETWEEN '$from' and '$to'");

    $result=mysqli_fetch_array($query_p);
    $today_oreder=$result['today_oreder'];

?>
<a href="#" class="btn-box small span4"><?php echo htmlentities($today_oreder);?></b><b>Clients</b>
</a>

<a href="#" class="btn-box small span4"><b><?php echo htmlentities($today_oreder);?></b><b>Expenses</b>
 </a>

</div>
 </div>
<div class="row-fluid">
 <div class="span12">
<a href="#" class="btn-box small span4"><i class="icon-save"></i><b>Total Sales</b>
</a><a href="#" class="btn-box small span4"><i class="icon-bullhorn"></i><b>Social Feed</b>
</a><a href="#" class="btn-box small span4"><i class="icon-sort-down"></i><b>Bounce
  Rate</b> </a>
 </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                           
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
            </div>
        </div>
       
      <?php } ?>
    </body>
</head>