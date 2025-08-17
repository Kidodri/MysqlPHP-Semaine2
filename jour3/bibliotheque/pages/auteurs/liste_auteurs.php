<?php
    require_once '../../config/database.php';
    require_once '../../classes/Auteur.php';

    $auteurModel = new Auteur($pdo);
    $auteurs = $auteurModel->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auteurs</title>
    <link rel="stylesheet" href="../../complements/stylesheet.css">
</head>
<body>

    <div class="menu">
        <a href="../emprunts/liste_emprunts.php" class="boutton">Liste emprunts</a>
        <a href="../membres/liste_membres.php" class="boutton">Liste membres</a>
        <a href="../livres/liste_livres.php" class="boutton">Liste livres</a>
    </div>


    <h1>Liste auteurs</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom complet</th>
            <th>Nationalite</th>
            <th>Date de naissance</th>
            <th>Biographie</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
        <tbody>
            <?php foreach ($auteurs as $auteur) : ?>
            <tr>
                <td><?php echo htmlspecialchars($auteur['id']) ?></td>
                <td><?php echo htmlspecialchars($auteur['nom_prenom']) ?></td>
                <td><?php echo htmlspecialchars($auteur['nationalite']) ?></td>
                <td><?php echo htmlspecialchars($auteur['date_naissance']) ?></td>
                <td><textarea><?php echo htmlspecialchars($auteur['biographie']) ?></textarea></td>
                <td><a href='delete.php?id=<?php echo $auteur['id']?>'>❌</a></td>
                <td><a href="update.php?id=<?php echo $auteur['id']?>">🖍️</a></td>

            </tr>
            <?php endforeach?>

        </tbody>
    </table>

    <a href="create.php" class="boutton">Rentrez un nouvel auteur</a>
    <a href="../index.php" class="boutton">Retourner au menu bibliotheque</a>


    <?php if (empty($auteur)): ?>
        <p>Aucun auteur trouve, <a href="">Ajouter le premier auteur</a>!</p>
    <?php endif ?>
</body>
</html>