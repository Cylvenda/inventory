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
            <span><a href="Dashboard">Home</a> / <a href="Brand">Brand</a></span>
            <span>
                <h3>Brand Management</h3>
            </span>
            <span>
                <button onclick="getForm()">Add New Brand</button>
            </span>
        </div>
        <div class="container-form-product" id="product-form-product">
            <div class="container-form">
                <div class="form-container">
                    <div class="brands">
                        <div class="head">
                            <h3>Add New Brand</h3>
                            <button class="close-form-btn"><img src="../img/icons/close.svg" alt=""></button>
                        </div>
                        <div id="msg" class="msg">

                        </div>
                        <form id="brand-form">
                            <div class="form-inputs">
                                <label for="name">Brand Name:</label>
                                <input id="brand" type="text" name="brand" placeholder="Enter Brand Name..">
                            </div>

                            <div class="form-inputs"> <label for="name">Select status:</label>
                                <select name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                            </div>
                            <div class="button-container">
                                <button type="button" onclick="addBrand()">Add Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-container">
            <div class="boxes">
                <h3>Available Brands From the Store</h3>
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
                                <th>Brand Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="brand-data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

<?php require_once '../include/footer.php' ?>