<?php
// session_start();
include('includes/server.php');

?>
<!DOCTYPE html>
<html>
<head>
    <style type="text/css">

</style>
</head>

<style type="text/css">
    .navbar-header{
        padding:1px;
    }
  
 /*   .navbar:hover{
        background-color: red;
    }*/
   
</style>
<div class=" animate-dropdown" >
    <div class="container"  >
        <div class="yamm navbar navbar-default" role="navigation" style="background-color: #FF8C00;border: solid 1px white;border-radius: 6px;">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="nav-bg-class" >
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
	<div class="nav-outer" >
        
        <style type="text/css">
            .yamm-fw:hover{
                background-color:  ;
            }
        </style>
		<ul class="nav navbar-nav" >
			<li class="  yamm-fw" >
				<a href="index.php" data-hover="" class="dropdown-toggle" style="color:white;font-size: 15px;" onMouseOver="this.style.color='black'"
                        onMouseOut="this.style.color='white'"><b>Home</b></a>
				
			</li>
              <?php $sql=mysqli_query($db,"SELECT id,categoryName  FROM `category` LIMIT 5");
while($row=mysqli_fetch_array($sql))
{
    ?>

			<li class="dropdown yamm-fw">
				<a href="category.php?cid=<?php echo $row['id'];?>" style="color:white;font-size: 15px;" onMouseOver="this.style.color='black'"
                        onMouseOut="this.style.color='white'"><b> <?php echo $row['categoryName'];?></b></a>
			
			</li>
			<?php } ?>

			
		</ul><!-- /.navbar-nav -->
		<div class="clearfix"></div>				
	</div>
</div>


            </div>
        </div>
    </div>
</div>