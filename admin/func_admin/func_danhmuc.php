<?php  
require_once "../config/connectionstring.php";
function danhSachDanhMuc()
{
	$conn=connect();
	$sql="SELECT *
	FROM
	danhmuc
	WHERE dm_trangthai=1";
	return $conn->query($sql);
}
function danhmuctheoid($maDM)
{
	$conn=connect();
	$sql="SELECT *
	FROM
	danhmuc
	WHERE dm_ma=$maDM";
	return $conn->query($sql);
}

function capNhatHinh($maDM,$ten,$file)
{
	$conn=connect();
	$tenkhongdau=to_slug($ten);
	$path_hinh=uploadimage($file,$tenkhongdau);
	$sql="UPDATE danhmuc
	SET dm_ten='$path_hinh'
	WHERE dm_ma=$maDM";
	return $conn->query($sql);
}

function capNhatDanhMuc($maDM,$ten,$gioithieu,$dm_cha)
{
	$conn=connect();
	$gt=$conn->real_escape_string($gioithieu);
	$sql="UPDATE danhmuc
	SET dm_ten='$ten',dm_gioithieu='$gt',dm_kethua=$dm_cha
	WHERE dm_ma=$maDM";
	if($conn->query($sql)===true)
	{
		echo "<script>alert('Cập nhật thành công');</script>";
	}
}

function danhSachAn()
{
	$conn=connect();
	$sql="SELECT *
	FROM
	danhmuc
	WHERE dm_trangthai=2";
	return $conn->query($sql);
}
function anDanhMuc($maDM)
{
	$conn=connect();
	$sql="UPDATE danhmuc
	SET dm_trangthai=2
	WHERE dm_ma=$maDM";
	if($conn->query($sql)===true)
	{
		echo "<script>alert('Ẩn danh mục thành công');</script>";
	}
}
function hienDanhMuc($maDM)
{
	$conn=connect();
	$sql="UPDATE danhmuc
	SET dm_trangthai=1
	WHERE dm_ma=$maDM";
	if($conn->query($sql)===true)
	{
		echo "<script>alert('Hiện danh mục thành công');</script>";
	}
}

function themDanhMuc($ten,$gioithieu,$file,$dm_cha)
{
	$conn=connect();
	$date=date('Y-m-d');
	$tenkhongdau=to_slug($ten);
	$gt=$conn->real_escape_string($gioithieu);
	$path_hinh=uploadimage($file,$tenkhongdau);
	if($path_hinh!=false)
	{
		$sql="INSERT INTO danhmuc(dm_ten,dm_tenkhongdau,dm_hinh,dm_ngaytao,dm_gioithieu,dm_kethua,dm_trangthai) 
		VALUES
		('$ten','$tenkhongdau','$path_hinh','$date','$gt',$dm_cha,1)";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Thêm thành công');</script>";
		}
	}
	
}

function uploadimage($files,$tenSP)
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
?>