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

	//---------------------------
	function soluongYeuCau()
	{
		$conn=connect();
		$sql="SELECT count(yc_ma) as sl
		FROM yeucau
		WHERE yc_trangthai=1";
		return $conn->query($sql); 
	}

	function doanhthuhientai()
	{
		$conn=connect();

		$sql="SELECT SUM((cthd_dongia*cthd_soluong)*(lsp_laisuat/100)) as tongtien,YEAR(hd_ngaydat) as nam 
		FROM cuahang,hoadon,chitiethoadon,sanpham,loaisanpham 
		WHERE hd_ma=cthd_mahoadon AND cthd_masanpham=sp_ma AND sp_loaisanpham=lsp_ma AND cthd_trangthai=2 AND cthd_macuahang=ch_ma
		GROUP BY YEAR(hd_ngaydat)";	
	return $conn->query($sql); 
	}

?>