<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    echo "<script>location.href='../index';</script>";
    exit(); // Add this to prevent further execution
}
include 'header.php';
?>

<script src="tinymce/js/tinymce/tinymce.min.js"></script>


<?php
$blog_id = $_GET['id'];
$title = $_GET['title'];
$sql = "SELECT * FROM blogs WHERE id = '$blog_id' AND title = '$title'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    // $id = $row['id'];
    $title = $row['title'];
    $description = $row['description'];
    $upload_date = $row['upload_date'];
    $arc_images = $row['arc_images'];
    $images = $row['images'];
    $dr_id = $row['dr_id'];
    $status = $row['status'];
    $date = date('d-M-Y', strtotime($row['upload_date']));
}
?>
<!-- User List -->
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Update Blogging</h2>
            <small class="text-muted">Welcome to Dr. Aakash Deep Clinik</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-6 ">
                                    <div class="form-group drop-custum">

                                        <select class="form-control show-tick" required name="dr_id">
                                            <option value="">-- Select Doctor --</option>
                                            <?php
                                            $sql = "SELECT * FROM user WHERE status = '1'";
                                            $res = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $selected = ($id == $dr_id) ? 'selected' : '';
                                                echo '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" required placeholder="DD-MM-YYYY"
                                                value="<?php echo $upload_date; ?>" name="upload_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" placeholder="Images" name="arc_file"
                                                id="arc_file" accept=".png, .webp">
                                        </div>
                                        <label id="imageSizeLabel" for="floatingInputGroup2" style="color: red;">500 x
                                            500 (Images Dimensions) Archive Image For Home Page</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" placeholder="Images" name="file"
                                                id="file" accept=".png, .webp">
                                        </div>
                                        <label id="imageSizeLabel" for="floatingInputGroup2" style="color: red;">1175 x
                                            350 (Images Dimensions)</label>
                                    </div>
                                </div>

                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required placeholder="Title"
                                                value="<?php echo $title; ?>" name="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="elm1" name="desc" rows="4" class="form-control no-resize"
                                                placeholder="Please type Post Description..."><?php echo $description; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="display:none">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" required name="modified_by">
                                            <?php
                                            $email = mysqli_real_escape_string($conn, $email); // Sanitize input to prevent SQL injection
                                            
                                            $sql = "SELECT * FROM user WHERE email = '$email'";
                                            $res = mysqli_query($conn, $sql);

                                            if ($res) {
                                                // Assuming you want to loop through all the rows with matching emails
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $id = $row['id'];
                                                    $name = $row['name'];
                                                    echo '<option value="' . $id . '" >' . $name . '</option>';
                                                }
                                            } else {
                                                // Handle the case where the query fails
                                                echo "Error: " . mysqli_error($conn);
                                            }
                                            ?>
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

<!-- Upload File Format -->
<script>
    const fileInput = document.getElementById('file');
    fileInput.addEventListener('change', () => {
        const allowedExtensions = /(\.png|\.webp)$/i;
        const maxSizeMB = 2;
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
                text: 'Images size exceeds the maximum allowed size of 2 MB.',
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
if (isset($_POST['save'])) {
    // Sanitize user inputs
    $dr_id = mysqli_real_escape_string($conn, $_POST['dr_id']);
    $upload_date = mysqli_real_escape_string($conn, $_POST['upload_date']);
    $page_type = mysqli_real_escape_string($conn, $_POST['page_type']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $modified_by = mysqli_real_escape_string($conn, $_POST['modified_by']);
    $modified_date = date("Y-m-d H:i:s");
    
// Check if a new image is being uploaded
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $tmp_dir = './upload/blog/';
        $img_loc = $_FILES['file']['tmp_name'];
        $img_name = $_FILES['file']['name'];
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $thambname = uniqid();
        $img_dir = $tmp_dir . $thambname . "." . $img_ext;
        move_uploaded_file($img_loc, $img_dir);
        $img_upload = 'upload/blog/' . $thambname . "." . $img_ext;
        $img_size = $_FILES['file']['size'] / (1024 * 1024);
        if ($img_size > 5) {
            echo "<script>alert('Image size is greater than 5 MB')</script>";
            exit();
        }    
    }
   else {
        $img_upload = $images;
        echo '<script>swal("Error", "Invalid file format or size.", "error");</script>';
    }
    
    // Check if a new image is being uploaded
    if ($_FILES['arc_images']['error'] === UPLOAD_ERR_OK) {
        $arc_images_tmp_dir = './upload/blog/';
        $arc_images_img_loc = $_FILES['arc_images']['tmp_name'];
        $arc_images_img_name = $_FILES['arc_images']['name'];
        $arc_images_img_ext = pathinfo($arc_images_img_name, PATHINFO_EXTENSION);
        $arc_images_thambname = uniqid();
        $arc_images_img_dir = $arc_images_tmp_dir . $arc_images_thambname . "." . $arc_images_img_ext;
        move_uploaded_file($arc_images_img_loc, $arc_images_tmp_dir);
        $arc_img_upload = 'upload/blog/' . $arc_images_thambname . "." . $arc_images_img_ext;
        $arc_images_img_size = $_FILES['arc_images']['size'] / (1024 * 1024);
        if ($arc_images_img_size > 5) {
            echo "<script>alert('Image size is greater than 5 MB')</script>";
            exit();
        }    
    }
   else {
        $arc_img_upload = $arc_images;
        echo '<script>swal("Error", "Invalid file format or size.", "error");</script>';
    }
    
    $sql = "UPDATE `blogs` SET `title`='$title',`description`='$desc',`page_type`='$page_type', `arc_images`= '$arc_img_upload',`images`='$img_upload',`upload_date`='$upload_date',`modified_by`='$modified_by',`modified_date`='$modified_date' WHERE id = '$blog_id'";
    $res = mysqli_query($conn, $sql);
     if ($res) {
        echo '<script>swal("Update Successful", "Blog Details have been Successfully Updated", "success")
            setTimeout(function(){
                window.location.href = "blogs";
            }, 1000);
        </script>';
    } else {
        echo '<script>swal("Error", "There appears to be an error", "error")</script>';
    }
             
}
?>

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
    });
</script>

<?php include 'footer.php' ?>