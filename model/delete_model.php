<?php
require_once '../assets/database/config.php';

//Delete User
    function deleteUsers($id){
        global $bdd;
        $recupUser = $bdd->prepare('SELECT id FROM user WHERE id = ?');
        $recupUser->execute(array($id));

        if($recupUser->rowCount() > 0){
            $suppUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
            $suppUser->execute(array($id));
        }
    }

//Delete Quiz
    function deleteQuiz($id){
        global $bdd;
        $recupQuiz = $bdd->prepare('SELECT id FROM quiz WHERE id = ?');
        $recupQuiz->execute(array($id));
    
        if($recupQuiz->rowCount() > 0){
            $suppQuiz = $bdd->prepare('DELETE FROM quiz WHERE id = ?');
            $suppQuiz->execute(array($id));
        }
    }

//Delete Question
    function deleteQuestion($id){
        global $bdd;
        $recupQuestion = $bdd->prepare('SELECT id FROM question WHERE id = ?');
        $recupQuestion->execute(array($id));

        if($recupQuestion->rowCount() > 0){
            $suppQuestion = $bdd->prepare('DELETE FROM question WHERE id = ?');
            $suppQuestion->execute(array($id));
        }
    }

//Delete Choice
    function deleteChoice($id){
        global $bdd;
        $recupChoice = $bdd->prepare('SELECT id FROM choix WHERE id = ?');
        $recupChoice->execute(array($id));

        if($recupChoice->rowCount() > 0){
            $suppChoice = $bdd->prepare('DELETE FROM choix WHERE id = ?');
            $suppChoice->execute(array($id));
        }
    }

/*Delete Image
    function deleteImage($id){
        global $bdd;
        $recupChoice = $bdd->prepare('SELECT id_quiz FROM image WHERE id_quiz = ?');
        $recupChoice->execute(array($id));

        if($recupChoice->rowCount() > 0){
            $suppChoice = $bdd->prepare('DELETE FROM image WHERE id_quiz = ?');
            $suppChoice->execute(array($id));
        }
    }*/