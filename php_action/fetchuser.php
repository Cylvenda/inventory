<?php include '../Config/conn.php';
header('Content-Type: application/json');

$sql = mysqli_query($conn, " SELECT * FROM users ");
if (mysqli_num_rows($sql) > 0) {
        $users = [];
        while ($row = $sql->fetch_assoc()) {
            $users[] = $row;
        }

        echo json_encode(["users" => $users]);
    } else {
        echo json_encode(["error" => "Failed to fetch User"]);
    }
    $conn->close();

