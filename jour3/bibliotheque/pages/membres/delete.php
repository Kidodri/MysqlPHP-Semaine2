<?php
require_once('../../classes/Emprunt.php');
require_once('../../config/database.php');

$empruntModel = new Emprunt($pdo);
$errors = [];

// Traitement delete
if($_GET){
    $id = $_GET['id'];
}

// Gestion des erreur
if($empruntModel->delete($id)){
    header('Location: liste_emprunts.php?message=deleted');
}


?>