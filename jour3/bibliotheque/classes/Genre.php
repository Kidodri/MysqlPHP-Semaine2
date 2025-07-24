<?php

class Genre
{
    // Propriétés
    private $pdo;


    // Constructeur
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Methodes CRUD

    //CREATE - Ajouter un genre
    public function create($nom,$description){
        $sql = "INSERT INTO `genres`(`nom`,`description`) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nom,$description]);
    }
    
    //DELETE - Supprimer un genre
    public function delete($id){
        $sql = "DELETE FROM `genres` WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    //READ - Recuperer tous les genres
    public function getAll(){
        $sql = "SELECT * FROM `genres` ORDER BY nom DESC;";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getOneById($id){
        $sql = "SELECT * FROM `genres` WHERE id=$id;";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll()[0];
    }

    //UPDATE - Modifier un genre
    public function update($id_genre,$nom,$description,$id){
        $sql = "UPDATE `genres` SET `id`=?,`nom`=?,`description`=? WHERE id=?";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_genre,$nom,$description,$id]);
    }
}

?>