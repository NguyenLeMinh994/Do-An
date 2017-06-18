<?php 
require "../config/connectionstring.php";
	session_start();
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
				mysqli_free_result($result);
			}	
		}
		return $rt;
	}

?>