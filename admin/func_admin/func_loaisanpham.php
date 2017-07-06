<?php 
	require "../config/connectionstring.php";
	function themLoaiSanPham($tenLoai,$laiXuat)
	{
		$conn=connect();
		if($tenLoai!="")
		{
			$ngayHienTai=date("Y-m-d");
			$tenKhongDau=to_slug($tenLoai);
			$sql="INSERT INTO loaisanpham
				(lsp_ten,lsp_tenkhongdau,lsp_ngaycapnhat,lsp_laixuat,lsp_trangthai)
				VALUES
				('$tenLoai', '$tenKhongDau', '$ngayHienTai',$laiXuat, 1)";
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

	function capNhatLoaiSanPham($maLoai,$tenLoai,$laiXuat)
	{
		$conn=connect();
		if($tenLoai!="")
		{
			$ngayHienTai=date("Y-m-d");
			$tenKhongDau=to_slug($tenLoai);
			$sql="UPDATE 
					loaisanpham
				SET	
					lsp_ten='$tenLoai',
					lsp_tenkhongdau='$tenKhongDau',
					lsp_ngaycapnhat='$ngayHienTai',
					lsp_laixuat=$laiXuat
				WHERE	
					lsp_ma=$maLoai";
			if ($conn->query($sql) === TRUE) 
			{
			   
			} 
			else 
			{
			   echo "<script>alert('Cập nhật thất bại')</script>";
			}
		}
		else
			echo "<script>alert('Cập Nhật thất bại')</script>";
	}

	function layLoaiTheoID($maLoai)
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  loaisanpham
				WHERE
				  lsp_ma = $maLoai";
		return $conn->query($sql);
	}

	function khoiPhucLoaiSP($maLoai)
	{
		$conn=connect();
		$sql="UPDATE
				  loaisanpham
				SET 
				  lsp_trangthai = 1
				WHERE
				  lsp_ma=$maLoai";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Khôi phục thành công')</script>";
		}
		else
			echo "<script>alert('Khôi phục thất bại')</script>";
	}
	function danhSachLoai()
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  loaisanpham
				WHERE
				  lsp_trangthai = 1";
		return $conn->query($sql);
	}
	function danhSachLoaiBiHuy()
	{
		$conn=connect();
		$sql="SELECT
				  *
				FROM
				  loaisanpham
				WHERE
				  lsp_trangthai = 2";
		return $conn->query($sql);
	}
	function huyLoai($maLoai)
	{
		$conn=connect();
		$sql="UPDATE
				  loaisanpham
				SET 
				  lsp_trangthai = 2
				WHERE
				  lsp_ma=$maLoai";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Hủy thành công')</script>";
		}
		else
			echo "<script>alert('Hủy thất bại')</script>";
	}
?>