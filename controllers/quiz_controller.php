<?php 
session_start();
require_once('security_controller.php');
require_once('../model/quiz_model.php');

$type = $_GET['type'];

if($type == "displayQuiz"){
    $quiz = getQuiz();
}

elseif($type == "pageQuiz"){
    $id = $_GET['id'];
    $titre = $_GET['titre'];
    $difficulte = $_GET['difficulte'];
    $description = $_GET['description'];
}

elseif($type == 'playQuiz'){

    $quiz_id = $_GET['id'];
    $questions = getQuizQuestions($quiz_id);

    $idImage = $quiz_id;
    $resultat = getImage($idImage);

    if($resultat->rowCount() > 0) {
        $row = $resultat->fetch(PDO::FETCH_ASSOC);
        $image = $row['image'];
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nbQuestion = 0;
        $score = 0;

        foreach ($questions as $question) {
            if (isset($_POST['q' . $question['id']])) {
                $user_choice = $_POST['q' . $question['id']];
                $nbQuestion++;
                $choices = getChoicesForQuestion($question['id']);
                $user_choice_data = null;

                foreach ($choices as $choice) {
                    if ($choice['id'] == $user_choice) {
                        $user_choice_data = $choice;
                        break;
                    }
                }
                if ($user_choice_data && $user_choice_data['bonneReponse'] == 1) {
                    $score += 1;
                }
            }
        }
        header("Location: quiz_controller.php?score=" . $score . "&quiz_id=" . $quiz_id . "&nbQuestion=" . $nbQuestion . "&type=resultatQuiz");
        exit();
    }
}

elseif($type == 'resultatQuiz'){
    $score = $_GET['score'];
    $quiz_id = $_GET['quiz_id'];
    $nbQuestion = $_GET['nbQuestion'];
    score($score, $quiz_id, $nbQuestion);
}

else{
    $erreur = "Error 403";
    echo '<script>window.alert("' . $erreur . '");</script>';
}
include('../view/quiz_view.php');