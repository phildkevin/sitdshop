<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<?php
include"../php/main.php";
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

<div class="page-head_agile_info_w3l">
	<div class="container">
		<h3>My<span> Cart </span></h3>	
	</div>
</div><br>

<div class='container' style='background-color: #fff;padding: 20px' id="cartview">
	<div class='row'>
		<div class="col-md-8">
			<div class="row">
				<div class='col-sm-12'>
					<div style='background-color: #f5f5f5;height: auto;padding: 10px;box-shadow: #ccc 2px 2px 5px'>
						<div class='row'>
							<div class='col-sm-4'>
								<img src='../images/products/a1.jpg' style='height: 160px;width: 220px' class='thumbnail img-responsives'>
							</div>
							<div class='col-sm-8'>
								<p><span style='font-size: 20px'>Belt of Giant Strength</span> <span style='cursor: pointer' class='fa fa-times pull-right'></span></p>
								<hr>
								<div>description dito hahahahaha</div>
								<hr>
								<div>Qty <input type='number' style='max-width:15%;border-radius: 5px;border: #ccc 1px solid'><span class='pull-right'>2000</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='col-sm-4'>
			<div class='panel panel-default'>
				<div class='panel-heading'>Order Summary</div>
				<div class='panel-body'>
				hahahah
				<hr>
				<p>Total<span class='pull-right'>1000</span></p>
				</div>
				<div class='panel-footer'>
					<div class='row'>
						<div class='container-fluid'>
							<button class='btn btn-info pull-right' style='border-radius: 0px'>Check Out</button>
						</div>
					</div>
				</div>
			</div>
		</div>
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

			loadcart();
								
			});

		function loadcart(){


			  $.ajax({

			    type: "POST",
			    url: url,
			    data: {loadcart:0},

			    success: function(data){
			      $('#cartview').html(data);
			    }

			  })

			}
</script>
<!-- //here ends scrolling icon -->
	
<!-- for bootstrap working -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"></script>
</body>
</html>

<script type="text/javascript">
	
	function removeitem(id){

		var pos = id.substr(3);

		$.ajax({

			type: "POST",
			url: "../php/main.php",
			data: {item:pos, remitem:0},

			success: function(){
				loadcart();
				loadcartcount();
			}

		});


	}

	function addqty(id){

		  var qty = $('#'+id).val();
		  id = id.substr(3);

		  $.ajax({

		    type: "POST",
		    url:  "php/main.php",
		    data: {item:id, qty:qty, addqty:0},

		    success: function(){

		      loadcartcount();
		      loadcart();

		    }


		  })


		}

</script>