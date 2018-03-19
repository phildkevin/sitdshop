<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ADMIN | PRODUCTS</title>
    <!-- Favicon-->
    <link rel="icon" href="../../../assets/images/logo.jpg" type="image/x-icon">

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

    <link rel="stylesheet" type="text/css" href="../../../assets/datatables/datatables.min.css">

    <style type="text/css">
        
        .preview{

            border: 3px dashed #999999;
            height: 250px;
            width: 250px;
            padding: 4px;
        }

    </style>

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

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PRODUCTS</h2>
            </div>
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table id="producttable" class="display table  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead  class="thead-dark">
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Gross Cost</th>
                                    <th>Net Cost</th>
                                    <th>Initial QTY</th>
                                    <th>Quantity</th>
                                    <th>Sale Count</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
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

    <!-- Waves Effect Plugin Js -->
    <script src="../../assets/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../assets/js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../assets/js/demo.js"></script>
    <script src="../../../assets/datatables/datatables.min.js"></script>

    <script src="../../../assets/js/sitdshop.js"></script>
    <script src="../../../assets/js/sweetalert2.all.min.js"></script>

</body>

</html>

<script >

$(document).ready(function(){
    $('input[type=text]').css({'border-bottom': "1px solid #999"});
    $('input[type=number]').css({'border-bottom': "1px solid #999"});

    loadProduct();

    var table = $('#producttable').dataTable();

    $('#producttable tbody').on( 'click', 'tr', function () {
          if ( $(this).hasClass('selected') ) {
              $(this).removeClass('selected');
               
               product = '';
          }
          else {
              table.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
               $('#deletereservation').removeAttr('disabled');          
               product = $(this).attr('id').substr(3);


               
          }
      } );

        $('#button').click( function () {
            table.row('.selected').remove().draw( false );
        } );

    } );

    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#imgprev').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#productimage").change(function() {
      readURL(this);
    });
</script>


