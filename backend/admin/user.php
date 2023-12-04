<?php 

session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) { 
    $email = $_SESSION['email'];
  
}else{
    echo "<script>location.href='../index';</script>";
}

include('header.php') 

?>

<!-- Active  Deactive Code-->
<?php
// <!-- Same Page Delete Code -->
    if (isset($_GET['type']) && $_GET['type'] !== '' && isset($_GET['id']) && $_GET['id'] > 0) {
        $type = $_GET['type'];
        $id = $_GET['id'];
        if ($type == 'active' || $type == 'deactive') {
            $status = 1;
            if ($type == 'deactive') {
                $status = 0;
            }
            $sql2 = "UPDATE `user` set status = '$status' WHERE id = '$id'";
            $result = mysqli_query($conn, $sql2);
            if ($result) {
                echo "<script>
                        window.location.href =  'user';
                    </script>";
            }
        }
    }
?>

<!-- User List -->
<section class="content patients">
    <div class="container-fluid">
    <div class="block-header">
            <h2>Add User</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
            <div align="right" style="margin-top: -3rem;">
                <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#add_new_user"> <i class="material-icons">add_box</i> Add New User</button>
            </div>
        </div>
        <div class="row clearfix"> 
            <?php
            $sql = "SELECT * FROM user";
            $res = mysqli_query($conn, $sql);
            
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $mobile = $row['mobile'];
                    $user_type = $row['user_type'];
                    $status = $row['status'];
                
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card all-patients">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center m-b-0">
                                    <a href="javascript:void(0);" class="p-profile-pix"><img src="assets/images/130x130.png" alt="user" class="img-thumbnail img-fluid"></a>
                                </div>
                                <div class="col-md-8 col-sm-8 m-b-0">
                                    <h5 class="m-b-0">Name: <?php echo $name; ?><a href="edit_user?id=<?php echo $id; ?>&name=<?php echo $name;?>&type=update" class="edit"><i class="zmdi zmdi-edit"></i></a></h5> <small>Role: <?php echo $user_type; ?></small>
                                    <address class="m-b-0">Email:
                                    <?php echo $email?><br>
                                        <abbr title="Phone">Phone:</abbr> <?php echo $mobile; ?>
                                    </address>
                                    <h5 class="m-b-0">
                                        <?php
                                            if($status == 1){
                                                echo '<a  href="?id=' . $id . '&type=deactive" class="btn btn-sm btn-raised bg-cyan waves-effect">Active</a>';
                                            }else{
                                                echo '<a href="?id=' . $id . '&type=active" class="btn btn-sm btn-raised bg-red waves-effect">Deactive</a>';
                                            }
                                        ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>




<!-- add user Modal -->

<div class="modal fade" id="add_new_user" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_new_userLabel">Add New User</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="card">
                            <div class="body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row clearfix">
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" required placeholder="Name" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" required placeholder="Email" name="email">
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
                                                    <input type="tel" class="form-control" maxlength="10"  required placeholder="Mobile" name="mobile">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group drop-custum">
                                                <select class="form-control show-tick" required name="user_type">
                                                    <option value="admin">Admin</option>
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
        </div>
    </div>
</div>

<!-- PHP code -->
<?php
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass = password_hash($password,PASSWORD_BCRYPT);
        $mobile = $_POST['mobile'];
        $user_type = $_POST['user_type'];

        $sql = "SELECT * FROM user WHERE email = '$email' OR mobile = '$mobile' AND user_type = '$user_type'";
        $res = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($email == $row['email']) {
                echo '<script>swal("Error", "' . $email . ' Already Registered", "error")</script>';
            } elseif ($mobile == $row['mobile']) {
                echo '<script>swal("Error", "' . $mobile . ' Already Registered", "error")</script>';
            }         
        }else{
            $sql = "INSERT INTO `user`(`name`, `email`, `password`, `mobile`, `user_type`,`status`) VALUES ('$name','$email','$pass','$mobile','$user_type','1')";
            $res = mysqli_query($conn, $sql);
            if($res){
                echo '<script>swal("Successfull", "User Added Successfull", "success")

                setTimeout(function(){
                    window.location.href =  window.location.href;
                },1000
                );
                    </script>';
                    
            }else{
                echo '<script>swal("Error", "There appears some error", "error")
                </script>';
            
            }
        }

    }

?>
<?php include('footer.php') ?>