<?php

class Auteur
{
    // Propriétés
    private $pdo;


    // Constructeur
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Methodes CRUD

    //CREATE - Ajouter un auteur
    public function create($nom_prenom, $nationalite, $date_naissance,$biographie){
        $sql = "INSERT INTO `auteurs`(`nom_prenom`, `nationalite`, `date_naissance`, `biographie`) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nom_prenom, $nationalite, $date_naissance,$biographie]);
    }
    
    //DELETE - Supprimer un auteur
    public function delete($id){
        $sql = "DELETE FROM `auteurs` WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    //READ - Recuperer tous les auteurs
    public function getAll(){
        $sql = "SELECT * FROM `auteurs` ORDER BY id ASC;";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getOneById($id){
        $sql = "SELECT * FROM `auteurs` WHERE id=$id;";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll()[0];
    }

    //UPDATE - Modifier un auteur
    public function update($id_auteur,$nom_prenom, $nationalite, $date_naissance,$biographie,$id){
        $sql = "UPDATE `auteurs` SET `id`=?,`nom_prenom`=?,`nationalite`=?,`date_naissance`=?,`biographie`=?WHERE id=?";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_auteur,$nom_prenom, $nationalite, $date_naissance,$biographie,$id]);
    }
}

?>