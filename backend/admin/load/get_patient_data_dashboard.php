<?php
// fetch_data.php

include('../../db_conn.php');

$sql = "SELECT user.name AS dr_name, patient.id AS id, patient.name AS name, patient.email AS email, patient.mobile AS mobile, patient.gender AS gender, patient.address AS address,patient.appt_date AS appt_date, patient.appt_time AS appt_time, patient.status AS status, dept.name AS dept_name FROM patient 
         LEFT JOIN user ON patient.user_id = user.id
         LEFT JOIN dept ON patient.dept_id = dept.id
         ORDER BY patient.id DESC LIMIT 10;";

$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
