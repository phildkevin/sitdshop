<?php
	$conn = new mysqli('localhost','root','','sitdshop');


	function checkinput($data){
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    $data = addslashes($data);
	    return $data;
  	}

  	date_default_timezone_set("Asia/Manila");
    $currentdate= date("Y-m-d G:i:s");

    $vdate = date("M d Y (l) - h:i A");


?>