<?php
session_start();

$error = "";
if (isset($_POST['login'])) {
    // Include the database connection file
    include "db_conn.php";

    // Sanitize and retrieve form inputs
    $emailOrMobile = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM user WHERE (email = '$emailOrMobile' OR mobile = '$emailOrMobile') AND status = '1'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables and redirect
            $_SESSION['login'] = true;
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_type'] = $user['user_type'];

            // Redirect based on user type
            if ($user['user_type'] === 'admin') {
                header("Location: admin/index");
                exit();
            } elseif ($user['user_type'] === 'user') {
                header("Location: user/index");
                exit();
            } elseif ($user['user_type'] === 'doctor') {
                header("Location: doctor/index");
                exit();
            }
        } else {
            // Incorrect password
            $error = "Invalid credentials. Please try again.";
        }
    } else {
        // User not found
        $error = "User not found. Please try again.";
    }

    mysqli_close($conn);
}
?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Dr Aakash Deep &#8211; Best Retina Surgeon in Siliguri</title>
    
    <link href="https://draakashdeep.com/assets/img/logo.png" rel="shortcut icon" type="image/x-icon" />
    <link href="https://draakashdeep.com/assets/img/logo.png" rel="apple-touch-icon" />
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css"> -->

    <!-- Custom Css -->
    <link rel="stylesheet" href="admin/assets/css/main.css" />

</head>

<body class="theme-cyan authentication">
    <div class="container">
        <div class="card-top"></div>
        <div class="card">
            <h1 class="title">
                <img src="https://draakashdeep.com/assets/img/logo.png" height="50px" alt="" srcset="">
                <span></span><br> Login <span class="msg">Log in to start your session</span>
            </h1>
            <div class="body">
                <form method="POST">
                    <div class="input-group icon before_span">
                        <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group icon before_span">
                        <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            <i id="toggleIcon" class="fas fa-eye" style="position: absolute;right: 10px;top: 12px;cursor: pointer;" onclick="togglePasswordVisibility()"></i>
                        </div>
                    </div>
                    <div class="input-group icon before_span">
                        <?php
                        echo $error;
                        ?>
                    </div>

                    <div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-raised waves-effect g-bg-cyan" name="login"
                                value="LOG IN">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="theme-bg"></div>


    <script>
      function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var toggleIcon = document.getElementById("toggleIcon");
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          toggleIcon.className = "fas fa-eye-slash";
        } else {
          passwordInput.type = "password";
          toggleIcon.className = "fas fa-eye";
        }
      }

 
    </script>


    <!-- Jquery Core Js -->
    <script src="admin/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="admin/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="admin/assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <!-- fontawsome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>