$(document).ready(() => {

    $("#search-product").keyup(function () {

        let searchValue = $(this).val();
        // console.log(searchValue)

        getSearchProduct(searchValue);

    })

    $("#search-brand").keyup(function () {

        let searchValue = $(this).val();
        // console.log(searchValue)

        getSearchBrand(searchValue)

    })

    $("#search-category").keyup(function () {

        let searchValue = $(this).val();
        // console.log(searchValue)

       getSearchCategory(searchValue)

    })

    $("#search-order").keyup(function () {

        let searchValue = $(this).val();
        // console.log(searchValue)

        getSearchOrders(searchValue);

    })

    $("#search-user").keyup(function () {

        let searchValue = $(this).val();
        // console.log(searchValue)

        getSearchUser(searchValue);

    })

    $("#search-supplier").keyup(function () {

        let searchValue = $(this).val();
        // console.log(searchValue)

        getSearchSupplier(searchValue);

    })

});

const getSearchProduct = (searchValue) => {

    $.ajax({
        url: '../php_action/search.php',
        method: 'POST',
        data: { productSearch: searchValue },
        dataType: 'json',
        success: (response) => {
            if (response.productResult && response.productResult.length > 0) {
                let tableRows = '';
                let count = 0;

                response.productResult.map((product, index) => {
                    const formattedPrice = Number(product.price).toLocaleString('en-US', {
                        maximumFractionDigits: 0  // No decimal places
                    });

                    product.payment_status == 1
                    count++;
                    tableRows += `
                    <tr >
                        <td>${count}</td>
                         <td><img src="../img/uploads/${product.image}" width="50" height="50" alt="${product.product_name}"></td>
                        <td>${product.brand_name}</td>
                        <td>${product.category_name}</td>
                        <td>${product.product_name}</td>
                        <td>${formattedPrice}</td>
                        <td>${product.quantity}</td>
                        ${product.quantity > 1 ? `<td><span class="active">Available</span></td>`
                            : `<td><span class="inactive">Stock Out</span></td>`}
                           <td> 
                            <div class="table-button">
                                <button id="edit-btn-product" data-id="${product.product_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button id="delete-product" data-id="${product.product_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#product-data').html(tableRows);
            } else {
                $('#product-data').html(`
                <tr>
                    <td>No Products found</td>
                </tr>
            `);
            }
        },
        error: (error) => {
            console.error("Error loading product data:", error);
            $('#product-data').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading products</td>
            </tr>
        `);
        }
    });
}

const getSearchBrand = (searchValue) => {
    $.ajax({
        url: '../php_action/search.php',
        method: 'POST',
        data: { brandSearch: searchValue },
        dataType: 'json',
        success: (response) => {
            if (response.brands && response.brands.length > 0) {
                let tableRows = '';
                let count = 0

                response.brands.map((brand, index) => {

                    count++;
                    tableRows += `
                    <tr>
                        <td>${count}</td>
                        <td>${brand.date}</td>
                        <td>${brand.name}</td>
                        <td>
                            <div class="table-button">
                                <button  id="edit-btn-brand" data-id="${brand.brand_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button id="delete-brand" data-id="${brand.brand_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#brand-data').html(tableRows);
            } else {
                $('#brand-data').html(`
                <tr>
                    <td colspan="8" class="text-center">No brands found</td>
                </tr>
            `);
            }
        },
        error: (error) => {
            console.error("Error loading brands data:", error);
            $('#brand-data').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading brands</td>
            </tr>
        `);
        }
    });
}

const getSearchCategory = (searchValue) => {
    $.ajax({
        url: '../php_action/search.php',
        method: 'POST',
        data: { categorySearch: searchValue },
        dataType: 'json',
        success: (response) => {
            if (response.categories && response.categories.length > 0) {
                let tableRows = '';
                let count = 0

                response.categories.map((category, index) => {

                    count++;
                    tableRows += `
                    <tr>
                        <td>${count}</td>
                        <td>${category.date}</td>
                        <td>${category.name}</td>
                        <td>${category.brand_name}</td>
                       
                        <td>
                            <div class="table-button">
                                <button id="edit-btn-category" data-id="${category.category_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button id="delete-category" data-id="${category.category_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#category-data').html(tableRows);
            } else {
                $('#category-data').html(`
                <tr>
                    <td colspan="8" class="text-center">No category found</td>
                </tr>
            `);
            }
        },
        error: (error) => {
            console.error("Error loading category data:", error);
            $('#category-data').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading category</td>
            </tr>
        `);
        }
    });
}

const getSearchOrders = (searchValue) => {

    $.ajax({
        url: '../php_action/search.php',
        method: 'POST',
        data: { orderSearch: searchValue },
        dataType: 'json',
        success: (response) => {
            if (response.orders && response.orders.length > 0) {
                let tableRows = '';
                let count = 0

                response.orders.map((order, index) => {
                    const formattedPrice = Number(order.price).toLocaleString('en-US', {
                        maximumFractionDigits: 0  // No decimal places
                    });

                    order.payment_status == 1
                    count++;
                    tableRows += `
                    <tr >
                        <td>${count}</td>
                        <td>${order.date}</td>
                        <td>${order.client_name}</td>
                        <td>${order.total_items}</td>
                        <td>${order.total_price}</td>
                        <td>${order.payed_amount}</td>
                        ${order.status == 1 ? `<td><span class="active">Done</span></td>`
                            : `<td><span class="pending">Pending</span></td>`}
                        ${order.total_price == order.payed_amount ? `<td><span class="active">Payed</span></td>`
                            : `<td><span class="inactive">Not Payed</span></td>`}
                        <td>
                            <div class="table-button">
                                <button id="edit-btn-order" data-id="${order.order_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button id="status-order" data-id="${order.order_id}"><img src="../img/icons/swaping.svg" alt="Change"></button>
                                <button id="delete-order" data-id="${order.order_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#order-data').html(tableRows);
            } else {
                $('#order-data').html(`
                <tr>
                    <td>No Orders found</td>
                </tr>
            `);
            }
        },
        error: (error) => {
            console.error("Error loading Order data:", error);
            $('#order-data').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading Orders</td>
            </tr>
        `);
        }
    });
}

const getSearchSupplier = (searchValue) => {
    $.ajax({
        url: '../php_action/search.php',
        method: 'POST',
        data: { supplierSearch: searchValue },
        dataType: 'json',
        success: (response) => {
            if (response.suppliers && response.suppliers.length > 0) {
                let tableRows = '';
                let count = 0

                response.suppliers.map((supp, index) => {

                    count++;
                    tableRows += `
                    <tr>
                        <td>${count}</td>
                        <td>${supp.date}</td>
                        <td>${supp.name}</td>
                        <td>${supp.email}</td>
                        <td>${supp.phone}</td>
                         ${supp.status == 1 ? `<td><span class="active">Active</span></td>`
                            : `<td><span class="inactive">Not Active</span></td>`}
                        
                        <td>
                            <div class="table-button">
                                <button id="edit-btn-supplier" data-id="${supp.supplier_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button id="status-supplier" data-id="${supp.supplier_id}"><img src="../img/icons/swaping.svg" alt="Change"></button>
                                <button id="delete-supplier" data-id="${supp.supplier_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#supplier-data').html(tableRows);
            } else {
                $('#supplier-data').html(`
                <tr>
                    <td colspan="8" class="text-center">No Suppliers found</td>
                </tr>
            `);
            }
        },
        error: (xhr, status, error) => {
            console.error("Error loading Suppliers data:", error);
            $('#supplier-data').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading Suppliers</td>
            </tr>
        `);
        }
    });

}

const getSearchUser = (searchValue) => {
    $.ajax({
        url: '../php_action/search.php',
        method: 'POST',
        data: { userSearch: searchValue },
        dataType: 'json',
        success: (response) => {
            if (response.users && response.users.length > 0) {
                let tableRows = '';
                let count = 0

                response.users.map((user, index) => {

                    count++;
                    tableRows += `
                    <tr>
                        <td>${count}</td>
                        <td>${user.date}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${user.phone}</td>
                        ${user.role == 'admin' ? `<td><span class="pending">Admin</span></td>` :
                            user.role == 'owner' ? `<td><span class="pending">Owner</span></td>` :
                                user.role == 'manager' ? `<td><span class="pending">Manager</span></td>` :
                                    user.role == 'saller' ? `<td><span class="pending">Saller</span></td>` :
                                        `<td><span class="pending">Employee</span></td>`}
                        ${user.status == 1 ? `<td><span class="active">Active</span></td>`
                            : `<td><span class="inactive">Not Active</span></td>`}
                        <td>
                            <div class="table-button">
                                <button id="edit-user" data-id="${user.employee_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button id="user-status" data-id="${user.employee_id}"><img src="../img/icons/swaping.svg" alt="Change"></button>
                                <button id="delete-user" data-id="${user.employee_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#user-data').html(tableRows);
            } else {
                $('#user-data').html(`
                <tr>
                    <td colspan="8" class="text-center">No user found</td>
                </tr>
            `);
            }
        },
        error: (xhr, status, error) => {
            console.error("Error loading user data:", error);
            $('#user-data').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading Users</td>
            </tr>
        `);
        }
    });

}