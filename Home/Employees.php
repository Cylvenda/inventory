<?php require_once '../Config/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../include/cssheader.php' ?>

<body>
    <?php require_once '../include/header.php' ?>
    <?php require_once '../include/userNav.php' ?>
    <main>
        <!-- url container -->
        <div class="url">
            <span><a href="Dashboard">Home</a> / <a href="Users">Employees</a></span>
            <span>
                <h3>Employees Management</h3>
            </span>
        </div>

        <div class="main-container">
            <div class="boxes">
                <h3>All System Users</h3>
                <div class="table-container">

                    <div class="search-container">
                        <div class="row">Show
                            <select name="" id="">
                                <option value="10">10</option>
                                <option value="10">25</option>
                                <option value="10">50</option>
                                <option value="10">100</option>
                            </select>
                            Rows
                        </div>

                        <div class="search">
                            <input type="text"><button>Search</button>
                        </div>

                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Added</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $sql = mysqli_query($conn, "SELECT * FROM employee ");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                $count++;
                                //user status
                                if ($row['status'] == 1) {
                                    $status = '<span class="active">Active</span>';
                                } else {
                                    $status = '<span class="inactive">Not Active</span>';
                                }

                                // user role
                                if($row['role'] == 'admin'){
                                    $role = '<span class="pending">Admin</span>';
                                }elseif($row['role'] == 'manager'){
                                    $role = '<span class="pending">Manager</span>';
                                }elseif($row['role'] == 'saller'){
                                    $role = '<span class="pending">Saller</span>';
                                }elseif($row['role'] == 'owner'){
                                    $role = '<span class="pending">Owner</span>';
                                }else{
                                    $role = '<span class="pending">Employee</span>';
                                }

                                echo '
                            <tr>
                                <td>' . $count . '</td>
                                <td>' . $row['date'] . '</td>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['phone'] . '</td>
                                <td>' . $role . '</td>
                                <td>' . $status . '</td>
                            </tr>';
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

<?php require_once '../include/footer.php' ?>