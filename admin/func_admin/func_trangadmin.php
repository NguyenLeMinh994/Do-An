<?php  
	require_once "../config/connectionstring.php";
	function soLuongCuaHang()
	{
		$conn=connect();
		$sql="SELECT count(*) as ch_sl
		FROM cuahang
		WHERE ch_trangthai=1";
		return $conn->query($sql); 
	}

	function soLuongKhachHang()
	{
		$conn=connect();
		$sql="SELECT count(*) as kh_sl
		FROM khachhang
		WHERE kh_trangthai=1";
		return $conn->query($sql); 
	}

	function soLuongHang()
	{
		$conn=connect();
		$sql="SELECT count(*) as h_sl
		FROM hangsanxuat
		WHERE hsx_trangthai=1";
		return $conn->query($sql); 
	}
	function soLuongLoaiSP()
	{
		$conn=connect();
		$sql="SELECT count(*) as lsp_sl
		FROM loaisanpham
		WHERE lsp_trangthai=1";
		return $conn->query($sql); 
	}
?>