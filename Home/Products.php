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
            <span><a href="Dashboard">Home</a> / <a href="Products">Products</a></span>
            <span>
                <h3>Products Management</h3>
            </span>
            <span>
                <button onclick="getForm()">Add New Product</button>
            </span>


            <div class="container-form-product" id="product-form-product">
                <div class="container-form">
                    <div class="form-container">
                        <div class="head">
                            <h3>Add New Product</h3>
                            <button type="button" class="close-form-btn"><img src="../img/icons/close.svg"
                                    alt="Close"></button>
                        </div>
                        <div id="msg"></div>
                        <form id="product-form">
                            <div class="form-inputs">
                                <label for="img">Select Product Image</label>
                                <input type="file" id="img" name="img" class="file">
                                <span class="form-error" id="form-error-img"></span>
                            </div>
                            <div class="select">
                                <div class="select-item">
                                    <label for="brand">Select Brand:</label>
                                    <select id="brand" name="brand" required>
                                        <option>-- Select Brand --</option>
                                    </select>
                                    <span class="form-error" id="form-error-brand"></span>
                                </div>

                                <div class="select-item">
                                    <label for="category">Select Category:</label>
                                    <select id="category" name="category" required>
                                        <option value="">-- Select Brand First --</option>
                                    </select>
                                    <span class="form-error" id="form-error-category"></span>
                                </div>


                                <div class="select-item">
                                    <label for="status">Status:</label>
                                    <select name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
                                    </select>
                                    <span class="form-error" id="form-error-status"></span>
                                </div>
                            </div>

                            <div class="form-inputs">
                                <label for="product-name">Product Name:</label>
                                <input type="text" id="product-name" name="product" placeholder="Enter Product Name..">
                                <span class="form-error" id="form-error-name"></span>
                            </div>
                            <div class="form-inputs">
                                <label for="qty">Enter Quantity:</label>
                                <input type="number" name="qty" id="qty" placeholder="Enter Product Quantity">
                                <span class="form-error" id="form-error-qty"></span>
                            </div>

                            <div class="form-inputs">
                                <label for="price">Enter Price:</label>
                                <input type="number" name="price" id="price" placeholder="Enter Product Price">
                                <span class="form-error" id="form-error-price"></span>
                            </div>

                            <div class="button-container">
                                <button type="button" onclick="addProduct()" name="addproduct">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                                <th>Date Added</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Price(TZS)</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody id="product-data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

<?php require_once '../include/footer.php' ?>