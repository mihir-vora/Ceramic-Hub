<?php 
session_start();
error_reporting(0);
include('includes/server.php');
if(isset($_GET['a_id']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($db,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
					echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
}
$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['u_id'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($db,"INSERT INTO `wishlist`(userId,productId) VALUES('".$_SESSION['u_id']."','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

}
}
if(isset($_POST['submit']))
{
	$qty=$_POST['quality'];
	$price=$_POST['price'];
	// $value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($db,"INSERT INTO productreviews(productId,quality,price,name,summary,review) VALUES('$pid','$qty','$price','$name','$summary','$review')");
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
	    <title>Product Details</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>
    <body class="cnt-home">
	<style type="text/css">
		/*carousel control button*/
.custom-carousel .owl-controls {
  position: absolute;
  right: 0;
  top: -25px;
  width: 100%;
  display: block;
}
.custom-carousel .owl-controls .owl-prev {
  position: absolute;
  width: 20px;
  height: 20px;
  top: -36px;
  right: 27px;
  -webkit-transition: all linear 0.2s;
  -moz-transition: all linear 0.2s;
  -ms-transition: all linear 0.2s;
  -o-transition: all linear 0.2s;
  transition: all linear 0.2s;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  background: black;
}
.custom-carousel .owl-controls .owl-prev:before {
  color: #fff;
  content: "\f104";
  font-family: fontawesome;
  font-size: 13px;
  left: 8px;
  position: absolute;
  top: 0px;
}
.custom-carousel .owl-controls .owl-next {
  position: absolute;
  width: 20px;
  height: 20px;
  top: -36px;
  right: 0px;
  -webkit-transition: all linear 0.2s;
  -moz-transition: all linear 0.2s;
  -ms-transition: all linear 0.2s;
  -o-transition: all linear 0.2s;
  transition: all linear 0.2s;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  background: black;
}
.custom-carousel .owl-controls .owl-next:before {
  content: "\f105";
  font-family: fontawesome;
  color: #fff;
  font-size: 13px;
  left: 8px;
  position: absolute;
  top: 0px;
}
.custom-carousel .owl-controls .owl-prev:hover,
.custom-carousel .owl-controls .owl-next:hover,
.custom-carousel .owl-controls .owl-prev:focus,
.custom-carousel .owl-controls .owl-next:focus {
  background: #FF8C00;
}
	</style>
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->

	<!-- ============================================== NAVBAR ============================================== -->
 <!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
<?php
$ret=mysqli_query($db,"SELECT category.categoryName AS catname,subCategory.subcategory AS subcatname,products.productName as pname FROM products JOIN category ON category.id=products.category JOIN subcategory ON subcategory.id=products.subCategory WHERE products.id='$pid'");
while ($rw=mysqli_fetch_array($ret)) {

?>


			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Home</a></li>
				<li><?php echo htmlentities($rw['catname']);?></a></li>
				<li><?php echo htmlentities($rw['subcatname']);?></li>
				<li class='active'><?php echo htmlentities($rw['pname']);?></li>
			</ul>
			<?php }?>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product outer-bottom-sm '>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">


					<!-- ==============================================CATEGORY============================================== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title"><b>Category</b></h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">

		            <?php $sql=mysqli_query($db,"SELECT id,categoryName  FROM category");
while($row=mysqli_fetch_array($sql))
{
    ?>
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="category.php?cid=<?php echo $row['id'];?>"  class="accordion-toggle collapsed">
	                   <b><?php echo $row['categoryName'];?></b>
	                </a>
	            </div>
	          
	        </div>
	        <?php } ?>
	    </div>
	</div>
</div>
	<!-- ============================================== CATEGORY : END ============================================== -->					<!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp">
	<h3 class="section-title"><b>hot deals</b></h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
		
								   <?php
$ret=mysqli_query($db,"SELECT * FROM `products`  ORDER BY rand() limit 4 ");
while ($rws=mysqli_fetch_array($ret)) {

?>

								        
		<div class="item">
			<div class="products">
				<div class="hot-deal-wrapper">
					<div class="image" style="border: solid 1px black;">
						<img src="/Ceramic-Hub/Company_Panel/productimages/<?php echo htmlentities($rws['id']);?>/<?php echo htmlentities($rws['productImage1']);?>"  width="120" height="200" alt="">
							</div>
							
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($rws['id']);?>"><?php echo htmlentities($rws['productName']);?></a></h3>
							<div class="rating rateit-small"></div>

							<div class="product-price">	
								<span class="price" style="color:#FF8C00">
									Rs. <?php echo htmlentities($rws['productPrice']);?>.00
								</span>
									
							    <span class="price-before-discount" style="color:#FF8C00">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>					
							
							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->

						<div class="cart clearfix animate-effect">
							<div class="action">
								<style type="text/css">
									.cart .action .add-cart-button .btn.btn-primary.icon:hover,
.cart .action .add-cart-button .btn.btn-primary.icon:focus {
  background: #FF8C00;
}
								</style>
								<div class="add-cart-button btn-group">
				<button class="btn btn-primary icon" data-toggle="dropdown" type="button" style="color:white;">
				<?php if($row['productAvailability']=='In Stock'){?>
					<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>" >
							<button class="btn btn-primary" type="button" style="color:white;" >Add to cart</button></a>
								<?php } else {?>
							<div class="action" style="color:white;" >Out of Stock</div>
					<?php } ?>
															
								</div>
								
							</div><!-- /.action -->
						</div><!-- /.cart -->
					</div>	
					</div>		
					<?php } ?>        
						
	    
    </div><!-- /.sidebar-widget -->
</div>

<!-- ============================================== COLOR: END ============================================== -->
				</div>
			</div><!-- /.sidebar -->
<?php 
$ret=mysqli_query($db,"SELECT * FROM products where id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>


			<div class='col-md-9'>
				<div class="row  wow fadeInUp">
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

        	<style type="text/css">
        		.single-product .gallery-holder #owl-single-product .single-product-gallery-item {
  border: 1px solid #e5e5e5;
}
        	</style>

            <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']);?>" href="/Ceramic-Hub/Company_Panel/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>">
                    <img class="img-responsive" alt="" src="assets/images/lightgrey.png" data-echo="/Ceramic-Hub/Company_Panel/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" width="370" height="350" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide2">
                <a data-lightbox="image-2" data-title="Gallery" href="/Ceramic-Hub/Company_Panel/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="/Ceramic-Hub/Company_Panel/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide3">
                <a data-lightbox="image-2" data-title="Gallery" href="/Ceramic-Hub/Company_Panel/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="/Ceramic-Hub/Company_Panel/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>" />
                </a>
            </div>

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                        <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="/Ceramic-Hub/Company_Panel/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" />
                    </a>
                </div>

            <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="/Ceramic-Hub/Company_Panel/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>"/>
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="/Ceramic-Hub/Company_Panel/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>" height="200" />
                    </a>
                </div>

               
               
                
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div>

    </div>
</div>     			




					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"><?php echo htmlentities($row['productName']);?></h1>
<?php $rt=mysqli_query($db,"SELECT * FROM productreviews where productId='$pid'");
$num=mysqli_num_rows($rt);
{
?>		
		<div class="rating-reviews m-t-20">
			<div class="row">
					<div class="col-sm-3">
						<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
	<div class="reviews">
		<a href="#" class="lnk"><b> (<?php echo htmlentities($num);?> Reviews)</b></a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->
<?php } ?>
							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
											<span class="label"><b>Availability :</b></span>
										</div>	
									</div>
										<div class="col-sm-9" style="padding-left: 30px;">
										<div class="stock-box">
<span class="value" style="margin-left: 10px;color:black">      <?php echo htmlentities($row['productAvailability']);?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>



<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box" >
											<span class="label"><b>Company Name :</b>   </span>
										</div>	
									</div>
									<div class="col-sm-9" style="padding-left: 30px;">
										<div class="stock-box">
<span class="value" style="margin-left: 30px;color:black">      <?php echo htmlentities($row['productCompany']);?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>


<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
											<span class="label"><b>Shipping Charge :</b></span>
										</div>	
									</div>
									<div class="col-sm-9" style="padding-left: 40px;">
										<div class="stock-box">
<span class="value" style="margin-left: 40px;color:black"><?php if($row['shippingCharge']==0)
{
echo "Free";
}
else
{
echo htmlentities($row['shippingCharge']);
											}

											?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>

							<div class="price-container info-container m-t-20">
								<div class="row">
									

<div class="col-sm-6">
<div class="price-box">
<span class="price" style="color: #FF8C00;">Rs. <?php echo htmlentities($row['productPrice']);?></span>
<span class="price-strike">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
										</div>
									</div>



<style type="text/css">
	.body-content .my-wishlist-page .my-wishlist table tbody .close-btn a,
.body-content .my-wishlist-page .my-wishlist table tbody .close-btn a:hover {
  color: #FF8C00;
  font-size: 15px;
}
.body-content .my-wishlist-page .my-wishlist table tbody .product-name a:hover,
.body-content .my-wishlist-page .my-wishlist table tbody .product-name a:focus {
  color: #FF8C00;
}
.wishlist-fv:hover{
	background-color: #FF8C00;
}
</style>
<div class="col-sm-6">
	<div class="favorite-button m-t-10">
		<a class="btn btn-primary wishlist-fv" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
				 <i class="fa fa-heart" style="font-size: 15px;"></i>
		</a>
											
		</a>
		</div>
		</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

	




		<div class="quantity-container info-container">
<div class="row">
									
	<div class="col-sm-2">
<span class="label"><b>Qty :</b></span>
	</div>
	
<style type="text/css">
.shopping-cart .shopping-cart-table table tbody tr .romove-item a:hover,
.shopping-cart .shopping-cart-table table tbody tr .romove-item a:focus {
  color: red !important;
}
.shopping-cart .estimate-ship-tax table tbody .unicase-form-control .dropdown-menu.open ul li a:hover,
.shopping-cart .estimate-ship-tax table tbody .unicase-form-control .dropdown-menu.open ul li a:focus {
  background-color:red;
}
</style>								
<div class="col-sm-2">
<div class="cart-quantity">
<div class="quant-input">
 <div class="arrows">
 <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
</div>
<input type="text" value="1" style="border: solid 1px;">
							              </div>
							            </div>
									</div>
<style type="text/css">
	.add-to-card:hover{
		background-color: #FF8C00;
	}
</style>
<div class="col-sm-7">
<!-- <?php if($row['productAvailability']=='In Stock'){?>
<a href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary"> -->
<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary add-to-card">
	<i class="fa fa-shopping-cart inner-right-vs" style="font-size: 18px;width: 20%"></i><b> ADD TO CART</b></a>
<?php } else {?>
<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
					
						</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->



							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
				<style type="text/css">
					.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li a:hover,
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li a:focus {
  background:#FF8C00;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li a:hover:after,
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li a:focus:after {
  border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #FF8C00;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li.active a {
  background: #FF8C00;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell li.active a:after {
  border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #FF8C00;
}
.cart .action .add-cart-button .btn.btn-primary.icon:hover,
.cart .action .add-cart-button .btn.btn-primary.icon:focus {
  background: #FF8C00;
}
.product-tabs .tab-content .tab-pane .product-reviews .reviews .review .review-title .date span {
  color: #FF8C00;
}
.product-tabs .tab-content .tab-pane .product-reviews .reviews .review .author span {
  color: #FF8C00;
}
				</style>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description"><b>DESCRIPTION</b></a></li>
								<li><a data-toggle="tab" href="#review"><b>REVIEW</b></a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9" >

							<div class="tab-content" >
								
								<div id="description" class="tab-pane in active" style="border:solid 1px;overflow: auto;  
                white-space: nowrap; "  >
									<div class="oodproduct-tab" >
										<p class="text"><?php echo $row['productDescription'];?></p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title"><b>Customer Reviews</b></h4>
<?php $qry=mysqli_query($db,"SELECT * FROM productreviews where productId='$pid'");
while($rvw=mysqli_fetch_array($qry))
{
?>

	<div class="reviews" style="padding-left: 2% ">
		<div class="review">
			<div class="review-title"><span class="summary"><b>Summery : </b><?php echo htmlentities($rvw['summary']);?></span><span class="date"><i class="fa fa-calendar"></i><span><?php echo htmlentities($rvw['reviewDate']);?></span></span></div>

					<div class="text"><b>Review : </b> <?php echo htmlentities($rvw['review']);?></div>
						<div class="text"><b>Quality :</b>   <?php echo htmlentities($rvw['quality']);?> Star</div>
					<div class="text"><b>Price :</b>  <?php echo htmlentities($rvw['price']);?> Star</div>
	
                      <div class="author m-t-15"><i class="fa fa-user" style="font-size: 18px;color: "></i> <span class="name"><b style="color:black;">Name : </b><?php echo htmlentities($rvw['name']);?></span></div>													</div>
			_______________________________________________________________________________________________
											</div>
											<?php } ?><!-- /.reviews -->
										</div><!-- /.product-reviews -->
<form role="form" class="cnt-form" name="review" method="post">

										
	<div class="product-add-review">
	<h4 class="title"><b>Write your own review</b></h4>
		<div class="review-table">
			<div class="table-responsive">
				<table class="table table-bordered">	

<style type="text/css">
	.txt-center {
  text-align: ;
}
.hide {
  display: none;
}

.clear {
  float: none;
  clear: both;
}

.rating {
    width: 100px;
    unicode-bidi: bidi-override;
    direction: rtl;
    text-align: center;
    position: relative;
}

.rating > label {
    float: right;
    display: inline;
    padding: 0;
    margin: 0;
    position: relative;
    width: 1.1em;
    cursor: pointer;
    color: #000;
}

.rating > label:hover,
.rating > label:hover ~ label,
.rating > input.radio-btn:checked ~ label {
    color: transparent;
}

.rating > label:hover:before,
.rating > label:hover ~ label:before,
.rating > input.radio-btn:checked ~ label:before,
.rating > input.radio-btn:checked ~ label:before {
    content: "\2605";
    position: absolute;
    left: 0;
    color: #FF8C00;
}

</style>
<div class="txt-center">
 		<label>Quality Rating</label>

		<tbody>

  

        <div class="rating">


            <input id="star5" name="quality" type="radio" value="5" style="font-style: 20px;" class="radio-btn hide" />
            <label for="star5" >☆</label>
            <input id="star4" name="quality" type="radio" value="4" class="radio-btn hide" />
            <label for="star4" >☆</label>
            <input id="star3" name="quality" type="radio" value="3" class="radio-btn hide" />
            <label for="star3" >☆</label>
            <input id="star2" name="quality" type="radio" value="2" class="radio-btn hide" />
            <label for="star2" >☆</label>
            <input id="star1" name="quality" type="radio" value="1" class="radio-btn hide" />
            <label for="star1" >☆</label>
            <div class="clear"></div>
        </div>
</div>


<div class="txt-price">
	<style type="text/css">
	.txt-price {
  text-align: ;
}
.hide-price {
  display: none;
}

.clear-price {
  float: none;
  clear: both;
}

.price {
    width: 100px;
    unicode-bidi: bidi-override;
    direction: rtl;
    text-align: center;
    position: relative;
}

.price > label {
    float: right;
    display: inline;
    padding: 0;
    margin: 0;
    position: relative;
    width: 1.1em;
    cursor: pointer;
    color: #000;
}

.price > label:hover,
.price > label:hover ~ label,
.price > input.price-btn:checked ~ label {
    color: transparent;
}

.price > label:hover:before,
.price > label:hover ~ label:before,
.price > input.price-btn:checked ~ label:before,
.price > input.price-btn:checked ~ label:before {
    content: "\2605";
    position: absolute;
    left: 0;
    color: #FF8C00;
}

</style>

 		<label>Price Rating</label>
        <div class="price">


            <input id="price5" name="price" type="radio" value="5" class="price-btn hide-price" />
            <label for="price5" >☆</label>
            <input id="price4" name="price" type="radio" value="4" class="price-btn hide-price" />
            <label for="price4" >☆</label>
            <input id="price3" name="price" type="radio" value="3" class="price-btn hide-price" />
            <label for="price3" >☆</label>
            <input id="price2" name="price" type="radio" value="2" class="price-btn hide-price" />
            <label for="price2" >☆</label>
            <input id="price1" name="price" type="radio" value="1" class="price-btn hide-price" />
            <label for="price1" >☆</label>
            <div class="clear-price"></div>
        </div>
 
</div>


		



							<!-- <tr>
							<td class="cell-label">Price</td>
		<td><input type="radio" name="price" class="radio" value="1"></td>										<td><input type="radio" name="price" class="radio" value="2"></td>
			<td><input type="radio" name="price" class="radio" value="3"></td>
			<td><input type="radio" name="price" class="radio" value="4"></td>						
			<td><input type="radio" name="price" class="radio" value="5"></td>
				</tr>										<tr>										<td class="cell-label">Value</td>
					<td><input type="radio" name="value" class="radio" value="1"></td>
					<td><input type="radio" name="value" class="radio" value="2"></td>
		<td><input type="radio" name="value" class="radio" value="3"></td>
					<td><input type="radio" name="value" class="radio" value="4"></td>
				<td><input type="radio" name="value" class="radio" value="5"></td>							</tr> -->
</tbody>
</table><!-- /.table .table-bordered -->
</div><!-- /.table-responsive -->
</div><!-- /.review-table -->
											
<div class="review-form" >
<div class="form-container" >
													
														
		<div class="row">
				<div class="col-sm-6" >
						<div class="form-group" >
				<label><b>Your Name </b><span class="astk">*</span></label>
<input type="text" class="form-control txt" id="exampleInputName" placeholder="" name="name" required="required">
</div><!-- /.form-group -->
<div class="form-group">
<label foummary><b>Summary </b><span class="astk">*</span></label>																<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="" name="summary" required="required">																</div><!-- /.form-group -->									</div>
	<div class="col-md-6">
		<div class="form-group">						
			<label for="exampleInputReview"><b>Review </b><span class="astk">*</span></label>

<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="" name="review" required="required"></textarea>	
	</div><!-- /.form-group -->						
</div>
</div><!-- /.row -->
<style type="text/css">
	.review-btn:hover{
		background-color: #FF8C00;
	}
</style>												
<div class="action text-right">							<button name="submit" class="review-btn btn btn-primary btn-upper"><b>SUBMIT REVIEW</b></button>
</div><!-- /.action -->

</form><!-- /.cnt-form -->
</div><!-- /.form-container -->
</div><!-- /.review-form -->

</div><!-- /.product-add-review -->										
										
 </div><!-- /.product-tab -->
</div><!-- /.tab-pane -->

				

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

<?php $cid=$row['category'];
			$subcid=$row['subCategory']; } ?>
				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Realted Products </h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
	   
		<?php 
$qry=mysqli_query($db,"SELECT * FROM products where subCategory='$subcid' and category='$cid'");
while($rw=mysqli_fetch_array($qry))
{

			?>	


		<div class="item item-carousel">
			<div class="products">
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>"><img  src="assets/images/blank.gif" data-echo="/productimages/<?php echo htmlentities($rw['id']);?>/<?php echo htmlentities($rw['productImage1']);?>" width="150" height="240" alt=""></a>
			</div><!-- /.image -->			

			                   		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Rs.<?php echo htmlentities($rw['productPrice']);?>			</span>
										     <span class="price-before-discount">Rs.
										     <?php echo htmlentities($rw['productPriceBeforeDiscount']);?></span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
						<a href="product-details.php?page=product&action=add&id=<?php echo $rw['id']; ?>" class="lnk btn btn-primary">Add to cart</a>
													
						</li>
	                   
		              
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
		<?php } ?>
	
		
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->


<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div>
<?php include('includes/brands-slider.php');?>
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
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>