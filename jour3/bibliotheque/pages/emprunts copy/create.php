<?php 
require_once('../../classes/Emprunt.php');
require_once('../../config/database.php');

$empruntModel = new Emprunt($pdo);
$errors = [];

// traitement formulaire
if($_POST){
    $date_retour_prevue = $_POST['date_retour_prevue'] ?? '';
    $date_retour_reelle = $_POST['date_retour_reelle'] ?? '';
    $prolongation = $_POST['prolongation'] ?? '';
    $notes = $_POST['notes'] ?? '';

    // Validation des donnes
    if($prolongation == "on"){
        $prolongation = 1;
    }
    else {
        $prolongation = 0;
    }

    // Gestion des erreurs
    $empruntModel->create($date_retour_prevue,$date_retour_reelle,$prolongation,$notes);
    header('Location: liste_emprunts.php?message=created');
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
    <h1>Ajouter un emprunt</h1>
    <form method="post">
        <div>
            <label for="date_retour_prevue">Date de retour prévue *</label>
            <input type="date" name="date_retour_prevue" id="date_retour_prevue" required>
        </div>
        <div>
            <label for="date_retour_reelle">Date de retour réelle </label>
            <input type="date" name="date_retour_reelle" id="date_retour_reelle">
        </div>
        <div>
            <label for="prolongation">Prolongation *</label>
            <input type="checkbox" name="prolongation" id="prolongation">
        </div>
        <div>
            <label for="notes">Notes *</label>
            <textarea name="notes" id="notes" required></textarea>
        </div>

        <input class="boutton" type="submit" value="Ajouter un emprunt">
    </form>
    <a href="../index.php" class="boutton">Revenir à la liste des emprunts</a>
</body>
</html>