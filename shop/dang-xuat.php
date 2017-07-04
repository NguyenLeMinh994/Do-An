<?php 
session_start();
if(isset($_SESSION['NV']))
{
	unset($_SESSION['NV']);
	header("Location:dang-nhap.php");
}
else
	if(!isset($_SESSION['NV']))
	{
		header("Location:dang-nhap.php");
	}

	?>