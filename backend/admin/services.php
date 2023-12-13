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
        $sql2 = "UPDATE `services` set status = '$status' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql2);
        if ($result) {
            echo "<script>
                    window.location.href =  'services';
                </script>";
        }
    }
}

if (isset($_GET['type']) && $_GET['type'] === 'delete' && isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $sql2 = "DELETE FROM `services` WHERE id = ?";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>
                swal('Success!', '', 'success');
                setTimeout(function(){
                    window.location.href = 'services';
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
            <h2>Add Services</h2>
            <small class="text-muted">Welcome to Dr. Aakash Deep's clinic </small>
            <div align="right" style="margin-top: -3rem;">
                <a href="add-services" class="btn btn-default waves-effect m-r-20"><i class="material-icons">add_box</i> Add
                    New Services</a>
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
                                    $sql = "SELECT * FROM services";
                                    $res = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        $desc = substr($row['description'], 0, 80) . (strlen($row['description']) > 80 ? '...' : '');
                                        $arc_images = $row['arc_images'];
                                        $images = $row['images'];
                                        $status = $row['status'];
                                        $date = date('d-M-Y', strtotime($row['date']));

                                        echo '  
                                        <tr>
                                        <td>' . $id . '</td>
                                        <td>' . $title . ' </td>
                                        <td>' . $desc . '</td>
                                        <td><img src="' . $arc_images . '" height="50px"></td>
                                        <td><img src="' . $images . '" height="50px"></td>'; ?>
                                        <td><?php
                                            if($status == '1'){
                                                echo '<a href="?id=' . $id . '&type=deactive" class="btn btn-sm btn-raised bg-cyan waves-effect">Active</a>';
                                            }else{
                                                echo '<a href="?id=' . $id . '&type=active" class="btn btn-sm btn-raised bg-red waves-effect">Deactive</a>';
                                            }
                                        ?></td>
                                    <?php echo
                                        '<td>' . $date . '</td>
                                        <td><a href="edit_services?id=' . $id . '&title=' . $title . '" class="btn btn-info waves-effect m-r-20"><i class="fa-solid fa-pen-to-square"></i></a>
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