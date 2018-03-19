<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ADMIN | DASHBOARD</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <?php include "../../include/include-topbar.php"; ?>
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <?php include "../../include/include-leftbar.php"; ?>
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <?php include "../../include/include-rightbar.php"; ?>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <div class="row">
                <?php
                    $sql = "SELECT * FROM tbl_user WHERE access = 'customer'";
                    $result = $conn->query($sql);
                    $customer_count = mysqli_num_rows($result);

                    $sql = "SELECT * FROM tbl_user WHERE access = 'employee'";
                    $result = $conn->query($sql);
                    $employee_count = mysqli_num_rows($result);

                    $sql = "SELECT * FROM tbl_product";
                    $result = $conn->query($sql);
                    $product_count = mysqli_num_rows($result);
                    if($user_type == 'Employee'){
                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-light-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">people</i>
                            </div>
                            <div class="content">
                                <div class="text">CUSTOMERS</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $customer_count; ?>" data-speed="1500" data-fresh-interval="20"><?php echo $customer_count; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-yellow hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">card_giftcard</i>
                            </div>
                            <div class="content">
                                <div class="text">PRODUCTS</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $product_count; ?>" data-speed="1500" data-fresh-interval="20"><?php echo $product_count; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-red hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">monetization_on</i>
                            </div>
                            <div class="content">
                                <div class="text">PROFIT</div>
                                <div class="number count-to" data-from="0" data-to="257" data-speed="1500" data-fresh-interval="20">257</div>
                            </div>
                        </div>
                    </div>
                <?php
                    }else{                        
                ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-light-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">people</i>
                            </div>
                            <div class="content">
                                <div class="text">CUSTOMERS</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $customer_count; ?>" data-speed="1500" data-fresh-interval="20"><?php echo $customer_count; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-yellow hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">card_giftcard</i>
                            </div>
                            <div class="content">
                                <div class="text">PRODUCTS</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $product_count; ?>" data-speed="1500" data-fresh-interval="20"><?php echo $product_count; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-blue hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">person_add</i>
                            </div>
                            <div class="content">
                                <div class="text">EMPLOYEES</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $employee_count; ?>" data-speed="1500" data-fresh-interval="20"><?php echo $employee_count; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-red hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">monetization_on</i>
                            </div>
                            <div class="content">
                                <div class="text">PROFIT</div>
                                <div class="number count-to" data-from="0" data-to="257" data-speed="1500" data-fresh-interval="20">257</div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../../assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../assets/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../../assets/js/demo.js"></script>
</body>

</html>