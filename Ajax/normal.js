$(document).ready(() => {
    fetchProducts(); // calling the fetching product function  
    fetchProductsBrands(); // calling the fetching product brands function  
    fetchProductsCategory(); // calling the fetching product  details  function  (brands, category) for forms 
    fetchingOrders(); // calling the fetching orders function
    fethcingUserData()
    fetchingSupplierData()
});

const fetchProducts = () => {
    $.ajax({
        url: '../php_action/fetchproducts.php',
        method: 'GET',
        dataType: 'json',
        success: (response) => {
            if (response.products && response.products.length > 0) {
                let tableRows = '';
                let count = 0

                response.products.map((product, index) => {
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

                    </tr>
                `;
                });

                $('#product-data-user').html(tableRows);
            } else {
                $('#product-data-user').html(`
                <tr>
                    <td>No Products found</td>
                </tr>
            `);
            }
        },
        error: (error) => {
            console.error("Error loading product data:", error);
            $('#product-data-user').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading products</td>
            </tr>
        `);
        }
    });
}


const fetchProductsBrands = () => {
    $.ajax({
        url: '../php_action/fetchBrands.php',
        method: 'GET',
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
                    </tr>
                `;
                });

                $('#brand-data-user').html(tableRows);
            } else {
                $('#brand-data-user').html(`
                <tr>
                    <td colspan="8" class="text-center">No brands found</td>
                </tr>
            `);
            }
        },
        error: (error) => {
            console.error("Error loading brands data:", error);
            $('#brand-data-user').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading brands</td>
            </tr>
        `);
        }
    });
}

const fetchProductsCategory = () => {
    $.ajax({
        url: '../php_action/fetchcategories.php',
        method: 'GET',
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
                       
                    </tr>
                `;
                });

                $('#category-data-user').html(tableRows);
            } else {
                $('#category-data-user').html(`
                <tr>
                    <td colspan="8" class="text-center">No category found</td>
                </tr>
            `);
            }
        },
        error: (error) => {
            console.error("Error loading category data:", error);
            $('#category-data-user').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading category</td>
            </tr>
        `);
        }
    });
}

const fetchingOrders = () => {
    // fetching orders data and displaying it
    $.ajax({
        url: '../php_action/fetchorders.php',
        method: 'GET',
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
                        ${order.status == 1 ? `<td><span class="active">Received</span></td>`
                            : `<td><span class="pending">Progress</span></td>`}
                        ${order.total_price == order.payed_amount ? `<td><span class="active">Payed</span></td>`
                            : `<td><span class="inactive">Pending</span></td>`}

                    </tr>
                `;
                });

                $('#order-data-user').html(tableRows);
            } else {
                $('#order-data-user').html(`
                <tr>
                    <td>No Orders found</td>
                </tr>
            `);
            }
        },
        error: (error) => {
            console.error("Error loading Order data:", error);
            $('#order-data-user').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading Orders</td>
            </tr>
        `);
        }
    });
}

const fethcingUserData = () => {
    $.ajax({
        url: '../php_action/fetchuser.php',
        method: 'GET',
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
                    </tr>
                `;
                });

                $('#user-data-user').html(tableRows);
            } else {
                $('#user-data-user').html(`
                <tr>
                    <td colspan="8" class="text-center">No user found</td>
                </tr>
            `);
            }
        },
        error: (xhr, status, error) => {
            console.error("Error loading user data:", error);
            $('#user-data-user').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading Users</td>
            </tr>
        `);
        }
    });

}

// fetching and display supplier data
const fetchingSupplierData = () => {
    $.ajax({
        url: '../php_action/fetchsupplier.php',
        method: 'GET',
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
                        
                    </tr>
                `;
                });

                $('#supplier-data-user').html(tableRows);
            } else {
                $('#supplier-data-user').html(`
                <tr>
                    <td colspan="8" class="text-center">No Suppliers found</td>
                </tr>
            `);
            }
        },
        error: (xhr, status, error) => {
            console.error("Error loading Suppliers data:", error);
            $('#supplier-data-user').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading Suppliers</td>
            </tr>
        `);
        }
    });

}
