<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../assets/css/signup.css">
        <title>Inscription</title>
        <script src="../controllers/js/removePopUp.js"></script>
    </head>
    <body>
        <script>
            signupOne();
        </script>

        <?php 
        if(isset($_GET['erreur'])){
            $erreur = $_GET['erreur'];
            echo '<script>window.alert("' . $erreur . '");</script>';
        }
        $type = $_GET['type'];?>

            <form method="POST" action="../controllers/register_controller.php">
                <h2>Inscription</h2>
                <div class="username">         
                    <input type="text" name="pseudo" placeholder="Pseudo" required="required">
                </div>
                <div class="email">
                    <input type="email" name="email" placeholder="Email" required="required">
                </div>
                <div class="password">
                    <input type="password" name="password" placeholder="Mot de passe" required="required">
                </div>

            <?php if($type == "user"){
                echo '<div class="role">
                    <select name="role">
                        <option value="3">Joueur</option>
                        <option value="2">Quizzeur</option>
                    </select>
                </div>
                <input type="hidden" name="user_type" value="' . $type . '">
                <button type="submit" name="validate">S\'inscrire</button>
                <br><br>
                <a href="../index.php" class="button2"><p><i class="fa-solid fa-reply" style="color: #ffffff;"></i></p></a>
            </form>';
            }
            elseif($type == "admin"){
                echo ' <div class="role">
                    <select name="role">
                        <option value="3">Joueur</option>
                        <option value="2">Quizzeur</option>
                        <option value="1">Administrateur</option>
                    </select>
                </div>
                <input type="hidden" name="user_type" value="' . $type . '">
                <button type="submit" name="validate">Ajouter</button>
                <br><br>
                <a href="../index.php?page=manage&type=users" class="button2"><p>Retour</p></a>
            </form>';
            }
        ?>
</body>
</html>