<?php
	session_start();

	date_default_timezone_set("Asia/Manila");

	$currentdate = date("Y-m-d G:i:s");

	$conn = new mysqli('localhost','root','','sitdshop');

	$characters = '0123456789abcdef';
	$string = '';
	$max = strlen($characters) - 1;
	for ($i = 0; $i < 10; $i++) {
	     $string .= $characters[mt_rand(0, $max)];
	}

	if(isset($_POST['action']) && $_POST['action'] == 'checkOut'){
		
		$user = $_SESSION['customer'];

		$sql = "SELECT * FROM tbl_cart WHERE user = '$user'";
		$res = $conn->query($sql);
		$row = $res->fetch_assoc();

		$odod = $_SESSION['user_id'];

		

		if ($row['product_id'] == '') {
		
			echo "Your Cart is Empty";

		}else{

			$products = $row['product_id'];
			$quantity = $row['quantity'];

			$sql1 = "INSERT INTO tbl_order (`order_id`, `user_id`, `product_id`, `quantity`, `date`) VALUES ('$string','$odod', '$products', '$quantity', '$currentdate')";
			$conn->query($sql1);

			$update = "UPDATE tbl_cart set product_id = '' , quantity = '' WHERE user = '$user'";
			$conn->query($update);	

		}

	}	
?>