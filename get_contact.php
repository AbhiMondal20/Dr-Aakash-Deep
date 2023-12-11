<?php

include('backend/db_conn.php');

if (isset($_GET['name']) && isset($_GET['phone']) && isset($_GET['appt_date']) && isset($_GET['address'])) {
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $address = $_GET['address'];
    $appt_date = $_GET['appt_date'];
  
    $sql = "INSERT INTO `appt`(`name`, `phone`, `appt_date`, `address`) VALUES ('$name','$phone','$appt_date','$address')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
      echo '
      <script>
          alert("Thank you! Your Appointment has been received!");
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