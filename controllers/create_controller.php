<?php
session_start();
require_once('security_controller.php');
require_once('../model/create_model.php');

$type = $_GET['type'];

if($type == "createQuiz") {
    if (isset($_POST['titre']) && isset($_POST['difficulte'])) {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $difficulte = $_POST['difficulte'];
        $date_creation = date('y-m-d');
        $id_user = $_SESSION['id'];
    
        $row = verifExist($titre);
        
        if ($row == 0) {
            $idQuiz = createQuiz($titre, $difficulte, $date_creation, $id_user, $description);
            header('Location: create_controller.php?idQuiz=' . $idQuiz . '&type=createQuestion');
            exit;
        } else {
            $erreur = "Ce quiz existe déjà";
            echo '<script>window.alert("' . $erreur . '");</script>';
        }
    }
} 

elseif($type == "createQuestion") {

    if (isset($_GET['idQuiz'])) {
        $id_quiz = $_GET['idQuiz'];
    }

    if (isset($_POST['intituleQuestion1'])) {
        $totalQuestions = $_POST['totalQuestions'];

        for ($questionIndex = 1; $questionIndex <= $totalQuestions; $questionIndex++) {
            $intituleQuestion = htmlspecialchars($_POST['intituleQuestion' . $questionIndex]);
            $bonneReponse = $_POST['bonneReponse' . $questionIndex];

            $row = verifExistQuestion($intituleQuestion);
            if ($row == 0) {
                $id_question = createQuestion($intituleQuestion, $id_quiz);

                if ($id_question !== null) {
                    for ($j = 1; isset($_POST['reponse' . $questionIndex . '_' . $j]); $j++) {
                        $reponse = htmlspecialchars($_POST['reponse' . $questionIndex . '_' . $j]);
                        $estBonneReponse = ($j == $bonneReponse) ? 1 : 0;
                        createChoice($reponse, $estBonneReponse, $id_question);
                    }
                }
            } 
            else {
                $erreur = "La question $intituleQuestion existe déjà.";
                echo '<script>window.alert("' . $erreur . '");</script>';
            }
        }
    header('Location: ../index.php?page=quiz&type=displayQuiz');
    exit;
    }
}

elseif($type == "addQuestion") {

    if (isset($_GET['idQuiz'])) {
        $id_quiz = $_GET['idQuiz'];
    }
    
    if (isset($_POST['intituleQuestion1'])) {
        $totalQuestions = 1;

        for ($questionIndex = 1; $questionIndex <= $totalQuestions; $questionIndex++) {
            $intituleQuestion = htmlspecialchars($_POST['intituleQuestion' . $questionIndex]);
            $bonneReponse = $_POST['bonneReponse' . $questionIndex];

            $row = verifExistQuestion($intituleQuestion);
            if ($row == 0) {
                $id_question = createQuestion($intituleQuestion, $id_quiz);

                if ($id_question !== null) {
                    for ($j = 1; isset($_POST['reponse' . $questionIndex . '_' . $j]); $j++) {
                        $reponse = htmlspecialchars($_POST['reponse' . $questionIndex . '_' . $j]);
                        $estBonneReponse = ($j == $bonneReponse) ? 1 : 0;
                        createChoice($reponse, $estBonneReponse, $id_question);
                    }
                }
            } 
            else {
                $erreur = "La question $intituleQuestion existe déjà.";
                echo '<script>window.alert("' . $erreur . '");</script>';
            }
        }
    header('Location: modify_controller.php?type=quiz&id=' . $id_quiz . '');
    exit;
    }
}
include_once("../view/create_view.php");