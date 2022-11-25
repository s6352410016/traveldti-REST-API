<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');

    require_once('dti_connect_db.php');
    require_once('travel.php');

    $databaseOBJ = new Database();
    $connDB = $databaseOBJ->getConnection();

    $travelOBJ = new Travel($connDB);
    $stmt = $travelOBJ->getAllTravel();

    $arr_data = array();
    while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($rows);
        $arr_travel = array(
            'travelId' => $travelId,
            'travelGoDetail' => $travelGoDetail,
            'travelWho' => $travelWho,
            'travelStartDate' => $travelStartDate,
            'travelEndDate' => $travelEndDate,
            'travelPay' => $travelPay,
            'travelImg1' => $travelImg1,
            'travelImg2' => $travelImg2 
        );
        array_push($arr_data , $arr_travel);
    }

    http_response_code(200);
    echo json_encode($arr_data);
?>    