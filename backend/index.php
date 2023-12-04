<!-- Login Code  -->
<?php
    session_start();

    include "db_conn.php";
    $error = "";
    $_SESSION["email"] = "";
    $_SESSION["user_type"] = "";
    if (!isset($_SESSION['login'])) {
        if (isset($_REQUEST['email'])) {
            if (isset($_POST['login'])) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
    
                $sql = "SELECT * FROM user WHERE email = '$email' AND status='1'";
                $rs = mysqli_query($conn, $sql);
                $numRows = mysqli_num_rows($rs);
    
                if ($numRows == 1) {
                    $row = mysqli_fetch_assoc($rs);
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['login'] = true;
                        $user_type = $row['user_type'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        if ($user_type == 'admin') {
                            $_SESSION['email'] = $email;
                            $_SESSION['user_type'] = 'admin';
                            echo "<script>location.href='admin/index';</script>";
                            exit;
                        } elseif ($user_type == 'user') {
                            $_SESSION['email'] = $email;
                            $_SESSION['user_type'] = 'user';
                            echo "<script>location.href='centre/index';</script>";
                            exit;
                        } elseif ($user_type == 'doctor') {
                            $_SESSION['email'] = $email;
                            $_SESSION['user_type'] = 'doctor';
                            echo "<script>location.href='doctor/index';</script>";
                            exit;
                        }
                     elseif ($user_type == 'sa') {
                            $_SESSION['email'] = $email;
                            $_SESSION['user_type'] = 'sa';
                            echo "<script>location.href='sa/index';</script>";
                            exit;
                        }
    
                    } else {
                        

                        $error = '<div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Please Enter Correct Password.
                    </div>';
                    }
                } else {
                    $error = '<div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>' . $email . '</strong> is Not Found.
                            </div>';
                    }
            }
    
        } else {
            // header("Location: doctor/index");
    
        }
    } else {
        // echo "<script>location.href='admin/index';</script>";
    
    }



$sql = "SELECT * FROM info";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $title = $row['title'];
    $fav_icon = $row['fav_icon'];
    $logo = $row['logo'];
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?php echo $title; ?></title>
<link rel="shortcut icon" href="admin/<?php echo $fav_icon; ?>" type="image/x-icon">
<link rel="stylesheet" href="admin/assets/plugins/bootstrap/css/bootstrap.min.css"/>

<!-- Custom Css -->
<link rel="stylesheet" href="admin/assets/css/main.css"/>

</head>

<body class="theme-cyan authentication">
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title">
                <img src="admin/<?php echo $logo; ?>" height="50px" alt="" srcset="">
        <span></span><br>Login <span class="msg">Log in to start your session</span></h1>
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
                        <input type="submit" class="btn btn-raised waves-effect g-bg-cyan" name="login" value="LOG IN">
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
<div class="theme-bg"></div>



<script>
       //   Password View toggle
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>