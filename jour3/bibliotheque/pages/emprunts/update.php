<?php 
require_once('../../classes/Emprunt.php');
require_once('../../config/database.php');

$empruntModel = new Emprunt($pdo);
$errors = [];

// Traitement id emprunt à modifier
if($_GET){
    $id = $_GET['id'];
}

$empruntAModifier = $empruntModel->getOneById($id);

// Traitement form
if($_POST){
    //Nouvel id 
    $id_emprunt = $_POST['id_emprunt'] ?? '';
    $livre_id = $_POST['livre_id'] == null ? null : $_POST['livre_id'] ;
    $membre_id = $_POST['membre_id'] == null ? null : $_POST['membre_id'];
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
    // Gestion des erreur
    if($empruntModel->update($id_emprunt,$livre_id, $membre_id,$date_retour_prevue,$date_retour_reelle,$prolongation,$notes,$id)){
    header('Location: liste_emprunts.php?message=updated');
    }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'un emprunt</title>
    <link rel="stylesheet" href="../../complements/stylesheet.css">
</head>
<body>
    <h1>Modifier les informations de l'emprunt</h1>
    <form method="post">
        <div>
            <label for="id_emprunt">ID de l'emprunt *</label>
            <input type="number" name="id_emprunt" id="id_emprunt" value="<?php echo $empruntAModifier[0] ?>" required>
        </div>
        <div>
            <label for="livre_id">ID du livre</label>
            <input type="number" name="livre_id" id="livre_id" value="<?php echo $empruntAModifier[1] ?>">
        </div>
        <div>
            <label for="membre_id">ID du membre</label>
            <input type="number" name="membre_id" id="membre_id" value="<?php echo $empruntAModifier[2] ?>">
        </div>
        <div>
            <label for="date_retour_prevue">Date de retour prévue *</label>
            <input type="date" name="date_retour_prevue" id="date_retour_prevue" value="<?php echo $empruntAModifier[4] ?>" required>
        </div>
        <div>
            <label for="date_retour_reelle">Date de retour réelle *</label>
            <input type="date" name="date_retour_reelle" id="date_retour_reelle" value="<?php echo $empruntAModifier[5] ?>" required>
        </div>
        <div>
            <label for="prolongation">prolongation *</label>
            <input type="checkbox" name="prolongation" id="prolongation" <?php if($empruntAModifier[6] == 1){echo "checked";} ?>>
        </div>
        <div>
            <label for="notes">Notes *</label>
            <input type="text" name="notes" id="notes" value="<?php echo $empruntAModifier[7] ?>" required>
        </div>

        <input class="boutton" type="submit" value="Modifier un emprunt">
    </form>
    <a href="liste_emprunts.php" class="boutton">Revenir à la liste des emprunts</a>
</body>
</html>
    
</body>
</html>