<?php  
	require "../config/connectionstring.php";
	function danhSachNhaCungCap($cuaHang)
	{
		$conn=connect();
		$sql="SELECT *
			  FROM nhacungcap
			  WHERE ncc_macuahang=$cuaHang AND ncc_trangthai=1";
		return $conn->query($sql);
	}

	function danhSachNhaCungCapBiHuy($cuaHang)
	{
		$conn=connect();
		$sql="SELECT *
			  FROM nhacungcap
			  WHERE ncc_macuahang=$cuaHang AND ncc_trangthai=2";
		return $conn->query($sql);
	}
	function layNhaCungCapTheoID($maNCC)
	{
		$conn=connect();
		$sql="SELECT *
			  FROM nhacungcap
			  WHERE ncc_ma=$maNCC";
		return $conn->query($sql);
	}
	function huyNhaCungCap($maNCC)
	{
		$conn=connect();
		$sql="UPDATE nhacungcap
			  SET ncc_trangthai=2
			  WHERE ncc_ma=$maNCC";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Hủy Thành Công');</script>";
		}
	}

	function khoiPhucNhaCungCap($maNCC)
	{
		$conn=connect();
		$sql="UPDATE nhacungcap
			  SET ncc_trangthai=1
			  WHERE ncc_ma=$maNCC";
		if($conn->query($sql)===true)
		{
			echo "<script>alert('Khôi Phục Thành Công');</script>";
		}
	}

	//Thêm và Cập Nhật Nhà Cung Cấp
	function themNhaCungCap($cuaHang,$ten,$diachi,$sdt,$email)
	{
		$conn=connect();
		$date=date('Y-m-d');
		$tenkhongdau=to_slug($ten);
		$sql="INSERT INTO nhacungcap(ncc_ten,ncc_tenkhongdau,ncc_diachi,ncc_sdt,ncc_email,ncc_ngaycapnhat,ncc_macuahang,ncc_trangthai)
			  VALUES('$ten','$tenkhongdau','$diachi','$sdt','$email','$date',$cuaHang,1)";
		if($conn->query($sql)===true)
		{
			
		}
	}
	function capNhatNhaCungCap($maNCC,$ten,$diachi,$sdt,$email)
	{
		$conn=connect();
		$date=date('Y-m-d');
		$tenkhongdau=to_slug($ten);
		$sql="UPDATE nhacungcap
			  SET ncc_ten='$ten', ncc_diachi='$diachi',ncc_sdt='$sdt',ncc_email='$email',
			  ncc_ngaycapnhat='$date',ncc_tenkhongdau='$tenkhongdau'
			  WHERE ncc_ma=$maNCC";
		if($conn->query($sql)===true)
		{
			
		}
	}


?>