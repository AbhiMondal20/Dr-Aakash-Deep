<?php 

session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) { 
    $email = $_SESSION['email'];
  
}else{
    echo "<script>location.href='../index';</script>";
}

include('header.php');



// update code 
$gallery_id = $_GET['id'];
$tittle = $_GET['tittle'];
?>

<!-- User List -->
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
        <a  href="javascript:void(0)" onclick="goBack()"> <i class="material-icons">chevron_left</i> </a>
            <h2>Update Gallery</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
        </div>

        <div class="row clearfix"> 
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-16 col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required placeholder="Tittle" name="tittle" value="<?php echo $tittle ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" required placeholder="Images" name="file" accept=".webp .png" id="fileToUpload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" style="display:none">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" name="modified_by">
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
</section>



                                
                           

<!-- PHP code -->
<?php
    if(isset($_POST['save'])){
        $tittle = $_POST['tittle'];
        $modified_by = $_POST['modified_by'];
        $modified_date = date("Y-m-d H:i:s");
        

        $tmp_dir = './upload/';
        $img_loc = $_FILES['file']['tmp_name'];
        $img_name = $_FILES['file']['name'];
    
        $thambname = uniqid();
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
    
        $img_size = $_FILES['file']['size'] / (1024 * 1024);
        $img_dir = $tmp_dir . $thambname . "." . $img_ext;
        move_uploaded_file($img_loc, $img_dir);
    
        $img_upload = 'upload/' . $thambname . "." . $img_ext;
        if ($img_size > 5) {
            echo "<script>alert('image size is greater than 5 MB')</script>";
            exit();
        }
       

            $sql = "UPDATE `gallery` SET `tittle`='$tittle',`images`='$img_upload',`modified_date`='$modified_date',`modified_by`='$modified_by' WHERE id = '$gallery_id'";
            $res = mysqli_query($conn, $sql);
            if($res){
                echo '<script>swal("Successfull", "Update Successfull", "success")

                setTimeout(function(){
                    window.location.href = "gallery";
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