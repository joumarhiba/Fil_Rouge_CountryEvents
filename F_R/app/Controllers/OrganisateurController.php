<?php
require('app/Models/Organisateur.php');
require('app/Models/Event.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8 ");
header("Access-Control-Allow-Methods: * ");
header("Access-Control-Allow-Max-Age: 3600 ");
header("Access-Control-Allow-Headers: * ");

class OrganisateurController{


    public function all(){
        $org = new Organisateur();
        $res = $org->getAllOrganisateurs();

        if($res){
            $data['data'] = array();

            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $org = array(
                    'username'=>$username,
                    'email'=>$email
                );
                array_push($data['data'],$org);
            }
            echo json_encode($data);
        }else {
            echo json_encode(
                array('message'=> 'nothingggggggg')
            );
        }
    }

    public function register()
    {

        $data =json_decode(file_get_contents('php://input'));

        if(isset($data->username) && isset($data->email) && isset($data->mdp)){
            $username = $data->username;
            $email = $data->email;
            $mdp = $data->mdp;

        }else{
            echo json_encode(
                array("message"=>"noo data from register")
            );
        }

        if (!empty($username) && !empty($email)  && !empty($mdp)) {

            $result = new Organisateur();
            if($result->addOrganisateur($username, $email, $mdp)){
                        if ($result ) {
                            echo json_encode(
                                array("message"=>"organisateur Account created")
                            );
                        }else
                        {
                            echo json_encode(
                                array("message"=>"something wrong with SIGN UP")
                            );

                        }
            }else {
                echo json_encode(
                    array("message"=>$result)
                );
            }
        }
    }


    public function login(){
        $data = json_decode(file_get_contents('php://input'));
        $email = $data->email;
        if(isset($email) && isset($data->mdp)){
            $data = [];
            $data['data'] = [];
            $org = new Organisateur();
            if ($result = $org->getOrganisateur($email)){
                extract($result);
                echo $idOrganisateur;
            } else {
                $message = array(
                    'message' => 'this organisateur is NOT Found'
                );
                array_push($data['data'],$message);
                echo json_encode($data);
            }
        }
    }


public function logout(){
    session_start();
    session_unset();
    session_destroy();
    View::load("home");
}

    public function addEvent()
    {
        $data =json_decode(file_get_contents("php://input"));
        $nomEvent = $data->nomEvent;
        $typeEvent = $data->typeEvent;
        $villeEvent = $data->villeEvent;
        $dateDebut = $data->dateDebut;
        $nbMax = $data->nbMax;
        $tarif = $data->tarif;

        if (isset($nomEvent)){
            echo json_encode(array("message"=>'heyyyyyy'));
        }
    }
}
