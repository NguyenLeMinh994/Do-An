<?php 
    require_once "func_shop/func_trangchu.php"; 
    $soLuongdonhang=soLuongDonHang($cuaHang)
?>
 <div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start active open">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start active open">
                        <a href="index.php" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Trang Chủ</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Quản Lý Sản Phẩm</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu"> 
                    <li class="nav-item  ">
                        <a href="danh-sach-san-pham.php" class="nav-link ">
                            <span class="title">Danh Sách Sản Phẩm
                            </span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="them-san-pham.php" class="nav-link ">
                            <span class="title">Thêm Sản Phẩm
                            </span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="khoi-phuc-san-pham.php" class="nav-link ">
                            <span class="title">Khôi Phục Sản Phẩm
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-diamond"></i>
                <span class="title">Quản Lý Nhà Cung Cấp</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu"> 
             <li class="nav-item ">
                <a href="them-nha-cung-cap.php" class="nav-link ">
                    <span class="title">Thêm Nhà Cung Cấp
                    </span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="danh-sach-nha-cung-cap.php" class="nav-link ">
                    <span class="title">Danh Sách Nhà Cung Cấp
                    </span>
                </a>
            </li>
             <li class="nav-item ">
                <a href="khoi-phuc-nha-cung-cap.php" class="nav-link ">
                    <span class="title">Khôi Phục Nhà Cung Cấp
                    </span>
                </a>
            </li>   
        </ul>
    </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-diamond"></i>
                <span class="title">Khuyến Mãi</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu"> 
               <li class="nav-item  ">
                <a href="tao-khuyen-mai.php" class="nav-link ">
                    <span class="title">Tạo Khuyến Mãi
                    </span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="danh-sach-khuyen-mai.php" class="nav-link ">
                    <span class="title">Danh Sách Khuyến Mãi
                    </span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="danh-sach-san-pham-khuyen-mai.php" class="nav-link ">
                    <span class="title">Danh Sách Sản Phẩm Khuyến Mãi
                    </span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="ket-thuc-khuyen-mai.php" class="nav-link ">
                    <span class="title">Kết Thúc Khuyến Mãi
                    </span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-puzzle"></i>
            <span class="title">Quản Lý Đơn Hàng</span>
            <span class="arrow"></span>
        </a>
        <!-- BEGIN -->
        <!-- END -->
        <ul class="sub-menu"> 
            <li class="nav-item  ">
                <a href="danh-sach-don-hang.php" class="nav-link ">
                    <span class="title">Danh Sách Đơn Hàng
                    </span>
                    <span class="badge badge-success"><?php echo $soLuongdonhang; ?></span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="khoi-phuc-don-hang.php" class="nav-link ">
                    <span class="title">Khôi Phục Đơn Hàng
                    </span>
                    
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Thống Kê</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu"> 
                 <li class="nav-item">
                    <a href="thong-ke-hang-ton.php" class="nav-link ">
                        <span class="title">Hàng Tồn Kho
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="thong-ke-san-pham.php" class="nav-link ">
                        <span class="title">Doanh Thu Sản Phẩm
                        </span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="doanh-thu-theo-nam.php" class="nav-link">
                        <span class="title">Doanh Thu Theo Năm
                        </span>
                    </a>
                </li>
            </ul>
        </li>
                        <!-- <li class="nav-item">
                            <a href="them-hang-san-xuat.html" class="nav-link ">
                                <i class="icon-puzzle"></i>
                                <span class="title">Quản Lý Hãng Sản Xuất</span>
                                <span class="selected"></span>
                            </a>
                        </li> -->
    </ul>
                    <!-- END SIDEBAR MENU -->
</div>
                <!-- END SIDEBAR -->
</div>