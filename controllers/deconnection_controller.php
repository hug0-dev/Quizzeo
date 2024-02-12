<?php 
function deconnection(){
    session_start();
    $_SESSION = [];
    session_destroy();
    header('Location: view/index.html');
    exit;
}