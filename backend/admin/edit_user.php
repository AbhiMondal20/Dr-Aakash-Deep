<?php 
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) { 
    $email = $_SESSION['email'];
  
}else{
    echo "<script>location.href='../index';</script>";
}

include('header.php') 


?>
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
            <a  href="javascript:void(0)" onclick="goBack()"> <i class="material-icons">chevron_left</i> </a>
            <h2>Edit User</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
            
        </div>
<!-- Edit user -->
<?php
    $id = $_GET['id'];
    $name = $_GET['name'];
    // $type = $_GET['update'];
    $sql = "SELECT * FROM user WHERE id = '$id' AND name = '$name'";
    $res = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($res)) {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $user_type = $row['user_type'];
    }

?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required placeholder="Name" name="name" value="<?php echo $name ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" class="form-control" required placeholder="Email" name="email" value="<?php echo $email ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" class="form-control"  placeholder="Password" name="password" required pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;">
                                        </div>
                                        <label for="inputPassword5" class="form-label">Password should be at least 6 characters</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="tel" class="form-control" maxlength="10"  required placeholder="Mobile" name="mobile" value="<?php echo $mobile ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" required name="user_type">
                                            <option value="">-- User Type --</option>
                                            <option value="admin" <?php echo ($user_type == "admin") ? 'selected' : '' ?>>Admin</option>
                                            <option value="user" <?php echo ($user_type == "user") ? 'selected' : '' ?>>User</option>
                                            <option value="doctor" <?php echo ($user_type == "doctor") ? 'selected' : '' ?>>Doctor</option>
                                        </select>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <center>
                                        <input type="submit" class="btn btn-raised g-bg-cyan" name="save" value="SAVE">
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PHP code -->
<?php
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass = password_hash($password,PASSWORD_BCRYPT);
        $mobile = $_POST['mobile'];
        $user_type = $_POST['user_type'];
        $modified_date = date('Y-m-d');

        $sql = "UPDATE `user` SET `name`='$name',`email`='$email',`password`='$pass',`mobile`='$mobile',`user_type`='$user_type',`modified_by`='amdin',`modified_date`='$modified_date' WHERE id = '$id'";
        $res = mysqli_query($conn, $sql);
        if($res){
            echo '<script>swal("Successfull", "Update Successfull", "success")

            setTimeout(function(){
                window.location.href = "user";
            },1000
            );
                </script>';
                
        }else{
            echo '<script>swal("Error", "There appears some error", "error")
            </script>';
        
        }
    }


?>
<?php include('footer.php') ?>