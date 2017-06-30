<?php 
require_once "../config/connectionstring.php";
function uploadimage($files,$tenSP)
{
	if(!empty($files['name']))
	{

		$date=date('d-m-Y');
		$newName=$date.'-'.$tenSP.'.'.pathinfo($files["name"],PATHINFO_EXTENSION);
		$target_dir = "/public/upload/img/";
		$path = $target_dir . basename($newName);
		$uploadOk = true;
		$size=5*1024*1024;
		$imageFileType = pathinfo($path,PATHINFO_EXTENSION);
		$check = getimagesize($files["tmp_name"]);
		if($check == false)  
		{
			echo "<script>alert('Đây Không Phải Là File Hình');</script>";
			$uploadOk = false;
		}
		// Kiểm tra dung lượng
		if ($files["size"] > $size) 
		{
		    echo "<script>alert('Thất Bại: File Lớn Hơn 5MB');</script>";
		    $uploadOk = false;
		}
		// kiểm tra đuôi hình
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			echo '<script>alert("Kiểm tra lại đuôi hình ảnh");</script>';
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
				
				return false;
			}
		}
		else
			return $uploadOk;
	}
	else
		return false;
}
//------------------------------------------------
function path_hinh($files,$tenSP)
{
	if(!empty($files['name']))
	{
		$date=date('d-m-Y-H-i-s');
		$newName=$date.'-'.$tenSP.'.'.pathinfo($files["name"],PATHINFO_EXTENSION);
		$target_dir = "/public/upload/img/";
		$path = $target_dir . basename($newName);
		$uploadOk = true;
		$size=5*1024*1024;
		$imageFileType = pathinfo($path,PATHINFO_EXTENSION);
		$check = getimagesize($files["tmp_name"]);
		if($check == false)  
		{
			echo "<script>alert('Đây Không Phải Là File Hình');</script>";
			$uploadOk = false;
		}
		// Kiểm tra dung lượng
		if ($files["size"] > $size) 
		{
		    echo "<script>alert('Thất Bại: File Lớn Hơn 5MB');</script>";
		    $uploadOk = false;
		}
		// kiểm tra đuôi hình
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			echo '<script>alert("Kiểm tra lại đuôi hình ảnh");</script>';
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
				
				return false;
			}
		}
		else
			return $uploadOk;
	}
	else
		return false;
}
//---------------------------------------------------------------------------
function chenHinhSanPham($files,$idSP)
{
	$conn=connect();
	$sql="SELECT *
		FROM sanpham
		WHERE sp_ma=$idSP";
	$result=$conn->query($sql);

	if($result->num_rows > 0)
	{	
		$r_sp=$result->fetch_assoc();
		$tenkhongdau=to_slug($r_sp['sp_ten']);
		$path_hinh=path_hinh($files,$tenkhongdau);

		if($path_hinh!=false)
		{
			$sql="INSERT INTO hinhanh(hinh_masanpham,hinh_duongdanhinh,hinh_trangthai) 
			VALUES($idSP,'$path_hinh',1)";
			return $conn->query($sql);
		}
		else
		{
			echo '<script>alert("Upload hình thất bại");</script>';
		}
	}
}
//---------------------------------------------------------------------------
function danhSachHinh($idSP)
{
	$conn=connect();
	$sql="SELECT *
		FROM hinhanh
		WHERE hinh_masanpham=$idSP
		AND hinh_trangthai=1";
	return $conn->query($sql);
}
//---------------------------------------------------------------------------
function themSanPham($files,$noiDung,$tenSP,$loaiSP,$hsx,$ncc,$donGia,$soLuong,$cauHinh,$cuaHang)
{	
	$conn=connect();
	//chuyễn đổi chuỗi html
	$nd=$conn->real_escape_string($noiDung);
	$cauhinh=$conn->real_escape_string($cauHinh);
	$date=date("Y-m-d");
	$tenkhongdau=to_slug($tenSP);
	$path_Hinh=uploadimage($files,$tenkhongdau);
	if($path_Hinh==false)
	{
		echo '<script type="text/javascript">alert("Upload hình lên server thất bại");</script>';
	}
	else
	{
		$sql="INSERT INTO sanpham(sp_macuahang,sp_loaisanpham,sp_hangsanxuat,sp_nhacungcap,sp_ten,sp_tenkhongdau,sp_hinhdaidien,sp_noidung,sp_soluong,sp_dongia,sp_xemnhieunhat,sp_ngaydang,sp_trangthai,sp_cauhinh)
		VALUES ($cuaHang,$loaiSP,$hsx,$ncc,'$tenSP','$tenkhongdau','$path_Hinh','$nd',$soLuong,$donGia,0,'$date',1,'$cauhinh')
		";
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
}
// ----------------------------------------------------------------
function capNhatSanPham($idSP,$noiDung,$tenSP,$loaiSP,$hsx,$ncc,$donGia,$soLuong,$cauHinh)
{
	$conn=connect();
	$nd=$conn->real_escape_string($noiDung);
	$ch=$conn->real_escape_string($cauHinh);
	$date=date("Y-m-d");
	$tenkhongdau=to_slug($tenSP);
	$sql="UPDATE sanpham
		  SET sp_ten='$tenSP',
		  sp_tenkhongdau='$tenkhongdau',
		  sp_noidung='$nd',
		  sp_nhacungcap=$ncc,
		  sp_loaisanpham=$loaiSP,
		  sp_soluong=$soLuong,
		  sp_hangsanxuat=$hsx,
		  sp_cauhinh='$ch'
		  WHERE sp_ma=$idSP";

	if($conn->query($sql)===true)
	{
		echo '<script>alert("Cập Nhật Sản Phẩm Thành Công");</script>';
	}
	else
	{
		echo '<script>alert("Cập Nhật Sản Phẩm Thất Bại");</script>';
	}
}
function capNhatHinh($idSP,$tenSP,$files)
{
	$conn=connect();
	$path_Hinh=uploadimage($files,$tenSP);
	if($path_Hinh==false)
	{
		echo '<script>alert("Upload hình lên server thất bại");</script>';
		return false;
	}
	else
	{
		$sql="UPDATE sanpham
			  SET sp_hinhdaidien='$path_Hinh'
			  WHERE sp_ma=$idSP";
		return $conn->query($sql);
	}
}
// -----------------------------------------------------------------

function laySanPhamTheoID($idSP)
{
	$conn=connect();
	$sql="SELECT * 
		FROM sanpham
		WHERE sp_ma=$idSP";
	return $conn->query($sql);
}
// -----------------------------------------------------------------
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