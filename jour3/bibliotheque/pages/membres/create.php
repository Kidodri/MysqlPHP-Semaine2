<?php 
require_once('../../classes/Membre.php');
require_once('../../config/database.php');

$membreModel = new Membre($pdo);
$errors = [];

// traitement formulaire
if($_POST){
    $nom_prenom = $_POST['nom_prenom'] ?? '';
    $mail = $_POST['mail'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';
    $actif = $_POST['actif'] ?? '';

    // Validation des donnes
    if($prolongation == "on"){
        $prolongation = 1;
    }
    else {
        $prolongation = 0;
    }

    // Gestion des erreurs
    $membreModel->create($nom_prenom,$mail,$telephone,$adresse,$date_naissance,$actif);
    header('Location: liste_membres.php?message=created');
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
    <h1>Ajouter un membre</h1>
    <form method="post">
        <div>
            <label for="nom_prenom">Nom complet *</label>
            <input type="text" name="nom_prenom" id="nom_prenom" required>
        </div>
        <div>
            <label for="mail">Adresse mail *</label>
            <input type="email" name="mail" id="mail" required>
        </div>
        <div>
            <label for="adresse">Adresse *</label>
            <input type="text" name="adresse" id="adresse" required>
        </div>
        <div>
            <label for="telephone">Telephone *</label>
            <input type="text" name="telephone" id="telephone" required>
        </div>
        <div>
            <label for="date_naissance">Date de naissance *</label>
            <input type="date" name="date_naissance" id="date_naissance" required>
        </div>
        <div>
            <label for="actif">Est actif *</label>
            <input type="checkbox" name="actif" id="actif">
        </div>
        

        <input class="boutton" type="submit" value="Ajouter un membre">
    </form>
    <a href="liste_membres.php" class="boutton">Revenir à la liste des membres</a>
</body>
</html>