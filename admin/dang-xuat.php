<?php 
session_start();
if(isset($_SESSION['AD']))
{
	unset($_SESSION['AD']);
	header("Location:index.php");
}
?>