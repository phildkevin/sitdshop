<?php
session_start();
include"connect.php";
$user = $_SESSION['customer'];

$sql  = "SELECT * FROM tbl_user WHERE username = '$user'";
$res  = $conn->query($sql);
$row  = $res->fetch_assoc();
$user_id = $row['user_id'];
$characters = '0123456789abcdef';
	$string = '';
	$max = strlen($characters) - 1;
	for ($i = 0; $i < 10; $i++) {
	     $string .= $characters[mt_rand(0, $max)];
	}
date_default_timezone_set("Asia/Manila");
$log_date = date("Y-m-d G:i:s");
$log = "INSERT INTO tbl_user_log (log_id,user_id,activity,date) VALUES ('$string','$user_id','Logged out','$log_date')";
$conn -> query($log);

session_destroy();
header("location:../../sitdshop");

?>