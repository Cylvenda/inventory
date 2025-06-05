<?php require_once '../Config/conn.php';
header('Content-Type: application/json');

if (isset($_POST['productSearch'])) {

    $value = $_POST['productSearch'];

    $sql = mysqli_query($conn, " SELECT P.image AS image, P.product_id AS product_id, P.name AS product_name, B.name AS brand_name,
        C.name AS category_name, P.price, P.quantity, P.status, P.date FROM products P JOIN categories
        C ON P.category_id = C.category_id JOIN brands B ON C.brand_id = B.brand_id WHERE P.name LIKE '%$value%' 
        OR C.name LIKE '%$value%'  OR B.name LIKE '%$value%'  ");
    if (mysqli_num_rows($sql) > 0) {
        $products = [];
        $count = 0;
        while ($row = $sql->fetch_assoc()) {
            $products[] = $row;
        }

        echo json_encode(["productResult" => $products]);
    } else {
        echo json_encode(["error" => "Failed to fetch Products"]);
    }
}

if (isset($_POST['brandSearch'])) {

    $value = $_POST['brandSearch'];

    $sql = mysqli_query($conn, " SELECT * FROM brands WHERE name LIKE '%$value%'  ");
    if (mysqli_num_rows($sql) > 0) {
        $brands = [];
        $count = 0;
        while ($row = $sql->fetch_assoc()) {
            $brands[] = $row;
        }

        echo json_encode(["brands" => $brands]);
    } else {
        echo json_encode(["error" => "Failed to fetch brands"]);
    }
}

if (isset($_POST['categorySearch'])) {

    $value = $_POST['categorySearch'];

    $sql = mysqli_query($conn, " SELECT C.*, B.name AS brand_name FROM categories C JOIN brands B
     ON C.brand_id = B.brand_id WHERE C.name LIKE '%$value%'  OR B.name LIKE '%$value%'  ");
    if (mysqli_num_rows($sql) > 0) {
        $categories = [];
        $count = 0;
        while ($row = $sql->fetch_assoc()) {
            $categories[] = $row;
        }

        echo json_encode(["categories" => $categories]);
    } else {
        echo json_encode(["error" => "Failed to fetch cate categories"]);
    }
}

if (isset($_POST['userSearch'])) {

    $value = $_POST['userSearch'];

    $sql = mysqli_query($conn, " SELECT * FROM employee WHERE name LIKE '%$value%'
     OR email LIKE '%$value%' ");
    if (mysqli_num_rows($sql) > 0) {
        $user = [];
        $count = 0;
        while ($row = $sql->fetch_assoc()) {
            $user[] = $row;
        }

        echo json_encode(["productResult" => $user]);
    } else {
        echo json_encode(["error" => "Failed to fetch user"]);
    }
}

if (isset($_POST['orderSearch'])) {

    $value = $_POST['orderSearch'];

    $sql = mysqli_query($conn, " SELECT * FROM placed_orders WHERE client_name LIKE '%$value%' 
        OR client_email LIKE '%$value%'  OR client_phone LIKE '%$value%'  ");
    if (mysqli_num_rows($sql) > 0) {
        $orders = [];
        $count = 0;
        while ($row = $sql->fetch_assoc()) {
            $orders[] = $row;
        }

        echo json_encode(["orders" => $orders]);
    } else {
        echo json_encode(["error" => "Failed to fetch orders"]);
    }
}

if (isset($_POST['supplierSearch'])) {

    $value = $_POST['supplierSearch'];

    $sql = mysqli_query($conn, " SELECT * FROM suppliers  WHERE name LIKE '%$value%' 
        OR email LIKE '%$value%'  OR phone LIKE '%$value%'  ");
    if (mysqli_num_rows($sql) > 0) {
        $suppliers = [];
        $count = 0;
        while ($row = $sql->fetch_assoc()) {
            $suppliers[] = $row;
        }

        echo json_encode(["suppliers" => $suppliers]);
    } else {
        echo json_encode(["error" => "Failed to fetch Products"]);
    }
}