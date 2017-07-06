<?php 
	require "../config/connectionstring.php";
	function danhSachCuaHang()
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  cuahang
				WHERE ch_trangthai=1";
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

	function demSoLanKhieuNai($maCuaHang)
	{
		$conn=connect();
		$sql="SELECT COUNT(bcch_ma) as solan,ch_canhbao FROM baocao_cuahang, cuahang WHERE bcch_macuahang=$maCuaHang AND ch_ma=bcch_macuahang";
		return $conn->query($sql);
	}

	function sanphamkhieuNai($maCuaHang)
	{
		$conn=connect();
		$sql="SELECT COUNT(bcch_ma) as dem,sp_ten,sp_ma,ch_canhbao
		FROM baocao_cuahang, sanpham ,cuahang
		WHERE bcch_macuahang=$maCuaHang AND sp_ma=bcch_masanpham AND ch_ma=bcch_macuahang AND sp_trangthai<>3
		GROUP BY bcch_masanpham";
		return $conn->query($sql);
	}
	function noidungkhieunai($maSP)
	{
		$conn=connect();
		$sql="SELECT * FROM baocao_cuahang WHERE bcch_masanpham=$maSP";
		return $conn->query($sql);
	}
	//-----------------------------------------------------------------
	function canhbao($maCH)
	{
		$conn=connect();
		$sql="UPDATE cuahang
		SET ch_canhbao=1
		WHERE ch_ma=$maCH
		";
		$conn->query($sql);
	}
	function huycanhbao($maCH)
	{
		$conn=connect();
		$sql="UPDATE cuahang
		SET ch_canhbao=NULL
		WHERE ch_ma=$maCH
		";
		$conn->query($sql);
	}
	function xoaSanPham($maSP)
	{
		$conn=connect();
		$sql="UPDATE sanpham
		SET sp_trangthai=3
		WHERE sp_ma=$maSP
		";
		$conn->query($sql);
	}

?>