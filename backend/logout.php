<?php  
include "db_conn.php";
$_SESSION["email"]="";

session_start();

// session_unset();
// session_destroy();

// header("Location: ../backend/index");

// if (isset($_GET['logout'])) {
    // Update the doctor's status to offline
    // $email = $_SESSION['email'];
    // mysqli_query($conn, "UPDATE user SET on_off_status = '0' WHERE email = '$email'");
    // Destroy the session
    session_unset();

    session_destroy();
    // Redirect to the login page
    header('Location: index');
    exit();
//   }

?>
