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
						echo "<script type ='text/javascript'> window.location.href='../sitdshop'; </script>";
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


/* ADD TO CART */


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

	$upd = $conn->prepare("UPDATE tbl_cart SET cart=(?), qty=(?) WHERE user=?");
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



