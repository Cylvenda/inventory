<?php require_once '../Config/conn.php';

function current_url(){
    $URL = $_SERVER['REQUEST_URI'];
    if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']){
        $pageURL = str_replace('','&amp', $_SERVER['REQUEST_URI']);
    }
    return $URL;
}