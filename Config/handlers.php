<?php require_once 'action.php'; 

if(is_null($conn)){
    header('Location: ../');
    session_destroy();
    exit;
}

if (isset($_POST['Login'])) {

    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    user_login($conn, $email, $password);
}