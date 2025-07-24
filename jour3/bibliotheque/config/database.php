<?php 
// Configuration de la conexion a la base de donnee
$host = 'localhost:3307';
$dbname = 'bibliotheque';
$username = 'root';
$password = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
}
catch(PDOException $error){
    die("Erreur de connexion a la base de donnee: ".$error->getMessage());
}
?>