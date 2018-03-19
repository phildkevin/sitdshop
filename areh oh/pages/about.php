<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<?php
include"php/main.php";
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
					<li class="dropdown menu__item">
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
					<li class=" menu__item menu__item--current"><a class="menu__link" href="about.php">About</a></li>
					<li class=" menu__item"><a class="menu__link" href="contact.php">Contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1">
				<div class='pull-right text-white' style='background-color:#ff0000;padding: 5px 15px 5px 15px;margin-top:-15px;margin-right: -22px;<?php echo $out; ?>'> <div id="cartcount"></div></div>
					<a <?php echo $blink2; ?>><button class="w3view-cart"><i class="fa fa-cart-arrow-down text-white" aria-hidden="true"></i></button></a>
  			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
	
<?php
include"../php/modal.php";
?>
<!-- //Modal1 -->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
	<div class="container">
		<h3>About <span>Us </span></h3>
	</div>
</div>
<!-- /banner_bottom_agile_info -->
<div class="banner_bottom_agile_info">
	<div class="container">
		<div class="agile_ab_w3ls_info">
			<div class="col-md-6 ab_pic_w3ls">
			   	<img src="../images/ab_pic.jpg" alt=" " class="img-responsive" />
			</div>
			 <div class="col-md-6 ab_pic_w3ls_text_info">
			    <h5>About Our <span> Any Shop</span></h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor..</p>
				<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
			</div>
			  <div class="clearfix"></div>
		</div>    
	    <div class="banner_bottom_agile_info_inner_w3ls">
	           <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
					<figure class="effect-roxy">
						<img src="../images/bottom1.jpg" alt=" " class="img-responsive" />
						<figcaption>
							<h3><span>F</span>all Ahead</h3>
							<p>New Arrivals</p>
						</figcaption>			
					</figure>
				</div>
				 <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
					<figure class="effect-roxy">
						<img src="../images/bottom2.jpg" alt=" " class="img-responsive" />
						<figcaption>
							<h3><span>F</span>all Ahead</h3>
							<p>New Arrivals</p>
						</figcaption>			
					</figure>
				</div>
				<div class="clearfix"></div>
	    </div> 
 	</div> 
</div>

    <?php 
    	$sql_count_customer = "SELECT * FROM tbl_user";
    	$res_count_customer = $conn->query($sql_count_customer);
    	$count_customer 	= $res_count_customer->num_rows;

    	$sql_count_order 	= "SELECT * FROM tbl_order";
    	$res_count_order 	= $conn->query($sql_count_order);
    	$count_order 	 	= $res_count_order->num_rows;

    	$sql_count_product 	= "SELECT * FROM tbl_product";
    	$res_count_product 	= $conn->query($sql_count_product);
    	$count_product 	 	= $res_count_product->num_rows;
    ?>

	<!-- schedule-bottom -->
	<div class="schedule-bottom">
		<div class="col-md-6 agileinfo_schedule_bottom_left">
			<img src="../images/mid.jpg" alt=" " class="img-responsive" />
		</div>
		<div class="col-md-6 agileits_schedule_bottom_right">
			<div class="w3ls_schedule_bottom_right_grid">
				<h3>Save up to <span>50%</span> in this week</h3>
				<p>Suspendisse varius turpis efficitur erat laoreet dapibus. 
					Mauris sollicitudin scelerisque commodo.Nunc dapibus mauris sed metus finibus posuere.</p>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<h4>Customers</h4>
					<h5 class="counter"><?php echo $count_customer; ?></h5>
				</div>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					<h4>Orders</h4>
					<h5 class="counter"><?php echo $count_order; ?></h5>
				</div>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					<h4>Products</h4>
					<h5 class="counter"><?php echo $count_product; ?></h5>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //schedule-bottom -->
  
<!-- footer -->
<?php
include"../php/footer.php";
?>

<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/move-top.js"></script>

<script src="../js/jquery.waypoints.min.js"></script>
<script src="../js/jquery.countup.js"></script>
<script>
		$('.counter').countUp();
</script>

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
