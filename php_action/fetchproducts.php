<?php include '../Config/conn.php';
header('Content-Type: application/json');

$sql = mysqli_query($conn, " SELECT image, P.product_id AS id, P.name AS product_name, B.name AS brand_name,
        C.name AS category_name, P.price, P.quantity, P.status, P.date FROM products P JOIN categories
        C ON P.category_id = C.category_id JOIN brands B ON C.brand_id = B.brand_id  ");
if (mysqli_num_rows($sql) > 0) {
        $products = [];
        while ($row = $sql->fetch_assoc()) {
            $products[] = $row;
        }

        echo json_encode(["products" => $products]);
    } else {
        echo json_encode(["error" => "Failed to fetch brands"]);
    }
    $conn->close();

