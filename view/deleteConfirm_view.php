<html>
    <head>
        <meta charset="UTF-8">
        <title>Suppression</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/delete.css">
    </head>
    <body>
        <div class="container">
            <h1>Confirmez la suppression</h1>
            <p>Êtes-vous sûr de vouloir supprimer cet élément ?</p>
            <?php
                $id = $_GET['id'];
                $type = $_GET['type'];

                if($type == "users") 
                {
                    echo '<a href="../controllers/delete_controller.php?id=' . $id . '&type=' . $type . '" class="delete-button">Oui</a>';
                    echo '<a href="../index.php?page=manage&type=users" class="non-button">Non</a>';
                } 
                elseif($type == "quiz") 
                {
                    echo '<a href="../controllers/delete_controller.php?id=' . $id . '&type=' . $type . '" class="delete-button">Oui</a>';
                    echo '<a href="../index.php?page=manage&type=quiz" class="non-button">Non</a>';
                } 
                elseif($type == "question") 
                {
                    $idQuiz = $_GET['idQuiz'];
                    echo '<a href="../controllers/delete_controller.php?id=' . $id . '&type=question&idQuiz=' . $idQuiz . '" class="delete-button">Oui</a>';
                    echo '<a href="../controllers/modify_controller.php?idQuestion=' . $id . '&type=quiz&id=' . $idQuiz . '" class="non-button">Non</a>';
                } 
                elseif($type == "choix") 
                {
                    $idQuiz = $_GET['idQuiz'];
                    $idQuestion = $_GET['idQuestion'];
                    echo '<a href="../controllers/delete_controller.php?id=' . $id . '&type=choix&idQuestion=' . $idQuestion . '&idQuiz=' . $idQuiz . '" class="delete-button">Oui</a>';
                    echo '<a href="../controllers/modify_controller.php?idQuestion=' . $idQuestion . '&type=question&idQuiz=' . $idQuiz . '" class="non-button">Non</a>';
                }
                elseif($type == "image") 
                {
                    echo '<a href="../controllers/delete_controller.php?id=' . $id . '&type=image" class="delete-button">Oui</a>';
                    echo '<a href="../controllers/modify_controller.php?type=image&idQuiz=' .$id . '" class="non-button">Non</a>';
                }
                else
                {
                    $erreur = "Error 402/403";
                    echo '<script>window.alert("' . $erreur . '");</script>';
                }
            ?>
        </div>
    </body>
</html>