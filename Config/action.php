<?php require_once 'conn.php';

function user_login($conn, $email, $password)
{

    if (empty($email) || empty($password)) {
        $_SESSION["error"] = '<div class="msg"><span>Sorry, All field must be filled </span></div>';
        header('Location: ../');
        exit();
    } else {
        $sql = "SELECT * FROM employee WHERE email = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row["password"])) {
                if ($row['status'] == 1) {
                    if ($row['role'] == 'admin' || $row['role'] == 'manager') {
                        $_SESSION['user_id'] = $row['employee_id'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['user_email'] = $row['email'];
                        $_SESSION['role'] = $row['role'];
                        header('Location: ../Admin/Dashboard');
                        exit();
                    } else if ($row['role'] == 'saler' || $row['role'] == 'owner' ) {
                        $_SESSION['user_id'] = $row['employee_id'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['user_email'] = $row['email'];
                        $_SESSION['role'] = $row['role'];
                        header('Location: ../Home/Dashboard');
                        exit();
                    } else {
                        $_SESSION["error"] = '<div class="msg"><span>Sorry, Our System doesn`t recognize you as an Employee</span></div>';
                        header('Location: ../');
                        exit();
                    }
                } else {
                    $_SESSION["error"] = '<div class="msg"><span>Sorry, You Where being Abandomn from the system, contact your Admin for Help</span></div>';
                    header('Location: ../');
                    exit();
                }
            } else {
                $_SESSION["error"] = '<div class="msg"><span>Sorry, You have Provided A Wrong Password, Contact Your System Admin For Assistance</span></div>';
                header('Location: ../');
                exit();
            }
        } else {
            $_SESSION["error"] = "<div class='msg'><span>User Doesn't Exist, Contact Your System Admin For Assistance</span></div>";
            header('Location: ../');
            exit();
        }
    }

}