<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) { 
    $email = $_SESSION['email'];
}else{
    echo "<script>location.href='../index';</script>";
}
include('header.php');
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
            $sql2 = "UPDATE `doctor` set status = '$status' WHERE id = '$id'";
            $result = mysqli_query($conn, $sql2);
            if ($result) {
                echo "<script>
                        window.location.href =  'doctors';
                    </script>";
            }
        }
    }
?>
<section class="content doctors">
    <div class="container-fluid">
        <div class="block-header">
            <h2>All Doctors</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
            <div align="right" style="margin-top: -3rem;">
                <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#add_new_patient"> <i class="material-icons">add_box</i> Doctor Details Entry</button>
            </div>
        </div>
        <div class="row clearfix">
            <?php
          $sql = "SELECT dr.id AS id,dr.fees AS fees, dr.status AS status,  dr.images AS images, dr.about AS about, dr.desn AS desn, dr.education AS education, dr.speciality AS speciality, dr.user_id AS user_id, user.name AS name, user.email AS email, user.mobile AS mobile, dept.name AS dept_name
          FROM doctor AS dr
          INNER JOIN user ON dr.user_id = user.id 
          INNER JOIN dept ON dr.dept = dept.id
          ORDER BY id DESC";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) 
            {
                $id = $row['id'];
                $images = $row['images'];
                $desn = $row['desn'];
                $about = $row['about'];
                $education = $row['education'];
                $speciality = $row['speciality'];
                $fees = $row['fees'];
                $status = $row['status'];
                // user table
                $dr_name = $row['name'];
                $email = $row['email'];
                $mobile = $row['mobile'];
                // dept table
                $dept_name = $row['dept_name'];
                // Assuming you have fetched the database record into $about variable
                $about_words = explode(' ', $about);
                $limited_about = implode(' ', array_slice($about_words, 0, 20));
            echo ' <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="" style="max-width:10px">
                                    <a href="edit_doctors?id='.$id.'&name='.$dr_name.'&type=update" class="edit"><i class="zmdi zmdi-edit"></i></a>            
                                </div>
                                <div class="switch-container" align="right">';
                            
                                
                               if($status == 1){
                                   echo '<a  href="?id=' . $id . '&type=deactive" class="btn btn-sm btn-raised bg-cyan waves-effect">Active</a>';
                               }else{
                                   echo '<a href="?id=' . $id . '&type=active" class="btn btn-sm btn-raised bg-red waves-effect">Deactive</a>';
                               }
                               
                               echo '</div>
                                <div class="member-card">                
                                    <div class="thumb-xl member-thumb">
                                        <img src="'.$images.'" class="img-thumbnail rounded-circle" alt="'.$dr_name.'" >                               
                                    </div>
                                    <div class="">
                                        <h4 class="m-b-5 m-t-20 font-19">'.$dr_name.'('.$education.') <br>Fees: ₹ '.$fees.'</h4>
                                        <p class="text-muted">'.$dept_name.'<span> <a href="javascript:void(0);" class="text-pink">'.$speciality.'</a> </span></p>
                                    </div>
                                    <p class="align-justify">'.$limited_about.'...</p>
                                    <a href="dr_profile?id='.$id.'&name='.$dr_name.'" class="btn btn-raised btn-sm">View Profile</a>
                                    <ul class="social-links list-inline m-t-10">
                                        <li><a title="'.$mobile.'" href="tel:'.$mobile.'"><i class="material-icons">call</i></a></li>
                                        <li><a title="'.$email.'" href="mailto:'.$email.'" ><i class="material-icons">email</i></a></li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>';
                        }
            ?>
           
            
        </div>
    </div>
</section>


<!-- add New Doctor Modal -->
<div class="modal fade" id="add_new_patient" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_new_patientLabel">Doctor Details Entry</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="card">
                            <div class="body">
                                <form action="" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row clearfix">
                                        <div class="col-sm-6 ">
                                            <div class="form-group drop-custum">
                                            <select class="form-control show-tick" required name="user_id">
                                                    <option value="">-- Select Doctor --</option>
                                                <?php
                                                    $sql = "SELECT * FROM user Where user_type = 'doctor' AND status = '1'";
                                                    $res = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($res)) 
                                                    {
                                                        $id = $row['id'];
                                                        $name = $row['name'];
                                                       echo '<option value="'.$id.'">'.$name.'</option>';
                                                    }
                                                     ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" class="form-control" required placeholder="Upload Images" name="file" accept=".webp,.png" id="fileToUpload">
                                                </div>
                                                <label for="" class="font-10 font-italic col-orange">Only WEBP and PNG files are allowed (130px x 130px)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group drop-custum">
                                                <select class="form-control show-tick" required name="dept">
                                                    <option value="">-- Department --</option>
                                                    <?php
                                                        $sql = "SELECT * FROM `dept`";
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Fees" name="fees">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Work Experience" name="work_exp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" required placeholder="Education" name="education">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Membership" name="membership">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" required placeholder="Speciality" name="speciality">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group drop-custum">
                                                <textarea class="form-control" rows="1" name="about" placeholder="About Doctor"></textarea>
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



<!-- Upload File Format Script-->
<script>
    const fileInput = document.getElementById('fileToUpload');
    fileInput.addEventListener('change', () => {
        const allowedExtensions = /(\.webp|\.png)$/i;
        const maxSizeMB = 5;
        const fileSizeMB = fileInput.files[0].size / (1024 * 1024);
        const fileName = fileInput.value;
        if (!allowedExtensions.exec(fileName)) {
            swal({
                title: 'Invalid!',
                text: 'Invalid file format. Only WEBP and PNG files are allowed.',
                icon: 'error',
                button: 'Ok',
            });
            fileInput.value = '';
            return false;
        } else if (fileSizeMB > maxSizeMB) {
            swal({
                title: 'Invalid!',
                text: 'File size exceeds the maximum allowed size of 5 MB.',
                icon: 'error',
                button: 'Ok',
            });
            fileInput.value = '';
            return false;
        }
    });
</script>
<!-- Php code -->
<?php
    if(isset($_POST['save']))
    {
        $user_id = $_POST['user_id']; //user id fetch form user table
        $dept = $_POST['dept'];
        $about = htmlspecialchars($_POST['about'], ENT_QUOTES, 'UTF-8');
        // $about = $_POST['about'];
        $work_exp = $_POST['work_exp'];
        $education = $_POST['education'];
        $membership = $_POST['membership'];
        $speciality = $_POST['speciality'];
        $fees = $_POST['fees'];
    


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

        $sql = "INSERT INTO `doctor`(`user_id`, `images`, `dept`, `desn`,`fees`, `about`, `work_exp`, `education`, `membership`, `speciality`, `added_by`) VALUES ('$user_id','$img_upload','$dept','','$fees','$about','$work_exp','$education','$membership','$speciality','admin')";
        $res = mysqli_query($conn, $sql);

        if($res){
         echo '<script>swal("Successfull", "New Doctor Detailes has been Successfully Added", "success")
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

?>

<!-- Date picker script -->
<script>
    $("#pickadate").flatpickr();
    $("#pickadateandtime").flatpickr({enableTime: true,dateFormat: "Y-m-d H:i"});
</script>
<?php include('footer.php') ?>