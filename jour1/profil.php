<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <style>
        body {font-family: Arial; margin: 50px 700px; text-align: center;}
        ul {list-style-type: none;}
        div {background: #bfd9d6; padding: 15px; margin: 10px 0; border-radius: 5px;}
    </style>
    <?php
        $nom = "Fernandes";
        $prenom = "Alexandre";
        $age = 25;
        $ville = "Lyon";
        $pays = "France";

        $hobbies = [
            "Programmation",
            "Lecture",
            "Sport",
            "Musique",
            "Voyages"
        ];

        $nb_hobbies = count($hobbies);

        $annee_naissance = 2025 - $age;
    ?>
</head>
<header>
    <?php
        echo "<h1>Mon Profil</h1>"
    ?>
</header>
<body>
    <?php
        echo '<div>';
        echo "<h2>Infos Personelles</h2>";
        echo "<h3><strong>Nom complet : </strong> $prenom $nom</h3>";
        echo "<h3><strong>Age : </strong> $age</h3>";
        echo "<h3><strong>Né en : </strong> $annee_naissance</h3>";
        echo "<h3><strong>Localisation : </strong> $ville, $pays</h3>";
        echo "</div>";

        echo "<div>";
        echo "<h2>Mes Hobbies ($nb_hobbies)</h2>";
        echo "<ul>";
        foreach ($hobbies as $hobbie) {
            echo "<li>$hobbie</li>";
        };
        echo "</ul>";
        echo "</div>";
    ?>
</body>
</html>