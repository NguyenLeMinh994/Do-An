<?php  
require_once "../config/connectionstring.php";
function danhSachYeuCau()
{
	$conn=connect();
	$sql="SELECT * 
	FROM yeucau,cuahang
	WHERE yc_macuahang=ch_ma AND yc_trangthai=3";
	return $conn->query($sql);
}
function danhSachYeuCauDaXacNhan()
{
	$conn=connect();
	$sql="SELECT * 
	FROM yeucau,cuahang
	WHERE yc_macuahang=ch_ma AND yc_trangthai=1";
	return $conn->query($sql);
}
function danhSachYeuCauBiTuChoi()
{
	$conn=connect();
	$sql="SELECT * 
	FROM yeucau,cuahang
	WHERE yc_macuahang=ch_ma AND yc_trangthai=2";
	return $conn->query($sql);
}
//--------------------------------------------------------------------------
function xacNhanYeuCau($maCuaHang)
{
	$conn=connect();
	$sql="UPDATE yeucau
	SET yc_trangthai=1
	WHERE yc_macuahang=$maCuaHang ";

	if($conn->query($sql)==true)
	{
		echo "<script>alert('Xác Nhận thành công')</script>";
	}
}

function tuChoiYeuCau($maCuaHang)
{
	$conn=connect();
	$sql="UPDATE yeucau
	SET yc_trangthai=2
	WHERE yc_macuahang=$maCuaHang ";
	if($conn->query($sql)==true)
	{
		echo "<script>alert('Xác nhận từ chối')</script>";
	}
}
function khoiPhucYeuCau($maCuaHang)
{
	$conn=connect();
	$sql="UPDATE yeucau
	SET yc_trangthai=3
	WHERE yc_macuahang=$maCuaHang ";

	if($conn->query($sql)==true)
	{
		echo "<script>alert('Khôi phục thành công')</script>";
	}
}
?>