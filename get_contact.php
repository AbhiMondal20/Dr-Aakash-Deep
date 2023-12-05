<?php

include('backend/db_conn.php');

if (isset($_GET['name']) && isset($_GET['phone']) && isset($_GET['email']) && isset($_GET['services']) && isset($_GET['message'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $message = $_GET['message'];
    $services = $_GET['services'];
  $sql = "INSERT INTO `appt`(`name`, `phone`, `email`, `services`, `message`) VALUES ('$name','$phone','$email','$services','$message')";
    $res = mysqli_query($conn, $sql);
  
    if ($res) {
      echo '
      <script>
          alert("Thank you! Your submission has been received!");
          window.location.href= "/";
          </script>';
  
        // <script>
        //     swal({
        //         title: "Thank you for reaching out!",
        //         text: "We will accept your enquiry and call you back soon.",
        //         icon: "success",
        //     }).then(function() {
        //         window.location.href = "index";
        //     });
        // </script>'
    } else {
        echo '
        <script>
            swal({
                title: "Error",
                text: "Oops! Something went wrong while submitting the form.",
                icon: "error",
            });
        </script>';
    }
  }
?>