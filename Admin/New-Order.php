<?php require_once '../Config/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../include/cssheader.php' ?>

<body>
    <?php require_once '../include/header.php' ?>
    <?php require_once '../include/Nav.php' ?>
    <main>

        <!-- url container -->
        <div class="url">
            <span><a href="Dashboard">Home</a> / <a href="Orders">Orders</a> / <a href="Orders">New Order</a></span>
            <span>
                <h3>Place A New Order</h3>
            </span>
            <span><button><a href="Orders">Back</a></button></span>
        </div>

        <div class="container-form-product" id="order-msg">
            <div class="container-form">
                <div class="form-container user-form">
                    <div class="head">
                        <h3>Order Control Management</h3>
                        <button class="close-form-btn"><img src="../img/icons/close.svg" alt="X"></button>
                    </div>
                    <form id="user-form">
                        <div class="brands">
                            <div class="delete-container"></div>
                            <div class="order-msg"></div>
                            <div class="button-container">
                                <div class="delete-button">

                                    <button type="button" class="close-form-btn"> Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-order">
            <div class="order">
                <form class="order-form">
                    <div class="customer-details">
                        <h3>Client Details</h3>
                        <div class="form-inputs">
                            <label for="uname">Client Name</label>
                            <input type="text" id="name" placeholder="Enter Client Full Name...">
                        </div>

                        <div class="form-inputs">
                            <label for="email">Client Email</label>
                            <input type="email" id="email" placeholder="Enter Client Email...">
                        </div>

                        <div class="form-inputs">
                            <label for="phone">Client Phonenumber</label>
                            <input type="tel" id="phone" placeholder="Enter Client Phonenumber...">
                        </div>
                    </div>

                    <div class="add-order">
                        <h3>Add Order Items</h3>
                        <div class="brand-container">
                            <div class="products-select">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Available</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-rows"></tbody>
                                </table>
                            </div>
                            <div class="plus">
                                <button id="add-more" class="plus-btn" type="button">Add New Row</button>
                            </div>
                        </div>
                    </div>

                    <div class="order-details-output">
                        <h3>Order Details</h3>
                        <div class="outcome-container">
                            <div class="product-output">
                                <div class="form-count">
                                    <label for="discount">Discount Offered (%)</label>
                                    <input type="number" value="0" min="0" max="100" id="discount">
                                </div>
                                <div class="form-count">
                                    <label>Total Items</label>
                                    <input type="text" id="total-items" disabled>
                                </div>
                                <div class="form-count">
                                    <label>Sub Total</label>
                                    <input type="text" id="sub-total" disabled>
                                </div>
                                <div class="form-count">
                                    <label>Total Price</label>
                                    <input type="text" id="total-price" disabled>
                                </div>
                            </div>

                            <div class="payment-method">
                                <div class="form-count">
                                    <label for="payment-method">Payment Method</label>
                                    <select id="payment-method">
                                        <option value="cash">Cash</option>
                                        <option value="cheque">Cheque</option>
                                        <option value="card">Credit Card</option>
                                    </select>
                                </div>
                                <div class="form-count">
                                    <label for="paid-amount">Paid Amount</label>
                                    <input type="number" min="0" id="paid-amount" value="0">
                                </div>
                                <div class="form-count">
                                    <label>Total Amount</label>
                                    <input type="text" id="order-total" disabled>
                                </div>
                                <div class="form-count">
                                    <label>Balance Due</label>
                                    <input type="text" id="balance-due" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="employee">
                        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" id="user_id">
                        <i>This order is placed by <?php echo htmlspecialchars($_SESSION['user_email']) ?></i>
                    </div>

                    <div class="order-buttons">
                        <button class="order" type="button" id="place-order">Place Order</button>
                        <button class="cancel"><a href="Orders">Cancel</a></button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

<?php require_once '../include/footer.php' ?>