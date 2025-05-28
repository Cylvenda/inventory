
$(document).on('click', '#delete-user', function () {
    const userId = $(this).data('id');
    // alert(userId)
    $('#delete-form').css('display', 'block');


    $(document).on('click', '#delete-user-btn', function () {
        deleteUser(userId);
    });
});

$(document).on('click', '#delete-brand', function () {
    const brandId = $(this).data('id');
    // alert(brandId)
    $('#delete-form').css('display', 'block');

        $(document).on('click', '#delete-brand-btn', function () {
         deletebrand(brandId);
    });
});

$(document).on('click', '#delete-category', function () {
    const categoryId = $(this).data('id');
    // alert(categoryId)
    $('#delete-form').css('display', 'block');

        $(document).on('click', '#delete-category-btn', function () {
       deletecategory(categoryId);
    });
});

$(document).on('click', '#delete-order', function () {
    const userId = $(this).data('id');
    // alert(userId)
    $('#delete-form').css('display', 'block');

        $(document).on('click', '#delete-order-btn', function () {
       deleteorder(orderId);
    });
});

$(document).on('click', '#delete-supplier', function () {
    const supplierId = $(this).data('id');
    // alert(supplierId)
    $('#delete-form').css('display', 'block');

        $(document).on('click', '#delete-supplier-btn', function () {
        deletesupplier(supplierId);
    });
});

$(document).on('click', '#delete-product', function () {
    const productId = $(this).data('id');
    // alert(productId)
    $('#delete-form').css('display', 'block');

        $(document).on('click', '#delete-product-btn', function () {
       deleteproduct(productId);
    });
});

// removing all popups on delete
$(document).on('click', '.close-form-btn', () => {
    $('#delete-form').hide();
});


const deleteUser = (userId) => {

    $.ajax({
        url: "../php_action/delete.php",
        method: "POST",
        data: { user_id: userId },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $(".deletion-msg").html(`<div class='msg-success'>${response.success}</div>`);
                fethcingUserData();
                $('.delete-container').css('display', 'none');
                $('#delete-user-btn').css('display', 'none');
            } else {
                $("#msg-edit").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};

const deletesupplier = (supplierId) => {

    $.ajax({
        url: "../php_action/delete.php",
        method: "POST",
        data: { supplier_id: supplierId },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $(".deletion-msg").html(`<div class='msg-success'>${response.success}</div>`);
                fetchingSupplierData()
                $('.delete-container').css('display', 'none');
                $('#delete-supplier-btn').css('display', 'none');
            } else {
                $("#msg-edit").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};

const deletebrand = (brandId) => {

    $.ajax({
        url: "../php_action/delete.php",
        method: "POST",
        data: { brand_id: brandId },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $(".deletion-msg").html(`<div class='msg-success'>${response.success}</div>`);
                fetchProductsBrands();
                $('.delete-container').css('display', 'none');
                $('#delete-brand-btn').css('display', 'none');
            } else {
                $("#msg-edit").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};

const deletecategory = (categoryId) => {

    $.ajax({
        url: "../php_action/delete.php",
        method: "POST",
        data: { category_id: categoryId },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $(".deletion-msg").html(`<div class='msg-success'>${response.success}</div>`);
                fetchProductsCategory()
                $('.delete-container').css('display', 'none');
                $('#delete-category-btn').css('display', 'none');
            } else {
                $("#msg-edit").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};

const deleteproduct = (productId) => {

    $.ajax({
        url: "../php_action/delete.php",
        method: "POST",
        data: { product_id: productId },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $(".deletion-msg").html(`<div class='msg-success'>${response.success}</div>`);
                fetchProducts();
                $('.delete-container').css('display', 'none');
                $('#delete-product-btn').css('display', 'none');
            } else {
                $("#msg-edit").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};

const deleteorder = (orderId) => {

    $.ajax({
        url: "../php_action/delete.php",
        method: "POST",
        data: { order_id: orderId },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $(".deletion-msg").html(`<div class='msg-success'>${response.success}</div>`);
                fetchingOrders() 
                $('.delete-container').css('display', 'none');
                $('#delete-order-btn').css('display', 'none');
            } else {
                $("#msg-edit").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};
