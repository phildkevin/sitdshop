<?php
    include "../../include/include-connection.php";
    if(isset($_GET['action']) && $_GET['action'] == 'report-transaction'){
        echo '<table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Employee ID</th>
                    <th>Total</th>
                    <th>Place Order</th>
                </tr>
            </thead>
            <tbody>';
        $count = 0;                          
        if(isset($_POST['start']) && isset($_POST['end'])){
            $sql = "SELECT * FROM tbl_order WHERE status = 'Closed' AND date >= '".$_POST['start']."' AND date <= '".$_POST['end']."' ORDER BY `total` ASC";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            while($row = $result->fetch_assoc()){
                echo "<tr>
                    <td>".$row['order_id']."</td>";
               
                $sql_1 = "SELECT * FROM tbl_personal WHERE user_id= '".$row['user_id']."'";
                $result_1 = $conn->query($sql_1);
                $row_1 = $result_1->fetch_assoc();
                
                echo "<td>".$row_1['firstname']." ".$row_1['lastname']."</td>";
                
                echo "<td>".$row['employee_id']."</td>
                    <td>".$row['total']."</td>
                    <td>".$row['date']."</td>
                </tr>";
            }
        }else{
            $sql = "SELECT * FROM tbl_order WHERE status = 'Closed' ORDER BY `total` ASC";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            while($row = $result->fetch_assoc()){
                echo "<tr>
                    <td>".$row['order_id']."</td>";
               
                $sql_1 = "SELECT * FROM tbl_personal WHERE user_id= '".$row['user_id']."'";
                $result_1 = $conn->query($sql_1);
                $row_1 = $result_1->fetch_assoc();
                
                echo "<td>".$row_1['firstname']." ".$row_1['lastname']."</td>";
                
                echo "<td>".$row['employee_id']."</td>
                    <td>".$row['total']."</td>
                    <td>".$row['date']."</td>
                </tr>";
            }
        }
        echo "</tbody>
        </table>";
        if($count == 0){
            echo "<div class='text-center'>No Result</div>";
        }
    }

    if(isset($_GET['action']) && $_GET['action'] == 'report-inventory'){
         echo '<table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Gross Cost</th>
                    <th>Net Cost</th>
                </tr>
            </thead>
            <tbody>';
        $count = 0; 
        if(isset($_POST['start']) && isset($_POST['end'])){
            $sql = "SELECT * FROM tbl_product WHERE date >= '".$_POST['start']."' AND date <= '".$_POST['end']."' ORDER BY `product name` ASC";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            while($row = $result->fetch_assoc()){
                echo "<tr>
                    <td>".$row['product_id']."</td>
                    <td>".$row['product name']."</td>
                    <td>".$row['category']."</td>
                    <td>".$row['quantity']."</td>
                    <td>".$row['gross cost']."</td>
                    <td>".$row['net cost']."</td>
                </tr>";
            }
        }else{
            $sql = "SELECT * FROM tbl_product ORDER BY `product name` ASC";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            while($row = $result->fetch_assoc()){
                echo "<tr>
                    <td>".$row['product_id']."</td>
                    <td>".$row['product name']."</td>
                    <td>".$row['category']."</td>
                    <td>".$row['quantity']."</td>
                    <td>&#8369 ".number_format((float) $row['gross cost'], 2)."</td>
                    <td>&#8369 ".number_format((float) $row['net cost'], 2)."</td>
                </tr>";
            }
        }
        echo "</tbody>
        </table>";
        if($count == 0){
            echo "<div class='text-center'>No Result</div>";
        } 
    }

    if(isset($_GET['action']) && $_GET['action'] == 'report-sales'){
         echo '<table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Sale Count</th>
                    <th>Gross Total</th>
                    <th>Net Total</th>
                    <th>Profit</th>
                </tr>
            </thead>
            <tbody>';
        $count = 0; 
        if(isset($_POST['start']) && isset($_POST['end'])){
            $sql = "SELECT * FROM tbl_product WHERE date >= '".$_POST['start']."' AND date <= '".$_POST['end']."' ORDER BY `product name` ASC";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            $gross_total = 0;
            $net_total = 0;
            $profit = 0;
            while($row = $result->fetch_assoc()){
                $gross_total = $row['gross cost'] * $row['sale count'];
                $net_total = $row['net cost'] * $row['sale count'];
                $profit = $net_total - $gross_total;
                echo "<tr>
                    <td>".$row['product_id']."</td>
                    <td>".$row['product name']."</td>
                    <td>".$row['sale count']."</td>
                    <td>&#8369 ".number_format((float) $gross_total, 2)."</td>
                    <td>&#8369 ".number_format((float) $net_total, 2)."</td>
                    <td>&#8369 ".number_format((float) $profit, 2)."</td>
                </tr>";
            }
        }else{
            $sql = "SELECT * FROM tbl_product ORDER BY `product name` ASC";
            $result = $conn->query($sql);
            $count = mysqli_num_rows($result);
            $gross_total = 0;
            $net_total = 0;
            $profit = 0;
            while($row = $result->fetch_assoc()){
                $gross_total = $row['gross cost'] * $row['sale count'];
                $net_total = $row['net cost'] * $row['sale count'];
                $profit = $net_total - $gross_total;
                echo "<tr>
                    <td>".$row['product_id']."</td>
                    <td>".$row['product name']."</td>
                    <td>".$row['sale count']."</td>
                    <td>&#8369 ".number_format((float) $gross_total, 2)."</td>
                    <td>&#8369 ".number_format((float) $net_total, 2)."</td>
                    <td>&#8369 ".number_format((float) $profit, 2)."</td>
                </tr>";
            }
        }
        echo "</tbody>
        </table>";
        if($count == 0){
            echo "<div class='text-center'>No Result</div>";
        } 
    }
?>