<?php
include '../Config/conn.php';
header('Content-Type: application/json');

// Check if the request is POST and required fields exist
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['brand_id'], $_POST['name'])) {
    $brand_id = $_POST['brand_id'];
    $name = trim($_POST['name']);

    if (empty($name)) {
        echo json_encode(["error" => "Brand name cannot be empty"]);
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE brands SET name = ? WHERE brand_id = ?");
    $stmt->bind_param("si", $name, $brand_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Brand updated successfully"]);
    } else {
        echo json_encode(["error" => "Database error: " . $stmt->error]);
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  isset($_POST['supplier_id'])) {

    $supplier_id = $_POST['supplier_id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    if (empty($name) || empty($email) || empty($phone)) {
        echo json_encode(["error" => "All Field Required, You Can`t Update With A Blank Space"]);
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE suppliers SET name = ?, email = ?, phone = ? WHERE supplier_id = ?");
    $stmt->bind_param("sssi", $name, $email, $phone, $supplier_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Supplier Details Updated Successfully"]);
        $stmt->close();

    } else {
        echo json_encode(["error" => "Database error: " . $stmt->error]);
        $stmt->close();

    }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  isset($_POST['employee_id'])) {

    $employee_id = $_POST['employee_id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    if (empty($name) || empty($email) || empty($phone)) {
        echo json_encode(["error" => "All Field Required, You Can`t Update With A Blank Space"]);
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE employee SET name = ?, email = ?, phone = ? WHERE employee_id = ?");
    $stmt->bind_param("sssi", $name, $email, $phone, $employee_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Employee Details updated successfully"]);
        $stmt->close();
        exit;
    } else {
        echo json_encode(["error" => "Database error: " . $stmt->error]);
        $stmt->close();
        exit;
    }

}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_pass_id'])) {
    $employee_id = $_POST['user_pass_id'];
    $oldPass = trim($_POST['oldPass']);
    $newPass = trim($_POST['newPass']);
    $comfrmNewPass = trim($_POST['comfrmNewPass']);

    // Validate new password matches confirmation
    if ($newPass !== $comfrmNewPass) {
        echo json_encode(["error" => "New password and confirmation don't match"]);
        exit;
    }


    // Get current password hash from database
    $stmt = $conn->prepare("SELECT password FROM employee WHERE employee_id = ?");
    $stmt->bind_param('i', $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "Employee not found"]);
        exit;
    }

    $row = $result->fetch_assoc();
    
    // Verify old password matches stored hash
    if (!password_verify($oldPass, $row['password'])) {
        echo json_encode(["error" => "Wrong password - your old password doesn't match"]);
        exit;
    }

    // Hash and update new password
    $newPasswordHash = password_hash($newPass, PASSWORD_DEFAULT);
    $updateStmt = $conn->prepare("UPDATE employee SET password = ? WHERE employee_id = ?");
    $updateStmt->bind_param("si", $newPasswordHash, $employee_id);
    
    if ($updateStmt->execute()) {
        echo json_encode(["success" => "Password updated successfully"]);
    } else {
        echo json_encode(["error" => "Database error: " . $updateStmt->error]);
    }
    
    $updateStmt->close();
    $stmt->close();
    exit;
}


$conn->close();
