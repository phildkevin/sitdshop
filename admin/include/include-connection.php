<?php
	date_default_timezone_set('Asia/Manila');
	$conn = mysqli_connect("localhost","root","","sitdshop");

	if(!$conn){
	    die("Connection failed : " .mysqli_connect_error());
	}

	function checkInput($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		$data = addslashes($data);
		return $data;
	}
?>