<?php 
session_start();
require_once('security_controller.php');
require_once '../model/manage_model.php';

$type = $_GET['type']; 

if($type == 'users'){
    $utilisateurs = getUtilisateurs();
    $type = 'users';
}

elseif($type == 'quiz'){
    
    if($_SESSION['role'] == 2){
        $id = $_SESSION['id'];
        $recupQuiz = recupQuiz2($id);
    }
    elseif($_SESSION['role'] == 1){
        $recupQuiz = recupQuiz1();
    }
}

else
{
    $erreur = "Error 403";
    echo '<script>window.alert("' . $erreur . '");</script>';
}
include_once('../view/manage_view.php');