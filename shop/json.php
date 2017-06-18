<?php 
	$servername ="localhost";
	$username ="root";
	$password ="";
	$dbname ="d_json";
	$connect =new mysqli($servername, $username, $password, $dbname) or die($connect->connect_error);
	$connect->set_charset("utf8");
	$sql = "SELECT * 
			FROM a";
	$result=$connect->query($sql);
	$r=array();
	$row=$result->fetch_assoc();
	$r[]=$row;
	
	sleep(1);
	echo json_encode($r);
	die;
 ?>