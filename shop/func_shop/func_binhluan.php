<?php  
require_once "../config/connectionstring.php";
function danhSachBinhLuanChuaDuyet($cuaHang)
{
	$conn=connect();
	$sql = "SELECT * 
	FROM binhluan,sanpham,khachhang
	WHERE bl_masanpham=sp_ma AND bl_makhachhang=kh_ma AND bl_trangthai=1";
	return $conn->query($sql);
}

function danhSachBinhLuanDaDuyet($cuaHang)
{
	$conn=connect();
	$sql = "SELECT * 
	FROM binhluan,sanpham,khachhang
	WHERE bl_masanpham=sp_ma AND bl_makhachhang=kh_ma AND bl_trangthai=2";
	return $conn->query($sql);
}
function danhSachAnBinhLuan($cuaHang)
{
	$conn=connect();
	$sql = "SELECT * 
	FROM binhluan,sanpham,khachhang
	WHERE bl_masanpham=sp_ma AND bl_makhachhang=kh_ma AND bl_trangthai=3";
	return $conn->query($sql);
}
function layBinhLuanTheoId($maBinhLuan)
{
	$conn=connect();
	$sql = "SELECT bl_tieude,bl_noidung,sp_ten,kh_hoten
	FROM binhluan,sanpham,khachhang
	WHERE bl_masanpham=sp_ma AND bl_makhachhang=kh_ma AND bl_ma=$maBinhLuan";
	return $conn->query($sql);
}
//-------------------------------------------------------------------------------
function capNhatTrangThaiBinhLuan($mabl)
{
	$conn=connect();
	$sql = "UPDATE binhluan
	SET bl_trangthai=2
	WHERE bl_ma=$mabl AND bl_trangthai=1";
	if($conn->query($sql)==true)
	{
		echo "<script>alert('Duyệt bình luận thành công');</script>";
	}
}

function anBinhLuan($mabl)
{
	$conn=connect();
	$sql = "UPDATE binhluan
	SET bl_trangthai=3
	WHERE bl_ma=$mabl AND bl_trangthai=1";
	if($conn->query($sql)==true)
	{
		echo "<script>alert('Ẩn bình luận thành công');</script>";
	}
}
function khoiPhucBinhLuan($mabl)
{
	$conn=connect();
	$sql = "UPDATE binhluan
	SET bl_trangthai=1
	WHERE bl_ma=$mabl AND bl_trangthai=3";
	if($conn->query($sql)==true)
	{
		echo "<script>alert('Khôi phục bình luận thành công');</script>";
	}
}
?>