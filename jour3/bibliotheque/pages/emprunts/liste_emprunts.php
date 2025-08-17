<?php
    require_once '../../config/database.php';
    require_once '../../classes/Emprunt.php';

    $empruntModel = new Emprunt($pdo);
    $emprunts = $empruntModel->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotheque</title>
    <link rel="stylesheet" href="../../complements/stylesheet.css">
</head>
<body>

    <div  class="menu">
        <a href="../livres/liste_livres.php" class="boutton">Liste livres</a>
        <a href="../membres/liste_membres.php" class="boutton">Liste membres</a>
        <a href="../auteurs/liste_auteurs.php" class="boutton">Liste auteurs</a>
    </div>

    <h1>Liste emprunts</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Date de retour prévue</th>
            <th>Date de retour réelle</th>
            <th>Prolongation</th>
            <th>Notes</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
        <tbody>
            <?php foreach ($emprunts as $emprunt) : ?>
            <tr>
                <td><?php echo htmlspecialchars($emprunt['id']) ?></td>
                <td><?php echo htmlspecialchars($emprunt['date_retour_prevue']) ?></td>
                <td><?php echo ($emprunt['date_retour_reelle'] != null) ? htmlspecialchars($emprunt['date_retour_reelle']) : '' ?></td>
                <td><?php echo htmlspecialchars($emprunt['prolongation']) ?></td>
                <td><?php echo htmlspecialchars($emprunt['notes']) ?></td>
                <td><a href='delete.php?id=<?php echo $emprunt['id']?>'>❌</a></td>
                <td><a href="update.php?id=<?php echo $emprunt['id']?>">🖍️</a></td>

            </tr>
            <?php endforeach?>

        </tbody>
    </table>
    
    <a href="../index.php" class="boutton">Retourner au menu bibliotheque</a>
    <a href="create.php" class="boutton">Rentrez un nouveau emprunt</a>


    <?php if (empty($emprunt)): ?>
        <p>Aucun emprunt trouve, <a href="">Ajouter le premier emprunt</a>!</p>
    <?php endif ?>
</body>
</html>