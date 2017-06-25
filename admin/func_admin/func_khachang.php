<?php 
	require "../config/connectionstring.php";
	function danhSachKhachHang()
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  khachhang
				WHERE 
					kh_trangthai=1";
		return $conn->query($sql);
	}
	function danhSachKhachHangBiHuy()
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  khachhang
				WHERE 
					kh_trangthai=2";
		return $conn->query($sql);
	}
	function huyKhachHang($maKH)
	{
		$conn=connect();
		$sql="UPDATE
				  khachhang
				SET 
				  kh_trangthai = 2
				WHERE
				  kh_ma=$maKH";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Hủy thành công')</script>";
		}
		else
			echo "<script>alert('Hủy thất bại')</script>";
	}
	function khoiPhucKhachHang($maKH)
	{
		$conn=connect();
		$sql="UPDATE
				  khachhang
				SET 
				  kh_trangthai = 1
				WHERE
				  kh_ma=$maKH";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Khôi phục thành công')</script>";
		}
		else
			echo "<script>alert('Khôi phục thất bại')</script>";
	}
?>