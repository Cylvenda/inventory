<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');

if(isset($_POST['user_id'])){
    $employee_id = $_POST['user_id'];
    $zero = 0;
    $one = 1;

    $stmt = $conn->prepare("SELECT * FROM employee WHERE employee_id = ?");
    $stmt->bind_param('i', $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "Employee not found"]);
        exit;
    }

    $row = $result->fetch_assoc();

    if($row['status'] == 0 ){
        $stmt = $conn->prepare("UPDATE employee SET status = ? WHERE employee_id = ?");
        $stmt->bind_param("ii", $one, $employee_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => "Employee status updated successfully"]);
            $stmt->close();
            exit;
        }
    }elseif($row['status'] == 1 ) {
                $stmt = $conn->prepare("UPDATE employee SET status = ? WHERE employee_id = ?");
        $stmt->bind_param("ii", $zero, $employee_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => "Employee status updated successfully"]);
            $stmt->close();
            exit;
        }
    }else {
                echo json_encode(["error" => "Database error: " . $stmt->error]);
        $stmt->close();
        exit;
    }
}

if(isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];
    $zero = 0;
    $one = 1;

    $stmt = $conn->prepare("SELECT * FROM placed_orders WHERE order_id = ?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "order not found"]);
        exit;
    }

    $row = $result->fetch_assoc();

    if($row['status'] == 0 ){
        $stmt = $conn->prepare("UPDATE placed_orders SET status = ? WHERE order_id = ?");
        $stmt->bind_param("ii", $one, $order_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => "Order status updated successfully"]);
            $stmt->close();
            exit;
        } else {
        echo json_encode(["error" => "Database error: " . $stmt->error]);
        $stmt->close();
        exit;
    }
    }elseif($row['status'] == 1 ) {
                $stmt = $conn->prepare("UPDATE placed_orders SET status  = ? WHERE order_id = ?");
        $stmt->bind_param("ii", $zero, $order_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => "Order status updated successfully"]);
            $stmt->close();
            exit;
        } else {
        echo json_encode(["error" => "Database error: " . $stmt->error]);
        $stmt->close();
        exit;
    }
    }else {
                echo json_encode(["error" => "Database error: " . $stmt->error]);
        $stmt->close();
        exit;
    }
}

if(isset($_POST['supplier_id'])){
    $supplier_id = $_POST['supplier_id'];
    $zero = 0;
    $one = 1;

    $stmt = $conn->prepare("SELECT supplier_id, status FROM suppliers WHERE supplier_id = ?");
    $stmt->bind_param('i', $supplier_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "supplier not found"]);
        exit;
    }

    $row = $result->fetch_assoc();

    if($row['status'] == 0 ){
        $stmt = $conn->prepare("UPDATE suppliers SET status = ? WHERE supplier_id = ?");
        $stmt->bind_param("ii", $one, $supplier_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => "supplier status updated successfully"]);
            $stmt->close();
            exit;
        } else {
        echo json_encode(["error" => "Database error: " . $stmt->error]);
        $stmt->close();
        exit;
    }
    }elseif($row['status'] == 1 ) {
                $stmt = $conn->prepare("UPDATE suppliers SET status  = ? WHERE supplier_id = ?");
        $stmt->bind_param("ii", $zero, $supplier_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => "supplier status updated successfully"]);
            $stmt->close();
            exit;
        } else {
        echo json_encode(["error" => "Database error: " . $stmt->error]);
        $stmt->close();
        exit;
    }
    }else {
                echo json_encode(["error" => "Database error: " . $stmt->error]);
        $stmt->close();
        exit;
    }
}

$conn->close();