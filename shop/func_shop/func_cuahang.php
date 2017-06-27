<?php 
require "../config/connectionstring.php";
function uploadHinhCuaHang($cuahang,$file)
{
	$conn=connect();
	$sql = "SELECT * 
			FROM cuahang
			WHERE ch_ma=$cuahang";
	$result = $conn->query($sql);
	
	if($result->num_rows >0)
	{
		$row_thongtin=$result->fetch_assoc();
		$tenkhongdau=to_slug($row_thongtin['ch_ten']);
		// đổi tên file hình
		$newName=$tenkhongdau.'.'.pathinfo($file["name"],PATHINFO_EXTENSION);
		$target_dir = "/public/upload/logo/";
		$target_file = $target_dir . basename($newName);
		$uploadOk = 1;
		$size=5*1024*1024;

		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// kiểm tra có phải là file hình hay ko
		$check = getimagesize($file["tmp_name"]);
		if($check == false)  
		{
			echo "<script>alert('Thất Bại: Đây Không Phải Là File Hình');</script>";
			$uploadOk = 0;
		}

		// Kiểm tra dung lượng
		if ($file["size"] > $size) 
		{
		    echo "<script>alert('Thất Bại: File Lớn Hơn 5MB');</script>";
		    $uploadOk = 0;
		}

		// Kiểm tra đuôi hình
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
		    echo "<script>alert('Thất Bại: Đây Không Phải File JPG, JPEG, PNG & GIF');</script>";
		    $uploadOk = 0;
		}

		if ($uploadOk == 1) 
		{
		   if (move_uploaded_file($file["tmp_name"], "..".$target_file)) 
		   {
		       $sql= "UPDATE cuahang
		       		SET ch_logo='$target_file'
		       		WHERE ch_ma=$cuahang";
		       	if($conn->query($sql)===true)
		       	{
		       		echo "<script>alert('Thành Công: Thay Đổi Hình');</script>";
		       	}
		   } 
		   else 
		   {
		       echo "<script>alert('Thất Bại: Không tìm thấy thư mục');</script>";
		   }
		
		} 
	}	
}

function thongTinCuaHang($cuaHang)
{
	$conn=connect();
	$sql = "SELECT * 
			FROM cuahang
			WHERE ch_ma=$cuaHang";
	return $conn->query($sql);
}
function capNhatThongTinCuaHang($cuaHang,$ten,$sdt)
{
	$conn=connect();
	$tenkhongdau=to_slug($ten);
	$sql = "UPDATE cuahang 
			SET ch_ten='$ten',ch_sdt='$sdt',ch_tenkhongdau='$tenkhongdau'
			WHERE ch_ma=$cuaHang";
	if($conn->query($sql)===true)
	{
		echo "<script>alert('Lưu Thông Tin Thành Công');</script>";
	}
	else
	{
		echo "<script>alert('Thất Bại: Kiểm Tra Lại Thông Tin');</script>";
	}
}
?>