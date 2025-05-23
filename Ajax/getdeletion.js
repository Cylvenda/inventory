
$(document).on('click', '#delete-user', function () {
    const userId = $(this).data('id');
    // alert(userId)
    $('#delete-form').css('display', 'block');
});

$(document).on('click', '#delete-brand', function () {
    const brandId = $(this).data('id');
    // alert(brandId)
    $('#delete-form').css('display', 'block');
});

$(document).on('click', '#delete-category', function () {
    const categoryId = $(this).data('id');
    // alert(categoryId)
    $('#delete-form').css('display', 'block');
});

$(document).on('click', '#delete-order', function () {
    const userId = $(this).data('id');
    // alert(userId)
    $('#delete-form').css('display', 'block');
});

$(document).on('click', '#delete-supplier', function () {
    const supplierId = $(this).data('id');
    // alert(supplierId)
    $('#delete-form').css('display', 'block');
});

$(document).on('click', '#delete-product', function () {
    const productId = $(this).data('id');
    // alert(productId)
    $('#delete-form').css('display', 'block');
});


$(document).on('click', '.close-form-btn', () => {
    $('#delete-form').hide();
});


const deleteUser = (userId) => {
    $.ajax({
        url: '../php_action/get.php',
        method: 'POST',
        data: { user_id: userId },
        dataType: 'json',
        success: (response) => {

            $('#update-form').css('display', 'block');
        }
    });
}