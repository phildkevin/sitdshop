<!DOCTYPE html>
<html>
<?php $user_type = 'Admin'; ?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ADMIN | BACKUP AND RESTORE</title>
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

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BACKUP AND RESTORE</h2><br>
                <?php

    function unique_id(){
        list($usec, $sec) = explode(" ", microtime());
        list($int, $dec) = explode(".", $usec);
        return $sec.$dec;
    }

    if(!isset($_GET['subpage'])){
        list_DB();
    }else{
        $subpage = $_GET['subpage'];
        
        switch($subpage){
            case "add":
                backup_DB();
                break;
            case "restore":
                restore_DB();
                break;
            case "delete":
                delete_DB();
                break;
            default:
                echo "<h1 id='warning'>Page Not Found!</h1>";
        }
    }
    
    function list_DB(){
        global $page;
        global $subpage;
        global $header;
        
        $btn        = "class='btn btn-success' role='button'";

        echo"<div class='panel panel-default'>";
        echo"<div class='panel-heading'>";
        echo"<h3 class='panel-title'><b><a href=backup_restore.php?subpage=add $btn>Backup Database</a></b></h3>";
        echo"</div>";
        echo"<div class='panel-body'>";

        $table       = "<div class='table-responsive'>";
        $table      .= "<table class='table table-bordered table-hover js-basic-example dataTable'>";
        $table      .= "<thead>";
        $table      .= "<tr>";
        $table      .= "<th align='left' class='bigger bolder'>databases list</th>";
        $table      .= "<th width='160px' class='text-center bigger bolder'>Action</th>";
        $table      .= "</tr>";
        $table      .= "</thead>";
        $table      .= "<tbody>";
        
        echo $table;
        $i = 0;
        echo"</div>"; //panel-default
        echo"</div>"; //panel-body
 
        if ($handle = opendir('../backups')){
            /* This is the correct way to loop over the directory. */
            while ($file = readdir($handle)) {
                if(($file != ".") & ($file != "..")){
                    $backup = "<a href='../backups/$file' target='_blank'>$file</a>";
                    $r_link = "<a href='backup_restore.php?page=$page&subpage=restore&filename=$file'><button class='btn btn-info btn-sm'>Restore</button></a>";
                    $d_link = "<a href='backup_restore.php?page=$page&subpage=delete&filename=$file'><button class='btn btn-danger btn-sm'>Delete</button></a>";

                    $row     = "<tr>";
                    $row    .= "<td><b>$backup</b></td>";
                    $row    .= "<td align='center'>$r_link | $d_link</td>";
                    $row    .= "</tr>";

                    echo $row;
                    $i++;
                }
            }
            closedir($handle);
        }
        
        if($i==0){ echo "<tr><td colspan='2' align='center'>No Records Yet.</td></tr>"; }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "<b>No. of Records: $i</b>";
    }

    function delete_DB(){
        global $page;
        global $subpage;
        global $header;
        
        $filename   = $_GET['filename'];
        $y_link     = "<a href='backup_restore.php?page=$page&subpage=delete&filename=$filename&yesno=yes'><button class='btn btn-success btn-sm'>Yes</button></a>";
        $n_link     = "<a href='backup_restore.php'><button class='btn btn-warning btn-sm'>No</button></a>";
        
        if(!isset($_GET['yesno'])){
            echo "<div class='alert alert-danger'>Are you sure you want to delete this record?";
            echo " $y_link | $n_link </div>";
        }else{
            unlink("../backups/$filename");
            //header("location:index.php?page=$page");
        
            $ok_link    = "<a href='backup_restore.php'>Ok</a>";
            echo "<h3>$header <span class='fa fa-exclamation-triangle'></span> Deleted</h3><hr>";
            echo "<div id='msgbox'>Record Successfully Deleted! $ok_link</div>";
        }
    }

    function restore_DB(){
        global $page;
        global $subpage;
        global $header;

        $conn = new mysqli('localhost','root','','sitdshop'); 
        $conn->select_db('sitdshop'); 
        $conn->query("SET NAMES 'utf8'");
        
        $filename = $_GET['filename'];
        $y_link     = "<a href='backup_restore.php?page=$page&subpage=restore&filename=$filename&yesno=yes'><button class='btn btn-success btn-sm'>Yes</button></a>";
        $n_link     = "<a href='backup_restore.php'><button class='btn btn-warning btn-sm'>No</button></a>";
        
        if(!isset($_GET['yesno'])){
            echo "<div class='alert alert-info'>Are you sure you want to restore this database?";
            echo " $y_link | $n_link </div>";
            return 0;
        }
        
        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file("../backups/$filename");
        // Loop through each line
        foreach ($lines as $line)
        {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
            continue;
 
            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            
                // Perform the query
                $conn->query($templine);
                //or print('Error performing query \'<strong>' . $templine . '\': ' . $conn->error . '<br /><br />');
                // Reset temp variable to empty
                $templine = '';
        }
        unlink("../backups/$filename");
        $ok_link    = "<a href='backup_restore.php'>Ok</a>";
        echo "<h3>$header <span class='fa fa-check-square'></span> Restored</h3><hr>";
        echo "<div id='msgbox'>Database Successfully Restored! $ok_link</div>";
    }

    function backup_DB($tables = '*')
    {
        global $page;
        global $subpage;
        global $header;

        $conn = new mysqli('localhost','root','','sitdshop'); 
        $conn->select_db('sitdshop'); 
        $conn->query("SET NAMES 'utf8'");

        
        //get all of the tables
        if($tables == '*')
        {
            $tables = array();
            $result = $conn->query('SHOW TABLES');
            while($row = $result->fetch_row())
            {
                $tables[] = $row[0];
            }
        }
        else
        {
            $tables = is_array($tables) ? $tables : explode(',',$tables);
        }
    
        $return="";
    
        //cycle through
        foreach($tables as $table)
        {
            $result         =   $conn->query('SELECT * FROM '.$table);  
            $fields_amount  =   $result->field_count;  
            $rows_num       =   $conn->affected_rows;     
            $res            =   $conn->query('SHOW CREATE TABLE '.$table); 
            $TableMLine     =   $res->fetch_row();
            $content        =   (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

        
            for ($i = 0; $i < $fields_amount; $i++) 
            {
                while($row = $result->fetch_row())
                {
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                    for($j=0; $j<$fields_amount; $j++) 
                    {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = str_replace("\n","\\n",$row[$j]);
                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                        if ($j<($fields_amount-1)) { $return.= ','; }
                    }
                    $return.= ");\n";
                }
            }
            $return.="\n\n\n";
        }
        //save file
        date_default_timezone_set("Asia/Manila");
        $filename   = date("F j, Y hA")." ".unique_id().".sql";
        $handle     = fopen("../backups/".$filename,'w+');
        fwrite($handle,$return);
        fclose($handle);
        
        $ok_link    = "<a href='backup_restore.php'>Ok</a>";
        $dl_link    = "<a href='backups/$filename' target='_blank'>Download to MyComputer</a>";
        
        echo "<div class='alert alert-default bg-green'>Database Successfully BackUp! $ok_link | $dl_link</div>";
    }

    
?>
            </div>
        </div>
    </section>

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
</body>

</html>