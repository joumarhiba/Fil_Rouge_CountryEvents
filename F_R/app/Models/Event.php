<?php
require_once('Base.php');

class Event extends Base{
    // Connexion
    private $con;
    private $table = "evenement";

    // object properties
    public $idEvent;
    public $nomEvent;
    public $typeEvent;
    public $villeEvent;
    public $dateDebut;
    public $dnbMax;
    public $tarif;
    public $idOrganisateur;


    /**
     * Constructeur pour la connexion à la base de données
     */
    public function __construct(){
        $this->con = $this->connect();
    }

    public function getAllEvents() {
        $query = "SELECT evenement.nomEvent, evenement.typeEvent, evenement.villeEvent, evenement.dateDebut, evenement.tarif, evenement.img, evenement.idOrganisateur, evenement.idEvent FROM $this->table";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function search ($nomEvent) {
        $query = "SELECT * FROM $this->table WHERE nomEvent=:nomEvent ";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':nomEvent',$nomEvent);
        $stmt->execute();
        return $stmt;
    }

    public function eventsById($idOrganisateur) {
        $query = "SELECT * FROM $this->table WHERE idOrganisateur=:idOrganisateur";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':idOrganisateur',$idOrganisateur);
        $stmt->execute();
        return $stmt;
    }

    public function singleEvent($idEvent) {
        $query = "SELECT *FROM $this->table WHERE idEvent=:idEvent";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':idEvent',$idEvent);
        $stmt->execute();
        return $stmt;
    }

    public function addEvent($nomEvent, $typeEvent, $villeEvent,$dateDebut, $nbMax,$tarif,$img, $idOrganisateur )
    {
        $query = "INSERT INTO $this->table SET nomEvent='$nomEvent',`typeEvent`='$typeEvent',villeEvent='$villeEvent', dateDebut='$dateDebut',nbMax='$nbMax',tarif='$tarif',img='$img' ,idOrganisateur='$idOrganisateur'";
        $stmt = $this->con->prepare($query);
        return $stmt->execute();
    }

    public function removeEvent($idEvent)
    {
        $query = "DELETE FROM $this->table WHERE idEvent = ?";
        $stmt = $this->con->prepare($query);
        $idEvent = htmlspecialchars(strip_tags($idEvent));
        $stmt->bindParam(1, $idEvent);

        return $stmt->execute();
    }

    public function updateEvent($idEvent, $nomEvent, $typeEvent, $villeEvent,$dateDebut, $nbMax,$tarif)
    {
        // $idEvent = htmlspecialchars(strip_tags($idEvent));
        // $nomEvent = htmlspecialchars(strip_tags($nomEvent));
        // $typeEvent = htmlspecialchars(strip_tags($typeEvent));
        // $villeEvent = htmlspecialchars(strip_tags($villeEvent));
        // $dateDebut = htmlspecialchars(strip_tags($dateDebut));
        // $nbMax = htmlspecialchars(strip_tags($nbMax));
        // $tarif = htmlspecialchars(strip_tags($tarif));
        // $img = htmlspecialchars(strip_tags($img));

        $query = "UPDATE $this->table SET `nomEvent`='$nomEvent',`typeEvent`='$typeEvent',`villeEvent`='$villeEvent',`dateDebut`='$dateDebut',`nbMax`='$nbMax',`tarif`='$tarif' WHERE idEvent = $idEvent";
        $stmt = $this->con->prepare($query);
        return $stmt->execute();
    }
}
