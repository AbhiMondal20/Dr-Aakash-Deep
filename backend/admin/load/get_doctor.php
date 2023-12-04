<?php
include('../../db_conn.php');

// Fetch doctors data based on the selected department
if (isset($_POST['dept'])) {
  $dept = mysqli_real_escape_string($conn, $_POST['dept']);
  $sql = "SELECT doctor.user_id AS id, user.name AS name FROM doctor
    INNER JOIN user ON doctor.user_id = user.id
   WHERE doctor.dept = '$dept'";
  $res = mysqli_query($conn, $sql);

  // Prepare the doctors data as JSON for AJAX
  $doctors = array();
  while ($row_doctors = mysqli_fetch_assoc($res)) {
    $doctors[] = array('id' => $row_doctors['id'], 'name' => $row_doctors['name']);
  }
  echo json_encode($doctors);
  exit;
}

?>
