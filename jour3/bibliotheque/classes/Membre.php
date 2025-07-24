<?php

class Membre
{
    // Propriétés
    private $pdo;


    // Constructeur
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Methodes CRUD

    //CREATE - Ajouter un membre
    public function create($nom_prenom,$mail,$telephone,$adresse,$date_naissance,$actif){
        $sql = "INSERT INTO `membres`(nom_prenom,mail,telephone,adresse,date_naissance,actif) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nom_prenom,$mail,$telephone,$adresse,$date_naissance,$actif]);
    }
    
    //DELETE - Supprimer un membre
    public function delete($id){
        $sql = "DELETE FROM `membres` WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    //READ - Recuperer tous les membres
    public function getAll(){
        $sql = "SELECT * FROM `membres` ORDER BY date_inscription DESC;";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getOneById($id){
        $sql = "SELECT * FROM `membres` WHERE id=$id;";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll()[0];
    }

    //UPDATE - Modifier un membre
    public function update($id_membre,$nom_prenom,$mail,$telephone,$adresse,$date_naissance,$actif,$id){
        $sql = "UPDATE `membres` SET `id`=?,`nom`=?,`description`=? WHERE id=?";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_membre,$nom_prenom,$mail,$telephone,$adresse,$date_naissance,$actif,$id]);
    }
}

?>