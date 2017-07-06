<?php 	 
require_once "../config/connectionstring.php";
function DoanhThu($maCuaHang)
{
	$conn=connect();
	$sql="SELECT
	sp_ten,
	hd_ngaydat,
	lsp_ten,
	SUM(cthd_soluong) as soluong,
	SUM(
	(cthd_dongia * cthd_soluong) *(lsp_laixuat / 100)
	) as tongtien
	FROM
	loaisanpham,
	hoadon,
	sanpham,
	chitiethoadon
	WHERE
	lsp_ma = sp_loaisanpham AND sp_ma = cthd_masanpham AND hd_ma = cthd_mahoadon AND cthd_macuahang =$maCuaHang
	GROUP BY
	lsp_ma,
	hd_ngaydat,
	cthd_masanpham";
	return $conn->query($sql);
}
function DoanhThuTheoDate($maCuaHang,$ngaybatdau,$ngayketthuc)
{
	$conn=connect();
	$sql="SELECT
	sp_ten,
	hd_ngaydat,
	lsp_ten,
	SUM(cthd_soluong) as soluong,
	SUM(
	(cthd_dongia * cthd_soluong) *(lsp_laixuat / 100)
	) as tongtien
	FROM
	loaisanpham,
	hoadon,
	sanpham,
	chitiethoadon
	WHERE
	lsp_ma = sp_loaisanpham AND sp_ma = cthd_masanpham AND hd_ma = cthd_mahoadon AND cthd_macuahang =$maCuaHang AND (hd_ngaydat BETWEEN '$ngaybatdau'AND'$ngayketthuc')
	GROUP BY
	lsp_ma,
	hd_ngaydat,
	cthd_masanpham";
	return $conn->query($sql);
}
//---------------------------------------------------------------------------
function danhSachCuaHang()
{
	$conn=connect();
	$sql="SELECT *
	FROM
	cuahang, nhanvien
	WHERE ch_ma=nv_macuahang ";
	return $conn->query($sql);
}

?>