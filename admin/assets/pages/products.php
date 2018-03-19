<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ADMIN | PRODUCTS</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

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

    <link rel="stylesheet" type="text/css" href="../../../assets/css/jquery-te.css">

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
   <!-- <div class="page-loader-wrapper">
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
    </div> -->
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
                    <div class="header">
                        <div align="right">
                            <input type="button" name="new" class="btn btn-info" value="New" data-toggle="modal" data-target="#largeModal" >
                            <input type="button" name="edit" class="btn bg-purple waves-effect" value="Edit" id="edit"  data-toggle="modal" data-target="#editModal"  disabled>
                            <input type="button" name="delete" class="btn btn-warning" value="Delete" id="delete" disabled>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="producttable" class="display table  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead  class="thead-dark">
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Gross Cost</th>
                                    <th>Net Cost</th>
                                    <th>Initial QTY</th>
                                    <th>Quantity</th>
                                    <th>Sale Count</th>
                                    <th>Date</th>
                                </thead>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </section>


    <!-- Large Size -->
    <form id="newproductform">
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">New Product <span class="pull-right col-pink" id="error"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="preview" id="preview">
                                            <img id="imgprev" src="#" height="238px" width="238px" alt="Product Image" />
                                        </div> <br>
                                        <input type="file" name="fileToUpload" id="productimage" class="form-control" accept="image/*" required>
                                    </div>
                                    <div class="col-md-8">
                                        
                                        <div class="form-group">
                                          <label for="pname">Product Name:</label>
                                          <input type="text" class="form-control" id="pname"  required name="pname" style="text-transform:capitalize;">
                                        </div>
                                        <div class="form-group">
                                          <label for="pname">Product Description:</label>
                                          <textarea name="pdesc" id="pdesc" class="jqte-test" style="margin-top: 10px" required></textarea>
                                        </div>
                                        <div class="row" style="margin-bottom: 0px !important">
                                        	<div class="col-md-6">
                                        		<div class="form-group">
		                                          <label for="pcateg">Product Category:</label>
		                                          <select class="form-control show-tick" name="pcateg">
		                                              <?php

		                                                

		                                                $sql = "SELECT * FROM tbl_category";
		                                                $res = $conn->query($sql);

		                                                while ($row = $res->fetch_assoc()) {
		                                                     echo "<option>".ucfirst($row['categoryname'])."</option>";
		                                                 } 

		                                              ?>
		                                          </select>
		                                        </div>
                                        	</div>
                                        	<div class="col-md-6">
		                                        <div class="form-group">
		                                          <label for="qty">Quantity:</label>
		                                          <input type="text" pattern="[0-9]*" class="form-control" id="qty" min="1" required max="100" name="pqty">
		                                        </div>
                                        	</div>
                                        </div>
                                        <div class="row" style="margin-bottom: 0px !important">
                                            <div class="col-sm-6"  style="margin-bottom: 0px !important">
                                                <div class="form-group">
                                                  <label for="gross">Gross Cost:</label>
                                                  <input type="text" pattern="[0-9]*" class="form-control" id="gross" required max="100000" min="1" name="pgross">
                                                </div>
                                            </div>
                                            <div class="col-sm-6"  style="margin-bottom: 0px !important">
                                                <div class="form-group">
                                                  <label for="net">Net Cost:</label>
                                                  <input type="text" pattern="[0-9]*" class="form-control" id="net" required max="100000" min="2" name="pnet">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">ADD PRODUCT</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Large Size -->
    <form id="editproductform">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Edit Product <span class="pull-right col-pink" id="eerror"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="preview" id="epreview">
                                            <img id="eimgprev" src="#" height="238px" width="238px" alt="Product Image" />
                                        </div> <br>
                                        <input type="file" name="fileToUpload" id="eeditImg" class="form-control" accept="image/*">
                                    </div>
                                    <div class="col-md-8">
                                        
                                        <div class="form-group">
                                          <label for="pname">Product Name:</label>
                                          <input type="text" class="form-control" id="ename"  required name="ename" style="text-transform:capitalize;">
                                        </div>
                                        <div class="form-group">
                                          <label for="pname">Product Description:</label>
                                          <textarea name="edesc" id="edesc" class="jqte-test" style="margin-top: 10px"></textarea>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-6">
                                        		<div class="form-group">
		                                          <label for="ecateg">Product Category:</label>
		                                          <select class="form-control show-tick" name="ecateg">
		                                              <?php

		                                                

		                                                $sql = "SELECT * FROM tbl_category";
		                                                $res = $conn->query($sql);

		                                                while ($row = $res->fetch_assoc()) {
		                                                     echo "<option>".$row['categoryname']."</option>";
		                                                 } 

		                                              ?>
		                                          </select>
		                                        </div>
                                        	</div>
                                        	<div class="col-md-6">
                                        		<div class="form-group">
		                                          <label for="qty">Quantity:</label>
		                                          <input type="text" pattern="[0-9]*" class="form-control" id="eqty" required max="100" name="eqty">
		                                        </div>	
                                        	</div>
                                        </div>
                                        <div class="row" style="margin-bottom: 0px !important">
                                            <div class="col-sm-6"  style="margin-bottom: 0px !important">
                                                <div class="form-group">
                                                  <label for="gross">Gross Cost:</label>
                                                  <input type="text" pattern="[0-9]*" class="form-control" id="egross" required max="100000" min="0" name="egross">
                                                </div>
                                            </div>
                                            <div class="col-sm-6"  style="margin-bottom: 0px !important">
                                                <div class="form-group">
                                                  <label for="net">Net Cost:</label>
                                                  <input type="text" pattern="[0-9]*" class="form-control" id="enet" required max="100000" min="0" name="enet">
                                                </div>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">EDIT PRODUCT</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    </form>

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
   <!-- <script src="../../../assets/js/sweetalert2.all.min.js"></script> -->

   <link rel="stylesheet" type="text/css" href="../plugins/sweetalert/sweetalert.css">
   <script src="../plugins/sweetalert/sweetalert.min.js"></script>
   <script src="../../../assets/js/jquery-te.min.js"></script>

</body>

</html>


<style type="text/css">
    
    .selected{

        background-color: #3498db;
        color: #fff;

    }

    .odd{
        cursor: pointer;
    }
    .even{
        cursor: pointer;
    }

</style>

<script >


$(document).ready(function(){

$('input[type=text]').css({'border-bottom': "1px solid #999"});
$('input[type=number]').css({'border-bottom': "1px solid #999"});
loadNotifCount();
loadProduct();

var table = $('#producttable').dataTable();

$('#producttable tbody').on( 'click', 'tr', function () {
      if ( $(this).hasClass('selected') ) {
          $(this).removeClass('selected');
           $('#delete').attr('disabled', 'disabled');
           $('#edit').attr('disabled', 'disabled');
           product = '';
      }
      else {
          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
           $('#delete').removeAttr('disabled'); 
           $('#edit').removeAttr('disabled');          
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

function readURLx(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#eimgprev').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}


$("#productimage").change(function() {
  readURL(this);
});

$("#eeditImg").change(function() {
  readURLx(this);
});


$('.jqte-test').jqte();


</script>


