<!-- header -->

<?php
if(isset($_SESSION['customer'])){
 	$linkIt  = $_SESSION['customer'];
 	$linkIt2 = "Logout";
 	$icon1   = "class='fa fa-user'";
 	$icon2   = "class='fa fa-power-off'";
 	$goto    = "href='customer.php'";
 	$goto2   = "href='#' class='logoutBtn'";
 	$blink   = "add-cart";
 	$blink2  = "href='cart.php'";
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
						echo "<script type ='text/javascript'>window.location.href='all-products.php?category=search&product=$whereProduct';</script>";
					}

				}else{
					echo "<script type ='text/javascript'>alert('Cannot find product!');window.location.href=' http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]';</script>";
        
				}
			}

		?>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href="../../sitdshop"><span>S</span>hop Any</a></h1>
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