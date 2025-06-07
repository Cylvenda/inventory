<?php include 'conn.php';

if (isset($_GET['auth'])) {
    session_unset();
    session_destroy();
    header('Location: ../');
    exit();
} else {
    session_unset();
    session_destroy();
    header('Location: ../');
    exit();
}

