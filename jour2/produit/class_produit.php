<?php
class Produit
{
    public $nom;
    public $prix;
    public $stock;
    public $actif;

    public function __construct($nom, $prix, $stock, $actif = true)
    {

        $this->nom = $nom;
        $this->prix = (float)$prix;
        $this->stock = (int)$stock;
        $this->actif = (bool)$actif;
    }

    public function afficher()
    {
        echo "<div>";
        echo "<h2 class=nm_produit>Produit : $this->nom</h2>";
        echo "<h3>Prix : $this->prix</h3>";
        echo "<h3>Stock : $this->stock</h3>";
        if ($this->actif == true) {
            echo "<h3>Actif : Ok</h3>";
        } else {
            echo "<h3>Actif : Nope</h3>";
        }

        echo "<form method='post' action='class_produit.php'>";
        echo "<button class='button'  formaction='form_produit.php'>Retourner au formulaire</button>";
        echo "</form>";
        echo "</div>";
    }

    public function estDispo(){
        if($this->actif == true && $this->stock > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function vendreQuantite($quantite)
    {
        if ($this->stock > 0) {
            $this->stock -= $quantite;
            echo "Stock : $this->stock";
        } else {
            echo "<h2>Il n'y a plus de stock pour ce produit</h2>";
        }
    }

    public function ajouterStock($quantite)
    {
        $this->stock += $quantite;
        echo "Stock : $this->stock";
    }
}


$clavier = new Produit($_POST['nom'], $_POST['prix'], $_POST['stock'], $_POST['actif']);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $clavier->afficher();
    ?>
</body>

</html>