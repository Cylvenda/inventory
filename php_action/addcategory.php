<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');

// Validate input
if (!isset($_POST['name'], $_POST['brand'], $_POST['status'])) {
    echo json_encode(["error" => "Missing required fields"]);
    exit();
}

$name = htmlspecialchars(trim($_POST['name']));
$brand = intval($_POST['brand']);
$status = intval($_POST['status']);

// Check if brand exists
$check_stmt = $conn->prepare("SELECT * FROM categories WHERE name = ?");
$check_stmt->bind_param("s", $name);
$check_stmt->execute();

if ($check_stmt->get_result()->num_rows > 0) {
    echo json_encode(["error" => "Category already exists"]);
    exit();
}

// Insert new brand
$insert_stmt = $conn->prepare("INSERT INTO categories (name, brand_id, status) VALUES (?, ?, ?)");
$insert_stmt->bind_param("sii", $name, $brand, $status);

if ($insert_stmt->execute()) {
    echo json_encode(["success" => "Category added successfully"]);
} else {
    echo json_encode(["error" => "Database error: " . $conn->error]);
}

$check_stmt->close();
$insert_stmt->close();
$conn->close();
