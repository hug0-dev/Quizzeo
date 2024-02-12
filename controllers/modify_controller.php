<?php 
session_start();
require_once('security_controller.php');
require_once('../model/modify_model.php');
require_once('../model/create_model.php');

$type = $_GET['type'];

if($type == 'users'){

    if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['pseudo']) && isset($_POST['email'])){
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $role = $_POST['role'];

    modifyUsers($pseudo, $email, $role, $id);
    header('Location: ../index.php?page=manage&type=users');
    exit;
    }
    $user = getUserById($id);
    }
}

elseif($type == 'quiz'){

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $recupQuiz = recupQuiz($id);
        
        if ($recupQuiz->rowCount() > 0) {
            $quiz = $recupQuiz->fetch();
        }
    }

    if (isset($_POST['titre']) && isset($_POST['description'])) {

        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $difficulte = $_POST['difficulte'];
        updateQuiz($titre, $id, $description, $difficulte);

        $quiz['titre'] = $titre;
        $quiz['description'] = $description;
        $quiz['difficulte'] = $difficulte;
    }
    $recupQuestion = recupQuestionQuiz($id);
}

elseif($type == 'question'){

    $id = $_GET['idQuestion'];
    $idQuiz = $_GET['idQuiz'];
    $recupQuestion = recupQuestion($id);

    if($recupQuestion->rowCount() > 0){
        $question = $recupQuestion->fetch();
    }
        
    if(isset($_POST['intituleQuestion'])){
        $intituleQuestion = $_POST['intituleQuestion'];
        updateQuestion($intituleQuestion, $id);
        $question['intituleQuestion'] = $intituleQuestion;
    }
    $recupChoix = recupChoixQuestion($id);
}

elseif($type == 'choix'){

    $idQuestion = $_GET['idQuestion'];
    $idQuiz = $_GET['idQuiz'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $recupChoix = recupChoix($id);

        if ($recupChoix->rowCount() > 0) {
            $choix = $recupChoix->fetch();
        }
    }

    if (isset($_POST['reponse']) && isset($_POST['bonneReponse'])) {
        $reponse = $_POST['reponse'];
        $bonneReponse = $_POST['bonneReponse'];
        updateChoice($reponse, $bonneReponse, $id);
        $choix['reponse'] = $reponse;
        $choix['bonneReponse'] = $bonneReponse;
    }
}

/*elseif($type == 'image'){

    $idQuiz = $_GET['idQuiz'];
    if(isset($_FILES['image'])){
        $file = $_FILES['image'];
        $tmpFilePath = $file['tmp_name'];
    
        if ($tmpFilePath != "") {
            $idImage = $idQuiz;
            $imageData = file_get_contents($tmpFilePath);//PNG
            //$imageData = imagecreatefromjpeg($tmpFilePath);//JPEG
            $resultat = recupImage($idImage);

            if ($resultat->rowCount() > 0) {
                $image = $resultat->fetch();
                updateImage($imageData, $idImage);
                $image['image'] = $imageData;
                header('Location: modify_controller.php?type=quiz&id=' . $idQuiz . '');
            }
            elseif ($resultat->rowCount() == 0) {
                insertImage($imageData, $idQuiz);
                header('Location: modify_controller.php?type=quiz&id=' . $idQuiz . '');
            }
        }
    }
}*/

else
{
    $erreur = "Error 403";
    echo '<script>window.alert("' . $erreur . '");</script>';
}
include_once('../view/modify_view.php');