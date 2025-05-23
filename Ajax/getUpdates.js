$(document).ready(() => {
    $(document).on('click', '#edit-btn-product', function () {
        const productId = $(this).data('id');
        getProductForEdit(productId);
        // alert(productId)
    });

    $(document).on('click', '#edit-btn-category', function () {
        const categoryId = $(this).data('id');
        getCategoryForEdit(categoryId);
        // alert(categoryId)
    });
        $(document).on('click', '#edit-btn-brand', function () {
        const brandId = $(this).data('id');
        getBrandForEdit(brandId);
        // alert(brandId)
    });
    

    $(document).on('click', '#edit-btn-user', function () {
        const userId = $(this).data('id');
        getUserForEdit(userId)
        //    alert(userId)
    });

    $(document).on('click', '#edit-btn-supplier', function () {
        const supplierId = $(this).data('id');
        getSupplierForEdit(supplierId)
        //    alert(supplierId)
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

                $('#edit-id').val(item.id);
                $('#edit-product-name').val(item.product_name);
                $('#edit-price').val(item.price);
                $('#edit-qty').val(item.quantity);
                $('#edit-brand').val(item.brand_name);
                $('#edit-category').val(item.category_name);
                $('#edit-status').val(item.status);
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

                $('#edit-category-id').val(item.brand_id);
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
                $("#edit-password").val(item.password);

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