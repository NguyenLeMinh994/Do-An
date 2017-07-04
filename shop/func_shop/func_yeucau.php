<?php  
require_once "../config/connectionstring.php";
function themYeuCau($cuaHang,$tieuDe,$noiDung)
{
	$conn=connect();
	$date=date("Y-m-d");
	$sql="INSERT INTO yeucau(yc_macuahang,yc_tieude,yc_noidung,yc_ngaydang,yc_trangthai)
	VALUES ($cuaHang,'$tieuDe','$noiDung','$date',3)";
	if($conn->query($sql)==true)
	{
		echo "<script>alert('Yêu cầu thành công');</script>";
	}
	else
	{
		echo "<script>alert('Yêu cầu thất bại');</script>";
	}
}

//---------------------------------------------------------------------------------------
function lichSuYeuCau($cuaHang)
{
	$conn=connect();
	$sql = "SELECT * 
	FROM yeucau
	WHERE yc_macuahang=$cuaHang";
	return $conn->query($sql);
}
?>