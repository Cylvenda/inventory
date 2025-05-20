<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');

// Validate required fields
if (!isset($_POST['name'], $_FILES['image'], $_POST['category'], $_POST['qty'], $_POST['price'], $_POST['status'])) {
    echo json_encode(["error" => "All fields are required"]);
    exit();
}

// Sanitize inputs
$name = htmlspecialchars(trim($_POST['name']));
$category_id = intval($_POST['category']);  // Changed to category_id for foreign key
$qty = intval($_POST['qty']);
$price = floatval($_POST['price']);
$status = htmlspecialchars(trim($_POST['status']));

// Handle file upload
$originalImageName = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$uploadDirectory = '../img/uploads/';

// Create directory if it doesn't exist
if (!file_exists($uploadDirectory)) {
    if (!mkdir($uploadDirectory, 0777, true)) {
        echo json_encode(["error" => "Failed to create upload directory"]);
        exit();
    }
}

// Validate file extension
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
$imageExt = strtolower(pathinfo($originalImageName, PATHINFO_EXTENSION));
if (!in_array($imageExt, $allowedExtensions)) {
    echo json_encode(["error" => "Only JPG, JPEG, PNG & GIF files are allowed"]);
    exit();
}

// Generate unique filename
$uniqueImageName = uniqid() . '.' . $imageExt;
$targetPath = $uploadDirectory . $uniqueImageName;

// Check for upload errors
if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(["error" => "File upload error: " . $_FILES['image']['error']]);
    exit();
}

// Move uploaded file
if (!move_uploaded_file($tmp_name, $targetPath)) {
    echo json_encode(["error" => "Failed to save file"]);
    exit();
}

// Check for duplicate product
$check_stmt = $conn->prepare("SELECT * FROM products WHERE name = ?");
$check_stmt->bind_param("s", $name);
$check_stmt->execute();

if ($check_stmt->get_result()->num_rows > 0) {
    // Delete the uploaded image if product exists
    @unlink($targetPath);
    echo json_encode(["error" => "Product already exists"]);
    exit();
}

// Insert new product
$insert_stmt = $conn->prepare("INSERT INTO products (image, name, category_id, quantity, price, status) VALUES (?, ?, ?, ?, ?, ?)");
$insert_stmt->bind_param("ssiids", $uniqueImageName, $name, $category_id, $qty, $price, $status);

if ($insert_stmt->execute()) {
    // Get the inserted product
    $newId = $conn->insert_id;
    $result = $conn->query("SELECT image, P.product_id AS id, P.name AS product_name, B.name AS brand_name,
        C.name AS category_name, P.price, P.quantity, P.status, P.date FROM products P JOIN categories
        C ON P.category_id = C.category_id JOIN brands B ON C.brand_id = B.brand_id WHERE P.product_id = $newId");
    $newProduct = $result->fetch_assoc();

    echo json_encode([
        "success" => "Product added successfully",
        "newProduct" => $newProduct
    ]);
} else {
    // Delete the uploaded image if DB insert fails
    @unlink($targetPath);
    echo json_encode(["error" => "Database error: " . $conn->error]);
}

$check_stmt->close();
$insert_stmt->close();
$conn->close();
