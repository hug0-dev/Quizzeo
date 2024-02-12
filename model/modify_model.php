<?php 
require_once '../assets/database/config.php';

//Modify Users
    function getUserById($id){
        global $bdd;
        $recupUser = $bdd->prepare('SELECT id, pseudo, email, role FROM user WHERE id = ?');
        $recupUser->execute(array($id));

        if($recupUser->rowCount() > 0){
            return $recupUser->fetch();
        }
    }

    function modifyUsers($pseudo, $email, $role, $id){
        global $bdd;
        $recupUser = $bdd->prepare('SELECT id, pseudo, email, role FROM user WHERE id = ?');
        $recupUser->execute(array($id));
        
        if($recupUser->rowCount() > 0){
            $user = $recupUser->fetch();
            $updateUser = $bdd->prepare('UPDATE user SET pseudo = ?, email = ?, role = ? WHERE id = ?');
            $updateUser->execute(array($pseudo, $email, $role, $id));
        }
    }


//Modify Quiz
    function recupQuiz($id){
        global $bdd;
        $recupQuiz = $bdd->prepare('SELECT id, titre, description, difficulte FROM quiz WHERE id = ?');
        $recupQuiz->execute(array($id));
        return $recupQuiz;
    }

    function recupQuestionQuiz($id){
        global $bdd;
        $recupQuestion = $bdd->prepare('SELECT id, intituleQuestion FROM question WHERE id_quiz = ?');
        $recupQuestion->execute(array($id));
        return $recupQuestion;
    }

    function updateQuiz($titre, $id, $description, $difficulte){
        global $bdd;
        $updateQuiz = $bdd->prepare('UPDATE quiz SET titre = ?, description = ?, difficulte = ? WHERE id = ?');
        $updateQuiz->execute(array($titre, $description, $difficulte, $id));
    }


//Modify Question
    function recupQuestion($id){
        global $bdd;
        $recupQuestion = $bdd->prepare('SELECT id, intituleQuestion FROM question WHERE id = ?');
        $recupQuestion->execute(array($id));
        return $recupQuestion;
    }

    function updateQuestion($intituleQuestion, $id){
        global $bdd;
        $updateQuestion = $bdd->prepare('UPDATE question SET intituleQuestion = ? WHERE id = ?');
        $updateQuestion->execute(array($intituleQuestion, $id));
    }

    function recupChoixQuestion($id){
        global $bdd;
        $recupChoix = $bdd->prepare('SELECT id, reponse, bonneReponse FROM choix WHERE id_question = ?');
        $recupChoix->execute(array($id));
        return $recupChoix;
    }

//Modify Choix
    function recupChoix($id){
        global $bdd;
        $recupChoix = $bdd->prepare('SELECT id, reponse, bonneReponse  FROM choix WHERE id = ?');
        $recupChoix->execute(array($id));
        return $recupChoix;
    }

    function updateChoice($reponse, $bonneReponse, $id){
        global $bdd;
        $updateChoix = $bdd->prepare('UPDATE choix SET reponse = ?, bonneReponse = ? WHERE id = ?');
        $updateChoix->execute(array($reponse, $bonneReponse, $id));
    }

//Modify Image

    function recupImage($idImage){
        global $bdd;
        $id = $bdd->quote($idImage);
        $sql = "SELECT image FROM image WHERE id_quiz = $idImage";
        $resultat = $bdd->query($sql);
        return $resultat;
    }

    function updateImage($imageData, $idImage){
        global $bdd;
        $updateImage = $bdd->prepare('UPDATE image SET image = ? WHERE id_quiz = ?');
        $updateImage->execute(array($imageData, $idImage));
    }