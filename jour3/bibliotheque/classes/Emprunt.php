<?php

class Emprunt
{
    // Propriétés
    private $pdo;


    // Constructeur
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Methodes CRUD

    //CREATE - Ajouter un emprunt
    public function create($date_retour_prevue,$date_retour_reelle,$prolongation,$notes){
        $sql = "INSERT INTO `emprunts`(`date_retour_prevue`,`date_retour_reelle`,`prolongation`,`notes`) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$date_retour_prevue,$date_retour_reelle,$prolongation,$notes]);
    }
    
    //DELETE - Supprimer un emprunt
    public function delete($id){
        $sql = "DELETE FROM `emprunts` WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    //READ - Recuperer tous les emprunts
    public function getAll(){
        $sql = "SELECT * FROM `emprunts` ORDER BY date_emprunt DESC;";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getOneById($id){
        $sql = "SELECT * FROM `emprunts` WHERE id=$id;";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll()[0];
    }

    //UPDATE - Modifier un emprunt
    public function update($id_emprunt,$livre_id, $membre_id,$date_retour_prevue,$date_retour_reelle,$prolongation,$notes,$id){
        $sql = "UPDATE `emprunts` SET `id`=?,`livre_id`= ?,`membre_id`= ?,`date_retour_prevue`=?,`date_retour_reelle`=?,`prolongation`=?,`notes`=? WHERE id=?";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_emprunt,$livre_id, $membre_id,$date_retour_prevue,$date_retour_reelle,$prolongation,$notes,$id]);
    }
}

?>