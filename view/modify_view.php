<html>
    <head>
        <meta charset="UTF-8">
        <title>Modifier</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/modify.css">
        <script src="https://kit.fontawesome.com/43eb508cc8.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php 
        include_once('../view/navbar.php');

        if($type == "users"){
            echo '<h1>Modifier l\'utilisateur</h1>
            <form method="POST">
                <input type="text" name="pseudo" value="' . $user['pseudo'] . '"placeholder="Pseudo"><br><br>
                <input type="email" name="email" value="' . $user['email'] . '"placeholder="Email"><br><br>';

                if($user['role'] == '1'){
                    echo '
                    <select name="role">
                        <option value="1">Administrateur</option>
                        <option value="2">Quizzeur</option>
                        <option value="3">Joueur</option>
                    </select>';
                }
                elseif($user['role'] == '2'){
                    echo '
                    <select name="role">
                        <option value="2">Quizzeur</option>
                        <option value="1">Administrateur</option>
                        <option value="3">Joueur</option>
                    </select>';
                }
                elseif($user['role'] == '3'){
                    echo '
                    <select name="role">
                        <option value="3">Joueur</option>
                        <option value="2">Quizzeur</option>
                        <option value="1">Administrateur</option>
                    </select>';
                }
            echo '
                <button type="submit" class="button"><i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i></button>
                <a href="../index.php?page=manage&type=users" class="button2"><i class="fa-solid fa-reply" style="color: #ffffff;"></i></i></a>
            </form>';
        }

        elseif($type == 'quiz'){
        echo '<h1>Modifier quiz</h1>
            <form method="POST">';
                    echo '<input type="text" name="titre" value="' . $quiz['titre'] . '"placeholder="Titre">
                    <textarea name="description" placeholder="Description">' . $quiz['description'] . '</textarea>';
                    if($quiz['difficulte'] == '1'){
                        echo '
                        <select name="difficulte">
                            <option value="1">Facile</option>
                            <option value="2">Moyen</option>
                            <option value="3">Difficile</option>
                        </select>';
                    }
                    elseif($quiz['difficulte'] == '2'){
                        echo '
                        <select name="difficulte">
                            <option value="2">Moyen</option>
                            <option value="3">Difficile</option>
                            <option value="1">Facile</option>
                        </select>';
                    }
                    elseif($quiz['difficulte'] == '3'){
                        echo '
                        <select name="difficulte">
                            <option value="3">Difficile</option>
                            <option value="2">Moyen</option>
                            <option value="1">Facile</option>
                        </select>';
                    }
                echo '
                <button type="submit" class="button"><i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i></button>
                <a href="create_controller.php?type=addQuestion&idQuiz=' . $quiz['id'] . '" class="button3"><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Question</a>';
                echo '<a href="../index.php?page=manage&type=quiz" class="button2"><i class="fa-solid fa-reply" style="color: #ffffff;"></i></a>
            </form>

            <h3>Question du quiz : </h3>
            <table>
                <tr>
                    <th>Intitule Question</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>';

            while($question = $recupQuestion->fetch()){
                echo '
                <tr>
                    <td>'.$question['intituleQuestion'].'</td>
                    <td><a href="modify_controller.php?idQuestion='.$question['id'] . '&type=question&idQuiz=' . $quiz['id'] . '" class="edit-button"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></a></td>
                    <td><a href="../view/deleteConfirm_view.php?id=' . $question['id']. '&type=question&idQuiz=' . $quiz['id'] . '"><i class="fa-solid fa-trash-can" style="color: #000000;"></i></a></td>
                </tr>';
            }
        }

        elseif($type == "question"){
            echo'<h1>Modifier question</h1>

            <form method="POST">
                <div class="titre">
                <textarea name="intituleQuestion" placeholder="Titre">' . $question['intituleQuestion'] . '</textarea>
                </div>
                <button type="submit" class="button"><i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i></button>
                <a href="modify_controller.php?id=' . $idQuiz . '&type=quiz" class="button2"><i class="fa-solid fa-reply" style="color: #ffffff;"></i></a>

            </form>
            <h3>Choix de la question : </h3>

        <table>
            <tr>
                <th>Réponse</th>
                <th>Bonne Réponse</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>'; 

            while($choix = $recupChoix->fetch()){
                echo '<tr>
                <td>'.$choix['reponse'].'</td>';
                if($choix['bonneReponse'] == 1){
                    echo '<td>Vrai</td>';
                }
                elseif($choix['bonneReponse'] == 0){
                    echo '<td>Faux</td>';
                }
                echo '
                <td><a href="modify_controller.php?id='.$choix['id'] . '&type=choix&idQuestion=' . $question['id'] . '&idQuiz=' . $idQuiz . '" class="edit-button"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></a></td>
                <td><a href="../view/deleteConfirm_view.php?id=' . $choix['id']. '&type=choix&idQuiz=' . $idQuiz . '&idQuestion=' . $question['id'] . '"><i class="fa-solid fa-trash-can" style="color: #000000;"></i></a></td>
                </tr>';
            }
        }

        elseif($type == 'choix'){
            echo '<h1>Modifier choix</h1>

            <form method="POST">
                <input type="text" name="reponse" value="' . $choix['reponse'] . '"placeholder="Réponse">
                <div class="difficulte">';
                if($choix['bonneReponse'] == '1'){
                echo '
                    <select name="bonneReponse">
                        <option value="1">Vrai</option>
                        <option value="0">Fausse</option>
                    </select>';
                }
                elseif($choix['bonneReponse'] == '0'){
                echo '
                    <select name="bonneReponse">
                        <option value="0">Faux</option>
                        <option value="1">Vrai</option>
                    </select>';
                }
                echo '</div>
                <button type="submit" class="button"><i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i></button>
                <a href="modify_controller.php?idQuestion=' . $idQuestion . '&type=question&idQuiz=' . $idQuiz . '" class="button2"><i class="fa-solid fa-reply" style="color: #ffffff;"></i></a>
            </form>';
        }

        elseif($type == 'image'){
            echo '
            <h2>Ajouter / Modifier le fond</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="label">
                    <label><b>Image de fond : </b></label>
                </div>
                <input type="file" name="image">
                <button type="submit" class="button"><i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i></button>
                <td><a href="../view/deleteConfirm_view.php?id=' . $idQuiz . '&type=image" class="button2"><i class="fa-regular fa-trash-can" style="color: #ffffff;"></i></a></td>
                <a href="modify_controller.php?id=' . $idQuiz . '&type=quiz" class="button2"><i class="fa-solid fa-reply" style="color: #ffffff;"></i></a>
            </form>';
        }
        ?>
    </body>
</html>