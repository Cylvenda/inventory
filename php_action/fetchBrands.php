<?php
require_once '../Config/conn.php';
header('Content-Type: application/json');


$query = mysqli_query($conn, "SELECT * FROM brands");

if (mysqli_num_rows($query) > 0) {
        $brands = [];
        while ($row = $query->fetch_assoc()) {
            $brands[] = $row;
        }

        echo json_encode(["brands" => $brands]);
    } else {
        echo json_encode(["error" => "Failed to fetch brands"]);
    }
    $conn->close();
