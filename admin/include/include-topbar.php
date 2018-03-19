    <?php include 'include-connection.php'; ?>
    <?php
        session_start();
        if(!isset($_SESSION['user_id'])){
            header("location: ../../index.php");
        }else{
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM tbl_user WHERE user_id = '".$user_id."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $user_type = $row['access'];
        }
    ?>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="home.php"><?php echo $user_type; ?> - ShopAny</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">
                                <?php
                                    include '../../php/php-date-format.php';
                                    $sql = "SELECT * FROM tbl_order";
                                    $result = $conn->query($sql);
                                    $rows = $result->fetch_assoc();
                                    $count = mysqli_num_rows($result);
                                    echo $count;
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="../pages/orders.php">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <?php
                                                    echo '<h4>'.$count.' new order(s)</h4>';
                                                    echo '<p>
                                                        <i class="material-icons">access_time</i> ';
                                                        echo time_elapsed_string($rows['date']);
                                                    echo '</p>';
                                                ?>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>