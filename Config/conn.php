<?php

session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'inventory';

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Connection Failed' . $conn->connect_error);
    }
} catch (mysqli_sql_exception $e) {
    echo '
        <div class="error">
            <h3>Error 404.</h3>
            <hr>
            <p>
                Sorry, No connection Found / Established with the Database, contact Admin for Help.
                <br><br>
                <span>
                <i>NOTE : For Eduction Purpose Only ; <br>
                You have to import database, and our database found on config folder in this main folder.</i>
                </span>
            </p>
       </div>
    ';
}




