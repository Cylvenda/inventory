<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');

// Validate input
if (!isset($_POST['name'], $_POST['status'])) {
    echo json_encode(["error" => "Missing required fields"]);
    exit();
}

$name = htmlspecialchars(trim($_POST['name']));
$status = intval($_POST['status']);

// Check if brand exists
$check_stmt = $conn->prepare("SELECT * FROM brands WHERE name = ?");
$check_stmt->bind_param("s", $name);
$check_stmt->execute();

if ($check_stmt->get_result()->num_rows > 0) {
    echo json_encode(["error" => "Brand already exists"]);
    exit();
}

// Insert new brand
$insert_stmt = $conn->prepare("INSERT INTO brands (name, status) VALUES (?, ?)");
$insert_stmt->bind_param("si", $name, $status);

if ($insert_stmt->execute()) {
    echo json_encode(["success" => "Brand added successfully"]);
} else {
    echo json_encode(["error" => "Database error: " . $conn->error]);
}

$check_stmt->close();
$insert_stmt->close();
$conn->close();
