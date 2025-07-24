<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur mdp</title>
    <style>
        body{
            background-color: #e0dcd1;font-family: Arial; margin: 50px 700px; text-align: center;
        }
        .generateur{
            background: #262624; padding: 25px; color: #ffffff; border-radius: 15px;
        }
        .mdp_faible{
            background: #fc8e86; padding: 15px; margin: 10px 0; border-radius: 5px;
        }
        .mdp_moyen{
            background: #ffbe82; padding: 15px; margin: 10px 0; border-radius: 5px;
        }
        .mdp_bon{
            background: #bfd9d6; padding: 15px; margin: 10px 0; border-radius: 5px;
        }
        .mdp_excellent{
            background: #88a871; padding: 15px; margin: 10px 0; border-radius: 5px;
        }
    </style>
    <?php
        global $caracteres;
        $caracteres = [
            'minuscules' => 'abcdefghijklmnopqrstuvwxyz',
            'majuscules' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'chiffres' => '0123456789',
            'speciaux' => '!@#$%^&*()_+-='
        ];

        $types_actifs = ['minuscules', 'majuscules', 'chiffres', 'speciaux'];

        $chaines_caracteres = '';
        foreach ($types_actifs as $type) {
            $chaines_caracteres .= $caracteres[$type];
        }

        function genererMotDePasse($longueur, $chaines_caracteres){
            $mdp = '';
            $nb_caracteres = strlen($chaines_caracteres);
            for ($i=0; $i < $longueur; $i++) { 
                $caractere = $chaines_caracteres[random_int(0, $nb_caracteres - 1)];
                $mdp .= $caractere;
            }
            return $mdp;
        }

        function compterNombreCaracteresDifferents($motdepasse){
            global $caracteres;
            $longueur_mdp = strlen($motdepasse);
            $nb_caracteres = [
                'minuscules' => 0,
                'majuscules' => 0,
                'chiffres' => 0,
                'speciaux' => 0
            ];

            for ($i=0; $i < $longueur_mdp; $i++) { 
                $caractere = $motdepasse[$i];
                if (str_contains($caracteres['minuscules'],$caractere)){
                    $nb_caracteres['minuscules'] +=1;
                }
                elseif (str_contains($caracteres['majuscules'],$caractere)) {
                    $nb_caracteres['majuscules'] +=1;
                }
                elseif (str_contains($caracteres['chiffres'],$caractere)) {
                    $nb_caracteres['chiffres'] +=1;
                }
                elseif (str_contains($caracteres['speciaux'],$caractere)) {
                    $nb_caracteres['speciaux'] +=1;
                }
            }
            return $nb_caracteres;
        }

        function analyserForce($motdepasse, $nb_caracteres){
            $score = 0;
            $longueur_mdp = strlen($motdepasse);
            $nb_minuscules = $nb_caracteres['minuscules'];
            $nb_majuscules = $nb_caracteres['majuscules'];
            $nb_chiffres = $nb_caracteres['chiffres'];
            $nb_speciaux = $nb_caracteres['speciaux'];
            if ($longueur_mdp < 5){
                $score += 0;
            }
            elseif ($longueur_mdp < 10){
                $score += 2;
            }
            else{
                $score += 4;
            }

            if ($nb_minuscules > 1) {
                $score += 1;
            }
            if ($nb_majuscules > 1) {
                $score += 1;
            }
            if ($nb_chiffres > 1) {
                $score += 1;
            }
            if ($nb_speciaux > 1) {
                $score += 1;
            }

            if ($score < 4){
                return "Mot de passe faible";
            }
            elseif ($score < 6) {
                return "Mot de passe moyen";
            }
            elseif ($score < 8) {
                return "Mot de passe bon";
            }
            else{
                return "Mot de passe excellent";
            }
        }
    ?>
</head>
<body>
    <div class='generateur'>
        <h1>Générateur de mot de passe</h1>
        <?php
            $mdp1 = genererMotDePasse(rand(3,13), $chaines_caracteres);
            $nb_caract_diff1 = compterNombreCaracteresDifferents($mdp1);
            switch (analyserForce($mdp1,$nb_caract_diff1)) {
                case 'Mot de passe excellent':
                    echo "<div class='mdp_excellent'>";
                    echo "<h2>1er mot de passe : <strong>$mdp1</strong></h2>";
                    echo "<h2><strong>(Excellent)</strong></h2>";
                    echo "</div>";
                    break;
                
                case 'Mot de passe bon':
                    echo "<div class='mdp_bon'>";
                    echo "<h2>1er mot de passe : <strong>$mdp1</strong></h2>";
                    echo "<h2><strong>(Bon)</strong></h2>";
                    echo "</div>";
                    break;

                case 'Mot de passe moyen':
                    echo "<div class='mdp_moyen'>";
                    echo "<h2>1er mot de passe : <strong>$mdp1</strong></h2>";
                    echo "<h2><strong>(Moyen)</strong></h2>";
                    echo "</div>";
                    break;

                default:
                    echo "<div class='mdp_faible'>";
                    echo "<h2>1er mot de passe : <strong>$mdp1</strong></h2>";
                    echo "<h2><strong>(Faible)</strong></h2>";
                    echo "</div>";
                    break;
            }
            
            $mdp2 = genererMotDePasse(rand(3,13), $chaines_caracteres);
            $nb_caract_diff2 = compterNombreCaracteresDifferents($mdp2);
            switch (analyserForce($mdp2,$nb_caract_diff2)) {
                case 'Mot de passe excellent':
                    echo "<div class='mdp_excellent'>";
                    echo "<h2>2eme mot de passe : <strong>$mdp2</strong></h2>";
                    echo "<h2><strong>(Excellent)</strong></h2>";
                    echo "</div>";
                    break;
                
                case 'Mot de passe bon':
                    echo "<div class='mdp_bon'>";
                    echo "<h2>2eme mot de passe : <strong>$mdp2</strong></h2>";
                    echo "<h2><strong>(Bon)</strong></h2>";
                    echo "</div>";
                    break;

                case 'Mot de passe moyen':
                    echo "<div class='mdp_moyen'>";
                    echo "<h2>2eme mot de passe : <strong>$mdp2</strong></h2>";
                    echo "<h2><strong>(Moyen)</strong></h2>";
                    echo "</div>";
                    break;

                default:
                    echo "<div class='mdp_faible'>";
                    echo "<h2>2eme mot de passe : <strong>$mdp2</strong></h2>";
                    echo "<h2><strong>(Faible)</strong></h2>";
                    echo "</div>";
                    break;
            }

            $mdp3 = genererMotDePasse(rand(3,13), $chaines_caracteres);
            $nb_caract_diff3 = compterNombreCaracteresDifferents($mdp3);
            switch (analyserForce($mdp3,$nb_caract_diff3)) {
                case 'Mot de passe excellent':
                    echo "<div class='mdp_excellent'>";
                    echo "<h2>3eme mot de passe : <strong>$mdp3</strong></h2>";
                    echo "<h2><strong>(Excellent)</strong></h2>";
                    echo "</div>";
                    break;

                case 'Mot de passe bon':
                    echo "<div class='mdp_bon'>";
                    echo "<h2>3eme mot de passe : <strong>$mdp3</strong></h2>";
                    echo "<h2><strong>(Bon)</strong></h2>";
                    echo "</div>";
                    break;

                case 'Mot de passe moyen':
                    echo "<div class='mdp_moyen'>";
                    echo "<h2>3eme mot de passe : <strong>$mdp3</strong></h2>";
                    echo "<h2><strong>(Moyen)</strong></h2>";
                    echo "</div>";
                    break;

                default:
                    echo "<div class='mdp_faible'>";
                    echo "<h2>3eme mot de passe : <strong>$mdp3</strong></h2>";
                    echo "<h2><strong>(Faible)</strong></h2>";
                    echo "</div>";
                    break;
            }
        ?>
    </div>
</body>
</html>