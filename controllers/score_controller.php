<?php
session_start();
require_once('security_controller.php');
require_once('../model/score_model.php');

$type = $_GET['type'];

if($type == "score"){
    $id = $_SESSION['id'];
    $recupQuiz = recupQuiz($id);
    $scores = [];
    
    if($recupQuiz->rowCount() > 0) {
        foreach ($recupQuiz as $quiz) {
            $idQuiz = $quiz['id_quiz'];
            $recupTitreQuiz = recupTitreQuiz($idQuiz);
            $score = recupScore($id, $idQuiz);
    
            $scores[] = array(
                'titre' => $recupTitreQuiz['titre'],
                'difficulte' => $recupTitreQuiz['difficulte'],
                'score' => $score['score'],
                'nbQuestion' => $score['nbQuestion']
            );
        }
    }
}

elseif($type == 'topScore'){
    $temp = array();
    $stmt = recupUserQuiz();
    $dataUser = array();
    $users = recupUser();
    $data = array();
    $quizCount = array();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pourcentage_reussite = ($row['score'] / $row['nbQuestion']) * 100;
        $data[$row['id_user']][] = $pourcentage_reussite;
        
        $quizId = $row['id_quiz'];
        $userId = $row['id_user'];
        $quizCount[$userId][$quizId] = true;
    }
    $pourcentage_moyen = array();
    
    foreach($data as $id_user => $pourcentages) {
        $total_quiz_joues = count($pourcentages);
        if ($total_quiz_joues >= 5 && count($quizCount[$id_user]) >= 5) {
            $pourcentage_moyen[$id_user] = array_sum($pourcentages) / $total_quiz_joues;
        }
    }
    
    while($ligne = $users->fetch(PDO::FETCH_ASSOC)) {
        $pseudo = $ligne['pseudo'];
        $id = $ligne['id'];
        $dataUser[$id] = array(
            'pseudo' => $pseudo,
            'id' => $id
        );
    }
    
    foreach($pourcentage_moyen as $id_user => $pourcentage) {
        $nombre_formatte = number_format($pourcentage, 2, '.', '');
        if (isset($dataUser[$id_user])) {
            $pseudo = $dataUser[$id_user]['pseudo'];
            $temp[$id_user] = array(
                'pseudo' => $pseudo,
                'pourcentage' => $nombre_formatte
            );
        }
    }
}
else{
    $erreur = "Error 403";
    echo '<script>window.alert("' . $erreur . '");</script>';
}
include_once('../view/score_view.php');