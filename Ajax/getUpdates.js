$(document).ready(() => {

    const user = $('#user-id-edit').val()
    getUserprofile(user)


    $(document).on('click', '#edit-btn-product', function () {
        const productId = $(this).data('id');
        getProductForEdit(productId);
        $('#edit-msg').html('');
        // alert(productId)
    });

    $(document).on('click', '#edit-btn-category', function () {
        const categoryId = $(this).data('id');
        getCategoryForEdit(categoryId);
        $('#edit-msg').html('');
        // alert(categoryId)
    });

    $(document).on('click', '#edit-btn-brand', function () {
        const brandId = $(this).data('id');
        getBrandForEdit(brandId);
        $('#edit-msg').html('');
        // alert(brandId)
    });

    $(document).on('click', '#edit-user', function () {
        const userId = $(this).data('id');
        getUserForEdit(userId)
        $('#msg-edit').html('');
        // alert(user)
    });


    $(document).on('click', '#edit-btn-supplier', function () {
        const supplierId = $(this).data('id');
        getSupplierForEdit(supplierId)
        $('#edit-msg').html('');
        //    alert(supplierId)
    });

    $(document).on('click', '#edit-btn-order', function () {
        const orderId = $(this).data('id');
        getOrderForEdit(orderId)
        $('#edit-msg').html('');
    });

    // closing it
    $(document).on('click', '.close-form-btn', () => {
        $('#update-form').hide();

    });
});

const getProductForEdit = (productId) => {

    $.ajax({
        url: '../php_action/get.php',
        method: 'POST',
        data: { product_id: productId },
        dataType: 'json',
        success: (response) => {

            response.products.map((item) => {
                // alert(item.product_name)

                $('#edit-product_id').val(item.id);
                $('#edit-product-name').val(item.product_name);
                $('#edit-price').val(item.price);
                $('#edit-qty').val(item.quantity);
                $('#edit-brand').val(item.brand_name);
                $('#edit-category').val(item.category_name);
                $('#edit-status').val(item.status = 'Active' );
            });

            $('#update-form').css('display', 'block');
        }
    });
}


const getBrandForEdit = (brandId) => {

    $.ajax({
        url: '../php_action/get.php',
        method: 'POST',
        data: { brand_id: brandId },
        dataType: 'json',
        success: (response) => {

            response.brands.map((item) => {
                // alert(item.brand_name)

                $('#edit-brand_id').val(item.brand_id);
                $('#edit-brand').val(item.name);

            });

            $('#update-form').css('display', 'block');
        }
    });
}

const getCategoryForEdit = (categoryId) => {

    $.ajax({
        url: '../php_action/get.php',
        method: 'POST',
        data: { category_id: categoryId },
        dataType: 'json',
        success: (response) => {

            response.categories.map((item) => {
                // alert(item.brand_name)

                $('#edit-category-id').val(item.category_id);
                $('#edit-brand-category').val(item.brand_name);
                $('#edit-category-name').val(item.category_name);

            });

            $('#update-form').css('display', 'block');
        }
    });
}

const getUserForEdit = (userId) => {

    $.ajax({
        url: '../php_action/get.php',
        method: 'POST',
        data: { employee_id: userId },
        dataType: 'json',
        success: (response) => {

            response.employee.map((item) => {
                // alert(item.name)

                $("#user-id-edit").val(item.employee_id)
                $("#edit-name").val(item.name);
                $("#edit-email").val(item.email);
                $("#edit-phone").val(item.phone);

            });

            $('#update-form').css('display', 'block');
        }
    });
}

const getSupplierForEdit = (supplierId) => {

    $.ajax({
        url: '../php_action/get.php',
        method: 'POST',
        data: { supplier_id: supplierId },
        dataType: 'json',
        success: (response) => {

            response.supplier.map((item) => {
                // alert(item.name)

                $("#supp-id-edit").val(item.supplier_id);
                $("#edit-name").val(item.name);
                $("#edit-email").val(item.email);
                $("#edit-phone").val(item.phone);

            });

            $('#update-form').css('display', 'block');
        }
    });
}

const getUserprofile = (user) => {

    $.ajax({
        url: '../php_action/get.php',
        method: 'POST',
        data: { employee_id: user },
        dataType: 'json',
        success: (response) => {

            response.employee.map((item) => {
                //  alert(item.name)

                $("#user-id-edit").val(item.employee_id)
                $("#edit-name").val(item.name);
                $("#edit-email").val(item.email);
                $("#edit-phone").val(item.phone);

            });

        }
    });
}

const getOrderForEdit = (orderId) => {

    $.ajax({
        url: '../php_action/get.php',
        method: 'POST',
        data: { order_id: orderId },
        dataType: 'json',
        success: (response) => {

            response.order.map((item) => {
                // alert(item.name)

                $("#order-id-edit").val(item.order_id);
                $("#cname").val(item.client_name);
                $("#cemail").val(item.client_email);
                $("#cphone").val(item.client_phone);
                $("#amount").val(item.subtotal);
                $("#due-amount").val(item.payed_amount);
                $("#total").val(item.total_price);
                $("#pmethod").val(item.payment_method);

            });

            $('#update-form').css('display', 'block');
        }
    });
}
