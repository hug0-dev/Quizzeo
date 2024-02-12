<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../assets/css/navbar.css">
        <script src="https://kit.fontawesome.com/43eb508cc8.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <ul class="nav">
            <!-- Acceuil -->
            <li><a href="../index.php?page=welcome"><i class="fa-solid fa-house-chimney"></i><div class = "title">Acceuil</div></a></li>

            <!-- Users -->
            <?php if($_SESSION['role'] == 1)echo '<li><a href="../index.php?page=manage&type=users"><i class="fa-solid fa-users"></i><div class = "title">Utilisateurs</div></a></li>'; ?>
            
            <!-- Display Quiz -->
            <li><a href="../index.php?page=quiz&type=displayQuiz"><i class="fa-solid fa-gamepad"></i><div class = "title">Liste Quiz</div></a></li>
        
            <?php if($_SESSION['role'] == 1 || $_SESSION['role'] == 2){
                //Create Quiz
                echo '<li><a href="../index.php?page=createQuiz&type=createQuiz"><i class="fa-regular fa-square-plus"></i><div class = "title">Création Quiz</div></a></li>';

                //Gestion Quiz
                echo '<li><a href="../index.php?page=manage&type=quiz"><i class="fa-regular fa-pen-to-square"></i><div class = "title">Gestion quiz</div></a></li>';
            }?>

            <!-- Score -->
            <li><a href="../index.php?page=score&type=score"><i class="fa-solid fa-square-poll-vertical"></i><div class = "title">Score</div></a></li>

            <!-- Top Score -->
            <li><a href="../index.php?page=score&type=topScore"><i class="fa-solid fa-trophy"></i><div class = "title">TOP Score</div></a></li>

            <!-- About -->
            <li><a href="../index.php?page=about"><i class="fa-solid fa-circle-info"></i><div class = "title">About</div></a></li>

            <!-- Logout -->
            <li><a href="../index.php?action=logout"><i class="fa-solid fa-door-open"></i><div class = "title">Déconnection</div></a></li>
        </ul>

        <div class="session">
            <?php echo '<b>Session : "' . $_SESSION['user'] . '"</b>';?>
        </div>
    </body>
</html>