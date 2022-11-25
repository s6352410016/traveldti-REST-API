<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');

    require_once('dti_connect_db.php');
    require_once('travel.php');

    $data = json_decode(file_get_contents('php://input'));

    $databaseOBJ = new Database();
    $connDB = $databaseOBJ->getConnection();

    $travelOBJ = new Travel($connDB);
    $travelOBJ->travelId = $data->travelId;

    if($travelOBJ->deleteTravel()){
        $array_msg = array(
            'message' => 'successfully to delete.'
        );
        http_response_code(200);
        echo json_encode($array_msg);
    }else{
        $array_msg = array(
            'message' => 'error.'
        );
        http_response_code(500);
        echo json_encode($array_msg);
    }
?>    