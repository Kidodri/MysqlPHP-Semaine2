<?php
    require_once '../config/database.php';
    require_once '../classes/Livre.php';

    $livreModel = new Livre($pdo);
    $livres = $livreModel->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotheque</title>
    <link rel="stylesheet" href="../complements/stylesheet.css">
</head>
<body>

    <a href="emprunts/liste_emprunts.php" class="boutton">Liste emprunts</a>

    <h1>Liste livres</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Date publication</th>
            <th>Disponible</th>
            <th>Resumé</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
        <tbody>
            <?php foreach ($livres as $livre) : ?>
            <tr>
                <td><?php echo htmlspecialchars($livre['id']) ?></td>
                <td><?php echo htmlspecialchars($livre['titre']) ?></td>
                <td><?php echo htmlspecialchars($livre['date_publication']) ?></td>
                <td><?php echo htmlspecialchars($livre['disponible']) ?></td>
                <td><textarea><?php echo htmlspecialchars($livre['synthese']) ?></textarea></td>
                <td><a href='livres/delete.php?id=<?php echo $livre['id']?>'>❌</a></td>
                <td><a href="livres/update.php?id=<?php echo $livre['id']?>">♻️​</a></td>

            </tr>
            <?php endforeach?>

        </tbody>
    </table>

    <a href="livres/create.php" class="boutton">Rentrez un nouveau livre</a>


    <?php if (empty($livre)): ?>
        <p>Aucun livre trouve, <a href="">Ajouter le premier livre</a>!</p>
    <?php endif ?>
</body>
</html>