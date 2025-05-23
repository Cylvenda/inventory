<?php include '../Config/conn.php';
header('Content-Type: application/json');

if (isset($_POST['product_id'])) {

    $product_id = $_POST['product_id'];


    $sql = mysqli_query($conn, "SELECT P.product_id AS id, P.name AS product_name, B.name AS brand_name,
        C.name AS employee_name, P.price, P.quantity FROM products P JOIN categories C ON P.category_id = C.category_id
         JOIN brands B ON C.brand_id = B.brand_id WHERE P.product_id = '$product_id'  ");
    if (mysqli_num_rows($sql) > 0) {
        $products = [];
        $count = 0;
        while ($row = $sql->fetch_assoc()) {
            $products[] = $row;
        }

        echo json_encode(["products" => $products]);
    } else {
        echo json_encode(["error" => "Failed to fetch Products"]);
    }

}

//fetching brand for editing
if (isset($_POST['brand_id'])) {
    $brand_id = $_POST['brand_id'];

    $query = mysqli_query($conn, "SELECT * FROM brands WHERE brand_id = '$brand_id' ");

    if (mysqli_num_rows($query) > 0) {
        $brands = [];
        while ($row = $query->fetch_assoc()) {
            $brands[] = $row;
        }

        echo json_encode(["brands" => $brands]);
    } else {
        echo json_encode(["error" => "Failed to fetch brands"]);
    }
}

// fetch user for editing
if (isset($_POST['category_id'])) {

    $category_id = intval($_POST['category_id']);
    $query = "SELECT C.category_id, C.name AS category_name, B.name AS brand_name FROM categories C JOIN brands B
     ON C.brand_id = B.brand_id  WHERE category_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $categories = [];

    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
    echo json_encode(["categories" => $categories]);
}

if (isset($_POST['employee_id'])) {

    $employee_id = intval($_POST['employee_id']);

    $query = "SELECT * FROM employee WHERE employee_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $employee = [];

    while ($row = $result->fetch_assoc()) {
        $employee[] = $row;
    }
    echo json_encode(["employee" => $employee]);
}


if (isset($_POST['supplier_id'])) {

    $supplier_id = intval($_POST['supplier_id']);

    $query = "SELECT * FROM suppliers WHERE supplier_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $supplier_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $supplier = [];

    while ($row = $result->fetch_assoc()) {
        $supplier[] = $row;
    }
    echo json_encode(["supplier" => $supplier]);
}

$conn->close();