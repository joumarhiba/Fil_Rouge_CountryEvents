<?php
require_once('Base.php');

class Panier extends Base{
    // Connexion
    private $con;
    private $table = "panier";

    // object properties
    public $idEvent;
    public $nomEvent;
    public $tarif;
    public $idVisiteur;

    /**
     * Constructeur pour la connexion à la base de données
     */
    public function __construct(){
        $this->con = $this->connect();
    }
    public function eventsIncart() {
        $query = "SELECT $this->table.idEvent, evenement.nomEvent, evenement.typeEvent, evenement.villeEvent, evenement.dateDebut, evenement.tarif, organisateur.username
        FROM evenement
        INNER JOIN $this->table ON evenement.idEvent= $this->table.idEvent
        INNER JOIN organisateur ON evenement.idOrganisateur = organisateur.idOrganisateur
        WHERE $this->table.idEvent= :idEvent ";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':idEvent',$idEvent);
        $stmt->execute();
        return $stmt;
    }

    public function getAll($idVisiteur) {
        $query = "SELECT evenement.nomEvent,evenement.dateDebut, evenement.villeEvent, panier.tarif, evenement.img,panier.qte, panier.idVisiteur, panier.idEvent, panier.idPanier FROM $this->table INNER JOIN evenement ON panier.idEvent=evenement.idEvent WHERE panier.idVisiteur= :idVisiteur";
        $stmt = $this->con->prepare($query);
        $stmt->bindValue(':idVisiteur',$idVisiteur);
        $stmt->execute();
        return $stmt;
    }

    public function ticketsById($idVisiteur) {
        $query = "SELECT evenement.nomEvent, evenement.tarif, evenement.img, $this->table.idVisiteur, $this->table.idEvent FROM $this->table INNER JOIN evenement ON panier.idEvent=evenement.idEvent WHERE evenement.idVisiteur=:idVisiteur" ;
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':idVisiteur',$idVisiteur);
        $stmt->execute();
        return $stmt;
    }

    public function addToPanier($idEvent, $idVisiteur ,$qte, $tarif) {
        $query = "INSERT INTO $this->table SET idEvent='$idEvent', idVisiteur='$idVisiteur' , qte = '$qte', tarif='$tarif'";
        $stmt = $this->con->prepare($query);
        return $stmt->execute();
    }

    public function remove($idPanier) {
        $query = "DELETE FROM $this->table WHERE idPanier = ?";
        $stmt = $this->con->prepare($query);
        $idPanier = htmlspecialchars(strip_tags($idPanier));
        $stmt->bindParam(1, $idPanier);
        return $stmt->execute();
    }

    public function plusOne($idPanier, $qte, $tarif) {
        $idPanier = htmlspecialchars(strip_tags($idPanier));
        $qte = htmlspecialchars(strip_tags($qte));
        $tarif = htmlspecialchars(strip_tags($tarif));
        $query = "UPDATE $this->table SET `qte`='$qte', `tarif`='$tarif' WHERE idPanier = $idPanier";
        $stmt = $this->con->prepare($query);
        return $stmt->execute();
    }

    public function minusOne($idPanier, $qte, $tarif) {
        $idPanier = htmlspecialchars(strip_tags($idPanier));
        $qte = htmlspecialchars(strip_tags($qte));
        $tarif = htmlspecialchars(strip_tags($tarif));
        $query = "UPDATE $this->table SET `qte`='$qte', `tarif`='$tarif' WHERE idPanier = $idPanier";
        $stmt = $this->con->prepare($query);
        return $stmt->execute();
    }

    public function updateTarif ($idPanier, $tarif, $qte) {
        $idPanier = htmlspecialchars(strip_tags($idPanier));
        $qte = htmlspecialchars(strip_tags($qte));
        $tarif = htmlspecialchars(strip_tags($tarif));
        $query = "UPDATE $this->table SET `tarif`= '$tarif' WHERE idPanier = $idPanier";
        $stmt = $this->con->prepare($query);
        return $stmt->execute();
    }

    public function total ($idVisiteur) {
        $query = "SELECT * FROM $this->table WHERE idVisiteur = :idVisiteur";
        $stmt = $this->con->prepare($query);
        $stmt->bindValue(':idVisiteur',$idVisiteur);
        $stmt->execute();
        return $stmt;
}
}