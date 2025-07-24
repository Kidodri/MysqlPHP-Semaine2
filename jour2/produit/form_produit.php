<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter un produit</h1>

    <form action="class_produit.php" method="post">
        <div>
            <label for="nom">Entrez le nom du produit : </label>
            <input type="text" name="nom" required>
        </div>

        <div>
            <label for="prix">Entrez le prix du produit : </label>
            <input type="number" name="prix" required>
        </div>

        <div>
            <label for="stock">Entrez le stock du produit : </label>
            <input type="number" name="stock" required>
        </div>

        <div>
            <label for="actif">Entrez si le produit est actif: </label>
            <input type="checkbox" name="actif">
        </div>

        <div>
            <input type="submit" class="button" value="Ajouter">
        </div>
    </form>
    
</body>
</html>