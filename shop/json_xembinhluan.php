<?php 
	require_once 'func_shop/func_binhluan.php';
	$r=array();
	if(isset($_GET['idBL']) && !empty($_GET['idBL']))
	{
		$idbl=layBinhLuanTheoId($_GET['idBL']);
		$row=$idbl->fetch_assoc();
		$r[]=$row;
		// sleep(1);
		echo json_encode($r);
		die;
	}
	
	
	
 ?>