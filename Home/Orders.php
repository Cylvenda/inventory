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

        <!-- delete user model -->
        <div class="container-form-product" id="delete-form">
            <div class="container-form">
                <div class="form-container user-form">
                    <div class="head">
                        <h3>Delete Order</h3>
                        <button class="close-form-btn"><img src="../img/icons/close.svg" alt=""></button>
                    </div>
                    <div id="msg-edit"></div>
                    <form id="user-form">
                        <div class="brands">
                            <div class="deletion-msg">

                            </div>
                            <div class="delete-container">
                                <p>Are You Sure You want to Delete this Order...?.</p>
                            </div>
                            <div class="button-container">
                                <div class="delete-button">
                                    <button class="delete" type="button" id="delete-order-btn">Yes Delete</button>
                                    <button type="button" class="close-form-btn">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-form-product" id="status-form">
                    <div class="container-form">
                <div class="form-container user-form">
                    <div class="head">
                        <h3>Employee Status</h3>
                        <button class="close-form-btn"><img src="../img/icons/close.svg" alt="X"></button>
                    </div>
                    <form id="user-form">
                        <div class="brands">
                             <div class="deletion-msg" id="msg-edit"></div>
                            <div class="delete-container">
                                <p>Are You Sure this order is Done and received by the customer
                                </p>
                            </div>
                            <div class="button-container">
                                <div class="delete-button">
                                    <button class="order" type="button" id="change-order-btn">Yes Done</button>
                                    <button type="button" class="close-form-btn"> Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

                    <div class="container-form-product" id="product-form-product">
                <div class="container-form">
                    <div class="form-container">
                        <div class="head">
                            <h3>Order Details</h3>
                            <button type="button" class="close-form-btn"><img src="../img/icons/close.svg"
                                    alt="Close"></button>
                        </div>
                        <div id="msg"></div>
                        <form id="product-form">
                            <div class="form-inputs">
                                <label for="img">Client Name:</label>
                                <input type="file" id="cname" >
                            </div>

                            <div class="form-inputs">
                                <label for="product-name">Client Email:</label>
                                <input type="text"  id="cemail" >
                                <span class="form-error" id="form-error-name"></span>
                            </div>
                            <div class="form-inputs">
                                <label for="qty">Total Order Quantity:</label>
                                <input type="number" class="qty" name="qty" id="qty"
                                    placeholder="Enter Product Quantity">
                                <span class="form-error" id="form-error-qty"></span>
                            </div>

                            <div class="form-inputs">
                                <label for="price">Enter Price:</label>
                                <input type="number" class="price" name="price" id="price"
                                    placeholder="Enter Product Price">
                                <span class="form-error" id="form-error-price"></span>
                            </div>

                            <div class="button-container">
                                <button class="close-form-btn" type="button">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                            <input id="search-order" type="text"><button>Search</button>
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
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="order-data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

<?php require_once '../include/footer.php' ?>