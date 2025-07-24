<?php
require_once('../../classes/Livre.php');
require_once('../../config/database.php');

$livreModel = new Livre($pdo);
$errors = [];

// Traitement delete
if($_GET){
    $id = $_GET['id'];
}

// Gestion des erreur
if($livreModel->delete($id)){
    header('Location: ../index.php?message=deleted');
}


?>