$(document).ready(() => {
    // Load brands on page load
    $.ajax({
        url: '../php_action/fetchBrands.php',
        method: 'GET',
        dataType: 'json',
        success: (response) => {
            if (response.brands) {
                let options = '<option value="">-- Select a Brand --</option>';
                response.brands.forEach(brand => {
                    options += `<option value="${brand.brand_id}">${brand.name}</option>`;
                });
                $('#brand').html(options);
            }
        },
        error: function (xhr) {
            console.error("Error loading brands:", xhr.responseText);
        }
    });


    $('#brand').change(function () {
        const brandId = $(this).val();
        if (!brandId) {
            $('#category').empty().append('<option value="">-- Select Brand First --</option>').prop('disabled', true);
            return;
        }

        $.ajax({
            url: '../php_action/fetchCategory.php',
            method: 'GET',
            data: { brand_id: brandId },
            dataType: 'json',
            success: function (response) {
                if (response.categories) {
                    let options = '<option value="">-- Select Category --</option>';
                    response.categories.forEach(category => {
                        options += `<option value="${category.category_id}">${category.name}</option>`;
                    });
                    $('#category').empty().append(options).prop('disabled', false);
                }
            },
            error: function (xhr) {
                console.error("Error loading categories:", xhr.responseText);
            }
        });
    });


});