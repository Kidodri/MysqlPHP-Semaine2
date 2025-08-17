<?php
    require_once '../../config/database.php';
    require_once '../../classes/Membre.php';

    $membreModel = new Membre($pdo);
    $membres = $membreModel->getAll();
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

    <div class="menu">
        <a href="../emprunts/liste_emprunts.php" class="boutton">Liste emprunts</a>
        <a href="../livres/liste_livres.php" class="boutton">Liste livres</a>
        <a href="../auteurs/liste_auteurs.php" class="boutton">Liste auteurs</a>
    </div>

    <h1>Liste membres</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom complet</th>
            <th>Mail</th>
            <th>Telephone</th>
            <th>Adresse</th>
            <th>Date de naissance</th>
            <th>Actif</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
        <tbody>
            <?php foreach ($membres as $membre) : ?>
            <tr>
                <td><?php echo htmlspecialchars($membre['id']) ?></td>
                <td><?php echo htmlspecialchars($membre['nom_prenom']) ?></td>
                <td><?php echo ($membre['mail'] != null) ? htmlspecialchars($membre['mail']) : '' ?></td>
                <td><?php echo htmlspecialchars($membre['telephone']) ?></td>
                <td><?php echo htmlspecialchars($membre['adresse']) ?></td>
                <td><?php echo htmlspecialchars($membre['date_naissance']) ?></td>
                <td><?php echo htmlspecialchars($membre['actif']) ?></td>
                <td><a href='delete.php?id=<?php echo $membre['id']?>'>❌</a></td>
                <td><a href="update.php?id=<?php echo $membre['id']?>">🖍️</a></td>

            </tr>
            <?php endforeach?>

        </tbody>
    </table>
    
    <a href="../index.php" class="boutton">Retourner au menu bibliotheque</a>
    <a href="create.php" class="boutton">Rentrez un nouveau membre</a>


    <?php if (empty($membre)): ?>
        <p>Aucun membre trouve, <a href="">Ajouter le premier membre</a>!</p>
    <?php endif ?>
</body>
</html>