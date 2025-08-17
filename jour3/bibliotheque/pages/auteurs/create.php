<?php 
require_once('../../classes/Auteur.php');
require_once('../../config/database.php');

$auteurModel = new Auteur($pdo);
$errors = [];

// traitement formulaire
if($_POST){
    $titre = $_POST['titre'] ?? '';
    $nom_prenom = $_POST['nom_prenom'] ?? '';
    $nationalite = $_POST['nationalite'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';
    $biographie = $_POST['biographie'] ?? '';
    

    // Gestion des erreurs
    $auteurModel->create($nom_prenom, $nationalite,$date_naissance,$biographie);
    header('Location: ../index.php?message=created');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation d'un auteur</title>
    <link rel="stylesheet" href="../../complements/stylesheet.css">
</head>
<body>
    <h1>Ajouter un auteur</h1>
    <form method="post">
        <div>
            <label for="nom_prenom">Nom complet *</label>
            <input type="text" name="nom_prenom" id="nom_prenom" required>
        </div>
        <div>
            <label for="nationalite">Nationalité *</label>
            <input type="text" name="nationalite" id="nationalite" required>
        </div>
        <div>
            <label for="date_naissance">Date de naissance *</label>
            <input type="date" name="date_naissance" id="date_naissance" required>
        </div>
            <label for="biographie">Biographie</label>
            <textarea id="biographie" name="biographie"></textarea>
        </div>

        <input class="boutton" type="submit" value="Ajouter un auteur">
    </form>
    <a href="../index.php" class="boutton">Revenir à la liste des auteurs</a>
</body>
</html>