<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ma calulatrice PHP</h1>
    <?php
        // Varibales de bases
        $nombre1 = 13;
        $nombre2 = 15;

        echo "<h2> Calcul avec $nombre1 et $nombre2</h2>";
    
        // Calcul simples
        echo "<div>";
        echo "<h2>Operations de base</h2>";

        // Addition
        $addition = $nombre1 + $nombre2;
        echo "<h2>Addition</h2>";
        echo "<h3>Resultat de l'addition: $nombre1 + $nombre2 = $addition</h3>";

        // Soustraction
        $soustraction = $nombre1 - $nombre2;
        echo "<h2>Soustraction</h2>";
        echo "<h3>Resultat de l'addition: $nombre1 - $nombre2 = $soustraction</h3>";
        
        // Multiplication
        $multiplication = $nombre1 * $nombre2;
        echo "<h2>Multiplication</h2>";
        echo "<h3>Resultat de la multiplication: $nombre1 * $nombre2 = $multiplication</h3>";

        // Division
        echo "<h2>Division</h2>";
        if ($nombre2 == 0){
            echo "Une division par 0 est impossible";
        }else
        {
            $division = $nombre1 / $nombre2;
            echo "<h3>Resultat de la division: $nombre1 / $nombre2 = $division</h3>";
        }

        // Modulo 
        $modulo = $nombre1 % $nombre2;
        echo "<h2>Modulo</h2>";
        echo "<h3>Resultat du modulo: $nombre1 % $nombre2 = $modulo</h3>";
        
        // Afficher la version de php
        $version = phpversion();
        echo "<h2>Version PHP</h2>";
        echo "$version";

        // Date actuelle
        $date = date("D M Y");
        echo "<h2>Date actuelle</h2>";
        echo "$date";

        // Tableau
        $resultats = [
            "Addition" => $addition, 
            "Soustraction" => $soustraction, 
            "Multiplication" => $multiplication, 
            "Division" => $division, 
            "Modulo" => $modulo
        ];

        echo "<h1>Resultats : </h1>";
        echo "<table border = '4'>";
        echo "<tr><th>Operations</th><th>Resultats</th></tr>";
        foreach ($resultats as $operation => $resultat) {
            echo "<tr><td>$operation</td><td>$resultat</td></tr>";
        }
        echo "</table>";

        
        
        echo "</div>";

    ?>
</body>
</html>