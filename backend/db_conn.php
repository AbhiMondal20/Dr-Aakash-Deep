<?php
    $db_name = "draakashdeep";
    $user = "root";
    $pass = "";
    $db_host = "localhost";

    $conn = mysqli_connect($db_host, $user, $pass,$db_name);
    if($conn){
        // echo "Conected";
    }else{
        echo "Falied";
    }
?>