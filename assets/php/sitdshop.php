<?php

	session_start();
	include 'connect.php';




	if (isset($_POST['emplogin'])) {
		
		$username = checkinput($_POST['username']);
		$password = checkinput($_POST['password']);
		$password = md5($password);
		$sql = $conn->prepare("SELECT * FROM tbl_user WHERE username = ? and password = ? and `access` != 'Customer' LIMIT 1");
		$sql->bind_param('ss', $username, $password);
		$sql->execute();
		$res = $sql->get_result();
		$row = $res->fetch_assoc();

		if ($res->num_rows>0) {
			
			$id = $row['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['emplogin'] = $username;
			$sql->close();

			$sql1 = $conn->prepare("SELECT * FROM tbl_personal WHERE user_id = ?");
			$sql1->bind_param('s', $id);
			$sql1->execute();
			$res1 = $sql1->get_result();
			$row1 = $res1->fetch_assoc();
			if($row1['firstname'] == ""){
				echo " ";
			}else{
				echo $row1['firstname'];
			}

		}else{

			echo 0;

		}


	}

	if (isset($_POST['newproduct'])) {
		
        
		$pname = checkinput($_POST['pname']);
		$pcateg = checkinput($_POST['pcateg']);
		$pgross = checkinput($_POST['pgross']);
		$pnet = checkinput($_POST['pnet']);
		$pqty = checkinput($_POST['pqty']);
		$pdesc = $_POST['pdesc'];
		$sql = $conn->prepare("SELECT * FROM tbl_product WHERE `product name` = ? LIMIT 1");
		$sql->bind_param('s', $pname);
		$sql->execute();
		$res = $sql->get_result();
		//$row = $res->fetch_assoc();

		if ($res->num_rows>0) {
			
			echo "Item name is already existing";

		}else{

			$unique_ref_length = 7;  
			$unique_ref_found = false;   
			$possible_chars = "1234567890";  		    
			while (!$unique_ref_found) {  
			    $unique_ref = "";  
			    $i = 0;  
			    while ($i < $unique_ref_length) {  
			        $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);  
			          
			        $unique_ref .= $char;  
			          
			        $i++;  
			      
			    }  
			    $query = "SELECT `product_id` FROM `tbl_product` 
			              WHERE `product_id`='".$unique_ref."'";  
			    $result = $conn->query($query); 
			    if ($result->num_rows==0) {  
			        $unique_ref_found = true;        
			    }  
			  
			}

			$vowels = array('a','e','i','o','u','A','E','I','O','U'," ",'"',"'");
			$ncateg = str_replace($vowels, '', $pcateg);

			$pid = strtoupper($ncateg).$unique_ref;

			

			$sql->close();
			$sql1 = $conn->prepare("INSERT INTO tbl_product (`product_id` ,`product name`, `description`, `category`, `gross cost`, `net cost`, `initial quantity`, `quantity`, `date`) 
				VALUES(?,?,?,?,?,?,?,?,?)");
			$sql1->bind_param('sssssssss', $pid,$pname, $pdesc, $pcateg, $pgross, $pnet, $pqty, $pqty, $currentdate);
			$sql1->execute();

			echo 1;

		}

	}

	if (isset($_POST['deleteitem'])) {
		
		$product = checkinput($_POST['product']);

		$sql = $conn->prepare("UPDATE tbl_product set status = 'pullout' WHERE product_id = ?");
		$sql->bind_param('s', $product);
		$sql->execute();
		echo 1;

	}

	if (isset($_POST['editproduct'])) {
		
		$pname = checkinput($_POST['ename']);
		$pcateg = checkinput($_POST['ecateg']);
		$pgross = checkinput($_POST['egross']);
		$pnet = checkinput($_POST['enet']);
		$pqty = checkinput($_POST['eqty']);
		$product = checkinput($_POST['product']);
		$edesc = $_POST['edesc'];

		$sql = $conn->prepare("SELECT * FROM tbl_product WHERE `product name` = ? and product_id != ? LIMIT 1");
		$sql->bind_param('ss', $pname, $product);
		$sql->execute();
		$res = $sql->get_result();
		//$row = $res->fetch_assoc();

		if ($res->num_rows>0) {
			
			echo "Item name is already existing";

		}else{

			

			$sql->close();
			$sql1 = $conn->prepare("UPDATE tbl_product set `product name` = ?, `description` = ?, `category` = ?, `gross cost` = ? , `net cost` = ?, `quantity` = ? WHERE product_id = ?");
			$sql1->bind_param('sssssss', $pname, $edesc, $pcateg, $pgross, $pnet, $pqty, $product);
			$sql1->execute();

			if (isset($_POST['img'])) {
				$img = substr($_POST['img'], 3);
				if ($img == '../../') {
					
				}else{
					unlink($img);	
				}
				
				
			}

			echo 1;

		}

	}

	function getNotifcount($type=''){
		
		$conn = new mysqli('localhost','root','','sitdshop');
		$stat = 0;

		if ($type == 'orders') {
			
			$sql = "SELECT * FROM tbl_notifications WHERE type='order' AND status = 'unread' ";
			$stat = 1;

		}elseif ($type == 'product') {
			
			$sql = "SELECT * FROM tbl_notifications WHERE type='product' AND status = 'unread' ";
			$stat = 1;


		}elseif ($type == 'system'){

			$sql = "SELECT * FROM tbl_notifications WHERE type='system' AND status = 'unread' ";
			$stat = 1;

		}elseif ($type == 'all'){

			$sql = "SELECT * FROM tbl_notifications WHERE status = 'unread' ";
			$stat = 1;

		}


		if ($stat==1) {
			$res = $conn->query($sql);
			if ($res->num_rows>1) {
				echo $res->num_rows;
			}else{
				echo "";
			}
		}
		


	}

	function getNotif($type=''){
		
		$conn = new mysqli('localhost','root','','sitdshop');
		$stat = 0;

		if ($type == 'orders') {
			
			$sql = "SELECT * FROM tbl_notifications WHERE type='order' AND status = 'unread' ";
			$stat = 1;

		}elseif ($type == 'product') {
			
			$sql = "SELECT * FROM tbl_notifications WHERE type='product' AND status = 'unread' ";
			$stat = 1;


		}elseif ($type == 'system'){

			$sql = "SELECT * FROM tbl_notifications WHERE type='system' AND status = 'unread' ";
			$stat = 1;

		}elseif ($type == 'all'){

			$sql = "SELECT * FROM tbl_notifications WHERE status = 'unread' ";
			$stat = 1;

		}


		if ($stat==1) {
			$res = $conn->query($sql);
			if ($res->num_rows>1) {
				echo $res->num_rows;
			}else{
				echo "";
			}
		}

		


	}


	if (isset($_POST['loadnotif'])) {
	
		if ($_POST['loadnotif'] == 1) {
			getNotifcount('all');
		}

	}



?>