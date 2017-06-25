<?php 

require "../config/connectionstring.php";
	
	function themHang($tenHang="")
	{
		$conn=connect();
		
		if($tenHang!="")
		{
			$ngayHienTai=date("Y-m-d");
			$tenKhongDau=to_slug($tenHang);
			$sql="insert into hangsanxuat
				(hsx_ten,hsx_tenkhongdau,hsx_ngaycapnhat,hsx_trangthai)
				values('$tenHang', '$tenKhongDau', '$ngayHienTai', 1)";
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
	function capNhatHang($maHang,$tenHang)
	{
		$conn=connect();
		if($tenHang!="")
		{
			$ngayHienTai=date("Y-m-d");
			$tenkhongdau=to_slug($tenHang);
			$sql="UPDATE
					  hangsanxuat
					SET 
					  hsx_ten = '$tenHang',
					  hsx_tenkhongdau='$tenkhongdau',
					  hsx_ngaycapnhat='$ngayHienTai'
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


	

