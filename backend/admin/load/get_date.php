<?php
include('../../db_conn.php');

// Fetch appt_date data based on the selected department
if (isset($_POST['appt_date'])) { 
    
    // Changed 'appt_date' to 'doctor'
  $appt_date = mysqli_real_escape_string($conn, $_POST['appt_date']); 
  // Changed 'appt_date' to 'doctor'
  $current_date = date('Y-m-d');
  $sql = "SELECT * FROM schedule WHERE user_id = '$appt_date' AND start >= '$current_date'";
  $res = mysqli_query($conn, $sql);

  // Prepare the appt_date data as JSON for AJAX
  $appt_date = array();
  while ($row = mysqli_fetch_assoc($res)) {
            $user_id = $row['id'];        
            $start = $row['start'];
            $startdate = new DateTime($start);
            $startdate1 = $startdate->format('d-m-Y');

    $appt_date[] = array('id' => $user_id, 'start' => $startdate1);
  }
  echo json_encode($appt_date);
  exit;
}
?>
