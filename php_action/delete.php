<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');

if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM employee WHERE employee_id = '$user_id' ";

    $run_query = mysqli_query($conn, $sql);

    if($run_query){
        echo json_encode(['success' => 'Employee Deleted Successfully.']);
        exit;
    }else{
        echo json_encode(['error' => 'Employee is not deleted, Error Occured.']);
        exit;
    }
}

if(isset($_POST['supplier_id'])){
    $supplier_id = $_POST['supplier_id'];

    $sql = "DELETE FROM suppliers WHERE supplier_id = '$supplier_id' ";

    $run_query = mysqli_query($conn, $sql);

    if($run_query){
        echo json_encode(['success' => 'Supplier Deleted Successfully.']);
        exit;
    }else{
        echo json_encode(['error' => 'Supplier is not deleted, Error Occured.']);
        exit;
    }
}

if(isset($_POST['brand_id'])){
    $brand_id = $_POST['brand_id'];

    $sql = "DELETE FROM brands WHERE brand_id = '$brand_id' ";

    $run_query = mysqli_query($conn, $sql);

    if($run_query){
        echo json_encode(['success' => 'Brand Deleted Successfully.']);
        exit;
    }else{
        echo json_encode(['error' => 'Brand is not deleted, Error Occured.']);
        exit;
    }
}

if(isset($_POST['category_id'])){
    $category_id = $_POST['category_id'];

    $sql = "DELETE FROM categories WHERE category_id = '$category_id' ";

    $run_query = mysqli_query($conn, $sql);

    if($run_query){
        echo json_encode(['success' => 'Category Deleted Successfully.']);
        exit;
    }else{
        echo json_encode(['error' => 'Category is not deleted Error Occured.']);
        exit;
    }
}

if(isset($_POST['product_id'])){
    $product_id = $_POST['product_id'];

    $sql = "DELETE FROM products WHERE product_id = '$product_id' ";

    $run_query = mysqli_query($conn, $sql);

    if($run_query){
        echo json_encode(['success' => 'Product Deleted Successfully.']);
        exit;
    }else{
        echo json_encode(['error' => 'Product is not deleted Error Occured.']);
    }
}

if(isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];

    $sql = "DELETE FROM Placed_orders WHERE order_id = '$order_id' ";

    $run_query = mysqli_query($conn, $sql);

    if($run_query){
        echo json_encode(['succes' => 'Order Deleted Successfully.']);
        exit;
    }else{
        echo json_encode(['error' => 'Order is not deleted Error Occured.']);
    }
}
