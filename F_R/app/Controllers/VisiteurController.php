<?php

require('app/Models/Visiteur.php');
require('app/Models/Event.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8 ");
header("Access-Control-Allow-Methods: * ");
header("Access-Control-Allow-Max-Age: 3600 ");
header("Access-Control-Allow-Headers: * ");

class VisiteurController
{
    public function all(){
        $org = new Visiteur();
        $res = $org->getAllV();

        if($res){
            $data['data'] = array();

            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $v = array(
                    'username'=>$username,
                    'email'=>$email
                );
                array_push($data['data'],$v);
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

            $result = new Visiteur();
            if($result->addVisiteur($username, $email, $mdp)){
                        if ($result) {
                            echo json_encode(
                                array("message"=>"visiteur Account created")
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
        $donnee = json_decode(file_get_contents('php://input'));
        $email = $donnee->email;
        if(isset($email) && isset($donnee->mdp)){
            $donnee = [];
            $donnee['data'] = [];
            $v = new Visiteur();
            if ($result = $v->getVisiteur($email)){
                extract($result);
                echo $idVisiteur;
            } else {
                $message = array(
                    'message' => 'this visitor is NOT Found'
                );
                array_push($donnee['data'],$message);
                echo json_encode($donnee);
            }
        }
        }
        
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        View::load("home");
    }

    public function infos(){
        echo 'page d\'informations du visiteur';
    }





}




