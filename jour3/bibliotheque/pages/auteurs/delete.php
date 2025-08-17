<?php
require_once('../../classes/Auteur.php');
require_once('../../config/database.php');

$auteurModel = new Auteur($pdo);
$errors = [];

// Traitement delete
if($_GET){
    $id = $_GET['id'];
}

// Gestion des erreur
if($auteurModel->delete($id)){
    header('Location: liste_auteurs.php?message=deleted');
}


?>