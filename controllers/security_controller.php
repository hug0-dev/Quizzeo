<?php 
if ($_SESSION['auth'] == false) {
    header('Location: ../index.php');
    exit();
}