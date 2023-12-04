<?php
// fetch_data.php

include('../../db_conn.php');
$fromDate = $_GET['from'];
$toDate = $_GET['to'];

$sql = "SELECT user.name AS dr_name, patient.id AS id, patient.name AS name, patient.email AS email, patient.mobile AS mobile, patient.gender AS gender, patient.address AS address, patient.appt_time AS appt_time, patient.status AS status, dept.name AS dept_name, schedule.start AS appt_date FROM patient 
         LEFT JOIN user ON patient.user_id = user.id
         LEFT JOIN dept ON patient.dept_id = dept.id
         LEFT JOIN schedule ON patient.appt_date = schedule.id WHERE schedule.start BETWEEN '$fromDate' AND '$toDate'
         ORDER BY patient.id DESC";

$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
