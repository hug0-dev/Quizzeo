<?php 
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
if ($_SESSION['auth'] == false) {
    header('Location: ../index.php');
    exit();
}
include_once('navbar.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/welcome.css">
        <script src="https://kit.fontawesome.com/43eb508cc8.js" crossorigin="anonymous"></script>
        <script src="../controllers/js/popUp.js"></script>
    </head>
    <body>
        <script>
            var role = <?php echo json_encode($_SESSION['role']); ?>;
            showWelcomeMessage(role);
        </script>
        <h3>Bienvenue sur Quizzeo</h3>
        <div class="wrapper">
            <div class="one">
                <a href="../index.php?page=quiz&type=displayQuiz" class="button3"><i class="fa-solid fa-gamepad"></i> Jouer </a>
            </div>
            <div class="two">
                <a href="../index.php?page=score&type=score" class="button3"><i class="fa-solid fa-square-poll-vertical"></i> Score </a>
            </div>
            <div class="three">
                <a href="../index.php?page=score&type=topScore" class="button3"><i class="fa-solid fa-trophy"></i> TOP Score </a>
            </div>
        </div>
        <img class="image1" src="../assets/img/point_interrogation.png" alt="image1">
        <img class="image2" src="../assets/img/point_interrogation3.png" alt="image2">
    </body>
</html>