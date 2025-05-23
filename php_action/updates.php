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

$conn->close();
