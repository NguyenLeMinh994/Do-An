<?php 
require_once "../config/connectionstring.php";
function soLuongSanPham($cuaHang)
{
	$conn=connect();
	$sql="SELECT count(*) as soluong 
	FROM sanpham
	WHERE sp_macuahang=$cuaHang AND sp_trangthai=1";
	$result=$conn->query($sql);
	$r=$result->fetch_assoc();
	return $r['soluong'];
}
function soLuongDonHang($cuaHang)
{
	$conn=connect();
	$sql = "SELECT COUNT(DISTINCT cthd_mahoadon) as soluong
	FROM hoadon,
	chitiethoadon
	WHERE cthd_macuahang=$cuaHang  AND cthd_trangthai = 1 AND cthd_mahoadon=hd_ma";
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	return $row['soluong'];
}
function soluongBinhLuan($cuaHang)
{
	$conn=connect();
	$sql = "SELECT count(DISTINCT bl_masanpham) as soluong
	FROM binhluan,sanpham
	WHERE bl_masanpham=sp_ma AND bl_trangthai=1 AND sp_macuahang=$cuaHang";
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	return $row['soluong'];
}
function demSoLuongKhuyenMai($cuaHang)
{
	$conn=connect();
	$sql = "SELECT count(*) as soluong
	FROM khuyenmai
	WHERE 
	km_trangthai=1 And km_magianhang=$cuaHang";
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	mysqli_free_result($result);
	return $row['soluong'];
}
function capNhatTrangThaiSanPhamKhuyenMai()
{
	$conn=connect();
	$sql="
	UPDATE
	sanpham,
	khuyenmai
	SET 
	sp_makhuyenmai=NULL
	WHERE
	sp_makhuyenmai = km_ma And km_trangthai=2";

	$conn->query($sql);
}
function capNhatTrangThaiKhuyenMai()
{
	$conn=connect();
	$sql = "UPDATE khuyenmai 
	SET km_trangthai=2 
	WHERE km_trangthai=1 
	And km_ngayketthuc<=CURDATE()";
	if($conn->query($sql)===true)
	{
		capNhatTrangThaiSanPhamKhuyenMai();
	}
}
function soLuongLoaiSanPham($cuaHang)
{
	$conn=connect();
	$sql="SELECT count(sp_ma) as soluong,lsp_ten
	FROM sanpham,loaisanpham
	WHERE lsp_ma=sp_loaisanpham AND sp_macuahang=$cuaHang AND sp_trangthai=1
	GROUP BY lsp_ma";

	return $conn->query($sql);
}

function LuotXem($cuaHang)
{
	$conn=connect();
	$sql="SELECT *
	FROM sanpham,loaisanpham
	WHERE lsp_ma=sp_loaisanpham AND sp_macuahang=$cuaHang AND sp_trangthai=1";

	return $conn->query($sql);
}

function thongKeCacNam($cuaHang)
{
	$conn=connect();
	$sql="SELECT YEAR(hd_ngaydat) as nam, SUM(cthd_soluong*cthd_dongia) as tongtien
	FROM hoadon,chitiethoadon
	WHERE cthd_trangthai=2 AND cthd_macuahang=$cuaHang AND cthd_mahoadon=hd_ma
	GROUP BY YEAR(hd_ngaydat)";

	return $conn->query($sql);
}

//--------------------------------------
function kiemtracanhbao($macuahang)
{
	$conn=connect();
	$sql="SELECT *
	FROM cuahang
	WHERE ch_ma=$macuahang";
	return $conn->query($sql);
}

function noidungcanhbao($macuahang)
{
	$conn=connect();
	$sql="SELECT count(bcch_ma) as solan,sp_ma,sp_ten,sp_trangthai 
	FROM baocao_cuahang, sanpham, cuahang 
	WHERE bcch_masanpham = sp_ma 
	AND bcch_macuahang=ch_ma AND bcch_macuahang=$macuahang
	GROUP BY bcch_macuahang,bcch_masanpham";
	return $conn->query($sql);
}

?>