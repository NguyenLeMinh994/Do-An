<?php 
require "top.php"; 
require "func_shop/func_donhang.php";
if(!isset($_GET['idHD']) && empty($_GET['idHD']))
{
    header('Location: danh-sach-don-hang.php');
}
else
    if(isset($_GET['idGiaoHang']) && !empty($_GET['idGiaoHang']))
    {
        donHangDangGiao($_GET['idGiaoHang'],$cuaHang);
        capNhatTrangThaiHoaDon($_GET['idGiaoHang'],$cuaHang);
    }
?>
        <!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Thông Tin Đơn Hàng</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #4 for rowreorder extension demos" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="../public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../public/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="../public/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="../public/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="../public/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN HEADER -->
        <?php require_once "header.php"; ?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php require_once "sidebar.php"; ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Quản Lý Đơn Hàng
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.php">Trang Chủ</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="danh-sach-don-hang.php">Danh Sách Đơn Hàng</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Đơn Hàng</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>
                                        Thông tin Khách Hàng
                                    </div>
                                    <div class="tools">
                                     <a href="javascript:;" class="collapse"> </a>
                                 </div>
                             </div>
                             <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <?php  
                                $thongtinkhachhang=thongTinKhachHang($_GET['idHD'],$cuaHang);
                                $r_khachhang=$thongtinkhachhang->fetch_assoc();

                                ?>
                                <form class="form-horizontal" role="form">
                                    <div class="form-body">
                                        <h2 class="margin-bottom-20"> Đơn Hàng  - <?php echo $r_khachhang['kh_hoten']; ?> </h2>
                                        <h3 class="form-section">Thông Tin</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Họ Tên:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $r_khachhang['kh_hoten']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $r_khachhang['kh_email'];?></p>
                                                </div>
                                            </div>
                                        </div>                      <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">SĐT:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $r_khachhang['kh_sdt'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->                            <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <h3 class="form-section">Địa Chỉ Giao Hàng</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Địa Chỉ:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $r_khachhang['hd_diachigiaohang']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Trạng Thái:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <?php  
                                                        if($r_khachhang['cthd_trangthai']==1)
                                                        {
                                                            echo '<span class="label label-info"> Chưa Chuyển </span>';
                                                        }
                                                        else
                                                        {
                                                            echo '<span class="label label-success"> Đã Chuyển </span>';
                                                        }
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"><?php echo $r_khachhang['tp_t_loai']; ?>:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $r_khachhang['tp_t_ten']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"><?php echo $r_khachhang['q_h_loai'];?>:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $r_khachhang['q_h_ten'];?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Số Hóa Đơn:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $r_khachhang['hd_ma'];?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Ngày Mua:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo date("d/m/Y",strtotime($r_khachhang['hd_ngaydat']));?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Tổng tiền:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo number_format($r_khachhang['tongtien']);?> VNĐ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->

                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <?php  
                                                        if($r_khachhang['cthd_trangthai']==1)
                                                        {
                                                            ?>
                                                            <a href="?idHD=<?php echo $_GET['idHD'].'&idGiaoHang='.$_GET['idHD']; ?>" class="btn blue">
                                                                <i class="fa fa-pencil"></i> Xác Nhận
                                                            </a>
                                                            <?php  
                                                        }
                                                        else
                                
                                                            ?>
                                                            <a href="danh-sach-don-hang.php" class="btn default">Trở Về</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Đơn Hàng
                                    </div>
                                    <div class="tools">
                                       <a href="javascript:;" class="collapse"> </a>
                                   </div>
                               </div>
                               <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                                    <thead>
                                        <tr>
                                            <th> Tên sản phẩm </th>
                                            <th> Hình </th>
                                            <th> Số lượng</th>
                                            <th> Đơn giá </th>
                                            <th> Thành tiền </th>
                                            <th> Trạng Thai </th>

                                        </tr>
                                    </thead>
                                     
                                        <tbody>
                                            <?php  
                                            $chitietdonhang=chiTietDonHang($_GET['idHD'],$cuaHang);
                                            while($r_sp=$chitietdonhang->fetch_assoc())
                                            {


                                                ?>
                                                <tr>
                                                    <td> <?php echo $r_sp['sp_ten']; ?> </td>
                                                    <td style="width: 30px;"> 
                                                     <img src="..<?php echo $r_sp['sp_hinh1']; ?>" class="img-rounded" alt="" style="width: 100px;">
                                                 </td>
                                                 <td> <?php echo $r_sp['cthd_soluong']; ?> </td>
                                                 <td> <?php echo number_format($r_sp['cthd_dongia']); ?> VNĐ</td>

                                                 <td>
                                                    <?php 
                                                    $thanhtien=(int)$r_sp['cthd_soluong']*(double)$r_sp['cthd_dongia'];
                                                    echo number_format($thanhtien) ;
                                                    ?>
                                                    VNĐ
                                                </td>
                                                <td>
                                                    <?php  
                                                        if($r_sp['cthd_trangthai']==1)
                                                        {
                                                            echo '<span class="label label-info"> Chưa Chuyển </span>';
                                                        }
                                                        else
                                                        {
                                                            echo '<span class="label label-success"> Đã Chuyển </span>';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php  
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
        <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
            <div class="page-quick-sidebar">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                            <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                            <span class="badge badge-success">7</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-bell"></i> Alerts </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-info"></i> Notifications </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-speech"></i> Activities </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                                <i class="icon-settings"></i> Settings </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                                        <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                            <h3 class="list-heading">Staff</h3>
                                            <ul class="media-list list-items">
                                                <li class="media">
                                                    <div class="media-status">
                                                        <span class="badge badge-success">8</span>
                                                    </div>
                                                    <img class="media-object" src="../public/assets/layouts/layout/img/avatar3.jpg" alt="...">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">Bob Nilson</h4>
                                                        <div class="media-heading-sub"> Project Manager </div>
                                                    </div>
                                                </li>
                                                <li class="media">
                                                    <img class="media-object" src="../public/assets/layouts/layout/img/avatar1.jpg" alt="...">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">Nick Larson</h4>
                                                        <div class="media-heading-sub"> Art Director </div>
                                                    </div>
                                                </li>
                                                <li class="media">
                                                    <div class="media-status">
                                                        <span class="badge badge-danger">3</span>
                                                    </div>
                                                    <img class="media-object" src="../public/assets/layouts/layout/img/avatar4.jpg" alt="...">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">Deon Hubert</h4>
                                                        <div class="media-heading-sub"> CTO </div>
                                                    </div>
                                                </li>
                                                <li class="media">
                                                    <img class="media-object" src="../public/assets/layouts/layout/img/avatar2.jpg" alt="...">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">Ella Wong</h4>
                                                        <div class="media-heading-sub"> CEO </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h3 class="list-heading">Customers</h3>
                                            <ul class="media-list list-items">
                                                <li class="media">
                                                    <div class="media-status">
                                                        <span class="badge badge-warning">2</span>
                                                    </div>
                                                    <img class="media-object" src="../public/assets/layouts/layout/img/avatar6.jpg" alt="...">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">Lara Kunis</h4>
                                                        <div class="media-heading-sub"> CEO, Loop Inc </div>
                                                        <div class="media-heading-small"> Last seen 03:10 AM </div>
                                                    </div>
                                                </li>
                                                <li class="media">
                                                    <div class="media-status">
                                                        <span class="label label-sm label-success">new</span>
                                                    </div>
                                                    <img class="media-object" src="../public/assets/layouts/layout/img/avatar7.jpg" alt="...">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">Ernie Kyllonen</h4>
                                                        <div class="media-heading-sub"> Project Manager,
                                                            <br> SmartBizz PTL </div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <img class="media-object" src="../public/assets/layouts/layout/img/avatar8.jpg" alt="...">
                                                        <div class="media-body">
                                                            <h4 class="media-heading">Lisa Stone</h4>
                                                            <div class="media-heading-sub"> CTO, Keort Inc </div>
                                                            <div class="media-heading-small"> Last seen 13:10 PM </div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <div class="media-status">
                                                            <span class="badge badge-success">7</span>
                                                        </div>
                                                        <img class="media-object" src="../public/assets/layouts/layout/img/avatar9.jpg" alt="...">
                                                        <div class="media-body">
                                                            <h4 class="media-heading">Deon Portalatin</h4>
                                                            <div class="media-heading-sub"> CFO, H&D LTD </div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <img class="media-object" src="../public/assets/layouts/layout/img/avatar10.jpg" alt="...">
                                                        <div class="media-body">
                                                            <h4 class="media-heading">Irina Savikova</h4>
                                                            <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <div class="media-status">
                                                            <span class="badge badge-danger">4</span>
                                                        </div>
                                                        <img class="media-object" src="../public/assets/layouts/layout/img/avatar11.jpg" alt="...">
                                                        <div class="media-body">
                                                            <h4 class="media-heading">Maria Gomez</h4>
                                                            <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="page-quick-sidebar-item">
                                                <div class="page-quick-sidebar-chat-user">
                                                    <div class="page-quick-sidebar-nav">
                                                        <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                                            <i class="icon-arrow-left"></i>Back</a>
                                                        </div>
                                                        <div class="page-quick-sidebar-chat-user-messages">
                                                            <div class="post out">
                                                                <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar3.jpg" />
                                                                <div class="message">
                                                                    <span class="arrow"></span>
                                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                                    <span class="datetime">20:15</span>
                                                                    <span class="body"> When could you send me the report ? </span>
                                                                </div>
                                                            </div>
                                                            <div class="post in">
                                                                <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar2.jpg" />
                                                                <div class="message">
                                                                    <span class="arrow"></span>
                                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                                    <span class="datetime">20:15</span>
                                                                    <span class="body"> Its almost done. I will be sending it shortly </span>
                                                                </div>
                                                            </div>
                                                            <div class="post out">
                                                                <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar3.jpg" />
                                                                <div class="message">
                                                                    <span class="arrow"></span>
                                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                                    <span class="datetime">20:15</span>
                                                                    <span class="body"> Alright. Thanks! :) </span>
                                                                </div>
                                                            </div>
                                                            <div class="post in">
                                                                <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar2.jpg" />
                                                                <div class="message">
                                                                    <span class="arrow"></span>
                                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                                    <span class="datetime">20:16</span>
                                                                    <span class="body"> You are most welcome. Sorry for the delay. </span>
                                                                </div>
                                                            </div>
                                                            <div class="post out">
                                                                <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar3.jpg" />
                                                                <div class="message">
                                                                    <span class="arrow"></span>
                                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                                    <span class="datetime">20:17</span>
                                                                    <span class="body"> No probs. Just take your time :) </span>
                                                                </div>
                                                            </div>
                                                            <div class="post in">
                                                                <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar2.jpg" />
                                                                <div class="message">
                                                                    <span class="arrow"></span>
                                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                                    <span class="datetime">20:40</span>
                                                                    <span class="body"> Alright. I just emailed it to you. </span>
                                                                </div>
                                                            </div>
                                                            <div class="post out">
                                                                <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar3.jpg" />
                                                                <div class="message">
                                                                    <span class="arrow"></span>
                                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                                    <span class="datetime">20:17</span>
                                                                    <span class="body"> Great! Thanks. Will check it right away. </span>
                                                                </div>
                                                            </div>
                                                            <div class="post in">
                                                                <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar2.jpg" />
                                                                <div class="message">
                                                                    <span class="arrow"></span>
                                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                                    <span class="datetime">20:40</span>
                                                                    <span class="body"> Please let me know if you have any comment. </span>
                                                                </div>
                                                            </div>
                                                            <div class="post out">
                                                                <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar3.jpg" />
                                                                <div class="message">
                                                                    <span class="arrow"></span>
                                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                                    <span class="datetime">20:17</span>
                                                                    <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="page-quick-sidebar-chat-user-form">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Type a message here...">
                                                                <div class="input-group-btn">
                                                                    <button type="button" class="btn green">
                                                                        <i class="icon-paper-clip"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                                                <div class="page-quick-sidebar-alerts-list">
                                                    <h3 class="list-heading">General</h3>
                                                    <ul class="feeds list-items">
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-check"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> You have 4 pending tasks.
                                                                            <span class="label label-sm label-warning "> Take action
                                                                                <i class="fa fa-share"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bar-chart-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> 20 mins </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-danger">
                                                                            <i class="fa fa-user"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 24 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received with
                                                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 30 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-user"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 24 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Web server hardware needs to be upgraded.
                                                                            <span class="label label-sm label-warning"> Overdue </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 2 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-default">
                                                                                <i class="fa fa-briefcase"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> 20 mins </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <h3 class="list-heading">System</h3>
                                                    <ul class="feeds list-items">
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-check"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> You have 4 pending tasks.
                                                                            <span class="label label-sm label-warning "> Take action
                                                                                <i class="fa fa-share"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-danger">
                                                                                <i class="fa fa-bar-chart-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> 20 mins </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-user"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 24 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received with
                                                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 30 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-user"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 24 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-warning">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Web server hardware needs to be upgraded.
                                                                            <span class="label label-sm label-default "> Overdue </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 2 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-info">
                                                                                <i class="fa fa-briefcase"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> 20 mins </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                                                <div class="page-quick-sidebar-settings-list">
                                                    <h3 class="list-heading">General Settings</h3>
                                                    <ul class="list-items borderless">
                                                        <li> Enable Notifications
                                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                                            <li> Allow Tracking
                                                                <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                                                <li> Log Errors
                                                                    <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                                                    <li> Auto Sumbit Issues
                                                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                                                        <li> Enable SMS Alerts
                                                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                                                        </ul>
                                                                        <h3 class="list-heading">System Settings</h3>
                                                                        <ul class="list-items borderless">
                                                                            <li> Security Level
                                                                                <select class="form-control input-inline input-sm input-small">
                                                                                    <option value="1">Normal</option>
                                                                                    <option value="2" selected>Medium</option>
                                                                                    <option value="e">High</option>
                                                                                </select>
                                                                            </li>
                                                                            <li> Failed Email Attempts
                                                                                <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                                                                <li> Secondary SMTP Port
                                                                                    <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                                                                    <li> Notify On System Error
                                                                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                                                                        <li> Notify On SMTP Error
                                                                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                                                                        </ul>
                                                                                        <div class="inner-content">
                                                                                            <button class="btn btn-success">
                                                                                                <i class="icon-settings"></i> Save Changes</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- END QUICK SIDEBAR -->
                                                                    </div>
                                                                    <!-- END CONTAINER -->
                                                                    <!-- BEGIN FOOTER -->
                                                                    <?php require_once "footer.php"; ?>
                                                                    <!-- END FOOTER -->
                                                                    <!-- BEGIN QUICK NAV -->
                                                                    <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="../public/assets/global/plugins/respond.min.js"></script>
<script src="../public/assets/global/plugins/excanvas.min.js"></script> 
<script src="../public/assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="../public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../public/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../public/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="../public/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="../public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../public/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../public/assets/pages/scripts/table-datatables-fixedheader.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../public/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="../public/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="../public/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="../public/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
<?php require_once "bottom.php"; ?>