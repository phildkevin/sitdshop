<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'tbl_product';
 
// Table's primary key
$primaryKey = 'product_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'image', 'dt' => 0,
        'formatter' => function( $d, $row ) {
            return '<img src="../../../'.$d.'" class="img-responsive" style="max-width:100px; max-height:100px;" readonly>';
        } ),
    array(
        'db'        => 'product name',
        'dt'        => 1
    ),
    array(
        'db'        => 'description',
        'dt'        => 2
    ),
    array(
        'db'        => 'category',
        'dt'        => 3
    ),
    array( 'db' => 'gross cost',   'dt' => 4,
            'formater' => function( $d, $row ) {
            return '&#8369; '.number_format($d);
        } ),
    array( 'db' => 'net cost',   'dt' => 5,
            'formater' => function( $d, $row ) {
            return '&#8369; '.number_format($d);
        } ),   
    array( 'db' => 'initial quantity',   'dt' => 6 ),
    array( 'db' => 'quantity',   'dt' => 7 ),
    array( 'db' => 'sale count',   'dt' => 8,
            'formater' => function( $d, $row ) {
            return ucwords($d);
        }),
    array( 'db' => 'date',   'dt' => 9,
            'formater' => function( $d, $row ) {
            return ucwords($d);
        } ),
    array( 'db' => 'product_id',   'dt' => 10),
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'sitdshop',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
$where = "status != 'pullout'";


echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where )
);