<?php
require_once("controllers/deconnection_controller.php");

if(isset($_GET['page'])){

    $page = $_GET['page'];
    $type = $_GET['type'];

    switch($page){
        case 'welcome': 
            header('Location: view/welcome_view.php');
            exit();
            break;

        case 'login':
            header('Location: controllers/login_controller.php');
            exit();
            break;

        case 'register':
            header('Location: view/register_view.php?type=' . $type);
            exit();
            break;

        case 'about':
            header('Location: view/about.php');
            exit();
            break;

        case 'manage':
            header('Location: controllers/manage_controller.php?type=' . $type);
            exit();
            break;

        case 'quiz':
            header('Location: controllers/quiz_controller.php?type=' . $type);
            exit();
            break;

        case 'score':
            header('Location: controllers/score_controller.php?type=' . $type);
            exit();
            break;

        case 'createQuiz':
            header('Location: controllers/create_controller.php?type=' . $type);
            exit();
            break;

        case 'modify':
            header('Location: controllers/modify_controller.php?type=' . $type);
            exit();
            break;

        case 'deleteConfirm':
            header('Location: controllers/delete/deleteConfirm_controller.php');
            exit();
            break;
        
        default:
            echo "404 Error : Page Introuvable";
            exit();
            break;
    }
}

elseif(isset($_GET['action'])){

    $action = $_GET['action']; 

    switch ($action) {
        case 'logout':
            deconnection();
            exit();
            break;
        
        default:
            echo "404 Error : Page Introuvable";
            exit();
            break;
    }
}

else {
    header('Location: view/index.html');
}