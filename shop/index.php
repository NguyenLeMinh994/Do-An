<?php 
    require "top.php";
    require "func_shop/func_trangchu.php";
    capNhatTrangThaiKhuyenMai();
    $soLuongKhuyenMai=demSoLuongKhuyenMai($cuaHang);
    $soluongdonhang=soLuongDonHang($cuaHang);
    $soluongsanpham=soLuongSanPham($cuaHang);
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
        <title>Trang Chủ</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for statistics, charts, recent events and reports" name="description" />
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
        <link href="../public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
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
       <?php require "header.php"; ?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
           <?php require "sidebar.php"; ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>
                            Trang Chủ Admin
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                       <!--  <li>
                            <span class="active">Trang Chủ </span>
                        </li> -->
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="danh-sach-san-pham.php">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $soluongsanpham; ?>"></span>
                                    </div>
                                    <div class="desc">Sản Phẩm</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="danh-sach-khuyen-mai.php">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $soLuongKhuyenMai; ?>"></span></div>
                                    <div class="desc">Khuyến Mãi</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="danh-sach-don-hang.php">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                    
                                        <span data-counter="counterup" data-value="<?php echo $soluongdonhang; ?>"></span>
                                    </div>
                                    <div class="desc"> Đơn Hàng </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> +
                                        <span data-counter="counterup" data-value="89"></span></div>
                                    <div class="desc"> Bình Luận </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Doanh Thu</span>
                                    </div>
                                    <div class="actions">
                                       
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="morris_chart_3" style="height:300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">
                                        Sản Phẩm
                                        </span>
                                    </div>
                                    <div class="actions">
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="morris_chart_4" style="height:300px;"></div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-8">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           
                            <!-- END EXAMPLE TABLE PORTLET-->
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>
                                        Danh Sách Sản Phẩm
                                    </div>
                                    <div class="actions">
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th> Tên </th>
                                                <th> Giá </th>
                                                <th>Loại</th>
                                                <th>Lượt xem</th>
                                                
                                            </tr>
                                        </thead>
                                       <!--  <tfoot>
                                            <tr>
                                                <th> Tên sản phẩm </th>
                                                <th> Hình </th>
                                                <th> Giá </th>
                                                <th> Loại Sản Phẩm</th>
                                                <th> Hãng Sản Xuất</th>
                                                <th> Trạng thái </th>
                                                <th> Thao Tác</th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                        <?php  
                                            $luotxem=LuotXem($cuaHang);
                                            while($r_view=$luotxem->fetch_assoc()){


                                        ?>
                                            <tr>
                                                <td><?php echo $r_view['sp_ten']; ?></td>
                                                <td><?php echo number_format($r_view['sp_dongia']);?> VNĐ</td>
                                                <td><?php echo $r_view['lsp_ten']; ?></td>
                                                <td><?php echo ($r_view['sp_luotxem']>0?$r_view['sp_luotxem']:'N/A'); ?></td>
                                            </tr>                                        
                                          <?php } ?>
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
           
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php require "footer.php"; ?>
        <!-- END FOOTER -->
        <!-- BEGIN QUICK NAV -->
     
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src=".../public/assets/global/plugins/respond.min.js"></script>
<script src=".../public/assets/global/plugins/excanvas.min.js"></script> 
<script src=".../public/assets/global/plugins/ie8.fix.min.js"></script> 
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
        <script src="../public/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="../public/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="../public/assets/pages/scripts/table-datatables-fixedheader.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../public/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <script src="../public/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../public/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../public/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../public/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../public/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">
            $(document).ready(function() {
                // PIE CHART
                new Morris.Donut({
                  element: 'morris_chart_4',
                  data: [
                <?php  
                    $soluong=soLuongLoaiSanPham($cuaHang);
                    while ($r_sl=$soluong->fetch_assoc()) {
                ?>
                    {label: "<?php echo $r_sl['lsp_ten']; ?>", 
                    value: <?php echo $r_sl['soluong']; ?>},
                <?php  } ?>
                  ]
                });

                // BAR CHART
                new Morris.Bar({
                  element: 'morris_chart_3',
                  data: [
                  <?php  
                    $doanhthucanam=thongKeCacNam($cuaHang);
                    while($r_nam=$doanhthucanam->fetch_assoc()){
                  ?>
                    { y: '<?php echo $r_nam['nam'] ?>', a:<?php echo $r_nam['tongtien']; ?>  },
                  <?php  
                    }
                  ?>
                  ],
                  xkey: 'y',
                  ykeys: ['a'],
                  labels: ['Lợi nhuận']
                });
            });
        </script>
    </body>

</html>
<?php 
    require "bottom.php";
?>