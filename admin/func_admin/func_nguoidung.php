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
					Where nv_macuahang IS NULL 
					And (nv_tendangnhap='$tenDangNhap' And nv_matkhau='$matKhau')";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0)
			{
				$row_nhanVien = $result->fetch_assoc();
				$result->free_result();
				var_dump($result->free_result());
				$_SESSION['AD']['MaNhanVien']=$row_nhanVien['nv_ma'];
				$_SESSION['AD']['HoTen']=$row_nhanVien['nv_hoten'];
				$_SESSION['AD']['URL']=$row_nhanVien['nv_duongdanhinh'];
				$_SESSION['AD']['CuaHang']=$row_nhanVien['nv_macuahang'];
				$_SESSION['AD']['TrangThai']=$row_nhanVien['nv_trangthai'];
				$_SESSION['AD']['ChucVu']=$row_nhanVien['nv_machuvu'];
				if($_SESSION['AD']['ChucVu']!=1 && $_SESSION['AD']['CuaHang']=="")
				{	
					echo '<script type="text/javascript">alert("Kiểm Tra Quyền Truy Cập");</script>';
					$rt=false;
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
					Where nv_macuahang IS NULL 
					And (nv_tendangnhap='$tenDangNhap' And nv_email='$email')";
		$result = $conn->query($sql);
		if ($result->num_rows < 2)
		{
			$matKhauMoi2=md5($matKhauMoi);
			$sql="UPDATE nhanvien 
				SET nv_matkhau='$matKhauMoi2' 
				WHERE nv_macuahang IS NULL 
				And (nv_tendangnhap='$tenDangNhap' And nv_email='$email')";
			
			if ($conn->query($sql) === TRUE)
			{
				return kiemTraDangNhapCuaHang($tenDangNhap,$matKhauMoi);
				
			}	
		}
		return $rt;
	}

?>