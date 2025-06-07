<?php require_once 'conn.php';

if(is_null($conn)){
    header('Location: ../');
    session_destroy();
    exit;
}

if (!isset($_SESSION['user_id'])) {
  $_SESSION['error'] = '<div class="msg"><span>You have to Login First</span></div>';
  header('Location: ../');
  exit();
}
