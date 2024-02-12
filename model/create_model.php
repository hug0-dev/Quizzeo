<?php
require_once '../assets/database/config.php';

//Create Quiz
    function createQuiz($titre, $difficulte, $date_creation, $id_user, $description)
    {
        global $bdd;
        $insert = $bdd->prepare('INSERT INTO quiz (titre, difficulte, date_creation, id_user, description) VALUES(:titre, :difficulte, :date_creation, :id_user, :description)');
        $insert->execute(array(
            'titre' => $titre,
            'difficulte' => $difficulte,
            'date_creation' => $date_creation,
            'id_user' => $id_user,
            'description' => $description,
        ));
        $idQuiz = $bdd->lastInsertId();
        return $idQuiz;
    }

    function verifExist($titre)
    {
        global $bdd;
        $check = $bdd->prepare('SELECT titre FROM quiz WHERE titre = ?');
        $check->execute(array($titre));
        $data = $check->fetch();
        $row = $check->rowCount();
        return $row;
    }

//Create Question
    function createQuestion($intituleQuestion, $id_quiz)
    {
        global $bdd;
        $insert = $bdd->prepare('INSERT INTO question (intituleQuestion, date_creation, id_quiz) VALUES(:intituleQuestion, NOW(), :id_quiz)');
        $insert->execute(array(
            'intituleQuestion' => $intituleQuestion,
            'id_quiz' => $id_quiz,
        ));
        $id_question = $bdd->lastInsertId();
        return $id_question;
    }

    function createChoice($reponse, $estBonneReponse, $id_question)
    {
        global $bdd;
        $insertReponse = $bdd->prepare('INSERT INTO choix (reponse, bonneReponse, id_question) VALUES(:reponse, :estBonneReponse, :id_question)');
        $insertReponse->execute(array(
            'reponse' => $reponse,
            'estBonneReponse' => $estBonneReponse,
            'id_question' => $id_question,
        ));
    }

    function verifExistQuestion($intituleQuestion)
    {
        global $bdd;
        $check = $bdd->prepare('SELECT intituleQuestion FROM question WHERE intituleQuestion = ?');
        $check->execute(array($intituleQuestion));
        $data = $check->fetch();
        $row = $check->rowCount();
        return $row;
    }