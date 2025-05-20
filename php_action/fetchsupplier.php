<?php include '../Config/conn.php';
header('Content-Type: application/json');

$sql = mysqli_query($conn, " SELECT * FROM suppliers ");
if (mysqli_num_rows($sql) > 0) {
        $suppliers = [];
        while ($row = $sql->fetch_assoc()) {
            $suppliers[] = $row;
        }

        echo json_encode(["suppliers" => $suppliers]);
    } else {
        echo json_encode(["error" => "Failed to fetch Suppliers"]);
    }
    $conn->close();