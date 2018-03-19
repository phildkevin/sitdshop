<!DOCTYPE html>
<html>
<?php $user_type = 'Employee'; ?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>EMPLOYEE | TRANSACTION REVIEW</title>
    <!-- Favicon-->
    <link rel="icon" href="../../assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="../../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

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
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
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
<?php
    if(!isset($_GET['r'])){
?>
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-danger text-center">
                <h2>OH SNAP! PAGE NOT FOUND 404</h2>
            </div>
        </div>
    </section>
<?php
    }else{
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>TRANSACTION REVIEW</h2>
            </div>
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php
                                $sql = "SELECT * FROM tbl_order WHERE order_id = '".checkInput($_GET['r'])."'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();

                                $sql = "SELECT * FROM tbl_personal WHERE user_id = '".$row['user_id']."'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                echo $row['firstname']." ".$row['lastname'];
                            ?>
                            <small>
                                ORDER ID :
                                <b><span id="order-id"><?php echo checkInput($_GET['r']); ?></span></b>
                            </small>
                            <small>
                                INVOICE DATE : 
                                <?php
                                    $total = 0;
                                    $sql = "SELECT * FROM tbl_order WHERE order_id = '".checkInput($_GET['r'])."'";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    $date=date_create($row['date']);
                                    echo date_format($date,"l, F j, Y g:m A");
                                ?>
                            </small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="15%">Image</th>
                                        <th width="15%">Product ID</th>
                                        <th width="30%">Product Name</th>
                                        <th width="15%">Unit Price</th>
                                        <th width="10%">Item</th>
                                        <th width="15%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $product_id = explode(',', $row['product_id']);
                                        $quantity = explode(',', $row['quantity']);
                                        $count = count($product_id);
                                        for ($i=0; $i < $count; $i++) { 
                                            $sql_1 = "SELECT * FROM tbl_product WHERE product_id = '".$product_id[$i]."'";
                                            $result_1 = $conn->query($sql_1);
                                            while($row_1 = $result_1->fetch_assoc()){
                                                echo "<tr>
                                                    <td><img src='../../../".$row_1['image']."' class='thumbnail' width='100px'/></td>
                                                    <td>".$row_1['product_id']."</td>
                                                    <td>".$row_1['product name']."</td>
                                                    <td>&#8369 ".number_format((float)$row_1['net cost'], 2)."</td>
                                                    <td>x ".$quantity[$i]."</td>
                                                    <td align='right'>&#8369 ".number_format((float)$quantity[$i]*$row_1['net cost'], 2)."</td>
                                                </tr>";  
                                                $total = $total + ($quantity[$i]*$row_1['net cost']);
                                            }
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <?php
                                        echo "<tr>
                                                <td colspan='5' align='right'><b>Total Amount</b></td>
                                                <td align='right'>&#8369 ".number_format((float)$total, 2)."</td>
                                            </tr>";
                                    ?>
                                </tfoot>
                            </table>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        PAYMENT REVIEW
                                        <small>
                                            STATUS : 
                                            <?php
                                                $sql = "SELECT * FROM tbl_order WHERE order_id = '".checkInput($_GET['r'])."'";
                                                $result = $conn->query($sql);
                                                $row = $result->fetch_assoc();
                                                echo $row['status'];
                                            ?>
                                        </small>
                                    </h2>
                                </div>
                                <div class="body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="../images/user-img-background.jpg" width="100%">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Sent Date</b></td>
                                                            <td>
                                                                <?php 
                                                                    $date = date_create("2017-12-14 10:10:00");
                                                                    echo date_format($date,"l, F j, Y g:m A");
                                                                ?> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Remittance Center</b></td>
                                                            <td>LBC Nasugbu Batangas</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Amount Paid</b></td>
                                                            <td><?php echo "&#8369 ".number_format((float) 1000, 2); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div align="right">
                                        <?php
                                            $sql = "SELECT * FROM tbl_order WHERE order_id = '".checkInput($_GET['r'])."'";
                                            $result = $conn->query($sql);
                                            $row = $result->fetch_assoc();
                                            if($row['status'] == 'Closed'){

                                            }else{
                                                echo "<button type='button' class='btn btn-sm bg-green waves-effect' id='confirm-payment'>Confirm</button>
                                                <button type='button' class='btn btn-sm bg-orange waves-effect' id='hold-payment'>Hold</button>
                                                <button type='button' class='btn btn-sm bg-red waves-effect' id='decline-payment'>Decline</button>";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="btn-view-more">
                            <button class="btn bg-cyan waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="btn-view-more">
                                <like>VIEW MORE</like>
                            </button>
                        </div>
                        <div class="btn-view-less">
                            <button class="btn bg-cyan waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="btn-view-less">
                                <like>VIEW LESS</like>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    }
?>
    
    <!-- Jquery Core Js -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="../../assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="../../assets/js/pages/ui/dialogs.js"></script>

    <!-- Demo Js -->
    <script src="../../assets/js/demo.js"></script>

    <!-- SITDSHOP Js -->
    <script src="../../assets/js/sitdshop.js"></script>

</body>

</html>