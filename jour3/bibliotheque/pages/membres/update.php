<?php 
require_once('../../classes/Livre.php');
require_once('../../config/database.php');

$livreModel = new Livre($pdo);
$errors = [];

// Traitement id livre à modifier
if($_GET){
    $id = $_GET['id'];
}

$livreAModifier = $livreModel->getOneById($id);

// Traitement form
if($_POST){
    //Nouvel id 
    $id_livre = $_POST['id_livre'] ?? '';
    $titre = $_POST['titre'] ?? '';
    $auteur_id = $_POST['auteur_id'] == null ? null : $_POST['auteur_id'] ;
    $genre_id = $_POST['genre_id'] == null ? null : $_POST['genre_id'];
    $isbn = $_POST['isbn'] ?? '';
    $date_publication = $_POST['date_publication'] ?? '';
    $nb_pages = $_POST['nb_pages'] ?? '';
    $resume = $_POST['resume'] ?? '';
    $disponible = $_POST['disponible'] ?? '';

    // Validation des donnes
    if($disponible == "on"){
        $disponible = 1;
    }
    else {
        $disponible = 0;
    }
    // Gestion des erreur
    if($livreModel->update($id_livre,$titre, $isbn,$auteur_id,$genre_id, $date_publication,$nb_pages,$resume,$disponible,$id)){
    header('Location: ../index.php?message=updated');
    }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'un livre</title>
    <link rel="stylesheet" href="../../complements/stylesheet.css">
</head>
<body>
    <h1>Modifier les informations du livre</h1>
    <form method="post">
        <div>
            <label for="id_livre">ID du livre *</label>
            <input type="text" name="id_livre" id="id_livre" value="<?php echo $livreAModifier[0] ?>" required>
        </div>
        <div>
            <label for="titre">ID du livre *</label>
            <input type="text" name="titre" id="titre" value="<?php echo $livreAModifier[1] ?>" required>
        </div>
        <div>
            <label for="isbn">ISBN *</label>
            <input type="text" name="isbn" id="isbn" value="<?php echo $livreAModifier[2] ?>" required>
        </div>
        <div>
            <label for="auteur_id">ID de l'auteur</label>
            <input type="number" name="auteur_id" id="auteur_id" value="<?php echo $livreAModifier[3] ?>">
        </div>
        <div>
            <label for="genre_id">ID du genre</label>
            <input type="number" name="genre_id" id="genre_id" value="<?php echo $livreAModifier[4] ?>">
        </div>
        <div>
            <label for="date_publication">Date Publication *</label>
            <input type="number" name="date_publication" id="date_publication" value="<?php echo $livreAModifier[5] ?>" required>
        </div>
        <div>
            <label for="nb_pages">Nombre de page *</label>
            <input type="number" name="nb_pages" id="nb_pages" value="<?php echo $livreAModifier[6] ?>" required>
        </div>
        <div>
            <label for="resume">Resumé</label>
            <textarea id="resume" name="resume" rows="5" cols="33"><?php echo $livreAModifier[7] ?></textarea>
        </div>
        <div>
            <label for="disponible">Disponible *</label>
            <input type="checkbox" name="disponible" id="disponible" <?php if($livreAModifier[8] == 1){echo "checked";} ?>>
        </div>

        <input class="boutton" type="submit" value="Modifier un livre">
    </form>
    <a href="../index.php" class="boutton">Revenir à la liste des livres</a>
</body>
</html>
    
</body>
</html>