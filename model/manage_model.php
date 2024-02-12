<?php
require_once '../assets/database/config.php';

//Recup Quiz Administateur
    function recupQuiz1(){
        global $bdd;
        $recupQuiz = $bdd->query('SELECT id, titre, difficulte FROM quiz');
        return $recupQuiz;
    }

//Recup Quiz Quizzeur
function recupQuiz2($id){
    global $bdd;
    $recupQuiz = $bdd->prepare('SELECT id, titre, difficulte FROM quiz WHERE id_user = :id');
    $recupQuiz->bindParam(':id', $id, PDO::PARAM_INT);
    $recupQuiz->execute();
    return $recupQuiz;
}

//Recup Users
function getUtilisateurs() {
    global $bdd;
    $recupUser = $bdd->query('SELECT pseudo, email, role, id FROM user');
    $utilisateurs = $recupUser->fetchAll();
    $recupUser->closeCursor();
    return $utilisateurs;
}