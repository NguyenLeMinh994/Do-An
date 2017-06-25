<?php 
    session_start();
    if(!isset($_SESSION['AD']) || $_SESSION['AD']['ChucVu']!=1)
    {
        header("Location:dang-nhap.php");
    }
 ?>