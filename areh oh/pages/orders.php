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
			<h3>My<span> Orders </span></h3>
	</div>
</div>
   <!--/contact-->

 	<?php
 		if(!isset($_GET['action'])){
 			list_order();
 		}else{
 			$action = $_GET['action'];
 			switch ($action) {
 				case "view-order":
 					order_view();
 				break;
 				case "cancel-order":
 					order_cancel();
 				break;
 				default:
 					echo"<div class='alert alert-danger text-center'><h3>PAGE NOT FOUND!</h3></div>";
 			}
 		}

 		function list_order(){
 			echo'
	<div class="banner_bottom_agile_info">
	    <div class="container-fluid">
		  <div class="contact-grid-agile-w3s">

		  	 <div class="mas-malinaw">
		  		<div class="col-md-3 contact-grid-agile-w3">
					<a href="customer.php">
						<div class="contact-grid-agile-w31">
							<i class="fa fa-dashboard" aria-hidden="true"></i>
							<h4>Dashboard</h4>
						</div>
					</a>
				</div>
				<div class="col-md-3 contact-grid-agile-w3 active">
					<a href="orders.php">
						<div class="contact-grid-agile-w31">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							<h4>My Orders</h4>
						</div>
					</a>
				</div>
				<div class="col-md-3 contact-grid-agile-w3">
					<a href="cancellations.php">
						<div class="contact-grid-agile-w33">
							<i class="fa fa-ban" aria-hidden="true"></i>
							<h4>Cancellations</h4>
						</div>
					</a>
				</div>
			</div>

				<div class="clearfix"> </div>
		  </div>
	   </div>
	 </div>';

 			
		include "../php/connect.php";
		$customer = $_SESSION['customer'];

		$sqla = "SELECT * FROM tbl_user WHERE username ='$customer'";
		$resa = $conn->query($sqla);
		$rowa = $resa->fetch_assoc();

		$c_id = $rowa['user_id'];

		$sql_order = "SELECT * FROM tbl_order WHERE user_id = '$c_id' AND status != 'cancelled'";
		$res_order = $conn->query($sql_order);

		if($res_order->num_rows>0){
			echo"<div class='account-dashboard2'>";
			echo"<div class='table-responsive'>";
			echo"<table id='orderTable' class='display table table-striped dt-responsive nowrap' cellspacing='0'>";
			echo"<thead class='thead-dark'><tr>";
			echo"<th style='width:13%'>Order #</th>";
			echo"<th style='width:13%'>Placed On</th>";
			echo"<th style='width:13%'>Total</th>";
			echo"<th style='width:13%'>Status</th>";
			echo"<th class='text-center'style='width:13%'>Action</th>";
			echo"</tr></thead><tbody>";

		while($row_order=$res_order->fetch_assoc()){
			$order = $row_order['order_id'];
			$view  = "<a href='orders.php?action=view-order&order-number=$order'><button class='btn btn-warning btn-sm'>View</button></a>";
			$cancel= "<a href='orders.php?action=cancel-order&order-number=$order'><button class='btn btn-danger btn-sm'>Cancel</button></a>"; 

			if($row_order['status'] == 'pending'){
				$clr = 'color:blue';
				$can= '<p>cancel order</p>';
			}else if($row_order['status'] == 'closed'){
				$clr = 'color:green';
				$can= '<p style="display:none">cancel order</p>';
			}else if($row_order['status'] == 'hold'){
				$clr = 'color:orange';
				$can= '<p>cancel order</p>';
			}else if($row_order['status'] == 'processing'){
				$clr = 'color:#555';
			}else{
				$clr = 'color:red';
				$can= '<p style="display:none">cancel order</p>';
			$view  = "<a href='orders.php?action=view-order&order-number=$order'><button class='btn btn-warning btn-sm'>View</button></a>";
			$cancel= "<button class='btn btn-danger btn-sm' disabled>Cancel</button>"; 
			}


			echo"<tr>";
			echo"<td>".$row_order['order_id']."</td>";
			echo"<td>".$row_order['date']."</td>";
			echo"<td>&#8369 ".number_format((float)$row_order['total'], 2)."</td>";
			echo"<td style='$clr'>".ucfirst($row_order['status'])."</td>";
			echo"<td class='text-center'>$view | $cancel</td>";
			echo"</tr>";
		}
				
		echo"</tbody></table></div></div>";

		echo"<script> ";
		echo"$('#orderTable').dataTable();";
		echo" </script>";

		}else{
			echo"<div class='alert alert-danger text-center'><h3>No order available yet</h3></div>";
		}

  		} //list-order

  		function order_view(){
  			include "../php/connect.php";
  			$o_id = $_GET['order-number'];

  			$totalNet = "";

			$sqlad = "SELECT * FROM tbl_order WHERE order_id ='$o_id'";
			$resad = $conn->query($sqlad);
			$rowad = $resad->fetch_assoc();

			$c_btn = "<a href='orders.php'><span class='fa fa-times pull-right'></span></a>";

			echo"<div class='account-dashboard2'>";
  			echo"<div class='container-fluid'>";
  			echo"<h3 class='text-center'>View <span>Order</span></h3><hr>";

  			echo"<div class='panel panel-default bord-theme'>";
  			echo"<div class='panel-heading bg-theme text-white'>OR number: $o_id $c_btn</div>";
  			echo"<div class='panel-body'>";

  			echo"<div class='row'>";
  			echo"<div class='col-sm-7'>";
  			$product_image = explode(',', $rowad['product_id']);
			$count = count($product_image);
			for($i = 0; $i < $count; $i++){
				$pro_id = $product_image[$i];
				$sqlae = "SELECT * FROM tbl_product WHERE product_id ='$pro_id'";
				$resae = $conn->query($sqlae);
				$rowae = $resae->fetch_assoc();

				$totalNet += $rowae['net cost'];

				echo"<div class='this-box'>";

				echo"<div class='row'>";

	  			echo"<div class='col-sm-3'>";
	  			echo "<img src='../".$rowae['image']."' alt='' class='img-responsive thumbnail' style=' width:100%;'/>";
	  			echo"</div>";

	  			echo"<div class='col-sm-9'>";
	  			echo"<p style='font-size:20px'><b>".$rowae['product name']."</b> <span class='pull-right'>&#8369 ".number_format((float)$rowae['net cost'], 2)."</span></p><hr>";
	  			echo"<p>".$rowae['description']."</p>";
	  			echo"</div>";

	  			echo"</div>";

	  			echo"</div><br>";

			}
			echo"</div>";

			echo"<form class='updateOrderForm'>";
  			echo"<div class='col-sm-5'>";

  			echo"<div class='panel panel-default'>";
  			echo"<div class='panel-heading'><b>Complete your purchase here</b></div>";

  			echo"<div class='panel-body'>";
  			echo"<div class='form-group'>";
  			echo"<label>File </label>";
  			echo"<input class='form-control' type='file' id=''>";
  			echo"</div>";

  			echo"<div class='form-group'>";
  			echo"<label>Remitance Center </label>";
  			echo"<input class='form-control' type='text' id=''>";
  			echo"</div>";

  			echo"<div class='form-group'>";
  			echo"<label>Amount</label>";
  			echo"<div class='input-group'>";
            echo"<span class='input-group-addon'>&#8369</span>";
            echo"<div class='form-line'>";
            echo"<input type='number' min='1' class='form-control date'>";
            echo"</div>";
            echo"<span class='input-group-addon'>.00</span>";
        	echo"</div>";
        	echo"</div>";
        	echo"</div>"; //panel-body-inside

        	echo"<div class='panel-footer'>";
  			echo"<button style='border-radius:0px' type='submit' class='btn btn-success btn-sm' name=''>Send</button>";
  			echo"</div>"; //panel-footer-inside

  			echo"</div>"; //panel-default-inside

  			echo"</div>";
  			echo"</form>";

			echo"</div>"; //row

  			echo"</div>"; //panel-body
  			echo"<div class='panel-footer'>";
  			echo"<div class='row'>";
  			echo"<div class='container-fluid'>";
  			echo"status <span class='fa fa-caret-right'></span> ".$rowad['status']." <span class='pull-right'><b>Total</b> <span class='fa fa-caret-right'></span> &#8369 ".number_format((float)$totalNet, 2)."</span>";
  			echo"</div>";
  			echo"</div>";
  			echo"</div>"; //panel-footer
  			echo"</div>"; //panel-default


  			echo"</div>"; //container-fluid
			echo"</div>"; //account-dashboard2


  		} //order-view

  		function order_cancel(){
  			include "../php/connect.php";
  			$customer = $_SESSION['customer'];
  			$o_id = $_GET['order-number'];

  			$sql_user  = "SELECT * FROM tbl_user WHERE username = '$customer'";
			$res_user  = $conn->query($sql_user);
			$row_user  = $res_user->fetch_assoc();
			$u_id      = $row_user['user_id'];

			echo"<div class='account-dashboard2'>";
  			echo"<div class='container-fluid'>";
  			echo"<h3 class='text-center'>Cancel <span>Order</span></h3><hr>";
  			echo"<div class='row'>";

  			echo"<div class='col-sm-6'>";
  			echo"<form class='cancelOrderForm'>";

  			echo"<div class='form-group'>";
  			echo"<select class='form-control' id='canReason' required>";
  				echo"<option>Select Reason</option>";
  				echo"<option>Change Mind</option>";
  				echo"<option>Decide for alternative product</option>";
  				echo"<option>Found cheaper elsewhere</option>";
  				echo"<option>Lead time too long</option>";
  				echo"<option>Change or combine order(s)</option>";
  			echo"</select>";
  			echo"</div>";

  			echo"<div class='form-group'>";
  			echo"Comment (Optional)";
  			echo"<textarea class='form-control' id='canComment' rows='6'></textarea>";
  			echo"</div>";
  			echo"<input type='hidden' id='canOrder' value='$o_id'>";
  			echo"<input type='hidden' id='canUser' value='$u_id'>";

  			echo"<div class='result'></div>";
			echo"<button style='border-radius:0px' type='submit' class='btn btn-success btn-sm' name='cancelOrderBtn'>Submit Cancellation</button>";
			echo"<a href='orders.php'><button style='border-radius:0px' type='button' class='btn btn-danger btn-sm'>Cancel</button></a>";

			echo"</form>";
			echo"</div>";

  			echo"<div class='col-sm-3'>";	
			$sqlab = "SELECT * FROM tbl_order WHERE order_id ='$o_id'";
			$resab = $conn->query($sqlab);
			$rowab = $resab->fetch_assoc();

  			$product_image = explode(',', $rowab['product_id']);
			$count = count($product_image);
			for($i = 0; $i < $count; $i++){
				$pro_id = $product_image[$i];
				$sqlac = "SELECT * FROM tbl_product WHERE product_id ='$pro_id'";
				$resac = $conn->query($sqlac);
				$rowac = $resac->fetch_assoc();

	  			echo"<div class='form-group'>";
	  			echo "<img src='../".$rowac['image']."' alt=' ' style='height:100%; width:100%;'/>";
				echo"</div>";
			}
			echo"</div>";
			

  			echo"<div class='col-sm-3'>";
			echo"<div class='form-group'>";
  			echo"<p>OR Number: ".$o_id."</p>";
  			echo"<p>Status: ".$rowab['status']."</p>";
  			echo"<hr>";
  			echo"<p style='font-weight:700;font-size:20px;'>".$rowac['product name']."</p>";
  			echo"<p> description na </p>";
			echo"</div>";
			echo"</div>";	

			echo"</div>";


			echo"</div>";
			echo"</div>";
			echo"</div>";

  		} //order-cancel
  	?>

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
