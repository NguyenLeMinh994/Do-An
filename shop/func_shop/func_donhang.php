<?php  
require_once "../config/connectionstring.php";
function danhSachDonHang($cuaHang)
{
	$conn=connect();
	$sql = "SELECT kh_hoten,hd_ma,hd_trangthai,hd_ngaydat, SUM(cthd_soluong*cthd_dongia) as tongtien
	FROM
	hoadon,
	chitiethoadon,
	khachhang
	WHERE
	cthd_macuahang = $cuaHang AND hd_ma=cthd_mahoadon AND hd_makhachhang=kh_ma
	AND cthd_trangthai = 1
	GROUP BY cthd_mahoadon";
	return $conn->query($sql);
}

function danhSachDonHangDaGiao($cuaHang)
{
	$conn=connect();
	$sql = "SELECT kh_hoten,hd_ma,hd_trangthai,hd_ngaydat, SUM(cthd_soluong*cthd_dongia) as tongtien
	FROM
	hoadon,
	chitiethoadon,
	khachhang
	WHERE
	cthd_macuahang = $cuaHang AND hd_ma=cthd_mahoadon AND hd_makhachhang=kh_ma AND cthd_trangthai=2
	GROUP BY cthd_mahoadon";
	return $conn->query($sql);
}
function danhSachDonHangBiHuy($cuaHang)
{
	$conn=connect();
	$sql = "SELECT kh_hoten,hd_ma,hd_trangthai,hd_ngaydat, SUM(cthd_soluong*cthd_dongia) as tongtien
	FROM
	hoadon,
	chitiethoadon,
	khachhang
	WHERE
	hd_cuahang = $cuaHang AND hd_ma=cthd_mahoadon AND hd_makhachhang=kh_ma
	AND hd_trangthai=4
	GROUP BY cthd_mahoadon";
	return $conn->query($sql);
}

function donHangDangGiao($maDH,$maCuaHang)
{
	$conn=connect();
	$sql="UPDATE chitiethoadon
	SET cthd_trangthai=2
	WHERE cthd_trangthai=1 AND cthd_mahoadon=$maDH AND cthd_macuahang=$maCuaHang";
	if($conn->query($sql)===true)
	{
		echo "<script>alert('Thành Công: Xác Nhận Đơn Hàng');</script>";
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

function thongTinKhachHang($maDH,$cuaHang)
{
	$conn=connect();
	$sql = "SELECT
	SUM(cthd_soluong * cthd_dongia) AS tongtien,
	kh_hoten,
	hd_ma,
	kh_ma,
	hd_diachigiaohang,
	kh_email,
	kh_sdt,
	cthd_trangthai,
	hd_diachigiaohang,
	hd_ngaydat,
	tp_t_ten,
	tp_t_loai,
	q_h_ten,
	q_h_loai
	FROM
	hoadon,
	chitiethoadon,
	khachhang,
	thanhpho_tinh,
	quan_huyen
	WHERE
	hd_ma = $maDH AND cthd_macuahang = $cuaHang AND
	hd_makhachhang = kh_ma AND cthd_mahoadon = hd_ma AND hd_thanhpho_tinh=tp_t_ma AND hd_quan_huyen=q_h_ma
	GROUP BY cthd_mahoadon,cthd_trangthai";
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

function capNhatTrangThaiHoaDon($maDH)
{
	$conn=connect();
	$sql1 = "SELECT count(cthd_trangthai) as demTR
	FROM chitiethoadon,sanpham,cuahang
	WHERE cthd_trangthai=1 AND sp_ma=cthd_masanpham AND ch_ma=cthd_macuahang AND cthd_mahoadon=$maDH";
	$re1=$conn->query($sql1);
	$r1=$re1->fetch_assoc();

	// $sql2="SELECT count(cthd_trangthai) as demSP FROM chitiethoadon WHERE cthd_mahoadon=$maDH";
	// $re2=$conn->query($sql2);
	// $r2=$re2->fetch_assoc();
	if($r1['demTR']<=0)
	{
		$sql="UPDATE hoadon
		SET hd_trangthai=3
		WHERE hd_ma=$maDH";
		$conn->query($sql);
	}


}

?>