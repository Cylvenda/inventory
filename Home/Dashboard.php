<?php require_once '../Config/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('../include/cssheader.php'); ?>

<body>
    <?php include '../include/header.php';
    require_once '../include/Nav.php'; ?>

    <main>
        <!-- url container -->
        <div class="url">
            <span>
                <a href="Dashboard">Home</a> / <a href="Dashboard">Dashboard</a>
            </span>

            <span>
                <h2>Welcome Again <?php echo $_SESSION['name'] ?></h2>
            </span>
        </div>

        <div class="main-container">
            <div class="boxes">

                <h3>Stock Hints/Summary</h3>

                <div class="boxes-box">
                    <div class="box ">
                        <img src="../img/icons/check.svg" alt="">
                        <div class="details">
                            <p><b>Total Stock Product</b></p>
                            <p class="count"><?php
                            $sql = mysqli_query($conn, "SELECT * FROM products");
                            $count = mysqli_num_rows($sql);
                            if ($count >= 1) {
                                echo $count;
                            } else {
                                echo 'No Product';
                            }
                            ?>
                            </p>
                        </div>
                    </div>

                    <div class="box tomato">
                        <img src="../img/icons/check.svg" alt="">
                        <div class="details">
                            <p><b>Low Stock Product</b></p>
                            <p class="count"><?php
                            $sql = mysqli_query($conn, "SELECT * FROM products WHERE quantity < 10 ");
                            $count = mysqli_num_rows($sql);
                            if ($count >= 1) {
                                echo $count;
                            } else {
                                echo 'Stock In Standard';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="box red">
                        <img src="../img/icons/check.svg" alt="">
                        <div class="details">
                            <p><b>Zero Stock Product</b></p>
                            <p class="count"><?php
                            $sql = mysqli_query($conn, "SELECT * FROM products WHERE quantity < 0 ");
                            $count = mysqli_num_rows($sql);
                            if ($count >= 1) {
                                echo $count;
                            } else {
                                echo 'Stock In Standard';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="box green">
                        <img src="../img/icons/check.svg" alt="">
                        <div class="details">
                            <p><b>Most Stock Product</b></p>
                            <p class="count"><?php
                            $sql = mysqli_query($conn, "SELECT MAX(quantity) FROM products ");
                            $count = mysqli_num_rows($sql);

                            echo $count;

                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="boxes">
                <h3>Recently Order Added</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Created</th>
                                <th>Client Name</th>
                                <th>Client Email</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>

                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM placed_orders ORDER BY order_id LIMIT 5 ");
                        while ($row = mysqli_fetch_assoc($sql)) {

                            if ($row['status'] == 1) {
                                $payment = '<span class="active">Payed</span>';
                            } else {
                                $payment = '<span class="pending">Pending</span>';
                            }
                            ;
                            echo '
                            <tr>
                                <td>' . $count++ . '</td>
                                <td>' . $row['date'] . '</td>
                                <td>' . $row['client_name'] . '</td>
                                <td>' . $row['client_email'] . '</td>
                                <td>' . $payment . '</td>
                            </tr>';
                        }

                        ?>
                    </table>
                </div>

            </div>

            <div class="boxes">
                <h3> Top Active Suppliers </h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Supplier Name</th>
                                <th>supplier Email</th>
                                <th>Supplier Phone</th>
                                <th>Supplier Status</th>
                            </tr>
                        </thead>

                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM suppliers ORDER BY RAND() LIMIT 5 ");
                        while ($row = mysqli_fetch_assoc($sql)) {

                            if ($row['status'] == 1) {
                                $status = '<span class="active">Active</span>';
                            } else {
                                $status = '<span class="inactive">Not Active</span>';
                            }
                            ;
                            echo '
                            <tr>
                                <td>' . $count++ . '</td>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['phone'] . '</td>
                                <td>' . $status . '</td>
                            </tr>';
                        }

                        ?>
                    </table>

                </div>
            </div>

        </div>
    </main>

    <?php include '../include/Footer.php'; ?>