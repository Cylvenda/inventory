$(document).ready(() => {
    // Initialize with one empty row
    addRow();
    getOrderProducts();

    // Add more rows when button is clicked
    $('#add-more').click(addRow);

    // Remove row when minus button is clicked
    $(document).on('click', '.minus', function () {
        $(this).closest('tr').remove();
        updateOrderSummary();
    });

    // Place order button handler
    $('#place-order').click(submitOrder);

    // Initialize summary fields
    updateOrderSummary();
});

let rowCount = 0;
let productData = {};

const addRow = () => {
    rowCount++;

    const newRow = `
    <tr id="row-${rowCount}">
        <td class="select">
            <select class="product-select" name="products[]" data-row="${rowCount}">
                <option value="">Select Product</option>
            </select>
        </td>
        <td>
            <input type="number" class="available-qty" disabled>
        </td>
        <td>
            <input type="number" class="product-price" disabled>
        </td>
        <td>
            <input type="number" class="qty" name="quantities[]" min="1" value="1" max="50">
        </td>
        <td>
            <input type="number" class="total-price" disabled>
        </td>
        <td>
            <button type="button" class="minus">
                <img src="../img/icons/delete_red.svg" alt="Remove">
            </button>
        </td>
    </tr>`;

    $('#table-rows').append(newRow);
    populateProductDropdown(rowCount);
    initRowEvents(rowCount);
};

const populateProductDropdown = (rowId) => {
    let options = '<option value="">Select Product</option>';

    Object.entries(productData).forEach(([id, product]) => {
        options += `<option value="${id}">${product.product_name}</option>`;
    });

    $(`#row-${rowId} .product-select`).html(options);
};

const initRowEvents = (rowId) => {
    const row = $(`#row-${rowId}`);

    row.find('.product-select').change(function () {
        const productId = $(this).val();
        updateRowDetails(rowId, productId);
        updateOrderSummary();
    });

    row.find('.qty').on('input', function () {
        calculateRowTotal(rowId);
        updateOrderSummary();
    });
};

const updateRowDetails = (rowId, productId) => {
    const row = $(`#row-${rowId}`);

    if (!productId) {
        row.find('.available-qty, .product-price, .total-price').val('');
        return;
    }

    const product = productData[productId];
    row.find('.available-qty').val(product.quantity);
    row.find('.product-price').val(product.price);
    calculateRowTotal(rowId);
};

const calculateRowTotal = (rowId) => {
    const row = $(`#row-${rowId}`);
    const price = parseInt(row.find('.product-price').val());
    const qty = parseInt(row.find('.qty').val());
    const available = parseInt(row.find('.available-qty').val());

    // Validate quantity doesn't exceed available
    if (qty > available) {
        row.find('.qty').val(available);
        alert(`Cannot order more than available quantity (${available})`);
    }

    const total = price * (qty > available ? available : qty);
    row.find('.total-price').val(total);
};

const updateOrderSummary = () => {
    let totalItems = 0;
    let subTotal = 0;

    $('tbody tr').each(function () {
        const qty = parseInt($(this).find('.qty').val());
        const price = parseInt($(this).find('.total-price').val());

        totalItems += qty;
        subTotal += price;
    });

    const discount = parseInt($('#discount').val());
    const discountAmount = subTotal * (discount / 100);
    const totalPrice = subTotal - discountAmount;
    const paidAmount = parseInt($('#paid-amount').val());
    const balanceDue = totalPrice - paidAmount;

    $('#total-items').val(totalItems);
    $('#sub-total').val(subTotal);
    $('#total-price').val(totalPrice);
    $('#order-total').val(totalPrice);
    $('#balance-due').val(balanceDue);
};

const getOrderProducts = () => {
    $.ajax({
        url: '../php_action/fetchproducts.php',
        method: 'GET',
        dataType: 'json',
        success: (response) => {
            if (response.products) {
                productData = response.products.reduce((acc, product) => {
                    acc[product.product_id] = {
                        product_name: product.product_name,
                        price: parseInt(product.price),
                        quantity: parseInt(product.quantity)
                    };
                    return acc;
                }, {});

                $('.product-select').each(function () {
                    const rowId = $(this).data('row');
                    populateProductDropdown(rowId);
                });
            }
        },
        error: (xhr) => {
            console.error("Error loading products:", xhr.responseText);
            alert("Failed to load products. Please try again.");
        }
    });
};

const submitOrder = () => {
    const orderItems = [];
    let isValid = true;

    $('tbody tr').each(function () {
        const productId = $(this).find('.product-select').val();
        const qty = parseInt($(this).find('.qty').val());

        if (!productId) {
            isValid = false;
            return false; // break loop
        }

        orderItems.push({
            product_id: productId,
            quantity: qty,
            price: parseInt($(this).find('.product-price').val())
        });
    });

    if (!isValid || orderItems.length === 0) {
        alert('Please select products for all items');
        return;
    }

    const orderData = {
        user_id: $('#user_id').val(),
        name: $('#name').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        items: orderItems,
        discount: parseInt($('#discount').val()),
        payment_method: $('#payment-method').val(),
        paid_amount: parseInt($('#paid-amount').val()),
    };


    $.ajax({
        url: '../php_action/processOrder.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(orderData),
        success: (response) => {
           // $('#order-msg').css('display', 'block');
            $(".delete-container").html(`<div class='msg-success'>${response.success}</div>`);
            // alert('Order placed successfully!');
             window.location.href = 'Orders';
        },
        error: (xhr) => {
            console.error("Error submitting order:", xhr.responseText);
           // alert("Failed to place order. Please try again.");
          //  $('#order-msg').css('display', 'block');
            $(".delete-container").html(`<div class='msg-error'>${response.error}</div>`);
        }
    });
};

// Add event listeners for summary updates
$('#discount, #paid-amount').on('input', updateOrderSummary);