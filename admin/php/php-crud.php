<?php
	session_start();
	include "../include/include-connection.php";
	$user_id = $_SESSION['user_id'];
	if(isset($_POST['action']) && $_POST['action']=='removeRecord'){
		$sql = "DELETE FROM tbl_order WHERE order_id = '".$_POST['id']."'";
		if(!$conn->query($sql)){
			echo 0; 
		}else{
			echo 1;
		}
	}

	if(isset($_POST['action']) && $_POST['action']=='confirmPayment'){
		$sql = "UPDATE tbl_order SET status = 'Processing' WHERE order_id = '".$_POST['id']."'";
		if(!$conn->query($sql)){
			echo 0; 
		}else{
			echo 1;
		}
	}

	if(isset($_POST['action']) && $_POST['action']=='holdPayment'){
		$sql = "UPDATE tbl_order SET status = 'Hold' WHERE order_id = '".$_POST['id']."'";
		if(!$conn->query($sql)){
			echo 0; 
		}else{
			$sql = "SELECT * FROM tbl_order WHERE  order_id = '".$_POST['id']."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();

			$sql = "INSERT INTO tbl_notifications VALUES(null, '".$row['user_id']."', 'Due to lack of payment, we will hold your order until you pay your bills!','order','unread', CURRENT_TIMESTAMP)";
			$conn->query($sql);
			echo 1;
		}
	}

	if(isset($_POST['action']) && $_POST['action']=='declinePayment'){
		$sql = "UPDATE tbl_order SET status = 'Declined' WHERE order_id = '".$_POST['id']."'";
		if(!$conn->query($sql)){
			echo 0; 
		}else{
			echo 1;
		}
	}

	if(isset($_POST['action']) && $_POST['action']=='validateProfile'){
		$firstname = checkInput($_POST['firstname']);
		$lastname = checkInput($_POST['lastname']);
		$contact = checkInput($_POST['contact']);
		$email = checkInput($_POST['email']);
		$address = checkInput($_POST['address']);
		$error = "";
		$sql = "SELECT * FROM tbl_personal WHERE user_id != '".$user_id."' AND contact = '".$contact."'";
		$result = $conn->query($sql);
		$count_contact = mysqli_num_rows($result);
		if($count_contact == 0){
			$error .= "0";
		}else{
			$error .= "1";
		}

		$sql = "SELECT * FROM tbl_personal WHERE user_id != '".$user_id."' AND email = '".$email."'";
		$result = $conn->query($sql);
		$count_email = mysqli_num_rows($result);
		if($count_email == 0){
			$error .= "0";
		}else{
			$error .= "1";
		}

		if($error == "00"){
			$sql = "UPDATE tbl_personal SET email = '".$email."', contact = '".$contact."', firstname='".$firstname."', lastname='".$lastname."', address='".$address."' WHERE user_id = '".$user_id."'";
			$conn->query($sql);
		}
		echo $error;
	}

	if(isset($_POST['action']) && $_POST['action']=='confirmPassword'){
		$password = checkInput($_POST['password']);
		$password = md5($password);
		$new_p = checkInput($_POST['new_p']);
		$confirm_p = checkInput($_POST['confirm_p']);
		$sql = "SELECT * FROM tbl_user WHERE user_id = '".$user_id."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$error = 0;
		if(preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $new_p) && (strlen($new_p) > 8 && strlen($new_p) < 15)){
			if($password == $row['password']){
				if($new_p == $confirm_p){
					if($new_p != $password){
						$new_p = md5($new_p);
						$sql = "UPDATE tbl_user SET password = '".$new_p."' WHERE user_id = '".$user_id."'";
						$conn->query($sql);
						$error = 0;
					}else{
						$error = 4;
					}
				}else{
					$error = 3;
				}
			}else{
				$error = 2;
			}
		}else{
			$error = 1;
		}
		echo $error;
	}

	if(isset($_POST['action']) && $_POST['action']=='inactiveStatus'){
		$sql = "UPDATE tbl_user SET status = 'inactive' WHERE user_id = '".$_POST['id']."'";
		$conn->query($sql);
	}

	if(isset($_POST['action']) && $_POST['action']=='activeStatus'){
		$sql = "UPDATE tbl_user SET status = 'active' WHERE user_id = '".$_POST['id']."'";
		$conn->query($sql);
	}

	if(isset($_POST['action']) && $_POST['action']=='viewStatus'){
		$id = checkInput($_POST['id']);
		$sql = "SELECT * FROM tbl_personal WHERE user_id = '".$id."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		echo '<div class="row">
            <div class="col-sm-4">
                <div class="thumbnail">';
                if($row['image'] == ''){
					echo '<img src="../../../assets/images/user.png"/>';
				}else{
					echo '<img src="../'.$row['image'].'"/>';
				}
               echo '</div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control profile-control" value="'.$row['firstname'].'" disabled>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control profile-control" value="'.$row['lastname'].'" disabled required>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control profile-control" value="'.$row['contact'].'" disabled required>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control profile-control" value="'.$row['email'].'" disabled required>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control profile-control" value="'.$row['address'].'" disabled>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
    	</div>';
	}

	if(isset($_POST['action']) && $_POST['action']=='newEmployee'){
		$username = checkInput($_POST['username']);
		$user_id = checkInput($_POST['user_id']);
		$password = checkInput($_POST['password']);
		$password = md5($password);
		$error = "";
		$sql = "SELECT * FROM tbl_user WHERE username = '".$username."'";
		$result = $conn->query($sql);
		$count = mysqli_num_rows($result);
		if($count == 0){
			$error = "0";
		}else{
			$error = "1";
		}

		if($error == 0){
			$sql = "INSERT INTO tbl_user VALUES('".$user_id."','".$username."','".$password."','Employee','active')";
			$conn->query($sql);

			$sql = "INSERT INTO tbl_personal VALUES('".$user_id."','N/A','N/A','N/A','N/A','N/A','../../assets/images/user.png')";
			$conn->query($sql);
		}

		echo $error;
	}

?>