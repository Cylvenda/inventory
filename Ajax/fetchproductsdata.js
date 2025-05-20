$(document).ready(() => {


    fetchProducts(); // calling the fetching product function  
    fetchProductsBrands(); // calling the fetching product brands function  
    fetchProductsCategory(); // calling the fetching product  details  function  (brands, category) for forms 
    fetchingOrders(); // calling the fetching orders function
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
                    count++;
                    tableRows += `
                    <tr data-id="${product.id}">
                    <td>${count}</td>
                        <td><img src="../img/uploads/${product.image}" width="40" height="30" alt="${product.product_name}"></td>
                        <td>${product.product_name}</td>
                        <td>${product.brand_name}</td>
                        <td>${product.category_name}</td>
                        <td>${formattedPrice}</td>
                        <td>${product.quantity}</td>
                        ${product.status == 1 ? `<td><span class="active">Active</span></td>`
                            : `<td><span class="inactive">Not Active</span></td>`}
                        <td>
                            <div class="table-button">
                                <button data-id="${product.id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button data-id="${product.id}"><img src="../img/icons/swaping.svg" alt="Change"></button>
                                <button data-id="${product.id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#product-data').html(tableRows);
            } else {
                $('#product-data').html(`
                <tr>
                    <td colspan="8" class="text-center">No products found</td>
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
                        ${brand.status == 1 ? `<td><span class="active">Active</span></td>`
                            : `<td><span class="inactive">Not Active</span></td>`}
                        <td>
                            <div class="table-button">
                                <button data-id="${brand.brand_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button data-id="${brand.brand_id}"><img src="../img/icons/swaping.svg" alt="Change"></button>
                                <button data-id="${brand.brand_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
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
                        ${category.status == 1 ? `<td><span class="active">Active</span></td>`
                            : `<td><span class="inactive">Not Active</span></td>`}
                        <td>
                            <div class="table-button">
                                <button data-id="${category.category_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button data-id="${category.category_id}"><img src="../img/icons/swaping.svg" alt="Change"></button>
                                <button data-id="${category.category_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
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
                        <td>${order.client_email}</td>
                        <td>${order.client_phone}</td>
                        ${order.status == 1 ? `<td><span class="active">Done</span></td>`
                            : `<td><span class="pending">Pending</span></td>`}
                        ${order.payment_status == 1 ? `<td><span class="active">Payed</span></td>`
                            : `<td><span class="inactive">Not Payed</span></td>`}
                        <td>
                            <div class="table-button">
                                <button data-id="${order.order_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button data-id="${order.order_id}"><img src="../img/icons/swaping.svg" alt="Change"></button>
                                <button data-id="${order.order_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
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