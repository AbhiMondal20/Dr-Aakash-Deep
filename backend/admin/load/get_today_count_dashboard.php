<?php
include('../../db_conn.php');

// Fetch Total Patients
$sql = "SELECT COUNT(*) AS total_patients FROM appt";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_patients = $row['total_patients'];

// Fetch Today's Patients
$sql = "SELECT COUNT(*) AS today_total_patients FROM appt WHERE DATE(date) = CURDATE()";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$today_total_patients = $row['today_total_patients'];

// Fetch Today's Visits
$sql = "SELECT COUNT(*) AS visit_patients FROM appt WHERE DATE(date) = CURDATE() AND status = '1'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$visit_patients = $row['visit_patients'];

// Fetch Today's Pending
$sql = "SELECT COUNT(*) AS pending_patients FROM appt WHERE DATE(date) = CURDATE() AND status = '0'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$pending_patients = $row['pending_patients'];

mysqli_close($conn);

// Return the statistics as JSON
echo json_encode(array(
    'total_patients' => $total_patients,
    'today_total_patients' => $today_total_patients,
    'visit_patients' => $visit_patients,
    'pending_patients' => $pending_patients
));

?>