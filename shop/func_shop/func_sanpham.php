<?php 
require_once "../config/connectionstring.php";
function uploadimage($files,$tenSP)
{
	if(!empty($files['name']))
	{
		$date=date('d-m-Y-H-i-s');
		$newName=$date.'-'.$tenSP.'.'.pathinfo($files["name"],PATHINFO_EXTENSION);
		$target_dir = "/public/upload/danhmuc/";
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
//------------------------------------------------
function path_hinh($files,$tenSP)
{
	if(!empty($files['name']))
	{
		$date=date('d-m-Y-H-i-s');
		$newName=$date.'-'.$tenSP.'.'.pathinfo($files["name"],PATHINFO_EXTENSION);
		$target_dir = "/public/upload/img/";
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
//---------------------------------------------------------------------------
function chenHinhSanPham($files,$idSP)
{
	$conn=connect();
	$sql="SELECT *
	FROM sanpham
	WHERE sp_ma=$idSP";
	$result=$conn->query($sql);

	if($result->num_rows > 0)
	{	
		$r_sp=$result->fetch_assoc();
		$tenkhongdau=to_slug($r_sp['sp_ten']);
		$path_hinh=path_hinh($files,$tenkhongdau);

		if($path_hinh!=false)
		{
			$sql="INSERT INTO hinhanh(hinh_masanpham,hinh_duongdanhinh,hinh_trangthai) 
			VALUES($idSP,'$path_hinh',1)";
			return $conn->query($sql);
		}
		else
		{
			echo '<script>alert("Upload hình thất bại");</script>';
		}
	}
}
//---------------------------------------------------------------------------
function layDanhMuc()
{
	$conn=connect();
	$sql="SELECT *
	FROM danhmuc
	WHERE dm_trangthai=1";
	return $conn->query($sql);
}
//---------------------------------------------------------------------------
function danhSachHinh($idSP)
{
	$conn=connect();
	$sql="SELECT *
	FROM hinhanh
	WHERE hinh_masanpham=$idSP
	AND hinh_trangthai=1";
	return $conn->query($sql);
}
function danhSachHinhBiAn($idSP)
{
	$conn=connect();
	$sql="SELECT *
	FROM hinhanh
	WHERE hinh_masanpham=$idSP
	AND hinh_trangthai=2";
	return $conn->query($sql);
}
//---------------------------------------------------------------------------
function themSanPham($files,$noiDung,$tenSP,$loaiSP,$hsx,$ncc,$donGia,$tomTat,$cauHinh,$cuaHang,$danhmuc)
{	
	$conn=connect();
	//chuyễn đổi chuỗi html
	$nd=$conn->real_escape_string($noiDung);
	$cauhinh=$conn->real_escape_string($cauHinh);
	$tomtat=$conn->real_escape_string($tomTat);

	$date=date("Y-m-d");

	$tenkhongdau=to_slug($tenSP);

	$path_Hinh=uploadimage($files,$tenkhongdau);

	$dongia=formatNumber($donGia);
	if($path_Hinh==false)
	{
		echo '<script type="text/javascript">alert("Upload hình lên server thất bại");</script>';
	}
	else
	{
		
		$sql="INSERT INTO sanpham(sp_macuahang,sp_loaisanpham,sp_hangsanxuat,sp_nhacungcap,sp_ten,sp_tenkhongdau,sp_hinh1,sp_noidung,sp_soluong,sp_dongia,sp_luotxem,sp_ngaydang,sp_trangthai,sp_cauhinh,sp_tomtat,sp_danhmuc)
		VALUES ($cuaHang,$loaiSP,$hsx,$ncc,'$tenSP','$tenkhongdau','$path_Hinh','$nd',1,$dongia,0,'$date',1,'$cauhinh','$tomtat',$danhmuc)
		";
		if ($conn->query($sql) === TRUE) 
		{	
			echo '<script>alert("Thêm Sản Phẩm Thành Công");</script>';
		} 
		else 
		{
			echo '<script>alert("Thêm Sản Phẩm Thất Bại");</script>';
		}
	}
}
//-----------------------------------------------------------------
function formatNumber($donGia)
{
	$tien=$donGia;
	$arr=explode(",",$tien);
	$strSo="";
	foreach($arr as $val)
	{
		$strSo.=$val;
	}
	$iSo=(double)$strSo;
	return $iSo;
}
// ----------------------------------------------------------------
function capNhatSanPham($idSP,$danhmuc,$noiDung,$tenSP,$loaiSP,$hsx,$ncc,$donGia,$tomTat,$cauHinh)
{
	//sp_danhmuc=$danhmuc,
	$conn=connect();
	$nd=$conn->real_escape_string($noiDung);
	$ch=$conn->real_escape_string($cauHinh);
	$tt=$conn->real_escape_string($tomTat);
	$dongia=formatNumber($donGia);
	$date=date("Y-m-d");
	$tenkhongdau=to_slug($tenSP);
	$sql="UPDATE sanpham
	SET sp_ten='$tenSP',
	sp_tenkhongdau='$tenkhongdau',
	sp_noidung='$nd',
	sp_dongia=$dongia,
	sp_nhacungcap=$ncc,
	sp_danhmuc=$danhmuc,
	sp_loaisanpham=$loaiSP,
	sp_tomtat='$tt',
	sp_hangsanxuat=$hsx,
	sp_cauhinh='$ch'
	WHERE sp_ma=$idSP";

	if($conn->query($sql)===true)
	{
		echo '<script>alert("Cập Nhật Sản Phẩm Thành Công");</script>';
	}
	else
	{
		echo '<script>alert("Cập Nhật Sản Phẩm Thất Bại");</script>';
	}
}
function capNhatHinh($idSP,$tenSP,$files)
{
	$conn=connect();
	$path_Hinh=uploadimage($files,$tenSP);
	if($path_Hinh==false)
	{
		echo '<script>alert("Upload hình lên server thất bại");</script>';
		return false;
	}
	else
	{
		$sql="UPDATE sanpham
		SET sp_hinh1='$path_Hinh'
		WHERE sp_ma=$idSP";
		return $conn->query($sql);
	}
}
// -----------------------------------------------------------------

function laySanPhamTheoID($idSP)
{
	$conn=connect();
	$sql="SELECT * 
	FROM sanpham
	WHERE sp_ma=$idSP";
	return $conn->query($sql);
}
// -----------------------------------------------------------------
function layDanhSachLoai()
{
	$conn=connect();
	$sql="SELECT * 
	FROM loaisanpham
	WHERE lsp_trangthai=1";
	return $conn->query($sql);
}

function layDanhSachHang()
{
	$conn=connect();
	$sql="SELECT * 
	FROM hangsanxuat
	WHERE hsx_trangthai=1";
	return $conn->query($sql);	
}

function layDanhSachCungCap($cuaHang)
{
	$conn=connect();
	$sql="SELECT * 
	FROM nhacungcap
	WHERE ncc_macuahang=$cuaHang AND ncc_trangthai=1";
	return $conn->query($sql);
}

function danhSachSanPham($cuaHang)
{
	$conn=connect();
	$sql="SELECT * 
	FROM sanpham,loaisanpham,hangsanxuat,nhacungcap
	WHERE (sp_loaisanpham=lsp_ma AND sp_hangsanxuat=hsx_ma AND sp_nhacungcap=ncc_ma) AND sp_macuahang=$cuaHang AND sp_trangthai=1";
	return $conn->query($sql);
}

function xoaSanPham($maSP)
{
	$conn=connect();
	$sql="UPDATE sanpham
	SET sp_trangthai=2
	WHERE sp_ma=$maSP";
	return $conn->query($sql);
}

function danhSachSanPhamBiHuy($cuaHang)
{
	$conn=connect();
	$sql="SELECT * 
	FROM sanpham,loaisanpham,hangsanxuat,nhacungcap
	WHERE (sp_loaisanpham=lsp_ma AND sp_hangsanxuat=hsx_ma AND sp_nhacungcap=ncc_ma) AND sp_macuahang=$cuaHang AND sp_trangthai=2";
	return $conn->query($sql);
}

function khoiPhucSanPham($maSP)
{
	$conn=connect();
	$sql="UPDATE sanpham
	SET 
	sp_trangthai=1
	WHERE 
	sp_ma=$maSP";
	return $conn->query($sql);
}
//---------------------------------------------------------------------	
function anHinh($idHinh)
{
	$conn=connect();
	$sql="UPDATE hinhanh
	SET 
	hinh_trangthai=2
	WHERE 
	hinh_ma=$idHinh";
	if($conn->query($sql)==true)
	{
		echo '<script>alert("Ẩn Hình Thành Công");</script>';
	}
}
function hienHinh($idHinh)
{
	$conn=connect();
	$sql="UPDATE hinhanh
	SET 
	hinh_trangthai=1
	WHERE 
	hinh_ma=$idHinh";
	if($conn->query($sql)==true)
	{
		echo '<script>alert("Hiện Hình Thành Công");</script>';
	}
}
//---------------------------------------------------------------------
function capNhatDanhSachHinh($idHinh,$idSP,$file)
{
	$conn=connect();
	$sql="SELECT count(*)+1 as dem FROM hinhanh WHERE hinh_masanpham=$idSP";
	$result=$conn->query($sql);
	$r_dem=$result->fetch_assoc();
	$hinh=path_hinh($file,$r_dem['dem']);
	if($hinh!=false)
	{
		$sql="UPDATE hinhanh
		SET 
		hinh_duongdanhinh='$hinh'
		WHERE 
		hinh_ma=$idHinh";
		return $conn->query($sql);
		
	}

}
function showHinh($idHinh)
{
	$conn=connect();
	$sql="SELECT * FROM hinhanh,sanpham WHERE hinh_masanpham=sp_ma AND hinh_ma=$idHinh";
	return $conn->query($sql);
}

//----------------------------------------------------------------------
function capNhatConHang($maSP)
{
	$conn=connect();
	$sql="UPDATE sanpham
	SET sp_soluong=1
	WHERE sp_ma=$maSP";
	if($conn->query($sql)==true)
	{
		echo '<script>alert("Cập nhật trạng thái thành công");</script>';
	}
}
function capNhatHetHang($maSP)
{
	$conn=connect();
	$sql="UPDATE sanpham
	SET sp_soluong=0
	WHERE sp_ma=$maSP";
	if($conn->query($sql)==true)
	{
		echo '<script>alert("Cập nhật trạng thái thành công");</script>';
	}
}
function danhSachHangTonKho($cuaHang)
{
	$conn=connect();
	$sql="SELECT * 
	FROM sanpham,loaisanpham,hangsanxuat,nhacungcap
	WHERE (sp_loaisanpham=lsp_ma AND sp_hangsanxuat=hsx_ma AND sp_nhacungcap=ncc_ma) AND sp_macuahang=$cuaHang AND sp_trangthai=1";
	return $conn->query($sql);
}
?>