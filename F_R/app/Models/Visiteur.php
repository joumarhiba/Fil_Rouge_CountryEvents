<?php
require_once('Base.php');

class Visiteur extends Base{
    // Connexion
    private $con;
    private $table = "visiteur";

    // object properties
    public $idOrganisateur;
    public $nom;
    public $age;
    public $profession;
    public $reference;

    /**
     * Constructeur avec $db pour la connexion à la base de données
     */
    public function __construct(){
        $this->con = $this->connect();
    }

    public function getAllV() {
        $query = "SELECT username, email FROM $this->table";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addVisiteur($username, $email, $mdp )
    {
        $query = "INSERT INTO $this->table SET username=:username,email=:email,mdp=:mdp";
        $stmt = $this->con->prepare($query);

        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam('mdp',$mdp);

        $stmt->execute();
        return $stmt;
    }
    public function getVisiteur($email){
        $query = "SELECT * FROM $this->table WHERE email=:email";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}