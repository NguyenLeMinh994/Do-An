<?php 
    session_start();
    require "func_shop/func_nguoidung.php";

    if(isset($_POST['btnXacNhan']))
    {      
       if(nhapMatKhauMoi($_POST['txtEmail'],$_POST['txtPassword'])==true)
       {
            header("Location:dang-nhap.php");
       }
       else
       {
            echo "<script>alert('Thay Đổi Mật Khẩu Thất Bại')</script>";
       }
    }
    else
        if(isset($_SESSION['NV']))
        {
            header("Location:index.php");
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
        <title>Tạo Mật Khẩu Mới</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../public/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../public/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../public/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        </head>
    <!-- END HEAD -->

    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="../public/assets/pages/img/logo-big.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="#" method="post">
                <h3 class="form-title font-green">Tạo Mật Khẩu Mới</h3>
                <div class="alert alert-danger display-hide">

                    <button class="close" data-close="alert"></button>
                    <span> Kiểm tra lại.</span>
                </div>
                
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="txtEmail" /> 
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật Khẩu Mới" name="txtPassword" id="pass" />
                </div>
                 <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Nhập Lại Mật Khẩu" name="txtRePassword" />
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase" name="btnXacNhan">Xác Nhận</button>
                   
                    <a href="dang-nhap.php" id="back-btnd" class="btn green btn-outline pull-right"><< Trở Về</a>
                </div>
            
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <!-- END FORGOT PASSWORD FORM -->
         
        </div>
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
        <script src="../public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="../public/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../public/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- <script src="../public/assets/pages/scripts/login.min.js" type="text/javascript"></script> -->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".login-form").validate({
                    errorElement:"span",
                    errorClass:"help-block",
                    focusInvalid:!1,
                    rules:{
                        txtEmail:{
                            required:true,
                            email:true
                        },
                        txtPassword:{
                            required:true
                            
                        },
                        txtRePassword:{
                            equalTo:"#pass",
                            required:true
                        }
                    },
                    // message:{
                    //     email:{
                    //         required:"Email ."
                    //     }
                    // }
                    invalidHandler:function(e,r){
                        $(".alert-danger",$(".login-form")).show()
                    },
                    highlight:function(e){
                        $(e).closest(".form-group").addClass("has-error")
                    },
                    success:function(e){
                        e.closest(".form-group").removeClass("has-error"),e.remove()
                    },
                    errorPlacement:function(e,r){
                        e.insertAfter(r.closest(".input-icon"))
                    },
                    submitHandler:function(e){
                        e.submit()
                    }
                });
                // $(".login-form input").keypress(function(e){
                //     return 13==e.which?(
                //         $(".login-form")
                //         .validate()
                //         .form()&&
                //         $(".login-form").submit(),!1):void 0
                // });
            });
        </script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>
<?php 
    require "bottom.php";
 ?>