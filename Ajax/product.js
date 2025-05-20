
const addProduct = () => {
    const img = $("#img")[0].files[0]; // get file object
    const name = $("#product-name").val();
    const category = $("#category").val();
    const qty = $("#qty").val();
    const price = $("#price").val();
    const status = $("#status").val();

    if (!validateProduct(img, name, category, qty, price, status)) {
        return false;
    }

    const formData = new FormData();
    formData.append("image", img); // file input
    formData.append("img", img.name); // image name (optional if your backend uses $_FILES only)
    formData.append("name", name);
    formData.append("category", category);
    formData.append("qty", qty);
    formData.append("price", price);
    formData.append("status", status);

    $.ajax({
        url: "../php_action/products.php",
        method: "POST",
        data: formData,
        processData: false, // Don't process the files
        contentType: false, // Let jQuery set the content type
        dataType: "json",
        success: (response) => {
            if (response.success) {
                let res = `<div class='msg-success'><span>${response.success}</span></div>`;
                $("#msg").html(res);
                $("#product-form")[0].reset(); // optional: clear the form data if product added
                fetchProducts();

            } else {
                let res = `<div class='msg-error'><span>${response.error}</span></div>`;
                $("#msg").html(res);
            }
        },
        error: (xhr, status, error) => {
            let res = `<div class='msg-error'><span>An error occurred: ${error}</span></div>`;
            $("#msg").html(res);
            // console.log(error)
        }
    });

};

// add brand to database
const addBrand = () => {
    const name = $("#brand").val().trim(); 
    const status = $("#status").val();

    // Clear previous messages
    $("#msg").empty();
    $("#form-error-brand").empty();

    // Validation
    if (!name) {
        $("#form-error-brand").text("Brand name is required");
        return false;
    }

    $.ajax({
        url: "../php_action/addbrand.php",
        method: "POST",
        data: { name: name, status: status },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $("#msg").html(`<div class='msg-success'>${response.success}</div>`);
                $("#brand-form")[0].reset();
               fetchProductsBrands();
            } else {
                $("#msg").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};

const addCategory = () => {
    const name = $("#name").val().trim();
    const brand = $("#brand").val();
    const status = $("#status").val();

    // Clear previous messages
    $("#msg").empty();
    $("#form-error-brand").empty();

    // Validation
    if (!name) {
        $("#form-error-category").text("Category name is required");
        return false;
    }

    $.ajax({
        url: "../php_action/addcategory.php",
        method: "POST",
        data: { name: name, brand: brand, status: status },
        dataType: "json",
        success: (response) => {
            if (response.success) {
                $("#msg").html(`<div class='msg-success'>${response.success}</div>`);
                $("#category-form")[0].reset();
                fetchProductsCategory();
               
            } else {
                $("#msg").html(`<div class='msg-error'>${response.error}</div>`);
            }
        },
        error: (xhr, status, error) => {
            let errorMsg = xhr.responseJSON?.error || error;
            $("#msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
            console.error("AJAX Error:", error);
        }
    });
};

const validateProduct = (img, name, category, qty, price, status) => {

    $("#form-error-img").html("")
    $("#form-error-name").html("")
    $("#form-error-category").html("")
    $("#form-error-qty").html("")
    $("#form-error-price").html("")
    $("#form-error-status").html("")

    let valid = true;

    if (img == "") {
        $("#form-error-img").html("Upload the product Image")
        valid = false;
    }

    if (name == "") {
        $("#form-error-name").html("Product name is required")
        valid = false;
    }

    if (category == "") {
        $("#form-error-category").html("Brand name is required")
        valid = false;
    }

    if (qty == "" || qty < 0) {
        $("#form-error-qty").html("Quantity must be positive or zero")
        valid = false;
    }

    if (price == "")
        price = 0;
    if (price <= 0) {
        $("#form-error-price").html("Price must be positive")
        valid = false;
    }


    if (status == "") {
        $("#form-error-status").html("Add product status")
        valid = false;
    }

    return valid;

}

