<?php

class Livre 
{
    // Propriétés
    private $pdo;


    // Constructeur
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Methodes CRUD

    //CREATE - Ajouter un livre
    public function create($titre, $isbn, $date_publication,$nb_pages,$resume,$disponible){
        $sql = "INSERT INTO `livres`(`titre`, `isbn`, `date_publication`, `nb_pages`, `synthese`, `disponible`) VALUES (?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titre, $isbn, $date_publication,$nb_pages,$resume,$disponible]);
    }
    
    //DELETE - Supprimer un livre
    public function delete($id){
        $sql = "DELETE FROM `livres` WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    //READ - Recuperer tous les livres
    public function getAll(){
        $sql = "SELECT * FROM livres ORDER BY date_publication DESC;";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getOneById($id){
        $sql = "SELECT * FROM livres WHERE id=$id;";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll()[0];
    }

    //UPDATE - Modifier un livre
    public function update($id_livre,$titre,$isbn,$auteur_id,$genre_id,$date_publication,$nb_pages,$resume,$disponible,$id){
        $sql = "UPDATE `livres` SET `id`=?,`titre`=?,`isbn`=?,`auteur_id`=?,`genre_id`=?,`date_publication`=?,`nb_pages`=?,`synthese`=?,`disponible`=? WHERE id=?;";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_livre,$titre,$isbn,$auteur_id,$genre_id,$date_publication,$nb_pages,$resume,$disponible,$id]);
    }
}

?>