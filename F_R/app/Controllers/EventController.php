<?php

require_once('app/Models/Organisateur.php');
require_once('app/Models/Visiteur.php');
require_once('app/Models/Event.php');


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8 ");
header("Access-Control-Allow-Methods: * ");
header("Access-Control-Allow-Max-Age: 3600 ");
header("Access-Control-Allow-Headers: * ");

class EventController {
    public function all(){
    $e = new Event();
    $res = $e->getAllEvents();
    if ($res) {
        $array = array();
        $array['data'] = array();

        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $event = array(
                'nomEvent'=>$nomEvent,
                'villeEvent'=>$villeEvent,
                'typeEvent'=>$typeEvent,
                'dateDebut'=>$dateDebut,
                'tarif'=>$tarif,
                'img'=>$img,
                'idOrganisateur'=>$idOrganisateur,
                'idEvent' => $idEvent,
                // 'idVisiteur' => $idVisiteur
            );
            array_push($array['data'],$event);
        }
    echo json_encode($array);
    }else {
        echo json_encode(
            array('message'=>'no data event ...........')
        );
    }
    }

    public function add () {
        $data = json_decode(file_get_contents('php://input'));
        if (isset($data->nomEvent) && isset($data->typeEvent) && isset($data->villeEvent) && isset($data->nbMax) && isset($data->tarif) && isset($data->img)) {
            $nomEvent = $data->nomEvent;
            $typeEvent = $data->typeEvent;
            $villeEvent = $data->villeEvent;
            $dateDebut = $data->dateDebut;
            $nbMax = $data->nbMax;
            $tarif = $data->tarif;
            $img = $data->img;
            $upload = "../assets/".$img;
            $idOrganisateur = $data->idOrganisateur ;
            $e = new Event();
            if ($e->addEvent($nomEvent, $typeEvent, $villeEvent,$dateDebut, $nbMax,$tarif,$upload, $idOrganisateur )) {
                echo json_encode(
                    array('message'=>'the event is added in DB')
                );
            } else {
                echo json_encode(
                    array('message'=>'the Event is NOT created ....')
                );
            }
        }
    }

    public function eventsById(){
        $data = json_decode(file_get_contents('php://input'));
        $idOrganisateur = $data->idOrganisateur;
        $e = new Event();
        $res = $e->eventsById($idOrganisateur);
        if ($res) {
            $array = array();
            $array['data'] = array();

            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $event = array(
                    'nomEvent'=>$nomEvent,
                    'villeEvent'=>$villeEvent,
                    'typeEvent'=>$typeEvent,
                    'dateDebut'=>$dateDebut,
                    'tarif'=>$tarif,
                    'img'=>$img,
                    'idOrganisateur'=>$idOrganisateur,
                    'idEvent' => $idEvent
                );
                array_push($array['data'],$event);
            }
        echo json_encode($array);
        }else {
            echo json_encode(
                array('message'=>'no data event ...........')
            );
        }
    }

    public function singleEvent(){
        // $data = json_decode(file_get_contents('php://input'));
        $idEvent = $_GET['idEvent'];
        // $idEvent = $data->idEvent;
        $e = new Event();
        $res = $e->singleEvent($idEvent);
        if ($res) {
            $array = array();
            $array['data'] = array();

            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $event = array(
                    'nomEvent'=>$nomEvent,
                    'villeEvent'=>$villeEvent,
                    'typeEvent'=>$typeEvent,
                    'dateDebut'=>$dateDebut,
                    'tarif'=>$tarif,
                    'nbMax'=>$nbMax,
                    'img'=>$img,
                    'idOrganisateur'=>$idOrganisateur,
                    'idEvent' => $idEvent
                );
                array_push($array['data'],$event);
            }
        echo json_encode($array);
        }else {
            echo json_encode(
                array('message'=>'no data event ...........')
            );
        }
    }

    public function removeEvent() {
        $data = json_decode(file_get_contents('php://input'));
        $idEvent = $data->idEvent;

        $event = new Event();
        $row = $event->removeEvent($idEvent);

        if($row) {
            echo json_encode(array("msg"=>"l evenement est suprimé avec succès"));
        } else {
            echo json_encode(array('msg'=> 'evenement NON SUP pfffffff'));
        }
    }

    public function updateEvent() {
        $data = json_decode(file_get_contents('php://input'));
        if (!empty($data->nomEvent)  && !empty($data->villeEvent) ) {

            $idEvent = $data->idEvent;
            $nomEvent = $data->nomEvent;
            $typeEvent = $data->typeEvent;
            $villeEvent = $data->villeEvent;
            $dateDebut = $data->dateDebut;
            $nbMax = $data->nbMax;
            $tarif = $data->tarif;
            // $img =$data->img;
        }
        $event = new Event();
        $row = $event->updateEvent($idEvent, $nomEvent, $typeEvent, $villeEvent,$dateDebut, $nbMax,$tarif);
        if($row) {
            echo json_encode(array('msg'=>'the event is updated now'));
        } else {
            echo json_encode(array('msg'=> 'the event is NOT updated'));
        }
    }





    
//     public function search () {
//         $data = json_decode(file_get_contents('php://input'));
//         if (!empty($data->key) ) {
//             $key = $data->key;
//     }
//     $events = new Event();
//     $row = $events->search($key);
//             $searched = array();
//             $searched['data'] = array();
//     if($row) {
//         while($result = $row->fetch(PDO::FETCH_ASSOC)){
//             extract($result);
//             $event = array(
//                 'nomEvent'=>$key,
//                 'villeEvent'=>$villeEvent,
//                 'typeEvent'=>$typeEvent,
//                 'dateDebut'=>$dateDebut,
//                 'tarif'=>$tarif,
//                 'img'=>$img,
//                 'idOrganisateur'=>$idOrganisateur,
//                 'idEvent' => $idEvent
//             );
//             array_push($searched['data'],$event);
//         }
//         echo json_encode(array('msg'=>$searched));
//     }else {
//         echo json_encode(array('msg'=>$row));
//     }
//  }
}