<?php
require('../fpdf/fpdf.php'); // Include the fpdf library

include('../../db_conn.php');

// Fetch data from the database
$sql = "SELECT user.name AS dr_name, patient.id AS id, patient.name AS name, patient.email AS email, patient.mobile AS mobile, patient.gender AS gender, patient.address AS address, patient.appt_time AS appt_time, patient.status AS status, dept.name AS dept_name, schedule.start AS appt_date FROM patient 
         LEFT JOIN user ON patient.user_id = user.id
         LEFT JOIN dept ON patient.dept_id = dept.id
         LEFT JOIN schedule ON patient.appt_date = schedule.id";

$res = mysqli_query($conn, $sql);

class PDF extends FPDF
{
    function Header()
    {
        // Header content
    }

    function Footer()
    {
        // Footer content
    }
}

$pdf = new PDF();
$pdf->AddPage('A4');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Patient Appointment Report', 0, 1, 'C');

// Table header
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(5, 15, '#', 1);
$pdf->Cell(30, 15, 'Name', 1);
$pdf->Cell(50, 15, 'Email', 1);
$pdf->Cell(20, 15, 'Mobile', 1);
$pdf->Cell(15, 15, 'Gender', 1);
$pdf->Cell(20, 15, 'Appt. Date', 1);
$pdf->Cell(25, 15, 'Appt. Time', 1);
$pdf->Cell(45, 15, 'Address', 1);
$pdf->Cell(40, 15, 'Department', 1);
$pdf->Cell(30, 15, 'Doctor', 1);
$pdf->Ln();

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

    // Table data
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(5, 15, $sno, 1);
    $pdf->Cell(30, 15, $name, 1);
    $pdf->Cell(50, 15, $email, 1);
    $pdf->Cell(20, 15, $mobile, 1);
    $pdf->Cell(15, 15, $gender, 1);
    $pdf->Cell(20, 15, $appt_date, 1);
    $pdf->Cell(25, 15, $appt_time, 1);
    $pdf->Cell(45, 15, $address, 1);
    // $pdf->MultiCell(40, 15, $address, 1);

    $pdf->Cell(40, 15, $dept_name, 1);
    $pdf->Cell(30, 15, $dr_name, 1);
    $pdf->Ln();
}

$pdf->Output('D', 'export.pdf'); // Output the PDF as download
?>
