<html>
    <head>
        <meta charset="UTF-8">
        <title>Quiz</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/quiz.css">
        <script src="https://kit.fontawesome.com/43eb508cc8.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php 
        if($type != "playQuiz" && $type != "pageQuiz"){
            include_once('../view/navbar.php');
        }

        if($type == "displayQuiz"){
            echo '
                <div class="titre">
                <h2 color=#fff>Liste Quiz</h2>';
                if(empty($quiz)){
                    echo '<b>Il n\'y a pas encore de quiz</b>';
                }
            echo '</div>
            <div class="quiz-cards-container">';

            foreach ($quiz as $Quiz) {
                echo '<div class="quiz-card">';
                echo '
                <h2>' . $Quiz['titre'] . '</h2>';
                    if($Quiz['difficulte'] == 1){
                        echo '<h4>Difficulté : <i class="fa-solid fa-star"></i></h4>';
                    }
                    elseif($Quiz['difficulte'] == 2){
                        echo '<h4>Difficulté : <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></h4>';
                    }
                    elseif($Quiz['difficulte'] == 3){
                        echo '<h4>Difficulté : <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></h4>';
                    }
                echo '<a href="quiz_controller.php?id=' . $Quiz['id'] . '&titre=' . $Quiz['titre'] . '&difficulte=' . $Quiz['difficulte'] . '&description=' . $Quiz['description'] . '&type=pageQuiz">Jouer <i class="fa-regular fa-circle-play" style="color: #ffffff;"></i></a>
                </div>';
            }
            echo '</div>';
        }

        elseif($type == "pageQuiz"){
            echo '<div class= texte>
                <h4>Quiz :</h4>' . $titre . '
                <h4>Description :</h4>' . $description;
                if($difficulte == 1){
                    echo '<h4>Difficulte :</h4>Facile';
                }
                elseif($difficulte == 2){
                    echo '<h4>Difficulte :</h4>Moyen';
                }
                elseif($difficulte == 3){
                    echo '<h4>Difficulte :</h4>Difficile';
                }
            echo '</div>';       
            

            echo '
            <td><a href="quiz_controller.php?id=' . $id . '&type=playQuiz"class="button"><i class="fa-regular fa-circle-play" style="color: #ffffff;"></i></a></td>
            <td><a href="quiz_controller.php?type=displayQuiz"class="button2"><i class="fa-solid fa-reply" style="color: #ffffff;"></i></a></td>';

            echo '<img class="img_console" src="../assets/img/game_console.png">';
            echo '<img class="img_play" src="../assets/img/play.png">';
        }

        elseif($type == "playQuiz"){
            echo '<form method="post">';
            foreach ($questions as $question) {
                echo '<h2>' . $question['intituleQuestion'] . '</h2>';

                $choices = getChoicesForQuestion($question['id']);
                foreach ($choices as $choice) {
                    echo '<input type="radio" name="q' . $question['id'] . '" value="' . $choice['id'] . '" required>';
                    echo $choice['reponse'] . '<br>';
                }
            }
            echo '<input type="submit" value="Valider les réponses">
            </form>';
            echo '<img class="img_play_console" src="../assets/img/game_console.png">';
            echo '<img class="img_play_play" src="../assets/img/play.png">';
            echo '<img class="img_play_quiz" src="../assets/img/playQuiz.png">';
            echo '<img class="img_play_quiz2" src="../assets/img/playQuiz2.png">';
            echo '<img class="img_play_high_score" src="../assets/img/high_score.png">';
            echo '<img class="img_play_trophee" src="../assets/img/trophee.png">';
            echo '<img class="img_play_score" src="../assets/img/score.png">';
            echo '<img class="img_play_medaille" src="../assets/img/medaille.png">';
        }

        elseif($type == "resultatQuiz"){
            echo '<div class="titre1">
                <h3>Bravo, vous avez fini le quiz !</h3>
            </div>
            <h3>Votre score est : ' . $score . ' / ' . $nbQuestion . '</h3>
            <a href="quiz_controller.php?id=' . $quiz_id . '&type=playQuiz" class="button">Recommencer</a>
            <a href="../index.php?page=quiz&type=displayQuiz" class="button2"><i class="fa-solid fa-reply" style="color: #ffffff;"></i></a>';
        }
        ?>
    </body>
</html>