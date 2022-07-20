<?php
require_once('Base.php');

class Organisateur extends Base{
    // Connexion
    private $con;
    private $table = "organisateur";

    // object properties
    // public $idOrganisateur;
    // public $nom;
    // public $age;
    // public $profession;
    // public $reference;
    public $username;

    /**
     * Constructeur avec $db pour la connexion à la base de données
     */
    public function __construct(){
        $this->con = $this->connect();
    }

    public function getAllOrganisateurs(){
        $q = "SELECT username, email FROM $this->table ";
        $stmt = $this->con->prepare($q);
        $stmt->execute();
        return $stmt;
    }

    public function addOrganisateur($username, $email, $mdp )
    {
        $query = "INSERT INTO $this->table SET username=:username,email=:email,mdp=:mdp";
        $stmt = $this->con->prepare($query);

        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam('mdp',$mdp);

        $stmt->execute();
        return $stmt;
    }

    public function getOrganisateur($email)
    {
        $query = "SELECT * FROM $this->table WHERE email=:email ";
        $stmt = $this->con->prepare($query);

        $stmt->bindParam(':email',$email);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrganisateurByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE idOrganisateur =:id ";
        $stmt = $this->con->prepare($query);

        $stmt->bindParam(':id',$id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}