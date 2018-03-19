<!DOCTYPE html>

<?php
include"php/main.php";
?>
<html>
<head>
<title>Shoppy Any</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- header -->

<?php
if(isset($_SESSION['customer'])){
 	$linkIt  = $_SESSION['customer'];
 	$linkIt2 = "Logout";
 	$icon1   = "class='fa fa-user'";
 	$icon2   = "class='fa fa-power-off'";
 	$goto    = "href='pages/customer.php'";
 	$goto2   = "href='#' class='logoutBtn2'";
 	$blink   = "add-cart";
 	$blink2  = "href='pages/cart.php'";
 	$out 	 = "display:inline";
 }else{
 	$linkIt  = "Sign In";
 	$linkIt2 = "Sign Up";
 	$icon1   = "class='fa fa-unlock-alt'";
 	$icon2   = "class='fa fa-pencil-square-o'";
 	$goto    = "href='#' data-toggle='modal' data-target='#myModal'";
 	$goto2   = "href='#' data-toggle='modal' data-target='#myModal2'";
 	$blink   = "href='#' data-toggle='modal' data-target='#myModal'";
 	$blink2  = "href='#' data-toggle='modal' data-target='#myModal'";
 	$out 	 = "display:none";
 }

?>
<div class="header" id="home">
	<div class="container">
		<ul>
		    <li> <a <?php echo $goto; ?>><i <?php echo $icon1; ?> aria-hidden="true"></i><?php echo $linkIt; ?></a></li>
			<li> <a <?php echo $goto2; ?>><i <?php echo $icon2; ?> aria-hidden="true"></i><?php echo $linkIt2; ?></a></li>
			<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i>sitd@forbi.com</li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
			<form method="post" action="">
					<input type="search" name="search" placeholder="Search product here..." required="" autocomplete="off">
					<input type="submit" value=" " name="searchProduct">
				<div class="clearfix"></div>
			</form>
		</div>
		<?php

			if(isset($_POST['searchProduct'])){
				$whereProduct = check ($_POST['search']);

				$sql_search = "SELECT `product name`,category FROM tbl_product WHERE `product name` LIKE '%".$whereProduct."%' OR category LIKE '%".$whereProduct."%'";
				$res_search = $conn->query($sql_search);

				if($res_search->num_rows>0){
					while($row_search=$res_search->fetch_assoc()){
						echo "<script type ='text/javascript'>window.location.href='pages/all-products.php?category=search&product=$whereProduct';</script>";
					}

				}else{
					echo "<script type ='text/javascript'>alert('Cannot find product!');window.location.href=' http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]';</script>";
				}
			}

		?>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href="../sitdshop"><span>S</span>hop Any</a></h1>
			</div>
        <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
			<ul class="social-nav model-3d-0 footer-social w3_agile_social">
               <li class="share">Share On : </li>
				<li><a href="#" class="facebook">
					  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="twitter"> 
					  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="instagram">
					  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="pinterest">
					  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
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
					<li class="active menu__item menu__item--current"><a class="menu__link" href="../sitdshop">Home <span class="sr-only">(current)</span></a></li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Product <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="pages/all-products.php">
												<img src="images/top2.jpg" alt=" "/>
												<p class="absolute-text">All Products</p>
										</a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<?php
												$sql_categoryA = "SELECT * FROM tbl_category ORDER BY category";
												$res_categoryA = $conn -> query($sql_categoryA);

													while($row_categoryA=$res_categoryA->fetch_assoc()){
														echo"<li><a href='pages/all-products.php?category=".$row_categoryA['category']."'>".ucfirst($row_categoryA['category'])."</a></li>";
													}
											?>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="pages/about.php">About</a></li>
					<li class=" menu__item"><a class="menu__link" href="pages/contact.php">Contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1">
				<div class='pull-right text-white' style='background-color:#ff0000;padding: 5px 15px 5px 15px;margin-top:-15px;margin-right:-22px;<?php echo $out; ?>'>	<div id="cartcount"></div></div>
					<a <?php echo $blink2; ?>><button class='w3view-cart'><i class='fa fa-cart-arrow-down text-white' aria-hidden='true'></i></button></a>
  			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->

<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li> 
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="pages/all-products.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Summer <span>Collection</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="pages/all-products.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="pages/all-products.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item4"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Summer <span>Collection</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="pages/all-products.php">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item5"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="pages/all-products.php">Shop Now </a>
					</div>
				</div>
			</div> 
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
    </div> 
	<!-- //banner -->

  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
		<h3 class="wthree_text_info">What's <span>Trending</span></h3>
	
		<?php

$sqla1 	   = "SELECT COUNT(product_id),product_id FROM tbl_order GROUP BY product_id ORDER BY COUNT(product_id) DESC";
$resa1     = $conn->query($sqla1);
$rowa1     = $resa1->fetch_assoc();

$madame    = $rowa1['product_id'];

$trend_sql = "SELECT * FROM tbl_product WHERE product_id = '$madame'";
$trend_res = $conn->query($trend_sql);
$trend_row = $trend_res->fetch_assoc();
$category  = $trend_row['category'];

echo"<div class='col-md-5 bb-grids bb-left-agileits-w3layouts'>";
echo"<a href='pages/all-products.php?category=$category'>";
echo"<div class='bb-left-agileits-w3layouts-inner grid'>";
echo"<figure class='effect-roxy'>";
echo"<img src='".$trend_row['image']."' alt='' class='img-responsive' style='height:600px'/>";
echo"<figcaption>";
echo"<h3 style='font-size:16px'><span>".$trend_row['product name']."</span></h3>";
echo"<p>".ucfirst($trend_row['category'])."</p>";
echo"</figcaption>";	
echo"</figure>";
echo"</div>";
echo"</a>";
echo"</div>";

$sqla2 	   = "SELECT COUNT(product_id),product_id FROM tbl_order GROUP BY product_id ORDER BY COUNT(product_id) DESC LIMIT 1, 2";
$resa2     = $conn->query($sqla2);
echo"<div class='col-md-7 bb-grids bb-middle-agileits-w3layouts'>";

while($rowa2 = $resa2->fetch_assoc()){

	$madame2   = $rowa2['product_id'];


$trend_sqlx = "SELECT * FROM tbl_product WHERE product_id = '$madame2'";
$trend_resx = $conn->query($trend_sqlx);




while($trend_rowx=$trend_resx->fetch_assoc()){
$categoryx = $trend_rowx['category'];

echo"<a href='pages/all-products.php?category=$categoryx'>";
echo"<div class='bb-middle-agileits-w3layouts grid'>";
echo"<figure class='effect-roxy'>";
echo"<img src='".$trend_rowx['image']."' alt='' class='img-responsive' style='max-height:290px' />";
echo"<figcaption>";
echo"<h3 style='font-size:16px'><span>".$trend_rowx['product name']."</span></h3>";
echo"<p>".ucfirst($trend_rowx['category'])."</p>";
echo"</figcaption>";		
echo"</figure>";
echo"</div>";
echo"</a><br>";


}
}


echo"<div class='clearfix'></div>";
echo"</div>";
echo"</div>";
echo"</div>";

?>


<!-- /new_arrivals --> 
	<div class="new_arrivals_agile_w3ls_info"> 
		<div class="container">
		    <h3 class="wthree_text_info">New <span>Arrivals</span></h3>		

<?php

$sql = "SELECT * FROM tbl_product LIMIT 8";
$res = $conn->query($sql);
	
if($res->num_rows>0){

while($row=$res->fetch_assoc()){

echo"
<!-- Modal photo -->
		<div class='modal fade' id='myModalPhoto".$row['product_id']."' tabindex='-1' role='dialog'>
			<div class='modal-dialog'>
				<!-- Modal content-->
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
						<h4 class='modal-title'>".$row['product name']."</h4>
					</div>
						<div class='modal-body'>
							<div class='row'>
								<div class='col-sm-6'>
									<img src='".$row['image']."' alt='' class='img-responsive'>
								</div>
								<div class='col-sm-6'>
									<p><b>Category : </b>".$row['category']."</p><br>
									<p><b>Description : </b>".$row['description']."</p>
								</div>
							</div>
						</div>
						<div class='modal-footer'>
							<p class='pull-right'>&#8369 ".number_format((float)$row['net cost'], 2)."</p>
						</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal photo -->
";

echo"<div class='col-md-3 product-men'>";
echo"<div class='men-pro-item simpleCart_shelfItem'>";

echo"<div class='men-thumb-item' style='height:230px' href='#' data-toggle='modal' data-target='#myModalPhoto".$row['product_id']."'>";
echo"<img src='".$row['image']."' alt='' class='pro-image-front' style='height:230px'>";
echo"<img src='".$row['image']."' alt='' class='pro-image-back' style='height:230px'>";
echo"<span class='product-new-top'>New</span>";
echo"</div>";

echo"<div class='item-info-product '>";
echo"<h5><a href='pages/all-products.php?category=".$row['category']."'>".$row['product name']."</a></h5>";
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

?>

			</div>
		</div>

<!-- footer -->
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="../sitdshop"><span>S</span>hop Any </a></h2>
			<p>Pasok mga suki presyong divisoria, Sampu sampu Bente Trenta At Iba Pa.</p>
			<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
				<li><a href="#" class="facebook">
					  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="twitter"> 
					  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="instagram">
					  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="pinterest">
					  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
			</ul>
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Our <span>Information</span> </h4>
					<ul>
						<li><a href="../sitdshop">Home</a></li>
						<li><a href="pages/all-products.php">All Product</a></li>
						<li><a href="pages/about.php">About</a></li>
						<li><a href="pagescontact.php">Contact</a></li>
					</ul>
				</div>
				
				<div class="col-md-8 sign-gdgd-two">
					<h4>Store <span>Information</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Phone Number</h6>
								<p>+1 234 567 8901</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:example@email.com"> sitd@forbi.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Location</h6>
								<p>Brgy. Bucana, Nasugbu Batangas. 
								
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		<hr style='border: #080808 1px solid'>
		<p class="copy-right">&copy 2017 Shop Any. All rights reserved | Team Forbi</p>
	</div>
</div>
<!-- //footer -->

<?php
include"php/modal.php";
?>

<div id="back-to-top" href="javascript:void(0);" class="wthreecartaits wthreecartaits2 scrollTop back-to-top" style='position:fixed;z-index:999;bottom:10px;right:25px;background-color: #fff;display: none'>
<div class='pull-right text-white' style='height:43px;background-color:#ff0000;padding: 10px 15px 11px 15px;background-size:cover<?php echo $out; ?>'><div id='cartcount2'></div></div>
	<a <?php echo $blink2; ?>><button class='w3view-cart'><i class='fa fa-cart-arrow-down text-white' aria-hidden='true'></i></button></a>
</div>

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>

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

<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>
</body>
</html>
