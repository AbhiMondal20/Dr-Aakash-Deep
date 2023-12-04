<?php
include('../../db_conn.php');

// Fetch data from the database
$sql = "SELECT user.name AS dr_name, patient.id AS id, patient.name AS name, patient.email AS email, patient.mobile AS mobile, patient.gender AS gender, patient.address AS address, patient.appt_time AS appt_time, patient.status AS status, dept.name AS dept_name, schedule.start AS appt_date FROM patient 
         LEFT JOIN user ON patient.user_id = user.id
         LEFT JOIN dept ON patient.dept_id = dept.id
         LEFT JOIN schedule ON patient.appt_date = schedule.id";

$res = mysqli_query($conn, $sql);

$data = "Patient Appointment Report\n";
$data .= "-------------------------------------------------------------\n";
$data .= sprintf("%-5s%-30s%-35s%-15s%-8s%-15s%-15s%-40s%-30s%-30s\n", '#', 'Name', 'Email', 'Mobile', 'Gender', 'Appt Date', 'Appt Time', 'Address', 'Department', 'Doctor');
$data .= "-------------------------------------------------------------\n";

$sno = 0;
while ($row = mysqli_fetch_assoc($res)) {
    $sno = $sno + 1;
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $gender = $row['gender'];
    $old_date = $row["appt_date"];
    $middle = strtotime($old_date);
    $appt_date = date("d-m-Y ", $middle);
    $appt_time = $row['appt_time'];
    $address = $row['address'];
    $dr_name = $row['dr_name'];
    $dept_name = $row['dept_name'];

    $data .= sprintf("%-5s%-30s%-35s%-15s%-8s%-15s%-15s%-40s%-30s%-30s\n", $sno, $name, $email, $mobile, $gender, $appt_date, $appt_time, $address, $dept_name, $dr_name);
}

header('Content-Type: text/plain; charset=utf-8');
header('Content-Disposition: attachment; filename="export.txt"');

echo $data;
?>
