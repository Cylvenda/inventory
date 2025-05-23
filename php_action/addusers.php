<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');

$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['phone']));
$password = htmlspecialchars(trim($_POST['password']));
$role = intval($_POST['role']);
$status = intval($_POST['status']);

$check_stmt = $conn->prepare("SELECT * FROM employee WHERE email = ?");
$check_stmt->bind_param("s", $email);
$check_stmt->execute();

if ($check_stmt->get_result()->num_rows > 0) {
    echo json_encode(["error" => "User with that Email already exists"]);
    exit();
}

$newpass = password_hash($password, PASSWORD_DEFAULT);

$insert_stmt = $conn->prepare("INSERT INTO employee (name, email, password, phone, role, status) VALUES (?, ?, ?, ?, ?, ?)");
$insert_stmt->bind_param("ssssii", $name, $email, $newpass, $phone, $role, $status);

if ($insert_stmt->execute()) {
    echo json_encode(["success" => "User Added successfully"]);
} else {
    echo json_encode(["error" => "Database error: " . $conn->error]);
}

$check_stmt->close();
$insert_stmt->close();
$conn->close();