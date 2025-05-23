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
            <span><a href="Dashboard">Home</a> / <a href="">Categories</a></span>
            <span>
                <h3>Category Management</h3>
            </span>
            <span>
                <button onclick="getForm()">Add New Category</button>
            </span>
        </div>
        <div class="container-form-product" id="product-form-product">
            <div class="container-form">
                <div class="form-container">
                    <div class="brands">
                        <div class="head">
                            <h3>Add New Category</h3>
                            <button class="close-form-btn"><img src="../img/icons/close.svg" alt=""></button>
                        </div>
                        <div id="msg" class="msg">

                        </div>

                        <form id="category-form">
                            <div class="form-inputs">
                                <label for="category">Select Brand:</label>
                                <select id="brand" required>
                                </select>
                                <span class="form-error" id="form-error-category"></span>
                            </div>

                            <div class="form-inputs">
                                <label for="name">Category Name:</label>
                                <input type="text" id="name" name="category" placeholder="Enter Category Name..">
                                <span class="form-error" id="form-error-category"></span>
                            </div>

                            <div class="form-inputs">
                                <select name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                            </div>
                            <div class="button-container">
                                <button type="button" onclick="addCategory()">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-form-product" id="update-form">
            <div class="container-form">
                <div class="form-container">
                    <div class="brands">
                        <div class="head">
                            <h3>Add New Category</h3>
                            <button class="close-form-btn"><img src="../img/icons/close.svg" alt=""></button>
                        </div>
                        <div id="msg" class="msg">

                        </div>
                        <input type="hidden" id="edit-category-id" name="edit-category-id">
                        <form id="category-form">
                            <div class="form-inputs">
                                <label for="category">Select Brand:</label>
                                <select  required>
                                    <option  ><span id="edit-brand-category"></span></option>
                                </select>
                                <span class="form-error" id="form-error-category"></span>
                            </div>

                            <div class="form-inputs">
                                <label for="name">Category Name:</label>
                                <input type="text" id="edit-category-name" name="category" placeholder="Enter Category Name..">
                                <span class="form-error" id="form-error-category"></span>
                            </div>

                            <div class="button-container">
                                <button type="button" onclick="updateCategory()">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                            <!-- delete category model -->
                <div class="container-form-product" id="delete-form">
            <div class="container-form">
                <div class="form-container user-form">
                    <div class="head">
                        <h3>Delete Category</h3>
                        <button class="close-form-btn"><img src="../img/icons/close.svg" alt=""></button>
                    </div>
                    <div id="msg-edit"></div>
                    <form id="user-form">
                        <div class="brands">
                            <div class="delete-container">
                                <p>Are You Sure You want to Delete this Category...?.</p>
                            </div>
                            <div class="button-container">
                                <div class="delete-button">
                                    <button class="delete" type="button" onclick="deleteteUser()">Yes Delete</button>
                                    <button type="button" class="close-form-btn">No Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="main-container">
            <div class="boxes">
                <h3>Available From the Store</h3>
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
                                <th>Category Name</th>
                                <th>Brand Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="category-data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

<?php require_once '../include/footer.php' ?>