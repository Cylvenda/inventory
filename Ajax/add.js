// const addBrand = () => {
//     const name = $("#brand").val().trim();  // Changed from #brand to #brand-name for clarity
//     const status = $("#status").val();

//     // Clear previous messages
//     $("#msg").empty();
//     $("#form-error-brand").empty();

//     // Validation
//     if (!name) {
//         $("#form-error-brand").text("Brand name is required");
//         return false;
//     }

//     $.ajax({
//         url: "../php_action/addbrand.php",
//         method: "POST",
//         data: { name: name, status: status },
//         dataType: "json",
//         success: (response) => {
//             if (response.success) {
//                 $("#msg").html(`<div class='msg-success'>${response.success}</div>`);
//                 $("#brand-form")[0].reset();
//               //  loadBrands(); 
//             } else {
//                 $("#msg").html(`<div class='msg-error'>${response.error}</div>`);
//             }
//         },
//         error: (xhr, status, error) => {
//             let errorMsg = xhr.responseJSON?.error || error;
//             $("#msg").html(`<div class='msg-error'>Error: ${errorMsg}</div>`);
//             console.error("AJAX Error:", error);
//         }
//     });
// };