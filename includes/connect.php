<?php

    require_once 'constant.php';
	$conn=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($conn->connect_error)
	{
		die("connection failed:". $conn->connect_error);
	}

?>