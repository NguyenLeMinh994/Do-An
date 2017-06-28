<?php  
	require_once "../config/connectionstring.php";
	function danhSachHangTonKho($cuaHang)
	{
		$conn=connect();
		$sql="SELECT * 
		FROM sanpham,loaisanpham,hangsanxuat,nhacungcap
		WHERE (sp_loaisanpham=lsp_ma AND sp_hangsanxuat=hsx_ma AND sp_nhacungcap=ncc_ma) AND sp_macuahang=$cuaHang AND sp_trangthai=1";
		return $conn->query($sql);
	}
	function laySanPhamTheoId($maSP)
	{
		$conn=connect();
		$sql="SELECT * 
		FROM sanpham
		WHERE sp_ma=$maSP";
		return $conn->query($sql);
	}

	function capNhatSoLuongSP($maSP,$soluong)
	{
		$conn=connect();
		$sql="UPDATE sanpham
			 SET sp_soluong=$soluong
			 WHERE sp_ma=$maSP";
		$conn->query($sql);
		
	}
	function thongKeSanPhamBanRa($cuaHang)
	{
		$conn=connect();
		$sql="SELECT
		sp_ten,
		sp_ma,
		lsp_ten,
		SUM(cthd_soluong) AS soluong,
		SUM(cthd_soluong * cthd_dongia) AS dg
		FROM
		chitiethoadon,
		hoadon,
		sanpham,
		loaisanpham
		WHERE
		cthd_macuahang = $cuaHang AND sp_ma = cthd_masanpham AND (hd_ma=cthd_mahoadon AND hd_trangthai=3) AND sp_loaisanpham=lsp_ma
		GROUP BY
		cthd_masanpham";
		return $conn->query($sql);
	}
?>