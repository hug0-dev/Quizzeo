<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Create</title>
        <link rel="stylesheet" href="../assets/css/create.css" type="text/css"/>
        <script src="../controllers/js/addQuestion.js"></script>
    </head>
    <body>
        <?php 
        if($type == 'createQuiz'){
            include_once('../view/navbar.php');
            echo '
            <h2>Création du Quiz</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="titre" placeholder="Thème du quiz" required/>
                <textarea name="description" placeholder="Description" required></textarea>
                <select name="difficulte">
                    <option value="1">Facile</option>
                    <option value="2">Moyen</option>
                    <option value="3">Difficile</option>
                </select><br>';
                echo '<button type="submit" class="button2">Suivant</button>
            </form>';
            echo '<img class="img_playQuiz" src="../assets/img/playQuiz2.png">';
            echo '<img class="img_interrogation" src="../assets/img/point_interrogation3.png">';
        }

        elseif($type == 'createQuestion'){
            echo '
            <h2>Création de Questions</h2>
            <form method="post">
                <div>
                    <input type="text" name="intituleQuestion1" placeholder="Intitulé Question" required>';
                    
                    for ($j = 1; $j <= 3; $j++) :
                        echo '<input type="text" name="reponse1_' . $j . '" placeholder="Réponse' . $j . '" required>';
                    endfor;
                    
                    echo '<select name="bonneReponse1">';
                        for ($j = 1; $j <= 3; $j++) :
                            echo '<option value="' . $j . '">Réponse ' . $j . '</option>';
                        endfor;
                    echo '</select>
                </div>
                <input type="number" name="totalQuestions" id="totalQuestions" placeholder="Nombre de questions" required min="0" style="display: none;">

                <button type="button" id="add-question" class="button3">Ajouter une question <i class="fa-solid fa-plus" style="color: #ffffff;"></i></button>
                <button type="submit" class="button2">Valider <i class="fa-solid fa-circle-check" style="color: #ffffff;"></i></button>
            </form>';
            echo '<img class="img_playQuiz_Question" src="../assets/img/playQuiz2.png">';
            echo '<img class="img_interrogation_Question" src="../assets/img/point_interrogation3.png">';
            echo '<img class="img_gameConsole_Question" src="../assets/img/game_console.png">';
            echo '<img class="img_playQuiz2_Question" src="../assets/img/playQuiz.png">';
        }

        elseif($type == 'addQuestion'){
            echo '<h2>Ajouter question</h2>
            <form method="post">
                <div>
                    <input type="text" name="intituleQuestion1" placeholder="Intitulé Question" required>';
                    
                    for ($j = 1; $j <= 3; $j++) :
                        echo '<input type="text" name="reponse1_' . $j . '" placeholder="Réponse' . $j . '" required>';
                    endfor;
                    
                    echo '<select name="bonneReponse1">';
                        for ($j = 1; $j <= 3; $j++) :
                            echo '<option value="' . $j . '">Réponse ' . $j . '</option>';
                        endfor;
                    echo '</select>
                </div>
                <input type="number" name="totalQuestions" id="totalQuestions" placeholder="Nombre de questions" style="display: none;">

                <button type="submit" class="button2">Valider <i class="fa-solid fa-circle-check" style="color: #ffffff;"></i></button>
                <a href="modify_controller.php?type=quiz&id=' . $id_quiz . '" class="button"><i class="fa-solid fa-reply" style="color: #ffffff;"></i></a>
            </form>';
            echo '<img class="img_playQuiz_add" src="../assets/img/playQuiz2.png">';
            echo '<img class="img_interrogation_add" src="../assets/img/point_interrogation3.png">';
            echo '<img class="img_gameConsole_add" src="../assets/img/game_console.png">';
            echo '<img class="img_playQuiz2_add" src="../assets/img/playQuiz.png">';
        }
        ?>
    </body>
</html>