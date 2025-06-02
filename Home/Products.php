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
            <span><a href="Dashboard">Home</a> / <a href="Products">Products</a></span>
            <span>
                <h3>Products Management</h3>
            </span>

            </div>

        </div>
        <div class="main-container">
            <div class="boxes">
                <h3>Available Products From the Store</h3>
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

                    <table id="product-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Price(TZS)</th>
                                <th>Quantity</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                                          $count = 0;
                             $sql = mysqli_query($conn," SELECT image, P.product_id AS product_id, P.name AS product_name, B.name AS brand_name,
        C.name AS category_name, P.price, P.quantity, P.status, P.date FROM products P JOIN categories
        C ON P.category_id = C.category_id JOIN brands B ON C.brand_id = B.brand_id  ");
                        while ($row = mysqli_fetch_assoc($sql)) {
                        $count++;
                        if($row['quantity'] > 1 ){
                                $stock = '<span class="active">Available</span>';
                                }else {
                                 $stock = '<span class="inactive">Stock Out</span>';
                                }
                            echo '
                            <tr>
                                <td>' . $count . '</td>
                        <td><img src="../img/uploads/' . $row['image'] . '" width="50" height="50" alt="' . $row['image'] . '"></td>
                                <td>' . $row['product_name'] . '</td>
                                <td>' . $row['brand_name'] . '</td>
                                <td>' . $row['category_name'] . '</td>
                                <td>' . number_format( $row['price'] ). '</td>
                                <td>' . $row['quantity'] . '</td>
                                <td>' .  $stock . '</td>
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