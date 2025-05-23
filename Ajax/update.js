const updateBrand = () => {
    const name = $("#edit-brand").val().trim();
    const brandId = $('#edit-brand_id').val();


    // Clear previous messages
    $("#msg").empty();
    $("#form-error-brand").empty();


    $.ajax({
        url: "../php_action/updates.php",
        method: "POST",
        data: { name: name, brand_id: brandId },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $("#edit-msg").html(`<div class='msg-success'>${response.success}</div>`);
                fetchProductsBrands();
                $("#edit-brand-form")[0].reset();
            } else {
                $("#edit-msg").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#edit-msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};

const updateCategory = () => {

    const name = $("#edit-brand").val().trim();
    const categoryId = $('#edit-category_id').val();


    // Clear previous messages
    $("#msg").empty();
    $("#form-error-brand").empty();

    $.ajax({
        url: "../php_action/updates.php",
        method: "POST",
        data: { name: name, category_id: categoryId },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $("#edit-msg").html(`<div class='msg-success'>${response.success}</div>`);
              //  fetchProductsBrands();
               // $("#edit-category-form")[0].reset();
            } else {
                $("#edit-msg").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#edit-msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};

const updateSupplier = () => {
  
    const name = $("#edit-name").val();
    const email = $("#edit-email").val();
    const phone = $("#edit-phone").val();
    const supplier_id = $("#supp-id-edit").val();


    $.ajax({
        url: "../php_action/updates.php",
        method: "POST",
        data: {  supplier_id : supplier_id,  name: name, email: email, phone: phone },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $("#msg-edit").html(`<div class='msg-success'>${response.success}</div>`);
                fetchingSupplierData();
              //  $("#update-form").hide();
            } else {
                $("#msg-edit").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#msg-edit").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};

const updateUser = () => {
  
    const name = $("#edit-name").val();
    const email = $("#edit-email").val();
    const phone = $("#edit-phone").val();
    const user_id = $("#user-id-edit").val();


    $.ajax({
        url: "../php_action/updates.php",
        method: "POST",
        data: {  employee_id : user_id,  name: name, email: email, phone: phone },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $("#msg-edit").html(`<div class='msg-success'>${response.success}</div>`);
                fethcingUserData();
              //  $("#update-form").hide();
            } else {
                $("#msg-edit").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#msg-edit").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });

};