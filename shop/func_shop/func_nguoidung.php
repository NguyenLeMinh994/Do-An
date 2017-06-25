<?php 
	require "../config/connectionstring.php";
	function kiemTraDangNhapCuaHang($tenDangNhap,$matKhau)
	{
		$conn=connect();
		$rt=false;
		if($tenDangNhap!="" || $matKhau!="" )
		{
			$matKhau=md5($matKhau);
			$sql = "SELECT * FROM nhanvien 
					Where nv_macuahang IS NOT NULL 
					And (nv_tendangnhap='$tenDangNhap' And nv_matkhau='$matKhau')";
			$result = $conn->query($sql);
			if ($result->num_rows > 0)
			{
				$row_nhanVien = $result->fetch_assoc();
				mysqli_free_result($result);
				$_SESSION['NV']['MaNhanVien']=$row_nhanVien['nv_ma'];
				$_SESSION['NV']['HoTen']=$row_nhanVien['nv_hoten'];
				$_SESSION['NV']['URL']=$row_nhanVien['nv_duongdanhinh'];
				$_SESSION['NV']['CuaHang']=$row_nhanVien['nv_macuahang'];
				$_SESSION['NV']['TrangThai']=$row_nhanVien['nv_trangthai'];
				$_SESSION['NV']['ChucVu']=$row_nhanVien['nv_machuvu'];
				if($_SESSION['NV']['ChucVu']!=2 && $_SESSION['NV']['CuaHang']!="")
				{	
					echo '<script type="text/javascript">alert("Kiểm Tra Quyền Truy Cập");</script>';
				}
				else
				{
					$rt=true;
				}
				
			}
		}
		return $rt;
	}
	function quenMatKhau($tenDangNhap,$email,$matKhauMoi)
	{
		$conn=connect();
		$rt=false;
		$sql = "SELECT * FROM nhanvien 
					Where nv_macuahang IS NOT NULL 
					And (nv_tendangnhap='$tenDangNhap' And nv_email='$email')";
		$result = $conn->query($sql);
		if ($result->num_rows < 2)
		{
			$matKhauMoi2=md5($matKhauMoi);
			$sql="UPDATE nhanvien SET nv_matkhau='$matKhauMoi2' 
				WHERE nv_macuahang IS NOT NULL 
				And (nv_tendangnhap='$tenDangNhap' And nv_email='$email')";
			
			if ($conn->query($sql) === TRUE)
			{
				return kiemTraDangNhapCuaHang($tenDangNhap,$matKhauMoi);
				
			}	
		}
		return $rt;
	}

	function thongTinNguoiDung($maNV)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM nhanvien, chucvu
				WHERE nv_ma=$maNV AND nv_machuvu=cv_ma";
		return $conn->query($sql);
	}

	function luuThongTin($maNV,$hoTen,$email,$sdt)
	{
		$conn=connect();
		$sql = "UPDATE nhanvien 
				SET nv_hoten='$hoTen', nv_email='$email', nv_sdt='$sdt'
				WHERE nv_ma=$maNV";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Lưu Thông Tin Thành Công');</script>";
		}
		else
		{
			echo "<script>alert('Thất Bại: Kiểm Tra Lại Thông Tin');</script>";
		}

	}

	function thayDoiMatKhau($maNV,$matKhauCu,$matKhauMoi)
	{
		$conn=connect();
		$matkhaucu=md5($matKhauCu);
		$sql = "SELECT * 
				FROM nhanvien
				WHERE nv_ma=$maNV AND nv_matkhau='$matkhaucu'";

		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			$matkhaumoi=md5($matKhauMoi);
			$sql = "UPDATE nhanvien 
				SET nv_matkhau='$matkhaumoi'
				WHERE nv_ma=$maNV";
			if($conn->query($sql)==true)
			{
				echo "<script>alert('Thành Công: Cập Nhật Mật Khẩu Mới');</script>";
			}
			else
				echo "<script>alert('Thất Bại: Cập Nhật Mật Khẩu Mới');</script>";
		}
		else
		{
			echo "<script>alert('Thất Bại: Kiểm Tra Lại Mật Khẩu');</script>";
		}
	}

	function uploadHinh($maNV,$file)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM nhanvien
				WHERE nv_ma=$maNV";
		$result = $conn->query($sql);
		/*
		if($result->num_rows >0)
		{
			$row_thongtin=$result->fetch_assoc();
			$tenkhongdau=to_slug($row_thongtin['nv_hoten']);
			// đổi tên file hình
			$newName=$tenkhongdau.'.'.pathinfo($file["name"],PATHINFO_EXTENSION);
			$target_dir = "/public/upload/avatar/";
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
			       $sql= "UPDATE nhanvien
			       		SET nv_duongdanhinh='$target_file'
			       		WHERE nv_ma=$maNV";
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
		*/
		
		
	}

?>