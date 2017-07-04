<?php
require_once "../config/connectionstring.php";
	function uploadimage($files,$tenHSX)
	{
		if(!empty($files['name']))
		{

			$date=date('d-m-Y-H-i-s');
			$newName=$date.'-'.$tenHSX.'-logo'.'.'.pathinfo($files["name"],PATHINFO_EXTENSION);
			$target_dir = "/public/upload/logo_hangsanxuat/";
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
	//-----------------------------------------------------------------
	function themHang($tenHang,$noiDung,$file)
	{
		$conn=connect();
		
		if($tenHang!="")
		{
			$ngayHienTai=date("Y-m-d");
			$tenKhongDau=to_slug($tenHang);
			$path_hinh=uploadimage($file,$tenKhongDau);
			$nd=$conn->real_escape_string($noiDung);
			if($path_hinh!=false)
			{

				$sql="insert into hangsanxuat
				(hsx_ten,hsx_tenkhongdau,hsx_ngaycapnhat,hsx_logo,hsx_gioithieu,hsx_trangthai)
				values('$tenHang', '$tenKhongDau', '$ngayHienTai','$path_hinh','$nd', 1)";
				// var_dump($sql);
				if ($conn->query($sql) === TRUE) 
				{
					echo "<script>alert('Thêm thành công')</script>";
				} 
				else 
				{
					echo "<script>alert('Thêm thất bại')</script>";
				}
			}
			else 
			{
				echo "<script>alert('Upload Hình Thất Bại')</script>";
			}
			
		}
		else
			 echo "<script>alert('Thêm thất bại')</script>";
		
	}

	function danhSachHang()
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  hangsanxuat
				WHERE
				  hsx_trangthai = 1";
		return $conn->query($sql);
	}
	function danhSachHangBiHuy()
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  hangsanxuat
				WHERE
				  hsx_trangthai = 2";
		return $conn->query($sql);
	}
	function huyHang($maHang)
	{
		$conn=connect();
		$sql="UPDATE
				  hangsanxuat
				SET 
				  hsx_trangthai = 2
				WHERE
				  hsx_ma=$maHang";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Hủy hãng thành công')</script>";
		}
		else
			echo "<script>alert('Hủy hãng thất bại')</script>";
	}
	function khoiPhucHang($maHang)
	{
		$conn=connect();
		$sql="UPDATE
				  hangsanxuat
				SET 
				  hsx_trangthai = 1
				WHERE
				  hsx_ma=$maHang";
		if($conn->query($sql)===true)
		{
			 echo "<script>alert('Khôi phục hãng thành công')</script>";
		}
	}
	function capNhatHang($maHang,$tenHang,$noiDung)
	{
		$conn=connect();
		if($tenHang!="")
		{
			$ngayHienTai=date("Y-m-d");
			$tenkhongdau=to_slug($tenHang);
			$nd=$conn->real_escape_string($noiDung);
			$sql="UPDATE
					  hangsanxuat
					SET 
					  hsx_ten = '$tenHang',
					  hsx_tenkhongdau='$tenkhongdau',
					  hsx_ngaycapnhat='$ngayHienTai',
					  hsx_gioithieu='$nd'
					WHERE
					  hsx_ma=$maHang";
			// var_dump($sql);
			if($conn->query($sql)===true)
			{
				echo "<script>alert('Cập nhật thành công')</script>";
			}
			else
				echo "<script>alert('Cập nhật thất bại')</script>";	
		}
		else
			echo "<script>alert('Cập nhật thất bại')</script>";	
	}
	function capNhatHinh($maHang,$file)
	{
		$conn=connect();
		$sql="SELECT * 
		FROM hangsanxuat
		WHERE hsx_ma=$maHang";
		if($conn->query($sql)==true)
		{
			$re=$conn->query($sql);
			$r_hang=$re->fetch_assoc();

			$path_hinh=uploadimage($file,$r_hang['hsx_tenkhongdau']);
			if($path_hinh!=false)
			{
				$sql="UPDATE
				hangsanxuat
				SET 
				hsx_logo='$path_hinh'
				WHERE
				hsx_ma=$maHang";
				return $conn->query($sql);
			}
			else
			{
				return false;
			}
		}
		else
			return false;
		
	}
	function layHangTheoID($maHang)
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  hangsanxuat
				WHERE
				  hsx_ma = $maHang";
		return $conn->query($sql);
	}

?>


	

