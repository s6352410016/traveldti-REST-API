<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');

    require_once('dti_connect_db.php');
    require_once('travel.php');

    $data = json_decode(file_get_contents('php://input'));

    $databaseOBJ = new Database();
    $connDB = $databaseOBJ->getConnection();

    $travelOBJ = new Travel($connDB);
    $travelOBJ->travelGoDetail = $data->travelGoDetail;
    $travelOBJ->travelWho = $data->travelWho;
    $travelOBJ->travelStartDate = $data->travelStartDate;
    $travelOBJ->travelEndDate = $data->travelEndDate;
    $travelOBJ->travelPay = $data->travelPay;

    $travelOBJ->travelImg1 = 'Travel_img1_' . uniqid() . '.jpg';
    $realFile = file_put_contents('./img/' . $travelOBJ->travelImg1 , base64_decode($data->travelImg1));

    $travelOBJ->travelImg2 = 'Travel_img2_' . uniqid() . '.jpg';
    $realFile = file_put_contents('./img/' . $travelOBJ->travelImg2 , base64_decode($data->travelImg2));
    
    if($travelOBJ->insertTravel()){
        $array_msg = array(
            'message' => 'successfully to add.'
        );
        http_response_code(201);
        echo json_encode($array_msg);
    }else{
        $array_msg = array(
            'message' => 'error.'
        );
        http_response_code(400);
        echo json_encode($array_msg);
    }

?>