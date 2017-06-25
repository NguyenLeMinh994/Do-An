<?php 
	require "../config/connectionstring.php";
	function danhSachCuaHang()
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  cuahang";
		return $conn->query($sql);
	}
	function layThongTinChuCuaHang($maCuaHang)
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  nhanvien
				WHERE 
					nv_macuahang=$maCuaHang
				AND
					nv_machuvu=2";
		return $conn->query($sql);
		
		
	}

?>