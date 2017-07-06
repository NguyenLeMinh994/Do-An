<?php  
require_once "../config/connectionstring.php";

function themslide($files)
{
	$conn=connect();
	$path_hinh=uploadimage($files);
	if($path_hinh!=false)
	{
		$sql="INSERT INTO slide(sl_duongdan,sl_trangthai) 
		VALUES ('$path_hinh','1')";


		if($conn->query($sql)==true)
		{
			echo "<script>alert('Thêm thành công');</script>";
		} 
	}
	else
	{
		echo "<script>alert('Vui lòng chọn hình');</script>";
	}
}

function uploadimage($files)
{
	if(!empty($files['name']))
	{
		$date=date('d-m-Y-H-i-s');
		$newName=$date.'-slide'.'.'.pathinfo($files["name"],PATHINFO_EXTENSION);
		$target_dir = "/public/upload/slide/";
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
//-------------------------------------------------------------------
function capNhatSlide($maSL,$file)
{
	$conn=connect();
	$path_hinh=uploadimage($file);
	if($path_hinh!=false)
	{
		$sql="UPDATE slide
		SET sl_duongdan='$path_hinh'
		WHERE sl_ma=$maSL";
		if($conn->query($sql)==true)
		{
			echo '<script>alert("Cập Nhật Thành Công");</script>';
		}
	}
	else
	{
		echo "<script>alert('Vui lòng chọn hình');</script>";
	}
	
}
//--------------------------------------------------------------------
function danhSachSlide()
{
	$conn=connect();
	$sql="SELECT * FROM slide
	WHERE sl_trangthai=1";
	return $conn->query($sql);
}
function andanhSachSlide()
{
	$conn=connect();
	$sql="SELECT * FROM slide
	WHERE sl_trangthai=2";
	return $conn->query($sql);
}
function anSlide($maSL)
{
	$conn=connect();
	$sql="UPDATE slide
	SET sl_trangthai=2
	WHERE sl_ma=$maSL";
	if($conn->query($sql)==true)
	{
		echo '<script>alert("Ẩn hình thành công");</script>';
	}
}
function HienSlide($maSL)
{
	$conn=connect();
	$sql="UPDATE slide
	SET sl_trangthai=1
	WHERE sl_ma=$maSL";
	if($conn->query($sql)==true)
	{
		echo '<script>alert("Khôi phục hình thành công");</script>';
	}
}

function layHinhTheoId($maslide)
{
	$conn=connect();
	$sql="SELECT * FROM slide
	WHERE sl_ma=$maslide";
	return $conn->query($sql);
}
?>