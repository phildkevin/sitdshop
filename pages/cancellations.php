<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<?php
include"../php/main.php";
if(!isset($_SESSION['customer'])){
echo "<script type='text/javascript'>alert('Please Login!');window.location.href='../../sitdshop';</script>";
}else{
	$customer = $_SESSION['customer'];
}

$sqla = "SELECT * FROM tbl_user WHERE username ='$customer'";
$resa = $conn->query($sqla);
$rowa = $resa->fetch_assoc();

$c_id = $rowa['user_id'];
?>
<html>
<head>
<title>Shop Any</title>
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
<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
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
					<li class="active menu__item "><a class="menu__link" href="../../sitdshop">Home <span class="sr-only">(current)</span></a></li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Product <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="all-products.php"><img src="../images/top2.jpg" alt=" "/></a>
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
				<div class='pull-right text-white' style='background-color:#ff0000;padding: 5px 15px 5px 15px;margin-top:-15px;margin-right: -22px'><div id='cartcount'></div></div>
					<a href='cart.php'><button class="w3view-cart"><i class="fa fa-cart-arrow-down text-white" aria-hidden="true"></i></button></a>
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

<!-- //Modal2 -->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>My<span> Account </span></h3>
	</div>
</div>
   <!--/contact-->
    <div class="banner_bottom_agile_info">
	    <div class="container-fluid">
		  <div class="contact-grid-agile-w3s">

		  		<div class="col-md-4 contact-grid-agile-w3">
					<a href='customer.php'>
						<div class="contact-grid-agile-w31">
							<i class="fa fa-dashboard" aria-hidden="true"></i>
							<h4>Dashboard</h4>
						</div>
					</a>
				</div>
				<div class="col-md-4 contact-grid-agile-w3">
					<a href='orders.php'>
						<div class="contact-grid-agile-w31">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							<h4>My Orders</h4>
						</div>
					</a>
				</div>
				<div class="col-md-4 contact-grid-agile-w3 active">
					<a href='cancellations.php'>
						<div class="contact-grid-agile-w33">
							<i class="fa fa-ban" aria-hidden="true"></i>
							<h4>Cancellations</h4>
						</div>
					</a>
				</div>

				<div class="clearfix"> </div>
		  </div>
	   </div>
	 </div>

<div class="account-dashboard2">
	 <div class="container-fluid">
 	<?php
 	$sql_order = "SELECT * FROM tbl_canceled WHERE user_id = '$c_id'";
			$res_order = $conn->query($sql_order);

			if($res_order->num_rows>0){
				echo"<div class='table-responsive'>";
				echo"<table id='orderTable' class='display table table-striped dt-responsive nowrap' cellspacing='0'>";
				echo"<thead class='thead-dark'><tr>";
				echo"<th style='width:13%'>Order ID</th>";
				echo"<th style='width:13%'>Reason</th>";
				echo"<th style='width:13%'>Comment</th>";
				echo"</tr></thead><tbody>";

				while($row_cancel=$res_order->fetch_assoc()){

					
					echo"<tr>";
					echo"<td>".$row_cancel['order_id']."</td>";
					echo"<td>".$row_cancel['reason']."</td>";
					echo"<td>".$row_cancel['comment']."</td>";
				
					echo"</tr>";
			
  					}
			echo"</tbody></table></div>";

  			echo"</div>";
  			echo"</div>";

  			echo"<script> ";
  			echo"$('#orderTable').dataTable();";
  			echo" </script>";

  			}else{
  				echo"<div class='alert alert-danger text-center'><h3>You Have Placed No Cancellations</h3></div>";
  			}
  	?>
  	</div>
 </div>
  	
<div class="clearfix"> </div>
<?php
include"../php/footer.php";
?>
			
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
