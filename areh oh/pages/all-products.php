<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


<!DOCTYPE html>
<?php
include"../php/main.php";
if(isset($_SESSION['customer'])){
	$customer = $_SESSION['customer'];
}else{
	$customer = "";
}
?>
<html>
<head>
<title>Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template |Men's :: w3layouts</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.png">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
include"../php/header.php";
?>
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item"><a class="menu__link" href="../../sitdshop">Home <span class="sr-only">(current)</span></a></li>
					<li class="dropdown menu__item menu__item--current">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Product <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="all-products.php">
												<img src="../images/top2.jpg" alt=" "/>
												<p class="absolute-text">All Products</p>
										</a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<?php
												$sql_categoryA = "SELECT * FROM tbl_category ORDER BY category";
												$res_categoryA = $conn -> query($sql_categoryA);

													while($row_categoryA=$res_categoryA->fetch_assoc()){
														echo"<li><a href='all-products.php?category=".$row_categoryA['category']."'>".ucfirst($row_categoryA['category'])."</a></li>";
													}
											?>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="about.php">About</a></li>
					<li class=" menu__item"><a class="menu__link" href="contact.php">Contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1">
				<div class='pull-right text-white' style='background-color:#ff0000;padding: 5px 15px 5px 15px;margin-top:-15px;margin-right: -22px;<?php echo $out; ?>'><div id="cartcount"></div></div>
					<a <?php echo $blink2; ?>><button class="w3view-cart"><i class="fa fa-cart-arrow-down text-white" aria-hidden="true"></i></button></a>
  			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<?php
include"../php/modal.php";
?>
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>All <span>Products  </span></h3>
	</div>
</div>

<div class="banner-bootom-w3-agileits">
	<div class="container">
		<div class="single-pro">


<?php

if(!isset($_GET['category'])){
	product_all();
}else{
	$category = $_GET['category'];
	switch ($category) {
		case "accessories":
			product_acc();
		break;
		case "bags":
			product_bags();
		break;
		case "caps and hats":
			product_hats();
		break;
		case "clothing":
			product_clothing();
		break;
		case "eyewear":
			product_eye();
		break;
		case "footwear":
			product_footwear();
		break;
		case "swimwear":
			product_swimwear();
		break;
		case "search":
			product_search();
		break;
		
		default:
			echo"<div class='alert alert-danger text-center'><h3>PRODUCT IS NOT AVAILABLE YET!</h3></div>";
	}
}

function product_all(){
if(isset($_SESSION['customer'])){
 	$blink   = "add-cart";
 }else{
 	$blink   = "href='#' data-toggle='modal' data-target='#myModal'";
 }
include "../php/connect.php";

$sql = "SELECT * FROM tbl_product";
$res = $conn->query($sql);

if($res->num_rows>0){

while($row=$res->fetch_assoc()){

echo"<div class='col-md-3 product-men'>";
echo"<div class='men-pro-item simpleCart_shelfItem'>";

echo"<div class='men-thumb-item' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-front' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-back' style='height:230px'>";
echo"</div>"; 

echo"<div class='item-info-product'>";
echo"<h5><a href='all-products.php?category=".$row['category']."'>".$row['product name']."</a></h5>";
echo"<div class='info-product-price'>";	
echo"<span class='item_price'>&#8369 ".number_format((float)$row['net cost'], 2)."</span>";
echo"</div>";
echo"<div class='snipcart-details item_add hvr-outline-out button2 $blink' id='p".$row['product_id']."' style='cursor:pointer'>";
echo"<button type='button' class='btn btn default form-control' style='color:#fff;background-color:#2fdab8'>ADD TO CART</button>";
echo"</div>";	
echo"</div>"; //item-info-product

echo"</div>"; //men-pro-item
echo"</div>"; //col-md-3

}

}else{
	echo"<div class='alert alert-danger text-center'><h3>PRODUCT IS NOT AVAILABLE YET!</h3></div>";
}

} // product-all

function product_acc(){
if(isset($_SESSION['customer'])){
 	$blink   = "add-cart";
 }else{
 	$blink   = "href='#' data-toggle='modal' data-target='#myModal'";
 }
include "../php/connect.php";
$cat = $_GET['category'];

$sql = "SELECT * FROM tbl_product WHERE category = '$cat'";
$res = $conn->query($sql);

if($res->num_rows>0){

while($row=$res->fetch_assoc()){

echo"<div class='col-md-3 product-men'>";
echo"<div class='men-pro-item simpleCart_shelfItem'>";

echo"<div class='men-thumb-item' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-front' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-back' style='height:230px'>";
echo"</div>"; 

echo"<div class='item-info-product '>";
echo"<h5><a href='#'>".$row['product name']."</a></h4>";
echo"<div class='info-product-price'>";
echo"<span class='item_price'>&#8369 ".number_format((float)$row['net cost'], 2)."</span>";
echo"</div>";
echo"<div class='snipcart-details item_add hvr-outline-out button2 $blink' id='p".$row['product_id']."' style='cursor:pointer'>";
echo"<button type='button' class='btn btn default form-control' style='color:#fff;background-color:#2fdab8'>ADD TO CART</button>";
echo"</div>";	
echo"</div>"; //item-info-product

echo"</div>"; //men-pro-item
echo"</div>"; //col-md-3

}

}else{
	echo"<div class='alert alert-danger text-center'><h3>PRODUCT IS NOT AVAILABLE YET!</h3></div>";
}

} // product-accessories

function product_bags(){
if(isset($_SESSION['customer'])){
 	$blink   = "add-cart";
 }else{
 	$blink   = "href='#' data-toggle='modal' data-target='#myModal'";
 }
include "../php/connect.php";
$cat = $_GET['category'];

$sql = "SELECT * FROM tbl_product WHERE category = '$cat'";
$res = $conn->query($sql);

if($res->num_rows>0){

while($row=$res->fetch_assoc()){

echo"<div class='col-md-3 product-men'>";
echo"<div class='men-pro-item simpleCart_shelfItem'>";

echo"<div class='men-thumb-item' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-front' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-back' style='height:230px'>";
echo"</div>"; 

echo"<div class='item-info-product '>";
echo"<h5><a href='#'>".$row['product name']."</a></h4>";
echo"<div class='info-product-price'>";
echo"<span class='item_price'>&#8369 ".number_format((float)$row['net cost'], 2)."</span>";
echo"</div>";
echo"<div class='snipcart-details item_add hvr-outline-out button2 $blink' id='p".$row['product_id']."' style='cursor:pointer'>";
echo"<button type='button' class='btn btn default form-control' style='color:#fff;background-color:#2fdab8'>ADD TO CART</button>";
echo"</div>";	
echo"</div>"; //item-info-product

echo"</div>"; //men-pro-item
echo"</div>"; //col-md-3

}

}else{
	echo"<div class='alert alert-danger text-center'><h3>PRODUCT IS NOT AVAILABLE YET!</h3></div>";
}

} // product-bags

function product_hats(){
if(isset($_SESSION['customer'])){
 	$blink   = "add-cart";
 }else{
 	$blink   = "href='#' data-toggle='modal' data-target='#myModal'";
 }
include "../php/connect.php";
$cat = $_GET['category'];

$sql = "SELECT * FROM tbl_product WHERE category = '$cat'";
$res = $conn->query($sql);

if($res->num_rows>0){

while($row=$res->fetch_assoc()){

echo"<div class='col-md-3 product-men'>";
echo"<div class='men-pro-item simpleCart_shelfItem'>";

echo"<div class='men-thumb-item' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-front' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-back' style='height:230px'>";
echo"</div>"; 

echo"<div class='item-info-product '>";
echo"<h5><a href='#'>".$row['product name']."</a></h4>";
echo"<div class='info-product-price'>";
echo"<span class='item_price'>&#8369 ".number_format((float)$row['net cost'], 2)."</span>";
echo"</div>";
echo"<div class='snipcart-details item_add hvr-outline-out button2 $blink' id='p".$row['product_id']."' style='cursor:pointer'>";
echo"<button type='button' class='btn btn default form-control' style='color:#fff;background-color:#2fdab8'>ADD TO CART</button>";
echo"</div>";	
echo"</div>"; //item-info-product

echo"</div>"; //men-pro-item
echo"</div>"; //col-md-3

}

}else{
	echo"<div class='alert alert-danger text-center'><h3>PRODUCT IS NOT AVAILABLE YET!</h3></div>";
}

} // product-hats

function product_clothing(){
if(isset($_SESSION['customer'])){
 	$blink   = "add-cart";
 }else{
 	$blink   = "href='#' data-toggle='modal' data-target='#myModal'";
 }
include "../php/connect.php";
$cat = $_GET['category'];

$sql = "SELECT * FROM tbl_product WHERE category = '$cat'";
$res = $conn->query($sql);

if($res->num_rows>0){

while($row=$res->fetch_assoc()){

echo"<div class='col-md-3 product-men'>";
echo"<div class='men-pro-item simpleCart_shelfItem'>";

echo"<div class='men-thumb-item' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-front' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-back' style='height:230px'>";
echo"</div>"; 

echo"<div class='item-info-product '>";
echo"<h5><a href='#'>".$row['product name']."</a></h4>";
echo"<div class='info-product-price'>";
echo"<span class='item_price'>&#8369 ".number_format((float)$row['net cost'], 2)."</span>";
echo"</div>";
echo"<div class='snipcart-details item_add hvr-outline-out button2 $blink' id='p".$row['product_id']."' style='cursor:pointer'>";
echo"<button type='button' class='btn btn default form-control' style='color:#fff;background-color:#2fdab8'>ADD TO CART</button>";
echo"</div>";	
echo"</div>"; //item-info-product

echo"</div>"; //men-pro-item
echo"</div>"; //col-md-3

}

}else{
	echo"<div class='alert alert-danger text-center'><h3>PRODUCT IS NOT AVAILABLE YET!</h3></div>";
}
	
} // product-clothing

function product_eye(){
if(isset($_SESSION['customer'])){
 	$blink   = "add-cart";
 }else{
 	$blink   = "href='#' data-toggle='modal' data-target='#myModal'";
 }
include "../php/connect.php";
$cat = $_GET['category'];

$sql = "SELECT * FROM tbl_product WHERE category = '$cat'";
$res = $conn->query($sql);

if($res->num_rows>0){

while($row=$res->fetch_assoc()){

echo"<div class='col-md-3 product-men'>";
echo"<div class='men-pro-item simpleCart_shelfItem'>";

echo"<div class='men-thumb-item' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-front' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-back' style='height:230px'>";
echo"</div>"; 

echo"<div class='item-info-product '>";
echo"<h5><a href='#'>".$row['product name']."</a></h4>";
echo"<div class='info-product-price'>";
echo"<span class='item_price'>&#8369 ".number_format((float)$row['net cost'], 2)."</span>";
echo"</div>";
echo"<div class='snipcart-details item_add hvr-outline-out button2 $blink' id='p".$row['product_id']."' style='cursor:pointer'>";
echo"<button type='button' class='btn btn default form-control' style='color:#fff;background-color:#2fdab8'>ADD TO CART</button>";
echo"</div>";	
echo"</div>"; //item-info-product

echo"</div>"; //men-pro-item
echo"</div>"; //col-md-3

}

}else{
	echo"<div class='alert alert-danger text-center'><h3>PRODUCT IS NOT AVAILABLE YET!</h3></div>";
}

} // product-eyewear

function product_footwear(){
if(isset($_SESSION['customer'])){
 	$blink   = "add-cart";
 }else{
 	$blink   = "href='#' data-toggle='modal' data-target='#myModal'";
 }
include "../php/connect.php";
$cat = $_GET['category'];

$sql = "SELECT * FROM tbl_product WHERE category = '$cat'";
$res = $conn->query($sql);

if($res->num_rows>0){

while($row=$res->fetch_assoc()){

echo"<div class='col-md-3 product-men'>";
echo"<div class='men-pro-item simpleCart_shelfItem'>";

echo"<div class='men-thumb-item' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-front' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-back' style='height:230px'>";
echo"</div>"; 

echo"<div class='item-info-product '>";
echo"<h5><a href='#'>".$row['product name']."</a></h4>";
echo"<div class='info-product-price'>";
echo"<span class='item_price'>&#8369 ".number_format((float)$row['net cost'], 2)."</span>";
echo"</div>";
echo"<div class='snipcart-details item_add hvr-outline-out button2 $blink' id='p".$row['product_id']."' style='cursor:pointer'>";
echo"<button type='button' class='btn btn default form-control' style='color:#fff;background-color:#2fdab8'>ADD TO CART</button>";
echo"</div>";	
echo"</div>"; //item-info-product

echo"</div>"; //men-pro-item
echo"</div>"; //col-md-3

}

}else{
	echo"<div class='alert alert-danger text-center'><h3>PRODUCT IS NOT AVAILABLE YET!</h3></div>";
}

} // product-footwear

function product_swimwear(){
if(isset($_SESSION['customer'])){
 	$blink   = "add-cart";
 }else{
 	$blink   = "href='#' data-toggle='modal' data-target='#myModal'";
 }
include "../php/connect.php";
$cat = $_GET['category'];

$sql = "SELECT * FROM tbl_product WHERE category = '$cat'";
$res = $conn->query($sql);

if($res->num_rows>0){

while($row=$res->fetch_assoc()){

echo"<div class='col-md-3 product-men'>";
echo"<div class='men-pro-item simpleCart_shelfItem'>";

echo"<div class='men-thumb-item' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-front' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-back' style='height:230px'>";
echo"</div>"; 

echo"<div class='item-info-product '>";
echo"<h5><a href='#'>".$row['product name']."</a></h4>";
echo"<div class='info-product-price'>";
echo"<span class='item_price'>&#8369 ".number_format((float)$row['net cost'], 2)."</span>";
echo"</div>";
echo"<div class='snipcart-details item_add hvr-outline-out button2 $blink' id='p".$row['product_id']."' style='cursor:pointer'>";
echo"<button type='button' class='btn btn default form-control' style='color:#fff;background-color:#2fdab8'>ADD TO CART</button>";
echo"</div>";	
echo"</div>"; //item-info-product

echo"</div>"; //men-pro-item
echo"</div>"; //col-md-3

}

}else{
	echo"<div class='alert alert-danger text-center'><h3>PRODUCT IS NOT AVAILABLE YET!</h3></div>";
}

} // product-swimwear

function product_search(){
	if(isset($_SESSION['customer'])){
 	$blink   = "add-cart";
 }else{
 	$blink   = "href='#' data-toggle='modal' data-target='#myModal'";
 }
include "../php/connect.php";	
$product = $_GET['product'];


$sql = "SELECT * FROM tbl_product WHERE `product name` LIKE '%".$product."%' OR category LIKE '%".$product."%'";
$res = $conn->query($sql);

if($res->num_rows>0){

while($row=$res->fetch_assoc()){

echo"<div class='col-md-3 product-men'>";
echo"<div class='men-pro-item simpleCart_shelfItem'>";

echo"<div class='men-thumb-item' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-front' style='height:230px'>";
echo"<img src='../".$row['image']."' alt='' class='pro-image-back' style='height:230px'>";
echo"</div>"; 

echo"<div class='item-info-product '>";
echo"<h5><a href='#'>".$row['product name']."</a></h4>";
echo"<div class='info-product-price'>";
echo"<span class='item_price'>&#8369 ".number_format((float)$row['net cost'], 2)."</span>";
echo"</div>";
echo"<div class='snipcart-details item_add hvr-outline-out button2 $blink' id='p".$row['product_id']."' style='cursor:pointer'>";
echo"<button type='button' class='btn btn default form-control' style='color:#fff;background-color:#2fdab8'>ADD TO CART</button>";
echo"</div>";	
echo"</div>"; //item-info-product

echo"</div>"; //men-pro-item
echo"</div>"; //col-md-3

}

}else{
	echo"<div class='alert alert-danger text-center'><h3>PRODUCT IS NOT AVAILABLE YET!</h3></div>";
}

} //product-search

?>				

				<div class="clearfix"></div>

		</div>
	</div>
</div>	

<!-- //mens -->
<!--/grids-->
<div class="coupons">
	<div class="coupons-grids text-center">
		<div class="w3layouts_mail_grid">
			<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-truck" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>FREE SHIPPING</h3>
					<p>Lorem ipsum dolor sit amet, consectetur</p>
				</div>
			</div>
			<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-headphones" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>24/7 SUPPORT</h3>
					<p>Lorem ipsum dolor sit amet, consectetur</p>
				</div>
			</div>
			<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-shopping-bag" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>MONEY BACK GUARANTEE</h3>
					<p>Lorem ipsum dolor sit amet, consectetur</p>
				</div>
			</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-gift" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>FREE GIFT COUPONS</h3>
					<p>Lorem ipsum dolor sit amet, consectetur</p>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>
</div>
<!--grids-->
<?php
include"../php/footer.php";
?>

<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear'
			};
		
							
		$().UItoTop({ easingType: 'easeOutQuart' });

							
		});
</script>

<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"></script>
</body>
</html>
