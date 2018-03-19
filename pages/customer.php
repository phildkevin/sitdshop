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
					<li class="active menu__item menu__item--current"><a class="menu__link" href="../../sitdshop">Home <span class="sr-only">(current)</span></a></li>
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

 		<?php
 			if(!isset($_GET['subpage'])){
 				account_dashboard();
 			}else{
 				$subpage = $_GET['subpage'];
 				switch ($subpage) {
 					case "edit-account":
 						edit_account();
 					break;
 					case "edit-address":
 						edit_address();
 					break;
 					case "change-password":
 						edit_password();
 					break;
 					case "track-shipment":
 						track_shipment();
 					break;
 					
 					default:
 						echo"<div class='alert alert-danger text-center'><h2>PAGE NOT FOUND!</h2></div>";
 				}
 			}

 			function account_dashboard(){
 			$customer = $_SESSION['customer'];
 			include"../php/connect.php";

 			$sqla = "SELECT * FROM tbl_user WHERE username ='$customer'";
			$resa = $conn->query($sqla);
			$rowa = $resa->fetch_assoc();

			$c_id = $rowa['user_id'];

			$sqlb = "SELECT * FROM tbl_personal WHERE user_id ='$c_id'";
			$resb = $conn->query($sqlb);
			$rowb = $resb->fetch_assoc();

			echo'
	<div class="banner_bottom_agile_info">
	    <div class="container-fluid">
		  <div class="contact-grid-agile-w3s">

		  		<div class="col-md-3 contact-grid-agile-w3 active">
					<a href="customer.php">
						<div class="contact-grid-agile-w31">
							<i class="fa fa-dashboard" aria-hidden="true"></i>
							<h4>Dashboard</h4>
						</div>
					</a>
				</div>
				<div class="col-md-3 contact-grid-agile-w3">
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

				<div class="clearfix"> </div>
		  </div>
	   </div>
	 </div>';


			echo"<div class='account-dashboard'>";
		 	echo"<div class='container-fluid'>";
		 	echo"<h3 class='text-center'>Account <span>Dashboard</span></h3><hr>";
			echo"<div class='row'>";

			echo"<div class='col-lg-6'>";
	        echo"<div class='panel panel-default panel-dashboard bord-theme'>";
        	echo"<div class='panel-heading bg-theme text-white'>My Account <a href='customer.php?subpage=edit-account&customer=$customer' class='text-white'><span class='float-right'>EDIT</span></a></div>";
        	echo"<div class='panel-body'>";
    		echo"<div>".ucfirst($rowb['firstname'])." ".ucfirst($rowb['lastname'])."</div>";
    		echo"<div>".$rowa['username']."</div><hr>";
        	echo"<a href='customer.php?subpage=change-password&customer=$customer'>CHANGE PASSWORD</a>";
        	echo"</div>";
	        echo"</div>";
	        echo"</div>";

	        echo"<div class='col-lg-6'>";
	        echo"<div class='panel panel-default panel-dashboard bord-theme'>";
        	echo"<div class='panel-heading bg-theme text-white'>Shipping Address <a href='customer.php?subpage=edit-address&customer=$customer' class='text-white'><span class='float-right'>EDIT</span></a></div>";
        	echo"<div class='panel-body'>";

    		echo"<div>".ucfirst($rowb['firstname'])." ".ucfirst($rowb['lastname'])."</div>";
    		echo"<div>".$rowb['address']."</div>";
    		echo"<div>".$rowb['contact']."</div>";

        	echo"</div>";
	        echo"</div>";
	        echo"</div>";

	        echo"</div>"; // row
		 	echo"</div>"; // container-fluid
		 	echo"</div>"; // account-dashboard


			echo"<div class='mas-malinaw'>";
			echo"<div class='container-fluid'>";
			echo"<h3 class='text-center'>Recent <span>Orders</span></h3><br>";

			$sql_order = "SELECT * FROM tbl_order WHERE user_id = '$c_id' LIMIT 5";
			$res_order = $conn->query($sql_order);

			if($res_order->num_rows>0){
				echo"<div class='table-responsive'>";
				echo"<table id='orderTable' class='display table table-striped dt-responsive nowrap cellspacing='0'>";
				echo"<thead><tr>";
				echo"<th style='width:17%'>Order #</th>";
				echo"<th style='width:17%'>Placed On</th>";
				echo"<th style='width:17%'>Total</th>";
				echo"<th style='width:17%'>Status</th>";
				echo"</tr></thead><tbody>";

				while($row_order=$res_order->fetch_assoc()){

					if($row_order['status'] == 'pending'){
						$clr = 'color:blue';
					}else if($row_order['status'] == 'closed'){
						$clr = 'color:green';
					}else if($row_order['status'] == 'hold'){
						$clr = 'color:orange';
					}else if($row_order['status'] == 'processing'){
					$clr = 'color:#555';
					}else{
						$clr = 'color:red';
					}

					echo"<tr>";
					echo"<td>".$row_order['order_id']."</td>";
					echo"<td>".$row_order['date']."</td>";
					echo"<td>&#8369 ".number_format((float)$row_order['total'], 2)."</td>";
					echo"<td style='$clr'>".ucfirst($row_order['status'])."</td>";
					echo"</tr>";
				}
  					
			echo"</tbody></table></div>";

  			echo"<script> ";
  			echo"$('#orderTable').dataTable();";
  			echo" </script>";

  			}else{
  				echo"<div class='alert alert-danger text-center'><h3>No order available yet</h3></div>";
  			}

  			echo"</div>";
  			echo"</div>";

  			} // account-dashboard

  			function edit_account(){
  			include"../php/connect.php";
  			$customer = $_GET['customer'];

  			$sqla = "SELECT * FROM tbl_user WHERE username = '$customer'";
  			$resa = $conn->query($sqla);
  			$rowa = $resa->fetch_assoc();

  			$u_id = $rowa['user_id'];

  			$sqlb = "SELECT * FROM tbl_personal WHERE user_id = '$u_id'";
  			$resb = $conn->query($sqlb);
  			$rowb = $resb->fetch_assoc();

  			echo"<div class='account-dashboard'>";
  			echo"<div class='container-fluid'>";
  			echo"<h3 class='text-center'>Edit <span>Account</span></h3><hr>";
  			echo"<div class='row'>";

  			echo"<div class='col-sm-3'></div>";

  			echo"<form class='updateAccountForm'>";
  			echo"<div class='col-sm-6'>";

  			echo"<div class='form-group'>";	
  			echo"<label>First Name</label>";
			echo"<input type='text' id='fname' class='form-control' value='".$rowb['firstname']."' autocomplete='off'>";
			echo"</div> ";
			echo"<div class='form-group'>";
			echo"<label>Last Name</label>";
			echo"<input type='text' id='lname' class='form-control' value='".$rowb['lastname']."' autocomplete='off'>";
			echo"</div>";
			echo"<div class='form-group'>";
			echo"<label>Password</label>";
			echo"<input type='password' id='pswd' class='form-control' placeholder='Enter Password. . .'>";
			echo"</div>";
			echo"<input type='hidden' id='hid_user' value='$customer'>";
			echo"<div class='result'></div>";
			echo"<div class='form-group'>";
			echo"<button style='border-radius:0px' type='submit' name='updateAccountBtn' class='btn btn-success'>Submit</button>";
			echo"<a href='customer.php'><button style='border-radius:0px' type='button' class='btn btn-danger'>Cancel</button></a>";
			echo"</div>";

  			echo"</div>"; // col-sm-6
  			echo"</form>";

  			echo"<div class='col-sm-3'></div>";

  			echo"</div>";
  			echo"</div>";
  			echo"</div>";


  			} // edit-account

  			function edit_address(){
			include"../php/connect.php";
  			$customer = $_GET['customer'];

  			$sqla = "SELECT * FROM tbl_user WHERE username = '$customer'";
  			$resa = $conn->query($sqla);
  			$rowa = $resa->fetch_assoc();

  			$u_id = $rowa['user_id'];

  			$sqlb = "SELECT * FROM tbl_personal WHERE user_id = '$u_id'";
  			$resb = $conn->query($sqlb);
  			$rowb = $resb->fetch_assoc();

  			echo"<div class='account-dashboard'>";
  			echo"<div class='container-fluid'>";
  			echo"<h3 class='text-center'>Edit <span>Address</span></h3><hr>";
  			echo"<div class='row'>";

  			echo"<div class='col-sm-3'></div>";

  			echo"<form class='updateAddressForm'>";
  			echo"<div class='col-sm-6'>";

  			echo"<div class='form-group'>";	
  			echo"<label>New Address</label>";
			echo"<input type='text' id='address' class='form-control' placeholder='".$rowb['address']."' autocomplete='off'>";
			echo"</div> ";
			echo"<div class='form-group'>";
			echo"<label>New Contact Number</label>";
			echo"<input type='number' id='contact' class='form-control' placeholder='".$rowb['contact']."' autocomplete='off'>";
			echo"</div>";
			echo"<div class='form-group'>";
			echo"<label>Password</label>";
			echo"<input type='password' id='passy' class='form-control' placeholder='Enter Password. . .'>";
			echo"</div>";
			echo"<input type='hidden' id='hid_user' value='$customer'>";
			echo"<div class='result'></div>";
			echo"<div class='form-group'>";
			echo"<button style='border-radius:0px' type='submit' name='updateAddressBtn' class='btn btn-success'>Submit</button>";
			echo"<a href='customer.php'><button style='border-radius:0px' type='button' class='btn btn-danger'>Cancel</button></a>";
			echo"</div>";

  			echo"</div>"; // col-sm-6
  			echo"</form>";

  			echo"<div class='col-sm-3'></div>";

  			echo"</div>";
  			echo"</div>";
  			echo"</div>";  			

  			} // edit-address


  			function edit_password(){
 			include"../php/connect.php";
 			$customer = $_GET['customer'];

  			echo"<div class='account-dashboard'>";
  			echo"<div class='container-fluid'>";
  			echo"<h3 class='text-center'>Change <span>Password</span></h3><hr>";
  			echo"<div class='row'>";

  			echo"<div class='col-sm-3'></div>";

  			echo"<form class='updatePasswordForm'>";
  			echo"<div class='col-sm-6'>";

  			echo"<div class='form-group'>";	
  			echo"<label>Old Password</label>";
			echo"<input type='password' id='old_pass' class='form-control' placeholder='Old Password. . .' required>";
			echo"</div> ";
			echo"<div class='form-group'>";
			echo"<label>New Password</label>";
			echo"<input type='password' id='new_pass' class='form-control' placeholder='New Password. . .' minlength='7' maxlength='15' required>";
			echo"</div>";
			echo"<div class='form-group'>";
			echo"<label>Confirm New Password</label>";
			echo"<input type='password' id='new_pass2' class='form-control' placeholder='Confirm New Password. . .' minlength='7' maxlength='15' required>";
			echo"</div>";
			echo"<div id='mess2'></div>";
			echo"<input type='hidden' id='hid_user' value='$customer'>";
			echo"<div class='result'></div>";
			echo"<div class='form-group'>";
			echo"<button style='border-radius:0px' type='submit' name='updatePasswordBtn' class='btn btn-success'>Submit</button>";
			echo"<a href='customer.php'><button style='border-radius:0px' type='button' class='btn btn-danger'>Cancel</button></a>";
			echo"</div>";

  			echo"</div>"; // col-sm-6
  			echo"</form>";

  			echo"<div class='col-sm-3'></div>";

  			echo"</div>";
  			echo"</div>";
  			echo"</div>"; 			

  			} // change-password


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

	
<!-- for bootstrap working -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"></script>
</body>
</html>
