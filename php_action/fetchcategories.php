<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');


$query = "SELECT C.*, B.name AS brand_name FROM categories C JOIN brands B ON C.brand_id = B.brand_id ORDER BY B.name ASC";
$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->get_result();
$categories = [];

while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

echo json_encode(["categories" => $categories]);

$stmt->close();
$conn->close();
