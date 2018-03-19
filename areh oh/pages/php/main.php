<?php

session_start();

$conn = new mysqli('localhost','root','','sitdshop');

function check($data){

$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
$data = addslashes($data);

return $data;

}

function unique_id(){
    list($usec, $sec) = explode(" ", microtime());
    list($int, $dec) = explode(".", $usec);
    return $sec.$dec;
}

$characters = '0123456789abcdef';
$string = '';
$max = strlen($characters) - 1;
for ($i = 0; $i < 10; $i++) {
     $string .= $characters[mt_rand(0, $max)];
}

$characters = '0123456789abcdef';
$string2 = '';
$max = strlen($characters) - 1;
for ($i = 0; $i < 10; $i++) {
     $string2 .= $characters[mt_rand(0, $max)];
}

	date_default_timezone_set("Asia/Manila");
	$date = date("Y-m-d G:i:s");
/* CUSTOMER LOGIN */	

if(isset($_POST['customerLoginBtn'])){

	$email = check ($_POST['email']);
	$pass  = check ($_POST['pass']);

	

	$sqlx = "SELECT * FROM tbl_user WHERE username = '$email'";
	$resx = $conn->query($sqlx);
	$rowx = $resx->fetch_assoc();

	$u_id = $rowx['user_id'];

	if($rowx['status'] == 'active'){

		if($email == "" || $pass == ""){
				echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please Enter Username and Password!</div>";	
		}else{

			if($resx->num_rows>0){

			$pass= md5($pass);

			$sql = "SELECT username FROM tbl_user WHERE username = '$email' AND password = '$pass' ";
			$res = $conn -> query($sql);

				if($res->num_rows>0){
						date_default_timezone_set("Asia/Manila");
						$log_date = date("Y-m-d G:i:s");
						$log = "INSERT INTO tbl_user_log (log_id,user_id,activity,date) VALUES ('$string','$u_id','Logged on','$log_date')";
						$conn ->query($log);

						$_SESSION['customer'] = $email;
						$_SESSION['user_id'] = $rowx['user_id'];
						echo "<script type ='text/javascript'> window.location.href='../../sitdshop'; </script>";
				}else{
					echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Incorrect Email or Password!</div>";
				}

			}else{
				echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Email is not Registered!</div>";
			}

		}

	}else{
		echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Sorry! Your account is banned for some reason!</div>";
	}

	
}

/* CUSTOMER LOGIN */

/* CUSTOMER SIGNUP */	

if(isset($_POST['customerSignupBtn'])){

	$fname 	 = check ($_POST['reg_fname']);
	$lname 	 = check ($_POST['reg_lname']);
	$email 	 = check ($_POST['reg_email']);
	$address = check ($_POST['reg_address']);
	$contact = check ($_POST['reg_contact']);
	$pass1   = check ($_POST['reg_pass']);
	$pass2   = check ($_POST['reg_pass2']);
	$uid     = unique_id();
	date_default_timezone_set("Asia/Manila");
	$log_date = date("Y-m-d G:i:s");
	$sqlx = "SELECT username FROM tbl_user WHERE username = '$email'";
	$resx = $conn->query($sqlx);

		if($pass1 != $pass2){
				echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Password Mismatch!</div>";	
		}else{

			if($resx->num_rows>0){
				echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Email is already used!</div>";
			
			}else{

				$pass1   = md5($pass1);
				$pass2   = md5($pass2);

				$sql = "INSERT INTO tbl_user (user_id,username,password,access,status)
						VALUES ('USR$string','$email','$pass1','customer','active')";
				$res = $conn -> query($sql);

				$sqla = "INSERT INTO tbl_personal (user_id,firstname,lastname,contact,email,address)
						VALUES ('USR$string','$fname','$lname','$contact','$email','$address')";
				$resa = $conn -> query($sqla);

				$log = "INSERT INTO tbl_user_log (log_id,user_id,activity,date) VALUES ('$string2','USR$string','Signed up','$log_date')";
				$conn -> query($log);

				echo"<div class='alert alert-success text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Account is successfully Registered!</div>";				
			}

		}
}

/* CUSTOMER SIGNUP */

/* CUSTOMER UPDATE ACCOUNT */

if(isset($_POST['updateAccountBtn'])){

	$fname = check ($_POST['fname']);
	$lname = check ($_POST['lname']);
	$pswd  = check ($_POST['pswd']);
	$c_id  = check ($_POST['hid_user']);

	$pswd  = md5($pswd);

	$sqla  = "SELECT * FROM tbl_user WHERE username = '$c_id'";
	$resa  = $conn->query($sqla);
	$rowa  = $resa->fetch_assoc();
	$u_id  = $rowa['user_id'];

	$sqlb  = "SELECT * FROM tbl_personal WHERE user_id = '$u_id'";
	$resb  = $conn->query($sqlb);
	$rowb  = $resb->fetch_assoc();
	$f_na  = $rowb['firstname'];
	$l_na  = $rowb['lastname'];

	$sql_check = "SELECT password FROM tbl_user WHERE password = '$pswd' AND username = '$c_id'";
	$res_check = $conn->query($sql_check);

	if($res_check->num_rows>0){

		if($fname == $f_na || $lname == $l_na){
			echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please try another first name or last name!</div>";
		}else{
			$sql = "UPDATE tbl_personal SET firstname='$fname',lastname='$lname' WHERE user_id='$u_id'";
			$conn->query($sql);
			$update_log = "INSERT INTO tbl_user_log(log_id,user_id,activity,date) VALUES ('$string','$u_id','Account Updated','$date')";
			$conn -> query($update_log);
			echo"<div class='alert alert-success text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Account is successfully updated!</div>";
		}

	}else{
		echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Password is Invalid!</div>";
	}

}

if(isset($_POST['updateAddressBtn'])){

	$address = check ($_POST['address']);
	$contact = check ($_POST['contact']);
	$passy 	 = check ($_POST['passy']);
	$c_id  	 = check ($_POST['hid_user']);

	$passy	 = md5($passy);

	$sqla  = "SELECT * FROM tbl_user WHERE username = '$c_id'";
	$resa  = $conn->query($sqla);
	$rowa  = $resa->fetch_assoc();
	$u_id  = $rowa['user_id'];

	$sqlb  = "SELECT * FROM tbl_personal WHERE user_id = '$u_id'";
	$resb  = $conn->query($sqlb);
	$rowb  = $resb->fetch_assoc();
	$adds  = $rowb['address'];
	$cont  = $rowb['contact'];

	$sql_check  = "SELECT password FROM tbl_user WHERE password = '$passy' AND username = '$c_id'";
	$res_check  = $conn->query($sql_check);

	if($res_check->num_rows>0){

		if($address == $adds || $contact == $cont){
			echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please use another address or contact number!</div>";
		}else{
			$sql = "UPDATE tbl_personal SET address='$address',contact='$contact' WHERE user_id='$u_id'";
			$conn->query($sql);
			$add_log = "INSERT INTO tbl_user_log(log_id,user_id,activity,date) VALUES('$string','$u_id','Shipping Address/Contact Updated.','$date')";
			$conn -> query($add_log);
			echo"<div class='alert alert-success text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Account is successfully updated!</div>";
		}

	}else{
		echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Password is Invalid!</div>";
	}

}

/* CUSTOMER UPDATE ACCOUNT */

/* CUSTOMER UPDATE PASSWORD */

if(isset($_POST['updatePasswordBtn'])){

	$old_pass  = check ($_POST['old_pass']);
	$new_pass  = check ($_POST['new_pass']);
	$new_pass2 = check ($_POST['new_pass2']);
	$c_id  	   = check ($_POST['hid_user']);

	$old_pass  = md5($old_pass);
	$new_pass  = md5($new_pass);
	$new_pass2 = md5($new_pass2);


	$sql  = "SELECT password,user_id FROM tbl_user WHERE username = '$c_id'";
	$res  = $conn->query($sql);
	$row  = $res->fetch_assoc();
	$u_ps = $row['password'];
	$u_id = $row['user_id'];

	$u_ps = md5($u_ps);

	$sql_check = "SELECT password FROM tbl_user WHERE password = '$old_pass' AND username ='$c_id'";
	$res_check = $conn->query($sql_check);

	if($res_check->num_rows>0){

		if($new_pass == $u_ps || $new_pass2 == $u_ps){
			echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please use new Password!</div>";
		}else{
			if($new_pass != $new_pass2){
				echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Password Mismatch!</div>";
			}else{
				$sqlx = "UPDATE tbl_user SET password='$new_pass' WHERE username='$c_id'";
				$conn->query($sqlx);
				$pass_log = "INSERT INTO tbl_user_log(log_id,user_id,activity,date) VALUES('$string','$u_id','Password Updated.','$date')";
				$conn -> query($pass_log);
				echo"<div class='alert alert-success text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Password is successfully updated!</div>";
			}
		}

	}else{
		echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Old password is invalid!</div>";
	}

}

/* CUSTOMER UPDATE PASSWORD */

/* CANCEL ORDER */

if(isset($_POST['cancelOrderBtn'])){
	$o_id      = check ($_POST['canOrder']);
	$u_id      = check ($_POST['canUser']);
	$reason    = check ($_POST['canReason']);
	$comment   = check ($_POST['canComment']);

	$sql_check = "SELECT * FROM tbl_order WHERE order_id = '$o_id'";
	$res_check = $conn->query($sql_check);
	$row_check = $res_check->fetch_assoc();
	$status    = $row_check['status'];
	$u_id = $row_check['user_id'];
	if($status == 'canceled'){
		echo"<div class='alert alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Your order is already been canceled.</div>";
	}else{

		$sql = "UPDATE tbl_order SET status='canceled' WHERE order_id = '$o_id'";
		$conn->query($sql);

		$sql_ins = "INSERT INTO tbl_canceled (user_id,order_id,reason,comment)
					VALUES('$u_id','$o_id','$reason','$comment')";
		$conn->query($sql_ins);

		$cancel_log = "INSERT INTO tbl_user_log(log_id,user_id,activity,date) VALUES('$string','$u_id','Canceled Orders.','$date')";
		$conn -> query($cancel_log);

		echo"<div class='alert alert-success text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Your order is successfully canceled.</div>";
		
	}

}

/* CANCEL ORDER */

if (isset($_POST['loadcart'])) {
	
	$user = $_SESSION['customer'];

	$sql = $conn->prepare("SELECT * FROM tbl_cart WHERE user = ? ");
	$sql->bind_param('s', $user);
	$sql->execute();
	$res = $sql->get_result();
	$row = $res->fetch_assoc();
	$output = '';

	if ($res->num_rows>0) {
		
		$products = explode(',', $row['product_id']);
		$quantities	= explode(',', $row['quantity']);

		$count = 0;
		$total = 0;
		$productname = [];

		$ee = count($products);

		if ($row['product_id'] == '') {

			$output .= "<div align='center' style='margin: 100px 10px 100px 10px'><h1>There's no item in your cart. </h1>  <br> <a href='all-products.php'><button type='button' class='btn btn-info btn-lg' style='border-radius:0px'> Shop Here </button></a> </div>";
			
		}else{

			$output .= '<div class="row">
						<div class="col-md-8">';




			foreach ($products as $key) {
				
				$info = $conn->prepare("SELECT * FROM tbl_product WHERE product_id = ? LIMIT 1");
				$info->bind_param('s',$key);
				$info->execute();
				$resfo = $info->get_result();
				$rowfo = $resfo->fetch_assoc();

				array_push($productname, $rowfo['product name']);

				$total = $total + $quantities[$count]*$rowfo['net cost'];

				$output .= '<div class="row">
							<div class="col-sm-12">
								<div style="background-color: #f5f5f5;height: auto;padding: 10px;box-shadow: #ccc 2px 2px 5px">
									<div class="row">
										<div class="col-sm-4">
											<img src="../'.$rowfo['image'].'" style="height: 160px;width: 220px" class="thumbnail img-responsives">
										</div>
										<div class="col-sm-8">
											<p><span style="font-size: 20px">'.$rowfo['product name'].'</span> <span style="cursor: pointer" class="fa fa-times pull-right" id="rem'.$count.'" onclick="removeitem(id)"></span></p>
											<hr>
											<div>'.$rowfo['description'].'</div>
											<hr>
											<div>Qty <input type="number" min="1" max="99" pattern="[0-99{2}]" oninput="this.value = Math.abs(this.value.)" onchange="addqty(id)" id="add'.$count.'"" value="'.$quantities[$count].'" style="max-width:15%;border-radius: 5px;border: #ccc 1px solid"><span class="pull-right"> &#8369; '.number_format((float)$rowfo['net cost'], 2).'</span></div>
										</div>
									</div>
								</div>
							</div>
						</div><br>';

				$count++;

			}

			$count = 0;

			$output .='</div>
						<div class="col-sm-4">
							<div class="panel panel-default">
								<div class="panel-heading">Order Summary</div>
								<div class="panel-body">
							';

							foreach ($productname as $key1) {
							
								$output .= '<span>'.$key1.' <span class="pull-right">x '.$quantities[$count].'</span> </span><br>';	
								$count++;
							}


					$output .='
								<hr>
								<p>Total<span class="pull-right"><b> &#8369; '.number_format((float)$total, 2).' </b></span></p>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="container-fluid">
											<form class="checkOutForm">';
												$output .= '<input type="hidden" value="'.count($products).'" id="product_count"/>';
												for($i = 0; $i < count($products); $i++){
													$output .= '<input type="hidden" value="'.$products[$i].'" id="product_id_'.$i.'"/>';
												}
												$output .='<button type="submit" name="checkOutBtn" class="btn btn-info pull-right" style="border-radius: 0px">Check Out</button>
												<a href="all-products.php"><button type="button" class="btn btn-success pull-right" style="border-radius: 0px">Shop More</button></a>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>';

			$output .= '	</div>
						</div>';

		}


	}else{

		$output .= "<div align='center' style='margin: 100px 10px 100px 10px'><h1>There's no item in your cart.</h1> <br> <a href='all-products.php'><button type='button' class='btn btn-info btn-lg' style='border-radius:0px'> Shop Here </button></a> </div>";

	}

	echo $output;
}




if (isset($_POST['addtocart'])) {
	
	$product = check($_POST['product']);

	$newproducts = '';
	$newquantities = '';
	$count = 0;
	$place = '';
	$isin = 0;

	

		if (!isset($_SESSION['customer'])) {
			$ip = get_ip_address();
		}else{
			$ip = $_SESSION['customer'];
		}

		$chk = $conn->prepare("SELECT * FROM tbl_cart WHERE user = ?");
		$chk->bind_param('s', $ip);
		$chk->execute();
		$res = $chk->get_result();
		$row = $res->fetch_assoc();

		if ($res->num_rows>0) {
			
			$products = explode(',', $row['product_id']);
			$quantities = explode(',', $row['quantity']);

			$total = count($products);

			if ($row['product_id'] == '') {

				$np = $product;
				$nq = 1;
				
			}else{

				foreach ($products as $key) {
		
					if ($product == $key) {
						
						if ($count == 0) {
							$newproducts .= $key;
							$newquantities .= $quantities[$count];
							
						}else{
							$newproducts .= ','.$key;
							$newquantities .= ','.$quantities[$count];
						}

						$isin = 1;

						$place = $count;

					}else{

						if ($count == 0) {
							$newproducts .= $key;
							$newquantities .= $quantities[$count];
						}else{
							$newproducts .= ','.$key;
							$newquantities .= ','.$quantities[$count];
						}					

					}

					$count++;
				}

				$np = '';
				$nq = '';

				$count = 0;

				if ($isin == 0) {
					$np = $newproducts.','.$product;
					$nq = $newquantities.',1';
					
				}else{

					$np = $newproducts;
					foreach ($quantities as $key1) {
					
					if ($count == $place) {
							
						if ($count == 0) {

							$nq .= ($key1+1);	

						}else{

							$nq .= ','.($key1+1);

						}		

					}else{
						if ($count == 0) {

							$nq .= $key1;	

						}else{

							$nq .= ','.$key1;

						}
					}

						$count++;

					}

				}

			}

			




			$upd = $conn->prepare("UPDATE tbl_cart SET product_id = ?, quantity = ? WHERE user = ?");
			$upd->bind_param('sss', $np, $nq, $ip);
			$upd->execute();

			echo "success";


		}else{
			$sql = $conn->prepare("INSERT INTO tbl_cart (user,product_id,quantity) VALUES(?,?,1)");
			$sql->bind_param('ss', $ip, $product);
			$sql->execute();
		}
	
	


}



if (isset($_POST['remitem'])) {

	if (!isset($_SESSION['customer'])) {
		$user = get_ip_address();
	}else{
		$user = $_SESSION['customer'];
	}
		
	$item = check($_POST['item']);
	$sql = $conn->prepare("SELECT * FROM tbl_cart WHERE user=? LIMIT 1");
	$sql->bind_param("s",$user);
	$sql->execute();
	$res = $sql->get_result();
	$row = $res->fetch_assoc();

	$cart = explode(',', $row['product_id']);
	$qty = explode(',', $row['quantity']);
	$count = count($cart);
	$xaxa = 0;
	$new = [];
	$xexe = 0;
	$xixi = 0;

	$newitems ='';
	$newqty = '';
	$count = 0;

	foreach ($cart as $key) {
		if ($item==$count) {
			$xexe = $xaxa;
		}else{
			if ($xixi==0) {
				$newitems = $cart[$xaxa];
				$newqty = $qty[$xaxa];		
			}else{
				$newitems .= ','.$cart[$xaxa];
				$newqty .= ','.$qty[$xaxa];
			}
			$xixi++;
		}
		$xaxa++;
		$count++;
	}

	$sql->close();
	
	$upd = $conn->prepare("UPDATE tbl_cart SET product_id=(?), quantity=(?) WHERE user=?");
	$upd->bind_param('sss', $newitems, $newqty, $user);
	$upd->execute();
	$upd->close();
	

}

if (isset($_POST['addqty'])) {

	$item = check($_POST['item']);
	$pqty = check($_POST['qty']);

	if ($pqty == 0) {
		$pqty = 1;
	}

	if (!isset($_SESSION['customer'])) {
		$user = get_ip_address();
	}else{
		$user = $_SESSION['customer'];
	}

	$sql = $conn->prepare("SELECT * FROM tbl_cart WHERE user=? LIMIT 1");
	$sql->bind_param("s",$user);
	$sql->execute();
	$res = $sql->get_result();
	$row = $res->fetch_assoc();

	$cart = explode(',', $row['product_id']);
	$qty = explode(',', $row['quantity']);
	$count = count($cart);
	$xaxa = 0;
	$new = [];
	$xexe = 0;
	$xixi = 0;

	$newitems ='';
	$newqty = '';

	$count = 0;

	foreach ($cart as $key) {
		if ($item==$count) {
			if ($xixi==0) {
				$newitems = $cart[$xaxa];
				$newqty = $pqty;			
			}else{
				$newitems .= ','.$cart[$xaxa];
				$newqty .= ','.$pqty;
			}
			$xixi++;
		}else{
			if ($xixi==0) {
				$newitems = $cart[$xaxa];
				$newqty = $qty[$xaxa];			
			}else{
				$newitems .= ','.$cart[$xaxa];
				$newqty .= ','.$qty[$xaxa];
			}
			$xixi++;
		}
		$xaxa++;
		$count++;
	}

	$sql->close();

	$upd = $conn->prepare("UPDATE tbl_cart SET product_id=(?), quantity=(?) WHERE user=?");
	$upd->bind_param('sss', $newitems, $newqty, $user);
	$upd->execute();
	$upd->close();

}

if (isset($_POST['loadcartcount'])) {
	
	if(isset($_SESSION['customer'])){
	$user = $_SESSION['customer'];

	$sql = $conn->prepare("SELECT * FROM tbl_cart WHERE user = ? ");
	$sql->bind_param('s', $user);
	$sql->execute();
	$res = $sql->get_result();
	$row = $res->fetch_assoc();

		if ($res->num_rows>0) {
			
			if ($row['product_id'] == '') {
				echo 0;
			}else{
				$product = explode(',', $row['product_id']);
				echo count($product);
			}

		}else{

			echo 0;

		}
	}

}




function get_ip_address() {
    $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                // trim for safety measures
                $ip = trim($ip);
                // attempt to validate IP
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }

    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}


/**
 * Ensures an ip address is both a valid IP and does not fall within
 * a private network range.	
 */
function validate_ip($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}


?>

<script type="text/javascript">
	$('.checkOutForm').on('submit', function(e){
	  	e.preventDefault();
	  	var count = $('#product_count').val();
	  	var product_id = [];
	  	for(var i = 0; i < count; i++){
	  		product_id.push($('#product_id_'+i).val()); 
	  	}
	  	$.ajax({
	  		url: 'php/checkout.php',
	  		type: 'POST',
	  		data: {action:'checkOut', product_id:product_id},
	  		success: function(data){
	  			loadcartcount();
	  			loadcart();
	  		}
	  	});
	});
</script>


