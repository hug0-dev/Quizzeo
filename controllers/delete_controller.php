<?php
require_once('../model/delete_model.php');

if(isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];
    var_dump($type, $id);
        
    if($type == 'users') {
        deleteUsers($id);
        header('Location: ../index.php?page=manage&type=users');
        exit;
    }

    elseif($type == 'quiz') {
        deleteQuiz($id);
        header('Location: ../index.php?page=manage&type=quiz');
        exit;
    } 
    elseif($type == 'question') {
        $idQuiz = $_GET['idQuiz'];
        deleteQuestion($id);
        header('Location: modify_controller.php?&type=quiz&id=' . $idQuiz . '');
        exit;
    } 
    elseif($type == 'choix') {
        $idQuiz = $_GET['idQuiz'];
        $idQuestion = $_GET['idQuestion'];
        deleteChoice($id);
        header('Location: modify_controller.php?&type=question&idQuiz=' . $idQuiz . '&idQuestion=' . $idQuestion .'');
        exit;
    }
}
else
{
    $erreur = "Error 402/403";
    echo '<script>window.alert("' . $erreur . '");</script>';
}