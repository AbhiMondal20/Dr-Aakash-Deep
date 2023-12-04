<?php
include "../db_conn.php";
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $email = $_SESSION['email'];
} else {
    echo "<script>location.href='../index';</script>";
}

$patient_id = $_GET['id'];
$patient_id = urldecode($patient_id);
$patient_id = str_replace("'", "", $patient_id);
$regId = $_GET['reg_id'];
$sql = "SELECT prescription.id AS id, prescription.problems AS problems, prescription.observation AS observation, prescription.test AS test, prescription.prescription AS prescription, prescription.add_notes AS add_notes, prescription.nxt_appt_date AS nxt_appt_date, patient.name AS name, patient.email AS email, patient.mobile AS mobile, patient.age AS age, patient.gender AS gender, patient.bp AS bp, patient.weight AS weight, patient.dept AS dept, patient.address AS address, patient.reg_id AS reg_id, patient.reg_date AS reg_date, patient.date AS date FROM prescription
   INNER JOIN patient ON prescription.patient_id = patient.id
   WHERE prescription.patient_id = '$patient_id' AND patient.reg_id = '$regId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//  Patient Table   
$reg_id = $row['reg_id'];
$olD_reg_date = $row['reg_date'];
$middle = strtotime($olD_reg_date);
$reg_date = date('F j, Y', $middle);
$name = $row['name'];
$email = $row['email'];
$gender = $row['gender'];
$age = $row['age'];
$gender = $row['gender'];
$mobile = $row['mobile'];
$bp = $row['bp'];
$weight = $row['weight'];
$dept = $row['dept'];
$address = $row['address'];
$dept = $row['dept'];
//    prescription table
$prescription_id = $row['id']; //prescription id
$test = $row['test'];
$problems = $row['problems'];
$observation = $row['observation'];
$test = $row['test'];
$add_notes = $row['add_notes'];
$nxt_appt_date = $row['nxt_appt_date'];
$prescription = $row['prescription'];
$prescription = htmlspecialchars_decode($prescription);
$old_date = $row['date'];
$middle = strtotime($old_date);
$new_date = date('F j, Y', $middle);

// $sig = "../admin/".$signature;
// $sql2 = "SELECT users.signature AS signa FROM users WHERE doc_id = '$doc_id'";
// $res2 = mysqli_query($conn, $sql2);
// $rows = mysqli_fetch_assoc($result);
// $signature = $rows['signa'];

$html = '<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <style>
        @page {
            margin-top: 100px; /* Adjust the margin-top value as needed */
            margin-bottom: 120px; /* Adjust the margin-bottom value as needed */
            padding-top: 0px; /* Adjust the padding-top value as needed */
            
        }
        /* Apply margin-bottom to all pages */
        body {
            margin-top: 100px; /* Adjust the margin-top value as needed */
            margin-bottom: 120px;
        }
        /* Define the styles for the footer */
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: right;
            font-size: 10px;
            bottom: -40px; /* Adjust the value as needed to position the footer correctly */
        }

        
          .container {
              border: 2px solid #000000;
              padding-right: 15px;
              padding-left: 15px;
              margin-right: auto;
              margin-left: auto;
              text-align: justify;
            position: relative;

  
          }
          .container-fluid {
            padding: 5px;
            margin: 5px;
            text-align: justify;

        }
          #age{
              padding-left: 300px;
              padding-top: -30px;
          }
          #reg_date{
              padding-left: 300px;
              padding-top: -30px;
          }
          .wrapper {
          
              display: grid;
              grid-gap: 10px;
              grid-template-columns: repeat(4, [col] 100px);
              grid-template-rows: repeat(3, [row] auto);
              background-color: #fff;
              color: #000;
          }
  
          .box {
              color: #000;
              border-radius: 5px;
              padding: 5px;
              
          }
          .txt{
              
              text-transform: uppercase;
          }
  
          .a {
              grid-column: col / span 2;
              grid-row: row;
          }
  
          .b {
              grid-column: col 3 / span 2;
              grid-row: row;
          }
  
          .c {
              grid-column: col;
              grid-row: row 2;
          }
  
          .d {
              grid-column: col 2 / span 3;
              grid-row: row 2;
          }
  
          .e {
              grid-column: col / span 4;
              grid-row: row 3;
          }
    
      .custom-col {
        position: absolute;
        top: 40px; 
        left: 40px;
      }      
            
      </style>
  </head>
  <body>
  <br><br>
      <div class="container">
          <div class="wrapper">
              <div class="box a" ><strong>Name:</strong> &nbsp;&nbsp;<span class="txt">' . $name . '</span></div>
              <div class="box b" id="age"><strong>Reg Id:</strong> &nbsp;&nbsp;&nbsp;<span class="txt">' . $reg_id . '</span></div>
          </div>
          <div class="wrapper">
              <div class="box a"><strong>Age & Gender:</strong>&nbsp;<span class="txt"> ' . $age . ' / ' . $gender . '</span></div>
              <div class="box b" id="reg_date"><strong>Reg Date: </strong> &nbsp;' . $reg_date . '</div>
          </div>
          <div class="wrapper">
              <div class="box a"><strong>Address :</strong> &nbsp;' . $address . '</div>
          </div>
      </div>
      <div class="container-fluid" style="margin-top:20px;">

        <div style="width: 45%;">
            <strong style="padding-left: 20px; text-align: center;">Complains</strong>
            <div class="bigsection">' . $problems . '</div>
        </div>
    
        <div class="custom-col" style="width: 45%;">
            <strong style="padding-left: 20px; text-align: center;">Observation</strong>
            <div class="bigsection">' . $observation . '</div>
        </div>

      </div>

      <div class="container-fluid2" style="position: absolute; ">

        <div style="width: 45%;">
            <strong style="">Complains</strong>
            <div class="bigsection">' . $problems . '</div>
        </div>
    
        <div class="custom-col" >
            <strong style="padding-left: 20px; text-align: center;">Observation</strong>
            <div class="bigsection">' . $observation . '</div>
        </div>

      </div>
      
  </body>
  </html>';
require('vendor/autoload.php');
// $mpdf=new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'allow_remote_images' => true, 'debug' => false, 'autoScriptToLang' => false]);

$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$footer = '<p class="footer">
             <img src="../admin/' . $sig . '" alt="logo" style="padding-right: -50px;">
           </p> Page {PAGENO} of {nb}';

$mpdf->SetFooter($footer, 'O', true);
$file = 'Report/' . $p_name . '.pdf';
$mpdf->output($file, 'I');

?>