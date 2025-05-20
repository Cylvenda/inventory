<?php require_once 'conn.php';

if (isset($_GET['auth'])) {
    session_unset();
    session_destroy();
    header('Location:' . $inventory_url);
    exit();
} else {
    session_unset();
    session_destroy();
    header('Location:' . $inventory_url);
    exit();
}

