<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');

$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['phone']));
$status = intval($_POST['status']);

try {
    $check_stmt = $conn->prepare("SELECT * FROM suppliers WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();

    if ($check_stmt->get_result()->num_rows > 0) {
        echo json_encode(["error" => "Supplier with that Email already exists"]);
        exit();
    }


    $insert_stmt = $conn->prepare("INSERT INTO suppliers (name, email, phone, status) VALUES (?,  ?, ?, ?)");
    $insert_stmt->bind_param("sssi", $name, $email, $phone, $status);

    if ($insert_stmt->execute()) {
        echo json_encode(["success" => "New Supplier Added successfully"]);
    } else {
        echo json_encode(["error" => "Database error: " . $conn->error]);
    }

    $check_stmt->close();
$insert_stmt->close();

} catch (PDOException $e) {
    echo json_encode(["error" => "Error Occured"]);
}

$conn->close();