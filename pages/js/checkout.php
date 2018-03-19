<?php
	session_start();
	if(isset($_POST['action']) && $_POST['action'] == 'checkOut'){
		$user_id = $_SESSION['user_id'];
		echo 22;
	}
?>