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
        <!-- brand add form -->
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
        <!-- update form  -->
        <div class="container-form-product" id="update-form">
            <div class="container-form">
                <div class="form-container">
                    <div class="brands">
                        <div class="head">
                            <h3>Edit Brand Name</h3>
                            <button class="close-form-btn"><img src="../img/icons/close.svg" alt=""></button>
                        </div>
                        <div id="edit-msg" class="msg">

                        </div>
                        <form id="edit-brand-form">
                            <div class="form-inputs">
                                <input type="hidden" name="edit-brand_id" id="edit-brand_id">
                                <label for="name">Brand Name:</label>
                                <input id="edit-brand" type="text" name="brand" placeholder="Enter Brand Name..">
                            </div>

                            <div class="button-container">
                                <button type="button" onclick="updateBrand()">Update Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- delete user model -->
        <div class="container-form-product" id="delete-form">
            <div class="container-form">
                <div class="form-container user-form">
                    <div class="head">
                        <h3>Delete Product</h3>
                        <button class="close-form-btn"><img src="../img/icons/close.svg" alt=""></button>
                    </div>
                    <div id="msg-edit"></div>
                    <form id="user-form">
                        <div class="brands">
                            <div class="deletion-msg">

                            </div>
                            <div class="delete-container">
                                <p>This Action will Remove all category and Product Originated from this Brand. <br>
                                    Are You Sure You want to Delete this Brand...?.</p>
                            </div>
                            <div class="button-container">
                                <div class="delete-button">
                                    <button class="delete" type="button" id="delete-brand-btn">Yes Delete</button>
                                    <button type="button" class="close-form-btn">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                            <input id="search-brand" autocomplete="off" type="text"><button>Search</button>
                        </div>

                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Added</th>
                                <th>Brand Name</th>
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