<?php 
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    if ($_SESSION['auth'] == false) {
        header('Location: ../index.php');
        exit();
    }
    include_once('../view/navbar.php')
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>About</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/about.css">
    </head>
    <body>
        <h1>About</h1>
        <h2>Quizzeo est un site de quiz en ligne, où vous pouvez jouer les quiz du site et des autres utilisateurs, créer et manager vos propres quiz</h2><br>
        <div class="users">
        <h3>Type utilisateur sur Quizzeo :</h3>
            <ul>
            <li><strong>Administrateur :</strong></li>
                <ul>
                    <li>Gérer uttilisateur
                        <ul>
                            <li>Modifier</li>
                            <li>Crée</li>
                            <li>Ajouter</li>
                        </ul>
                    </li>
                    <li>Gérer quiz
                <ul>
                    <li>Modifier</li>
                    <li>Crée</li>
                    <li>Ajouter</li>
                </ul>
                    </li>
                    <li>Jouer</li>
                </ul>
            <li><strong>Quizzeur</strong></li>
                <ul>
                    <li>Gérer quiz
                    <ul>
                        <li>Modifier</li>
                        <li>Crée</li>
                        <li>Ajouter</li>
                    </ul>
                </li>
                    <li>Jouer</li>
                </ul>
            <li><strong>Joueur</strong></li>
                <ul>
                    <li>Jouer</li>
                </ul>
        </ul>
        </div>
        <br><br>

        <div class="info">
        <h3>Information utiles : </h3>
            <ul>
                <li>Il faut avoir joué à au moins 5 quiz différents pour être dans le top score</li>
                <li>Chaque question est sur 1 point</li>
                <li>Le total du quiz est calculé sur le nombre de questions présentes dans le quiz</li>
            </ul>
        </div>
        <div class="p1">
        <h3>Code erreur : </h3>
            <p>
            401 = Problème de connexion<br>
            402 = ID non récupérer<br>
            403 = Type non récupérer<br>
            404 = Page Introuvable<br>
        </p>
        </div>
    </body>
</html>