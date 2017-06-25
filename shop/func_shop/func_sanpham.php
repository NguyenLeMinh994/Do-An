<?php 
require "../config/connectionstring.php";
function uploadimage($files,$tenSP)
{
	$date=date('d-m-Y');
	$newName=$date.'-'.$tenSP.'.'.pathinfo($files["name"],PATHINFO_EXTENSION);

	$target_dir = "/public/upload/image/";
	$path = $target_dir . basename($newName);
	$uploadOk = true;

	$imageFileType = pathinfo($path,PATHINFO_EXTENSION);
	// kiểm tra đuôi hình
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
	{
		echo '<script>alert("Kiểm tra lại hình ảnh");</script>';
	    $uploadOk = false;
	}

	if ($uploadOk == true) 
	{
	   if (move_uploaded_file($files["tmp_name"], "..".$path)) 
		{
			
			return $path;
		} 
		else 
		{
			$uploadOk=false;
			return $uploadOk;
		}
	}
}
function themSanPham($files,$noiDung,$tenSP,$loaiSP,$hsx,$ncc,$donGia,$soLuong,$cuaHang)
{	
	$sql="";
	$conn=connect();
	//chuyễn đổi chuỗi html
	$nd=$conn->real_escape_string($noiDung);
	$date=date("Y-m-d");
	$tenkhongdau=to_slug($tenSP);
	$path_Hinh=uploadimage($files,$tenkhongdau);
	if($path_Hinh==false)
	{
		echo '<script type="text/javascript">alert("Upload hình lên server thất bại");</script>';
	}
	else
	{
		$sql="INSERT INTO sanpham(sp_macuahang,sp_loaisanpham,sp_hangsanxuat,sp_nhacungcap,sp_ten,sp_tenkhongdau,sp_hinhdaidien,sp_noidung,sp_soluong,sp_dongia,sp_xemnhieunhat,sp_ngaydang,sp_trangthai)
		VALUES ($cuaHang,$loaiSP,$hsx,$ncc,'$tenSP','$tenkhongdau','$path_Hinh','$nd',$soLuong,$donGia,0,'$date',1)
		";
	}
	
	if ($conn->query($sql) === TRUE) 
	{	
		
		$last_id = $conn->insert_id;
		$sql="INSERT INTO danhgia(dg_masanpham,dg_loai1,dg_loai2,dg_loai3,dg_loai4,dg_loai5)
			VALUES ($last_id,0,0,0,0,0)";
		if($conn->query($sql) === TRUE)
		{
			echo '<script>alert("Thêm Sản Phẩm Thành Công");</script>';
		}
		
	} 
	else 
	{
		echo '<script>alert("Thêm Sản Phẩm Thất Bại");</script>';
	}
}

function layDanhSachLoai()
{
	$conn=connect();
	$sql="SELECT * 
		FROM loaisanpham";
	return $conn->query($sql);
}

function layDanhSachHang()
{
	$conn=connect();
	$sql="SELECT * 
		FROM hangsanxuat";
	return $conn->query($sql);	
}

function layDanhSachCungCap($cuaHang)
{
	$conn=connect();
	$sql="SELECT * 
		FROM nhacungcap
		WHERE ncc_macuahang=$cuaHang";
	return $conn->query($sql);
}
function danhSachSanPham($cuaHang)
{
	$conn=connect();
	$sql="SELECT * 
		FROM sanpham,loaisanpham,hangsanxuat,nhacungcap
		WHERE (sp_loaisanpham=lsp_ma AND sp_hangsanxuat=hsx_ma AND sp_nhacungcap=ncc_ma) AND sp_macuahang=$cuaHang AND sp_trangthai=1";
	return $conn->query($sql);
}
function xoaSanPham($maSP)
{
	$conn=connect();
	$sql="UPDATE sanpham
		  SET sp_trangthai=2
		  WHERE sp_ma=$maSP";

	return $conn->query($sql);
}

function danhSachSanPhamBiHuy($cuaHang)
{
	$conn=connect();
	$sql="SELECT * 
		FROM sanpham,loaisanpham,hangsanxuat,nhacungcap
		WHERE (sp_loaisanpham=lsp_ma AND sp_hangsanxuat=hsx_ma AND sp_nhacungcap=ncc_ma) AND sp_macuahang=$cuaHang AND sp_trangthai=2";
	return $conn->query($sql);
}

function khoiPhucSanPham($maSP)
{
	$conn=connect();
	$sql="UPDATE sanpham
			SET 
				sp_trangthai=1
			WHERE 
				sp_ma=$maSP";
	return $conn->query($sql);
}
?>