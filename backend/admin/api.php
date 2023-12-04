<?php
    include('../db_conn.php');

    // Set CORS headers
    header("Access-Control-Allow-Origin: http://localhost:3000"); // Replace with your React app's URL
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, Content-Type, Accept");

    $sql ="SELECT * FROM patient";
    $res = mysqli_query($conn, $sql);
    $data = [];

    if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            $data[] = $row;
        }
        echo json_encode(['status'=>true, 'data'=>$data, 'result'=> 'Found']);
    } else {
        echo json_encode(['status'=>true, 'msg'=>'No Data Found', 'result' => 'Not Found']);
    }


?>
