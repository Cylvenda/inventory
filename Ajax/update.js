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
        data: { supplier_id: supplier_id, name: name, email: email, phone: phone },
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
        data: { employee_id: user_id, name: name, email: email, phone: phone },
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

const changePassword = () => {
    const user_pass_id = $("#user-id-edit").val()
    const oldPass = $('#opass').val()
    const newPass = $('#npass').val()
    const comfrmNewPass = $('#cpass').val()

    if (!validatePassword(oldPass, newPass, comfrmNewPass)) {
        return false;
    }

    $.ajax({
        url: "../php_action/updates.php",
        method: "POST",
        data: { user_pass_id: user_pass_id, oldPass: oldPass, newPass: newPass, comfrmNewPass: comfrmNewPass, },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                let res = `<div class='msg-success'><span>${response.success}</span></div>`;
                $(".new").html(res);
                $(".profile-form-user")[0].reset(); // optional: clear the form data if product added

            } else if (response.errorpass) {
                $("#form-error-oldPass").html(response.errorpass);
            } else {
                let res = `<div class='msg-error'><span>${response.error}</span></div>`;
                $(".new").html(res);
            }
        },
        error: (xhr, status, error) => {
            let res = `<div class='msg-error'><span>An error occurred: ${error}</span></div>`;
            $(".new").html(res);
            // console.log(error)
        }
    });
}

const validatePassword = (oldPass, newPass, comfrmNewPass) => {

    $("#form-error-oldPass").html("")
    $("#form-error-newPass").html("")
    $("#form-error-comfrmNewPass").html("")

    let valid = true;

    if (oldPass == "") {
        $("#form-error-oldPass").html("Old Password is Required")
        valid = false;
    }

    if (newPass == "") {
        $("#form-error-newPass").html("New Password is Required")
        valid = false;
    } else if (newPass.length < 8) {
        $("#form-error-newPass").html("Your New Password is too short ")
        valid = false;
    }
    else if (comfrmNewPass == "") {
        $("#form-error-comfrmNewPass").html("You have To Comfirm Your New Password.")
        valid = false;
    } else if (newPass !== comfrmNewPass) {
        $("#form-error-comfrmNewPass").html("Your New Password Do not Match")
        valid = false;
    }

    return valid;

}