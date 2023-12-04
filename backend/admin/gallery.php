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
            $sql2 = "UPDATE `gallery` set status = '$status' WHERE id = '$id'";
            $result = mysqli_query($conn, $sql2);
            if ($result) {
                echo "<script>
                        window.location.href =  'gallery';
                    </script>";
            }
        }
    }
?>

<!-- User List -->
<section class="content patients">
    <div class="container-fluid">
    <div class="block-header">
            <h2>Add Gallery Images</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
            <div align="right" style="margin-top: -3rem;">
                <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#add_new_images"> <i class="material-icons">add_box</i> Add New Image</button>
            </div>
        </div>
        <p class="font-12 col-pink">Image Size 384px X 384px</p>
        <div class="row clearfix"> 

            <?php
            $sql = "SELECT * FROM gallery";
            $res = mysqli_query($conn, $sql);
            
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $tittle = $row['tittle'];
                    $images = $row['images'];
                    $status = $row['status'];
                
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card all-patients">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center m-b-0">
                                    <a href="javascript:void(0);" class="p-profile-pix"><img src="<?php echo $images; ?>" alt="user" class="img-thumbnail img-fluid"></a>
                                </div>
                                <div class="col-md-8 col-sm-8 m-b-0">
                                    <h5 class="m-b-0">Tittle: <a href="edit_gallery?id=<?php echo $id; ?>&tittle=<?php echo $tittle;?>" class="edit"><i class="zmdi zmdi-edit"></i></a></h5>
                                    <p><?php echo $tittle; ?></p>
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
<div class="modal fade" id="add_new_images" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_new_imagesLabel">Upload Gallery Images</h4>
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
                                                    <input type="text" class="form-control" required placeholder="Tittle" name="tittle">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <div class="form-line">
                                                   <input type="file" class="form-control" required placeholder="Images" name="file" accept=".webp,.png" id="fileToUpload">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" style="display:none">
                                            <div class="form-group drop-custum">
                                                <select class="form-control show-tick" name="added_by">
                                                    <?php
                                                        $sql = "SELECT * FROM user where email = '$email'";
                                                        $res = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                            $id = $row['id'];
                                                            $name = $row['name'];
                                                            echo '<option value="'.$id.'">'.$name.'</option>';
                                                        }
                                                    ?>   
                                                </select>
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
// Check if the "save" button was clicked
if (isset($_POST['save'])) {
   
    $tittle = mysqli_real_escape_string($conn, $_POST['tittle']);
    $added_by = mysqli_real_escape_string($conn, $_POST['added_by']);

    $tmp_dir = 'upload/';
    $img_loc = $_FILES['file']['tmp_name'];
    $img_name = $_FILES['file']['name'];

    $thambname = uniqid();
    $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_size = $_FILES['file']['size'] / (1024 * 1024); 

    if ($img_size > 5) {
        echo "Image size is greater than 5 MB";
        exit();
    }

  
    $img_dir = $tmp_dir . $thambname . "." . $img_ext;
    move_uploaded_file($img_loc, $img_dir);

    $img_upload = 'upload/' . $thambname . "." . $img_ext;

    $insert_sql = "INSERT INTO `gallery`(`tittle`, `images`, `status`, `added_by`) VALUES (?, ?, 1, ?)";
    $stmt = mysqli_prepare($conn, $insert_sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $tittle, $img_upload, $added_by);

        if (mysqli_stmt_execute($stmt)) {
             echo '<script>swal("Successful", "", "success");
                setTimeout(function(){
                    window.location.href =  window.location.href;
                }, 1000);
                </script>';
        } else {
            
            echo '<script>swal("Error", "There appears to be some error", "error")</script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the statement: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Failed to upload the image";
}


include('footer.php')

?>