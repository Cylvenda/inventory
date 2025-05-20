<?php require_once 'conn.php';

if (!isset($_SESSION['user_id'])) {
  $_SESSION['error'] = '<div class="msg"><span>You have to Login First</span></div>';
  header('Location: ../');
  exit();
}


// 36M0819040
// UTM9583887