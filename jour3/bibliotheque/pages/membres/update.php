<?php 
require_once('../../classes/Membre.php');
require_once('../../config/database.php');

$membreModel = new Membre($pdo);
$errors = [];

// Traitement id membre à modifier
if($_GET){
    $id = $_GET['id'];
}

$membreAModifier = $membreModel->getOneById($id);

// Traitement form
if($_POST){
    //Nouvel id 
    $id_membre = $_POST['id_membre'] ?? '';
    $nom_prenom = $_POST['nom_prenom'] ?? '';
    $mail = $_POST['mail'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';
    $actif = $_POST['actif'] ?? '';


    // Validation des donnes
    if($actif == "on"){
        $actif = 1;
    }
    else {
        $actif = 0;
    }
    // Gestion des erreur
    if($membreModel->update($id_membre,$nom_prenom, $mail,$telephone,$adresse,$date_naissance,$actif,$id)){
    header('Location: liste_membres.php?message=updated');
    }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'un membre</title>
    <link rel="stylesheet" href="../../complements/stylesheet.css">
</head>
<body>
    <h1>Modifier les informations du membre</h1>
    <form method="post">
        <div>
            <label for="id_membre">ID du membre *</label>
            <input type="number" name="id_membre" id="id_membre" value="<?php echo $membreAModifier[0] ?>" required>
        </div>
        <div>
            <label for="nom_prenom">Nom complet *</label>
            <input type="text" name="nom_prenom" id="nom_prenom" value="<?php echo $membreAModifier[1] ?>" required>
        </div>
        <div>
            <label for="mail">Mail</label>
            <input type="email" name="mail" id="mail" value="<?php echo $membreAModifier[2] ?>" required>
        </div>
        <div>
            <label for="telephone">Telephone *</label>
            <input type="number" name="telephone" id="telephone" value="<?php echo $membreAModifier[3] ?>" required>
        </div>
        <div>
            <label for="adresse">Adresse *</label>
            <input type="text" name="adresse" id="adresse" value="<?php echo $membreAModifier[4] ?>" required>
        </div>
        <div>
            <label for="date_naissance">Date de naissance *</label>
            <input type="date" name="date_naissance" id="date_naissance" value="<?php echo $membreAModifier[5] ?>" required>
        </div>
        <div>
            <label for="actif">Actif *</label>
            <input type="checkbox" name="actif" id="actif" <?php if($membreAModifier[7] == 1){echo "checked";} ?>>
        </div>
        

        <input class="boutton" type="submit" value="Modifier un membre">
    </form>
    <a href="liste_membres.php" class="boutton">Revenir à la liste des membres</a>
</body>
</html>
    
</body>
</html>