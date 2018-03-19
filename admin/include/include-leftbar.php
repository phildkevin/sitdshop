            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <?php
                        $sql = "SELECT * FROM tbl_personal WHERE user_id = '".$user_id."'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                    ?>
                    <img src="<?php echo "../".$row['image']; ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row['firstname']." ".$row['lastname']; ?></div>
                    <div class="email"><?php echo $row['email']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li><a href="../../php/php-logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <?php 
                if($user_type == 'Employee'){
            ?>
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="home.php">
                                <i class="material-icons">dashboard</i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="orders.php">
                                <i class="material-icons">card_giftcard</i>
                                <span>Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="products-employee.php">
                                <i class="material-icons">work</i>
                                <span>Products</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->
            <?php
                }else{
            ?>
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="home.php">
                                <i class="material-icons">dashboard</i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="products.php">
                                <i class="material-icons">work</i>
                                <span>Products</span>
                            </a>
                        </li>
                         <li>
                            <a href="orders-admin.php">
                                <i class="material-icons">card_giftcard</i>
                                <span>Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="users.php">
                                <i class="material-icons">people</i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="reports.php">
                                <i class="material-icons">folder_open</i>
                                <span>Reports</span>
                            </a>
                        </li>
                        <li>
                            <a href="backup_restore.php">
                                <i class="material-icons">settings_backup_restore</i>
                                <span>Backup and Restore</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->
            <?php
                }
            ?>
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">ShopAny</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->