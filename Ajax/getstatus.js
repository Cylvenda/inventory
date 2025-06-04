
$(document).on('click', '#user-status', function () {
    const userId = $(this).data('id');
    // alert(userId)
        $('#status-form').css('display', 'block');
    $('.delete-container').css('display', 'block');
    $('#delete-user-btn').css('display', 'block');
    $('.msg-success').css('display', 'none');
    $('.msg-error').css('display', 'none');


    $(document).on('click', '#change-em-btn', function () {
        // alert(userId)
        changeUser(userId)
    });
});


$(document).on('click', '#status-order', function () {
    const orderId = $(this).data('id');
    // alert(orderId)
    $('#status-form').css('display', 'block');
    $('.delete-container').css('display', 'block');
    $('#change-order-btn').css('display', 'block');
    $('.msg-success').css('display', 'none');
    $('.msg-error').css('display', 'none');

    $(document).on('click', '#change-order-btn', function () {
        changeOrder(orderId)
    });
});

$(document).on('click', '#status-supplier', function () {
    const supplierId = $(this).data('id');
    // alert(supplierId)
        $('#status-form').css('display', 'block');
    $('.delete-container').css('display', 'block');
    $('#change-supp-btn').css('display', 'block');
    $('.msg-success').css('display', 'none');
    $('.msg-error').css('display', 'none');

    $(document).on('click', '#change-supp-btn', function () {
        changeSupplier(supplierId);
    });
});


// removing all popups on delete
$(document).on('click', '.close-form-btn', () => {
    $('#status-form').hide();
});


const changeUser = (userId) => {

    $.ajax({
        url: "../php_action/change.php",
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

const changeSupplier = (supplierId) => {

    $.ajax({
        url: "../php_action/change.php",
        method: "POST",
        data: { supplier_id: supplierId },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $(".deletion-msg").html(`<div class='msg-success'>${response.success}</div>`);
                fetchingSupplierData()
                $('.delete-container').css('display', 'none');
                $('#change-supp-btn').css('display', 'none');
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

const changeOrder = (orderId) => {

    $.ajax({
        url: "../php_action/change.php",
        method: "POST",
        data: { order_id: orderId },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $(".deletion-msg").html(`<div class='msg-success'>${response.success}</div>`);
                 $('#change-order-btn').css('display', 'none');
                $('.delete-container').css('display', 'none');
                fetchingOrders();
                // clearSelection();
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
