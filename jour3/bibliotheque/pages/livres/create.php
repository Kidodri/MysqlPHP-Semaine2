<?php 
require_once('../../classes/Livre.php');
require_once('../../config/database.php');

$livreModel = new Livre($pdo);
$errors = [];

// traitement formulaire
if($_POST){
    $titre = $_POST['titre'] ?? '';
    $isbn = $_POST['isbn'] ?? '';
    $date_publication = $_POST['date_publication'] ?? '';
    $nb_pages = $_POST['nb_pages'] ?? '';
    $resume = $_POST['synthese'] ?? '';
    $disponible = $_POST['disponible'] ?? '';

    // Validation des donnes
    if($disponible == "on"){
        $disponible = 1;
    }
    else {
        $disponible = 0;
    }

    // Gestion des erreurs
    $livreModel->create($titre, $isbn, $date_publication,$nb_pages,$resume,$disponible);
    header('Location: ../index.php?message=created');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation d'un livre</title>
    <link rel="stylesheet" href="../../complements/stylesheet.css">
</head>
<body>
    <h1>Ajouter un livre</h1>
    <form method="post">
        <div>
            <label for="titre">Titre *</label>
            <input type="text" name="titre" id="titre" required>
        </div>
        <div>
            <label for="isbn">ISBN *</label>
            <input type="text" name="isbn" id="isbn" required>
        </div>
        <div>
            <label for="date_publication">Date Publication *</label>
            <input type="number" name="date_publication" id="date_publication" required>
        </div>
        <div>
            <label for="nb_pages">Nombre de page *</label>
            <input type="number" name="nb_pages" id="nb_pages" required>
        </div>
        <div>
            <label for="resume">Resumé *</label>
            <input type="text" name="resume" id="resume" required>
        </div>
        <div>
            <label for="disponible">Disponible *</label>
            <input type="checkbox" name="disponible" id="disponible">
        </div>

        <input class="boutton" type="submit" value="Ajouter un livre">
    </form>
    <a href="../index.php" class="boutton">Revenir à la liste des livres</a>
</body>
</html>