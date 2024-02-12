<?php

require_once '../assets/database/config.php';

//Score
    function recupQuiz($id) {
        global $bdd;
        $recupQuiz = $bdd->prepare('SELECT id_quiz FROM user_quiz WHERE id_user = :id');
        $recupQuiz->bindParam(':id', $id, PDO::PARAM_INT);
        $recupQuiz->execute();
        return $recupQuiz;
    }

    function recupTitreQuiz($idQuiz) {
        global $bdd;
        $recupTitreQuiz = $bdd->prepare('SELECT titre, difficulte FROM quiz WHERE id = :idQuiz');
        $recupTitreQuiz->bindParam(':idQuiz', $idQuiz, PDO::PARAM_INT);
        $recupTitreQuiz->execute();
        $row = $recupTitreQuiz->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function recupScore($id, $idQuiz) {
        global $bdd;
        $recupScores = $bdd->prepare('SELECT score, nbQuestion FROM user_quiz WHERE id_user = :id AND id_quiz = :idQuiz');
        $recupScores->bindParam(':id', $id, PDO::PARAM_INT);
        $recupScores->bindParam(':idQuiz', $idQuiz, PDO::PARAM_INT);
        $recupScores->execute();
        $score = $recupScores->fetch(PDO::FETCH_ASSOC);
        return $score;
    }

//TOP Score
    function recupUser(){
        global $bdd;
        $recupUser = "SELECT id, pseudo FROM user";
        $users = $bdd->query($recupUser);
        return $users;
    }

    function recupUserQuiz(){
        global $bdd;
        $query = "SELECT * FROM user_quiz";
        $stmt = $bdd->query($query);
        return $stmt;
    }