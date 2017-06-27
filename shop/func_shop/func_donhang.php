<?php  
	require_once "../config/connectionstring.php";
	function danhSachDonHang($cuaHang)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM hoadon,khachhang
				WHERE hd_cuahang=$cuaHang AND (hd_trangthai<>3 AND hd_trangthai<>4) AND hd_makhachhang=kh_ma";
		return $conn->query($sql);
	}
	
	function danhSachDonHangDaGiao($cuaHang)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM hoadon,khachhang
				WHERE hd_cuahang=$cuaHang AND hd_trangthai=3 AND hd_makhachhang=kh_ma";
		return $conn->query($sql);
	}
	function danhSachDonHangBiHuy($cuaHang)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM hoadon,khachhang
				WHERE hd_cuahang=$cuaHang AND hd_trangthai=4 AND hd_makhachhang=kh_ma";
		return $conn->query($sql);
	}

	function donHangDangGiao($maDH)
	{
		$conn=connect();
		$sql="UPDATE hoadon
			  SET hd_trangthai=2
			  WHERE hd_trangthai=1 AND hd_ma=$maDH";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Thành Công: Xác Nhận Đơn Hàng');</script>";
		}	  
	}

	function donHangDaGiao($maDH)
	{
		$conn=connect();
		$sql="UPDATE hoadon
			  SET hd_trangthai=3
			  WHERE hd_trangthai=2 AND hd_ma=$maDH";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Thành Công: Xác Nhận Đơn Hàng Đã Giao');</script>";
		}	  
	} 

	function huyDonHang($maDH)
	{
		$conn=connect();
		$sql="UPDATE hoadon
			  SET hd_trangthai=4
			  WHERE hd_ma=$maDH";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Hủy Đơn Hàng Thành Công');</script>";
		}	  
	} 

	function khoiPhucDonHang($maDH)
	{
		$conn=connect();
		$sql="UPDATE hoadon
			  SET hd_trangthai=1
			  WHERE hd_ma=$maDH";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Khôi Phục Đơn Hàng Thành Công');</script>";
		}	  
	}

	function thongTinKhachHang($maDH)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM hoadon,khachhang,thanhpho_tinh,quan_huyen
				WHERE hd_ma=$maDH AND 
				(hd_makhachhang=kh_ma AND hd_thanhpho_tinh=tp_t_ma AND hd_quan_huyen=q_h_ma)";
		return $conn->query($sql);
	}

	function chiTietDonHang($maDH,$cuaHang)
	{
		$conn=connect();
		$sql="SELECT *
			  FROM chitiethoadon, sanpham
			  WHERE cthd_mahoadon=$maDH AND cthd_masanpham=sp_ma AND cthd_macuahang=$cuaHang";
		return $conn->query($sql);
	}

?>