<html>
    <head>
        <meta charset="UTF-8">
        <title>Manage</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/manage.css">
        <script src="https://kit.fontawesome.com/43eb508cc8.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        include_once('../view/navbar.php');

        if($type == 'users'){
            echo '
            <div class="titre">
                <h1>Gestion utilisateurs</h1>
                <a href="../index.php?page=register&type=admin"><button>Ajouter un utilisateur</button></a>
            </div>
            <table>
                <tr>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>';

            foreach ($utilisateurs as $user) {
                echo '<tr>
                <td>' . $user['pseudo'] . '</td>
                <td>' . $user['email'] . '</td>';
                if($user['role'] == 1){
                    echo '<td>Administrateur</td>';
                }
                elseif($user['role'] == 2){
                    echo '<td>Quizzeur</td>';
                }
                elseif($user['role'] == 3){
                    echo '<td>Joueur</td>';
                }
                echo '<td><a href="modify_controller.php?id=' . $user['id'] . '&type=' . $type . '"><i class="fa-solid fa-user-pen" style="color: #000000;"></i></a></td>';
                echo '<td><a href="../view/deleteConfirm_view.php?id=' . $user['id']. '&type=' . $type . '"><i class="fa-solid fa-trash-can" style="color: #000000;"></i></a></td>';
            }
        }

        elseif($type == 'quiz'){
            echo '
            <div class="titre">
                <h1>Gestion Quiz</h1>';
                if (!$recupQuiz || $recupQuiz->rowCount() == 0){
                    echo "<b>Vous n'avez pas encore créé de quiz</b>";
                }
            echo '</div>
            <table>
                <tr>
                    <th>Titre</th>
                    <th>Difficulté</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>';
                    
            if ($recupQuiz && $recupQuiz->rowCount() > 0) {
                while($quiz = $recupQuiz->fetch()){
                    echo '<tr>
                    <td>'.$quiz['titre'].'</td>';
                    if($quiz['difficulte'] == 1){
                        echo '<td><i class="fa-solid fa-star" style="color: #333;"></i></td>';
                    }
                    elseif($quiz['difficulte'] == 2){
                        echo '<td><i class="fa-solid fa-star" style="color: #333;"></i><i class="fa-solid fa-star" style="color: #333;"></i></td>';
                    }
                    elseif($quiz['difficulte'] == 3){
                        echo '<td><i class="fa-solid fa-star" style="color: #333;"></i><i class="fa-solid fa-star" style="color: #333;"></i><i class="fa-solid fa-star" style="color: #333;"></i></td>';
                    }
                    echo '<td><a href="modify_controller.php?id=' . $quiz['id'] . '&type=' . $type . '"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a></td>';
                    echo '<td><a href="../view/deleteConfirm_view.php?id=' . $quiz['id']. '&type=' . $type . '"><i class="fa-solid fa-trash-can" style="color: #000000;"></i></a></td>';
                }
                echo '<img class="img_playQuiz" src="../assets/img/playQuiz.png">';
            }
        }
        ?>
    </body>
</html>