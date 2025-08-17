<?php 
require_once('../../classes/Auteur.php');
require_once('../../config/database.php');

$auteurModel = new Auteur($pdo);
$errors = [];

// Traitement id auteur à modifier
if($_GET){
    $id = $_GET['id'];
}

$auteurAModifier = $auteurModel->getOneById($id);

// Traitement form
if($_POST){
    //Nouvel id 
    $id_auteur = $_POST['id_auteur'] ?? '';
    $nom_prenom = $_POST['nom_prenom'] ?? '';
    $nationalite = $_POST['nationalite'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';
    $biographie = $_POST['biographie'] ?? '';
    

   
    // Gestion des erreur
    if($auteurModel->update($id_auteur,$nom_prenom, $nationalite, $date_naissance, $biographie, $id)){
    header('Location: ../index.php?message=updated');
    }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'un auteur</title>
    <link rel="stylesheet" href="../../complements/stylesheet.css">
</head>
<body>
    <h1>Modifier les informations du auteur</h1>
    <form method="post">
        <div>
            <label for="id_auteur">ID de l'auteur *</label>
            <input type="number" name="id_auteur" id="id_auteur" value="<?php echo $auteurAModifier[0] ?>" required>
        </div>
        <div>
            <label for="nom_prenom">Nom complet *</label>
            <input type="text" name="nom_prenom" id="nom_prenom" value="<?php echo $auteurAModifier[1] ?>" required>
        </div>
        <div>
            <label for="nationalite">Nationalité *</label>
            <input type="text" name="nationalite" id="nationalite" value="<?php echo $auteurAModifier[2] ?>" required>
        </div>
        <div>
            <label for="date_naissance">Date de naissance *</label>
            <input type="date" name="date_naissance" id="date_naissance" value="<?php echo $auteurAModifier[3] ?>" required>
        </div>
        <div>
            <label for="biographie">Biographie</label>
            <textarea id="biographie" name="biographie"><?php echo $auteurAModifier[4] ?></textarea>
        </div>


        <input class="boutton" type="submit" value="Modifier un auteur">
    </form>
    <a href="liste_auteurs.php" class="boutton">Revenir à la liste des auteurs</a>
</body>
</html>
    
</body>
</html>