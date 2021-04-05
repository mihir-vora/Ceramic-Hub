<?php 

 if(isset($_Get['action'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		}
	}
?>
<style type="text/css">
	.search-button{
		border-radius: 10px;
	}
	.btn-block:hover{
		background-color: #FF8C00;
	}
</style>
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
<div class="logo">
	<a href="index.php">
		<h1 style="color:#FF8C00	;">Ceramic Hub</h1>

	</a>
</div>		
</div>
<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder" >
<div class="search-area" >
    <form name="search" method="post" action="search-result.php">
        <div class="control-group"> 

            <b><input class="search-field" placeholder="Search here..." name="product" required="required"/ style="color: #FF8C00	;"></b>

            <p class="search-button" type="submit" name="search"   style="font-color: red;"></p>    

        </div>
    </form>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

				<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
					<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
<?php
if(!empty($_SESSION['cart'])){
	?>
	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
				<div class="total-price-basket">
					<span class="lbl"><b>cart -</b></span>
					<span class="total-price">
						<span class="sign"  style="color:#FF8C00;"><b>Rs.</b></span>
						<span class="value" style="color:#FF8C00;"><b><?php echo $_SESSION['tp']; ?></b></span>
					</span>
				</div>
				<div class="basket">
					<i class="glyphicon glyphicon-shopping-cart" style="font-size: 15px;color:black;"></i>
				</div>
				<div class="basket-item-count" style="background-color: red;"><span class="count" ><b><?php echo $_SESSION['qnty'];?></b></span></div>
			
		    </div>
		</a>
		<ul class="dropdown-menu">
		
		 <?php
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($db,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

	?>
		
		
			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="product-details.php?pid=<?php echo $row['id'];?>"><img  src="/Ceramic-Hub/Company_Panel/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" width="35" height="50" alt=""></a>
							</div>
						</div>
						<div class="col-xs-7">
							
							<h3 class="name"><a href="product-details.php?pid=<?php echo $row['id'];?>"><?php echo $row['productName']; ?></a></h3>
							<div class="price">Rs.<?php echo ($row['productPrice']+$row['shippingCharge']); ?>*<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?></div>
						</div>
						
					</div>
				</div><!-- /.cart-item -->
			
				<?php } }?>
				<div class="clearfix"></div>
			<hr>
		
			<div class="clearfix cart-total">
				<div class="pull-right">
					
						<span class="text">Total :</span><span class='price'>Rs.<?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>
						
				</div>
			
				<div class="clearfix"></div>
					
				<a href="my-cart.php" class="btn btn-upper btn-primary btn-block m-t-20">My Cart</a>	
			</div><!-- /.cart-total-->
					
				
		</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->
<?php } else { ?>
<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown" style="border-width: 2px; ">
			<div class="items-cart-inner" style="border-width: 10px; ">
				<div class="total-price-basket" >
					<span class="lbl"><b>cart -</b></span>
					<span class="total-price">
						<span class="sign" style="color: #FF8C00	;"><b>Rs.</b></span>
						<span class="value" style="color:#FF8C00	;"><b>00.00</b></span>
					</span>
				</div>
				<div class="basket">
					<i class="glyphicon glyphicon-shopping-cart" style="color:black;font-size: 15px;"></i>
				</div>
				<div class="basket-item-count" style="background-color: red;"><span class="count" style="color: white;"><b>0</b></span></div>
			
		    </div>
		</a>
		<ul class="dropdown-menu">
		
	
		
		
			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-12">
							<b>Your Shopping Cart is Empty.</b>
						</div>
						
						
					</div>
				</div><!-- /.cart-item -->
			
				
			<hr>
		
			<div class="clearfix cart-total">
				
				<div class="clearfix"></div>
					
				<a href="index.php" class="btn btn-upper btn-primary btn-block m-t-20"><b>Continue Shooping</b></a>	
			</div><!-- /.cart-total-->
					
				
		</li>
		</ul><!-- /.dropdown-menu-->
	</div>
	<?php }?>




<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div>