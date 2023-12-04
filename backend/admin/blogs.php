<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $email = $_SESSION['email'];

} else {
    echo "<script>location.href='../index';</script>";
}

include('header.php');
// Same Page Status Code 
if (isset($_GET['type']) && $_GET['type'] !== '' && isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    if ($type == 'active' || $type == 'deactive') {
        $status = 1;
        if ($type == 'deactive') {
            $status = 0;
        }
        $sql2 = "UPDATE `user` set status = '$status' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql2);
        if ($result) {
            echo "<script>
                    window.location.href =  'blogs';
                </script>";
        }
    }
}

if (isset($_GET['type']) && $_GET['type'] === 'delete' && isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $sql2 = "DELETE FROM `blogs` WHERE id = ?";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>
                swal('Success!', '', 'success');
                setTimeout(function(){
                    window.location.href = 'blogs';
                }, 2000);
        </script>";
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!-- Blog List -->
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Add Blog</h2>
            <small class="text-muted">Welcome to Dr. Aakash Deep clinik </small>
            <div align="right" style="margin-top: -3rem;">
                <a href="add-blog" class="btn btn-default waves-effect m-r-20"><i class="material-icons">add_box</i> Add
                    New Blog</a>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Desc</th>
                                        <th>Arc Image</th>
                                        <th>Images</th>
                                        <th>status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM blogs";
                                    $res = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        $upload_date = $row['upload_date'];
                                        $desc = substr($row['description'], 0, 80) . (strlen($row['description']) > 80 ? '...' : '');
                                        $arc_images = $row['arc_images'];
                                        $images = $row['images'];
                                        $status = $row['status'];
                                        $date = date('d-M-Y', strtotime($row['upload_date']));

                                        echo '  
                                        <tr>
                                        <td>' . $id . '</td>
                                        <td>' . $title . ' </td>
                                        <td>' . $desc . '</td>
                                        <td><img src="' . $arc_images . '" height="50px"></td>
                                        <td><img src="' . $images . '" height="50px"></td>'; ?>
                                        <td><?php
                                            if($status == 1){
                                                echo '<a  href="?id=' . $id . '&type=deactive" class="btn btn-sm btn-raised bg-cyan waves-effect">Active</a>';
                                            }else{
                                                echo '<a href="?id=' . $id . '&type=active" class="btn btn-sm btn-raised bg-red waves-effect">Deactive</a>';
                                            }
                                        ?></td>
                                    <?php echo
                                        '<td>' . $date . '</td>
                                        <td><a href="edit_blogs?id=' . $id . '&title=' . $title . '" class="btn btn-info waves-effect m-r-20"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="?id='.$id.'&type=delete" class="btn btn-warning waves-effect m-r-20"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                                                    <input type="text" class="form-control" required placeholder="Name"
                                                        name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" required
                                                        placeholder="Email" name="email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" placeholder="Password"
                                                        name="password" required pattern="^\S{6,}$"
                                                        onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;">
                                                </div>
                                                <label for="inputPassword5" class="form-label">Password should be at
                                                    least 6 characters</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="tel" class="form-control" maxlength="10" required
                                                        placeholder="Mobile" name="mobile">
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
                                                <input type="submit" class="btn btn-raised g-bg-cyan" name="save"
                                                    value="SAVE">
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
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass = password_hash($password, PASSWORD_BCRYPT);
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
    } else {
        $sql = "INSERT INTO `user`(`name`, `email`, `password`, `mobile`, `user_type`,`status`) VALUES ('$name','$email','$pass','$mobile','$user_type','1')";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo '<script>swal("Successfull", "User Added Successfull", "success")

                setTimeout(function(){
                    window.location.href =  window.location.href;
                },1000
                );
                    </script>';

        } else {
            echo '<script>swal("Error", "There appears some error", "error")
                </script>';

        }
    }

}

?>
<?php include('footer.php') ?>