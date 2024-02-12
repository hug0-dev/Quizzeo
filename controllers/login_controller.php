<?php
session_start();
require_once('../model/login_model.php');

if(isset($_POST['validate'])) {

    $user_pseudo = $_POST['pseudo'];
    $user_password = $_POST['password'];
    verifUser($user_pseudo, $user_password);
    header('Location: ../index.php?page=welcome');
    exit;
}

if(isset($_GET['erreur'])){
    $erreur = "Identifiant ou mot de passe incorrect";
    echo '<script>window.alert("' . $erreur . '");</script>';
}
include_once('../view/login_view.html');