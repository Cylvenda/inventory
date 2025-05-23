$(document).ready(() => {
    fethcingUserData(); //calling fetching and display user data function
    fetchingSupplierData(); // fetching and display supplier data
});
// fetching and display user data
const fethcingUserData = () => {
    $.ajax({
        url: '../php_action/fetchuser.php',
        method: 'GET',
        dataType: 'json',
        success: (response) => {
            if (response.users && response.users.length > 0) {
                let tableRows = '';
                let count = 0

                response.users.map((user, index) => {

                    count++;
                    tableRows += `
                    <tr>
                        <td>${count}</td>
                        <td>${user.date}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${user.phone}</td>
                        ${user.role == 1 ? `<td><span class="active">System Admin</span></td>`
                            : `<td><span class="pending">Employee</span></td>`}
                        ${user.status == 1 ? `<td><span class="active">Active</span></td>`
                            : `<td><span class="inactive">Not Active</span></td>`}
                        <td>
                            <div class="table-button">
                                <button id="edit-btn-user" data-id="${user.employee_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button data-id="${user.employee_id}"><img src="../img/icons/swaping.svg" alt="Change"></button>
                                <button id="delete-user" data-id="${user.employee_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#user-data').html(tableRows);
            } else {
                $('#user-data').html(`
                <tr>
                    <td colspan="8" class="text-center">No user found</td>
                </tr>
            `);
            }
        },
        error: (xhr, status, error) => {
            console.error("Error loading user data:", error);
            $('#user-data').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading Users</td>
            </tr>
        `);
        }
    });

}

// fetching and display supplier data

const fetchingSupplierData = () => {
    $.ajax({
        url: '../php_action/fetchsupplier.php',
        method: 'GET',
        dataType: 'json',
        success: (response) => {
            if (response.suppliers && response.suppliers.length > 0) {
                let tableRows = '';
                let count = 0

                response.suppliers.map((supp, index) => {

                    count++;
                    tableRows += `
                    <tr>
                        <td>${count}</td>
                        <td>${supp.date}</td>
                        <td>${supp.name}</td>
                        <td>${supp.email}</td>
                        <td>${supp.phone}</td>
                         ${supp.status == 1 ? `<td><span class="active">Active</span></td>`
                            : `<td><span class="inactive">Not Active</span></td>`}
                        
                        <td>
                            <div class="table-button">
                                <button id="edit-btn-supplier" data-id="${supp.supplier_id}"><img src="../img/icons/edit.svg" alt="Edit"></button>
                                <button data-id="${supp.supplier_id}"><img src="../img/icons/swaping.svg" alt="Change"></button>
                                <button id="delete-supplier" data-id="${supp.supplier_id}" ><img src="../img/icons/delete_red.svg" alt=""></button>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#supplier-data').html(tableRows);
            } else {
                $('#supplier-data').html(`
                <tr>
                    <td colspan="8" class="text-center">No Suppliers found</td>
                </tr>
            `);
            }
        },
        error: (xhr, status, error) => {
            console.error("Error loading Suppliers data:", error);
            $('#supplier-data').html(`
            <tr>
                <td colspan="8" class="text-center error">Error loading Suppliers</td>
            </tr>
        `);
        }
    });

}
