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
            <span> <a href="Dashboard">Home</a> / <a href="Suppliers">Suppliers</a></span>
            <span>
                <h3>Supplier Management</h3>
            </span>
            <span><button onclick="getForm()">Add New supplier</button></span>
        </div>

        <div class="container-form-product" id="product-form-product">
            <div class="container-form">
                <div class="form-container user-form">
                    <div class="head">
                        <h3>Add New Suppliers</h3>
                        <button class="close-form-btn"><img src="../img/icons/close.svg" alt=""></button>
                    </div>
                    <div id="msg"></div>
                    <form id="user-form">
                        <div class="brands">
                            <div class="form-inputs">
                                <label for="text">Name:</label>
                                <input type="text" id="name" placeholder="Enter users Name">
                                <span class="form-error" id="form-error-name"></span>
                            </div>
                            <div class="form-inputs">
                                <label for="name">Email:</label>
                                <input type="email" id="email" name="email" placeholder="Enter User Email">
                                <span class="form-error" id="form-error-email"></span>
                            </div>

                            <div class="form-inputs">
                                <label for="phone">Phonenumber:</label>
                                <input type="tel" name="phone" id="phone" placeholder="Enter users Phonenumber">
                                <span class="form-error" id="form-error-phone"></span>
                            </div>


                            <div class="form-inputs">
                                <label for="status">Status:</label>
                                <select name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                                <span class="form-error" id="form-error-status"></span>
                            </div>

                            <div class="button-container">
                                <button type="button" onclick="addSupplier()">Add Suppliers</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

         <div class="container-form-product" id="update-form">
            <div class="container-form">
                <div class="form-container user-form">
                    <div class="head">
                        <h3>Edit Suppliers Details</h3>
                        <button class="close-form-btn"><img src="../img/icons/close.svg" alt=""></button>
                    </div>
                    <div id="msg-edit"></div>
                    <form id="user-form">
                        <div class="brands">
                            <input type="hidden" id="supp-id-edit" name="supp-id-edit">
                            <div class="form-inputs">

                                <label for="text">Name:</label>
                                <input type="text" id="edit-name" placeholder="Enter users Name">
                                <span class="form-error" id="form-error-name"></span>
                            </div>
                            <div class="form-inputs">
                                <label for="name">Email:</label>
                                <input type="email" id="edit-email" name="email" placeholder="Enter User Email">
                                <span class="form-error" id="form-error-email"></span>
                            </div>

                            <div class="form-inputs">
                                <label for="phone">Phonenumber:</label>
                                <input type="tel" name="phone" id="edit-phone" placeholder="Enter users Phonenumber">
                                <span class="form-error" id="form-error-phone"></span>
                            </div>


                            <div class="button-container">
                                <button type="button" onclick="updateSupplier()">Update Suppliers</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

                <!-- delete supplier model -->
                <div class="container-form-product" id="delete-form">
            <div class="container-form">
                <div class="form-container user-form">
                    <div class="head">
                        <h3>Delete Supplier</h3>
                        <button class="close-form-btn"><img src="../img/icons/close.svg" alt=""></button>
                    </div>
                    <div id="msg-edit"></div>
                    <form id="user-form">
                        <div class="brands">
                            <div class="deletion-msg">

                            </div>
                            <div class="delete-container">
                                <p>Are You Sure You want to Delete this Supplier...?.</p>
                            </div>
                            <div class="button-container">
                                <div class="delete-button">
                                    <button class="delete" type="button" id="delete-supplier-btn">Yes Delete</button>
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
                                <p>Are You Sure You want to Change this Supplier Status,
                                    This action will transform this supplier to Inactive
                                </p>
                            </div>
                            <div class="button-container">
                                <div class="delete-button">
                                    <button class="order" type="button" id="change-supp-btn">Yes Change</button>
                                    <button type="button" class="close-form-btn"> Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="main-container">
            <div class="boxes">
                <h3>Our Suppliers</h3>
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
                            <input id="search-supplier" type="text"><button>Search</button>
                        </div>

                    </div>

                    <table>
                     <thead>
                           <tr>
                            <th>#</th>
                            <th>Date Added</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                     </thead>
                        
                        <tbody id="supplier-data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

<?php require_once '../include/footer.php' ?>
