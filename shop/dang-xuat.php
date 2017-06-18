<?php 
session_start();
if(isset($_SESSION['NV']))
{
	unset($_SESSION['NV']);
	header("Location:index.php");
}
?>