<?php 

require_once('../assets/database/config.php');

//Display Quiz
    function getQuiz(){
        global $bdd;
        $recupQuiz = $bdd->query('SELECT id, titre, difficulte, description FROM quiz');
        $quiz = $recupQuiz->fetchAll();
        $recupQuiz->closeCursor();
        return $quiz;
    }

    function getImage($idImage){
        global $bdd;
        $id = $bdd->quote($idImage);
        $sql = "SELECT image FROM image WHERE id_quiz = $idImage";
        $resultat = $bdd->query($sql);
        return $resultat;
    }    

//Play Quiz
    function getQuizQuestions($quiz_id) {
        global $bdd;
        $query = "SELECT id, intituleQuestion FROM QUESTION WHERE id_quiz = ?";
        $stmt = $bdd->prepare($query);
        $stmt->execute([$quiz_id]);
        return $stmt->fetchAll();
    }

    function getChoicesForQuestion($question_id) {
        global $bdd;
        $query = "SELECT id, reponse, bonneReponse FROM choix WHERE id_question = ?";
        $stmt = $bdd->prepare($query);
        $stmt->execute([$question_id]);
        return $stmt->fetchAll();
    }

//Score
    function score($score, $quiz_id, $nbQuestion){
        global $bdd;
        $insert = $bdd->prepare('INSERT INTO user_quiz (id_user, id_quiz, score, nbQuestion) VALUES(:id_user, :id_quiz, :score, :nbQuestion)');
        $insert->execute(array(
            'id_user' => $_SESSION['id'],
            'id_quiz' => $quiz_id,
            'score' => $score,
            'nbQuestion' => $nbQuestion,
        ));
    }