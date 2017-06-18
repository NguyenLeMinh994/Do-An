<?php 
    session_start();
    if(!isset($_SESSION['NV']) || $_SESSION['NV']['ChucVu']!=2)
    {
        header("Location:dang-nhap.php");
    }
    $cuaHang=$_SESSION['NV']['CuaHang'];
 ?>