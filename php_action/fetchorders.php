<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');


$query = "SELECT * FROM orders";
$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->get_result();
$orders = [];

while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

echo json_encode(["orders" => $orders]);

$stmt->close();
$conn->close();