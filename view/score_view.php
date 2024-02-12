<html>
    <head>
        <meta charset="UTF-8">
        <title>Score</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/score.css">
    </head>
    <body>
    <?php 
    include_once('../view/navbar.php');

    if($type == "score"){
        echo '
        <div class="titre">
            <h1>Scores</h1>';
            if(!isset($quiz)){
                echo "<b>Vous n'avez pas encore de score</b>";
            }
        echo '</div>
        <table>
            <tr>
                <th>Thème</th>
                <th>Difficulté</th>
                <th>Score</th>
            </tr>';
        foreach ($scores as $quiz) {
            echo '<tr>
            <td>' . $quiz['titre'] . '</td>';
            if ($quiz['difficulte'] == 1) {
                echo '<td><i class="fa-solid fa-star"></i></td>';
            } elseif ($quiz['difficulte'] == 2) {
                echo '<td><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></td>';
            } elseif ($quiz['difficulte'] == 3) {
                echo '<td><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></td>';
            }
            echo '<td>' . $quiz['score'] . '/' . $quiz['nbQuestion'] . '</td>
            </tr>';
        }
        echo '<img class="img_score" src="../assets/img/score.png">';
        echo '<img class="img_medaille" src="../assets/img/medaille.png">';
    }

    elseif($type == "topScore"){
        echo '<table>
        <tr>
            <th>Player</th>
            <th>Pourcentage réussite</th>
            <th>Position</th>
        </tr>
        <div class="titre">';
        echo '<h1>Top Scores</h1>';
        if (empty($temp)){
            echo "<b>Il n'y a pas encore de Top Scores</b>";
        }
        echo '</div>';
            array_multisort(array_column($temp, 'pourcentage'), SORT_DESC, $temp);
            $position = 1;
            foreach ($temp as $Temp) {
                echo "<tr>";
                echo "<td>" . $Temp['pseudo'] . "</td>";
                echo "<td><progress max='100' value='" . $Temp['pourcentage'] . "'></progress> " . $Temp['pourcentage'] . "%</td>";
                echo "<td>$position</td>";
                echo "</tr>";
                $position++;
            }
            echo '<img class="img_high_score" src="../assets/img/high_score.png">';
            echo '<img class="img_trophee" src="../assets/img/trophee.png">';
        }
    ?>
    </body>
</html>