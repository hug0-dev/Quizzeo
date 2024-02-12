<?php
require_once '../assets/database/config.php';

function verifUser($user_pseudo, $user_password){
    
    global $bdd;
    $checkIfUserExists = $bdd->prepare('SELECT id, pseudo, role, password FROM user WHERE pseudo = ?');
    $checkIfUserExists->execute(array($user_pseudo));

    if($checkIfUserExists->rowCount() > 0){
    $usersInfos = $checkIfUserExists->fetch();

        if(password_verify($user_password, $usersInfos['password'])){

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['role'] = $usersInfos['role'];
            $_SESSION['user'] = $usersInfos['pseudo'];
        } 
        else
        {
            header('Location: login_controller.php?erreur=login');
            exit();
        }
        } 
    else
    {
        header('Location: login_controller.php?erreur=login');
        exit();
    } 
}