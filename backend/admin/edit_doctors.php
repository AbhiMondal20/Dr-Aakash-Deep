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
            <h2>Edit Doctor</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
            
        </div>
<!-- Edit user -->
<?php
  $id = $_GET['id'];
  $name = $_GET['name'];

  $sql = "SELECT dr.id AS id,dr.fees AS fees, dr.images AS images, dr.about AS about, dr.membership AS membership, dr.dept AS dept, dr.work_exp AS work_exp, dr.desn AS desn, dr.education AS education, dr.speciality AS speciality, dr.user_id AS user_id, user.name AS name, user.email AS email, user.mobile AS mobile, dept.name AS dept_name
  FROM doctor AS dr
  INNER JOIN user ON dr.user_id = user.id 
  INNER JOIN dept ON dr.dept = dept.id
  WHERE user.name = '$name' AND dr.id = '$id'";

$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) 
{
    $doctor_id = $row['id'];
    $images = $row['images'];
    $desn = $row['desn'];
    $about = $row['about'];
    $education = $row['education'];
    $speciality = $row['speciality'];
    $work_exp = $row['work_exp'];
    $membership = $row['membership'];
    $dept = $row['dept'];
    $fees = $row['fees'];

    // user table
    $dr_name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];

    // dept table
    $dept_name = $row['dept_name']; 
    
    // Assuming you have fetched the database record into $about variable
    $about_words = explode(' ', $about);
    $limited_about = implode(' ', array_slice($about_words, 0, 20));
}

?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="body">
                        <form action="" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                            <center>
                                <div class="thumb-xl member-thumb">
                                    <img src="<?php echo $images ?>" class="img-thumbnail rounded-circle" alt="'.$dr_name.'" id="showimages">                               
                                </div>
                            </center>
                            <div class="row clearfix">
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" readonly placeholder="Name" name="name" value="<?php echo $name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" placeholder="Upload Images" name="file" accept=".webp .png" id="fileToUpload">
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
                                                $selected = ''; // Default empty string, indicating no pre-selection

                                                // Assuming you have a variable called $selected_dept_id with the ID of the department you want to be pre-selected
                                                if ($id == $dept) {
                                                    $selected = 'selected="selected"'; // Set the 'selected' attribute if it matches the chosen department
                                                }

                                                echo '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Fees" name="fees" value="<?php echo $fees; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Work Experience" name="work_exp" value="<?php echo $work_exp; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required placeholder="Education" name="education" value="<?php echo $education; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Membership" name="membership" value="<?php echo $membership; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required placeholder="Speciality" name="speciality" value="<?php echo $speciality; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group drop-custum">
                                        <textarea class="form-control" rows="4" name="about" placeholder="About Doctor"><?php echo $about; ?></textarea>
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


<!-- Show images in realtime -->
<script>
    $(document).ready(function (e) {
        $('#fileToUpload').change(function (e) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimages').attr('src',e.target.result);

            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>



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




<!-- PHP code -->
<?php
// Your existing code to retrieve doctor information

if(isset($_POST['save']))
{
    $dept = $_POST['dept'];
    $about = htmlspecialchars($_POST['about'], ENT_QUOTES, 'UTF-8');
    $work_exp = $_POST['work_exp'];
    $education = $_POST['education'];
    $membership = $_POST['membership'];
    $speciality = $_POST['speciality'];
    $fees = $_POST['fees'];

    $modified_date = date("Y-m-d H:i:s");

    // Check if a new image is being uploaded
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $tmp_dir = './upload/';
        $img_loc = $_FILES['file']['tmp_name'];
        $img_name = $_FILES['file']['name'];

        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $thambname = uniqid();
        $img_dir = $tmp_dir . $thambname . "." . $img_ext;
        move_uploaded_file($img_loc, $img_dir);

        $img_upload = 'upload/' . $thambname . "." . $img_ext;
        
        $img_size = $_FILES['file']['size'] / (1024 * 1024);

        if ($img_size > 5) {
            echo "<script>alert('Image size is greater than 5 MB')</script>";
            exit();
        }
    } else {
        // No new image is uploaded, keep the existing image path
        $img_upload = $images;
    }

    $sql = "UPDATE `doctor` SET `images`='$img_upload',`dept`='$dept',`about`='$about',`work_exp`='$work_exp',`education`='$education',`membership`='$membership',`speciality`='$speciality', `fees`='$fees' WHERE id = '$doctor_id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script>swal("Update Successful", "Doctor Details have been Successfully Updated", "success")
            setTimeout(function(){
                window.location.href =  "doctors";
            }, 1000);
        </script>';
    } else {
        echo '<script>swal("Error", "There appears to be an error", "error")</script>';
    }
}
?>
<?php include('footer.php') ?>