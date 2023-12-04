<?php
include('../../db_conn.php');

if (isset($_POST['appt_time'])) { 
    $appt_time = mysqli_real_escape_string($conn, $_POST['appt_time']); 
    $sql = "SELECT * FROM schedule WHERE id = '$appt_time'";
    $res = mysqli_query($conn, $sql);

    $appointments = array();

    while ($row = mysqli_fetch_assoc($res)) {
        $user_id = $row['user_id'];
        $startDateTime = new DateTime($row['start']);
        $endDateTime = new DateTime($row['end']);

        $interval = new DateInterval('PT30M');
        $timeSlots = array();

        while ($startDateTime < $endDateTime) {
            $timeSlots[] = $startDateTime->format('h:i A');
            $startDateTime->add($interval);
        }

        $appointments[] = array('id' => $user_id, 'start_time' => $timeSlots);
    }

    echo json_encode($appointments);

    // exit;
}
?>
