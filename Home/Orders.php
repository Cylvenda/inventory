<?php require_once '../Config/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../include/cssheader.php' ?>

<body>
    <?php require_once '../include/header.php' ?>
    <?php require_once '../include/userNav.php' ?>
    <main>
        <!-- url container -->
        <div class="url">
            <span><a href="Dashboard">Home</a> / <a href="Orders">Orders</a></span>
            <span>
                <h3>Orders Management</h3>
            </span>
            <span><button><a href="New-Order">Add New Order</a></button></span>
        </div>



        <div class="main-container">
            <div class="boxes">
                <h3>Placed Orders</h3>
                <div class="table-container">

                    <div class="search-container">
                        <div class="row">Show
                            <select name="" id="">
                                <option value="10">10</option>
                                <option value="10">25</option>
                                <option value="10">50</option>
                                <option value="10">100</option>
                            </select>
                            Rows
                        </div>

                        <div class="search">
                            <input type="text"><button>Search</button>
                        </div>

                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Added</th>
                                <th>Client Name</th>
                                <th>Total Items</th>
                                <th>Total Amount</th>
                                <th>Payed Amount</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                                                        <?php
                                                          $count = 0;
                             $sql = mysqli_query($conn," SELECT * FROM placed_orders ");
                        while ($row = mysqli_fetch_assoc($sql)) {
                        $count++;
                        if($row['payment_status']  ==  1 ){
                                $status = '<span class="active">Payed</span>';
                                }else {
                                 $status = '<span class="inactive">Not Payed</span>';
                                }
                            echo '
                            <tr>
                                <td>' . $count . '</td>
                                <td>' . $row['date'] . '</td>
                                <td>' . $row['client_name'] . '</td>
                                <td>' . $row['total_items'] . '</td>
                                <td>' . number_format( $row['total_price'] ). '</td>
                                <td>' . number_format( $row['payed_amount'] ). '</td>
                                <td>' .  $status . '</td>
                            </tr>';
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

<?php require_once '../include/footer.php' ?>