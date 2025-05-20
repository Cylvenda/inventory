

const addUser = () => {
    const name = $("#name").val();
    const email = $("#email").val();
    const phone = $("#phone").val();
    const password = $("#password").val();
    const role = $("#role").val();
    const status = $("#status").val();

    if (!validateUser(name, email, phone, password, role, status)) {
        return false;
    }

    $.ajax({
        url: "../php_action/addusers.php",
        method: "POST",
        data: { name: name, email: email, phone: phone, password: password, role: role, status: status },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                let res = `<div class='msg-success'><span>${response.success}</span></div>`;
                $("#msg").html(res);
                $("#user-form")[0].reset();
                fethcingUserData();

            } else {
                let res = `<div class='msg-error'><span>${response.error}</span></div>`;
                $("#msg").html(res);
            }
        },
        error: (error) => {
            let res = `<div class='msg-error'><span>An error occurred: ${error}</span></div>`;
            $("#msg").html(res);
            console.log(error)
        }
    })
}


const addSupplier = () => {
    const name = $("#name").val();
    const email = $("#email").val();
    const phone = $("#phone").val();
    const status = $("#status").val();

    if (!validateUser(name, email, phone, status)) {
        return false;
    }

    $.ajax({
        url: "../php_action/addsupplier.php",
        method: "POST",
        data: { name: name, email: email, phone: phone, status: status },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                let res = `<div class='msg-success'><span>${response.success}</span></div>`;
                $("#msg").html(res);
                $("#user-form")[0].reset();
                fetchingSupplierData();

            } else {
                let res = `<div class='msg-error'><span>${response.error}</span></div>`;
                $("#msg").html(res);
            }
        },
        error: (error) => {
            let res = `<div class='msg-error'><span>An error occurred: ${error}</span></div>`;
            $("#msg").html(res);
            console.log(error)
        }
    })
}


const validateUser = (name, email, phone, password, role, status) => {

    $("#form-error-name").html("")
    $("#form-error-email").html("")
    $("#form-error-password").html("")
    $("#form-error-phone").html("")
    $("#form-error-role").html("")
    $("#form-error-status").html("")

    let valid = true;

    if (email == "") {
        $("#form-error-email").html("Email is required")
        valid = false;
    }

    if (name == "") {
        $("#form-error-name").html("Username is required")
        valid = false;
    }

    if (password == "") {
        $("#form-error-password").html("Password is required")
        valid = false;
    }

    if (phone == "") {
        $("#form-error-phone").html("Phone is required")
        valid = false;
    }


    if (role == "") {
        $("#form-error-price").html("Role field is required")
        valid = false;
    }


    if (status == "") {
        $("#form-error-status").html("Add user status")
        valid = false;
    }

    return valid;

}