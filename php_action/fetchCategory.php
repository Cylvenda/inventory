<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');

if (!isset($_GET['brand_id'])) {
    echo json_encode(["error" => "Brand ID not provided"]);
    exit();
}

$brand_id = intval($_GET['brand_id']);
$query = "SELECT * FROM categories WHERE brand_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $brand_id);
$stmt->execute();

$result = $stmt->get_result();
$categories = [];

while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

echo json_encode(["categories" => $categories]);

$stmt->close();
$conn->close();
