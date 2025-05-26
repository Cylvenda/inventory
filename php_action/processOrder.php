<?php
header('Content-Type: application/json');
include '../Config/conn.php';

// Start transaction
mysqli_begin_transaction($conn);

try {
    // Get JSON input
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate required data
    if (empty($data['items']) || !is_array($data['items'])) {
        throw new Exception('No order items provided');
    }

    // Calculate order totals
    $subtotal = 0;
    $total_items = 0;
    
    foreach ($data['items'] as $item) {
        $subtotal += $item['price'] * $item['quantity'];
        $total_items += $item['quantity'];
    }

    $employee_id = $data['user_id'];
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $discount = floatval($data['discount'] ?? 0);
    $total = $subtotal - ($subtotal * ($discount / 100));
    $paid_amount = floatval($data['paid_amount'] ?? 0);
    $balance = $total - $paid_amount;
    $payment_method = mysqli_real_escape_string($conn, $data['payment_method'] ?? 'cash');

    // 1. Insert order header
    $order_sql = "INSERT INTO placed_orders (
                    client_name,
                    client_email, 
                    client_phone,
                    employee_id,
                    total_items, 
                    subtotal, 
                    discount, 
                    total_price, 
                    payment_method, 
                    payed_amount, 
                    balance
                ) VALUES ( 
                    '$name',
                    '$email',
                    '$phone',
                    '$employee_id', 
                    '$total_items', 
                    '$subtotal', 
                    '$discount', 
                    '$total', 
                    '$payment_method', 
                    '$paid_amount', 
                    '$balance'
                )";
    
    if (!mysqli_query($conn, $order_sql)) {
        throw new Exception('Failed to create order: ' . mysqli_error($conn));
    }
    
    $order_id = mysqli_insert_id($conn);

    // 2. Insert order items and update product quantities
    foreach ($data['items'] as $item) {
        $product_id = intval($item['product_id']);
        $quantity = intval($item['quantity']);
        $price = floatval($item['price']);
        
        // Insert order item
        $item_sql = "INSERT INTO order_items (
                        order_id, 
                        product_id, 
                        quantity, 
                        price, 
                        total
                    ) VALUES (
                        '$order_id', 
                        '$product_id', 
                        '$quantity', 
                        '$price', 
                        " . ($price * $quantity) . "
                    )";
        
        if (!mysqli_query($conn, $item_sql)) {
            throw new Exception('Failed to add order item: ' . mysqli_error($conn));
        }
        
        // Update product quantity
        $update_sql = "UPDATE products 
                      SET quantity = quantity - $quantity 
                      WHERE product_id = $product_id 
                      AND quantity >= $quantity";
        
        if (!mysqli_query($conn, $update_sql)) {
            throw new Exception('Insufficient stock for product ID: ' . $product_id);
        }
        
        if (mysqli_affected_rows($conn) === 0) {
            throw new Exception('Failed to update product quantity for ID: ' . $product_id);
        }
    }

    // Commit transaction if all queries succeeded
    mysqli_commit($conn);
    
    echo json_encode([ 'success' => 'Order created successfully' ]);

} catch (Exception $e) {
    // Rollback transaction on error
    mysqli_rollback($conn);
    
    http_response_code(400);
    echo json_encode([ 'error' => $e->getMessage() ]);
}
?>