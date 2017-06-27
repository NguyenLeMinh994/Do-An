<?php 
require "../config/connectionstring.php";
	// function capNhatTrangThaiSanPhamKhuyenMai()
	// {
	// 	$conn=connect();
	// 	$sql="
	// 		UPDATE
	// 		  sanpham,
	// 		  khuyenmai
	// 		SET 
	// 			sp_makhuyenmai=NULL
	// 		WHERE
	// 		  sp_makhuyenmai = km_ma And km_trangthai=2";

	// 	$conn->query($sql);
	// }
	// function capNhatTrangThaiKhuyenMai()
	// {
	// 	$conn=connect();
	// 	$sql = "UPDATE khuyenmai 
	// 		SET km_trangthai=2 
	// 		WHERE km_trangthai=1 
	// 		And km_ngayketthuc<CURDATE()";
	// 	if($conn->query($sql)===true)
	// 	{
	// 		capNhatTrangThaiSanPhamKhuyenMai();
	// 	}
	// }


	// function demSoLuongKhuyenMai($cuaHang)
	// {
	// 	$conn=connect();
	// 	$sql = "SELECT count(*) as soluong
	// 			FROM khuyenmai
	// 			WHERE 
	// 				km_trangthai=1 And km_magianhang=$cuaHang";
	// 	$result = $conn->query($sql);
	// 	$row=$result->fetch_assoc();
	// 	 mysqli_free_result($result);
	// 	return $row['soluong'];
	// }

	function taoKhuyenMai($tenKhuyenMai,$phanTram,$ngayBatDau,$ngayKetThuc,$cuaHang)
	{
		$conn=connect();
		$trangthai=2;
		$ngayBatDau=date("Y-m-d", strtotime($ngayBatDau));
		$ngayKetThuc=date("Y-m-d",strtotime($ngayKetThuc));
		$ngayHienTai=date("Y-m-d");

		// var_dump(strtotime($ngayBatDau));
		// var_dump(strtotime($ngayHienTai));
		// var_dump(strtotime($ngayKetThuc));
		if(strtotime($ngayKetThuc) >= strtotime($ngayHienTai))
		{
			$trangthai=1;
		}
		$sql="INSERT INTO khuyenmai(km_magianhang,km_tieude,km_hinhthuc_khuyenmai,km_ngaybatdau,km_ngayketthuc,km_trangthai)
				VALUES($cuaHang,'$tenKhuyenMai',$phanTram, '$ngayBatDau','$ngayKetThuc', $trangthai)";
		// var_dump($sql);
		$result=$conn->query($sql);
		if ($result=== true) 
		{
		    return true;
		} 
		else
			return false;
	}

	function danhSachKhuyenMai($cuaHang)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM khuyenmai
				WHERE km_trangthai=1 
				And km_magianhang=$cuaHang";
		return $conn->query($sql);
	}
	function ketThucKhuyenMai($cuaHang)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM khuyenmai
				WHERE 
					km_trangthai=2 And km_magianhang=$cuaHang";
		return $conn->query($sql);
	}

	function thongTinKhuyenMaiTheoMa($cuaHang,$maKhuyenMai)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM khuyenmai
				WHERE 
					km_ma=$maKhuyenMai And km_magianhang=$cuaHang";
		return $conn->query($sql);
	}
	function capNhatKhuyenMai($tenKhuyenMai,$phanTram,$ngayBatDau,$ngayKetThuc,$cuaHang,$maKhuyenMai)
	{
		$conn=connect();
		$trangthai=2;
		$ngayBatDau=date("Y-m-d", strtotime($ngayBatDau));
		$ngayKetThuc=date("Y-m-d",strtotime($ngayKetThuc));
		$ngayHienTai=date("Y-m-d");
		if(strtotime($ngayKetThuc) >= strtotime($ngayHienTai))
		{
			$trangthai=1;
		}
		$sql = "UPDATE khuyenmai 
				SET 
					km_trangthai=$trangthai, 
					km_tieude='$tenKhuyenMai', 
					km_hinhthuc_khuyenmai=$phanTram,
					km_ngaybatdau='$ngayBatDau', 
					km_ngayketthuc='$ngayKetThuc'
				WHERE 
					km_ma=$maKhuyenMai And km_magianhang=$cuaHang";
		return $conn->query($sql);
	}
	function huyKhuyenMai($cuaHang,$maKhuyenMai)
	{
		$conn=connect();
		$sql = "UPDATE khuyenmai 
				SET 
					km_trangthai=2 
				WHERE 
					km_ma=$maKhuyenMai And km_magianhang=$cuaHang";
		return $conn->query($sql);
	}

	function huySanPhamKhuyenMai($cuaHang,$maSanPham)
	{
		$conn=connect();
		$sql = "UPDATE sanpham 
				SET 
					sp_makhuyenmai=NULL 
				WHERE 
					sp_ma=$maSanPham And sp_macuahang=$cuaHang";
		return $conn->query($sql);
	}



	function danhSachSanPhamKhuyenMai($cuaHang)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM sanpham,khuyenmai
				WHERE sp_trangthai=1 And
				sp_makhuyenmai=km_ma And sp_macuahang=$cuaHang";
		return $conn->query($sql);
	}
	function danhSachSanPham($cuaHang)
	{
		$conn=connect();
		$sql = "SELECT * 
				FROM sanpham
				WHERE sp_makhuyenmai IS NULL And sp_trangthai=1 And sp_macuahang=$cuaHang";
		return $conn->query($sql);
	}
	function chonSanPhamKhuyenMai($maKhuyenMai,$maSanPham,$cuaHang)
	{
		$conn=connect();
		$sql = "UPDATE sanpham 
				SET 
					sp_makhuyenmai= $maKhuyenMai
				WHERE 
					sp_ma=$maSanPham And sp_macuahang=$cuaHang";
		return $conn->query($sql);
	}
	function layTenKhuyenMai($maKhuyenMai)
	{
		$conn=connect();
		$sql = "SELECT km_tieude 
				FROM 
					khuyenmai
				WHERE 
					km_ma=$maKhuyenMai";
		$result= $conn->query($sql);
		if($row_TenKhuyenMai = $result->fetch_assoc())
		{
			return $row_TenKhuyenMai['km_tieude'];
		}
	}
		
?>