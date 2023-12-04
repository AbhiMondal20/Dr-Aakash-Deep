<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    echo "<script>location.href='../index';</script>";
    exit(); // Add this to prevent further execution
}
include 'header.php';
?>

<script src="tinymce/js/tinymce/tinymce.min.js"></script>

<!-- User List -->
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Announcements</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
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
                                            <option value="">-- Post By --</option>
                                            <?php
                                                $sql = "SELECT * FROM user Where status = '1'";
                                                $res = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $id = $row['id'];
                                                    $name = $row['name'];
                                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" required placeholder="DD-MM-YYYY"
                                                name="upload_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                 <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required placeholder="Title"
                                                name="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" required placeholder="Images"
                                                name="file" id="file" accept=".png, .webp">
                                        </div>
                                        <label id="imageSizeLabel" for="floatingInputGroup2" style="color: red;">384 x 260 (Images Dimensions )</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="elm1" name="desc" rows="4"
                                                class="form-control no-resize"
                                                placeholder="Please type Post Description..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="display:none">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" required name="added_by">
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
    // Database connection and session validation should be present here

    // Sanitize user inputs
    $dr_id = mysqli_real_escape_string($conn, $_POST['dr_id']);
    $upload_date = mysqli_real_escape_string($conn, $_POST['upload_date']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $added_by = mysqli_real_escape_string($conn, $_POST['added_by']);

    // File upload handling
    $img_name = $_FILES['file']['name'];
    $img_temp = $_FILES['file']['tmp_name'];
    $img_size = $_FILES['file']['size'];
    $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $allowed_extensions = array("png", "webp");
    $max_file_size = 2 * 1024 * 1024; // 2 MB

    // Validate file format and size
    if (in_array($img_ext, $allowed_extensions) && $img_size <= $max_file_size) {
        $thambname = uniqid();
        $img_upload = 'upload/blog/' . $thambname . "." . $img_ext;
        if (move_uploaded_file($img_temp, $img_upload)) {
            // Insert data into the database
            $sql = "INSERT INTO `announcements`(`title`, `description`, `images`, `upload_date`, `dr_id`, `status`,`added_by`) VALUES ('$title','$desc','$img_upload','$upload_date','$dr_id','1','$added_by')";
            
            if (mysqli_query($conn, $sql)) {
                echo '<script>swal("Successful", "Successfull", "success");
                        setTimeout(function(){
                            window.location.href = window.location.href;
                        }, 1000);
                    </script>';
            } else {
                echo '<script>swal("Error: ' . mysqli_error($conn) . '", "error");</script>';
            }
        } else {
            $upload_error = error_get_last(); // Get details about the upload error
            echo '<script>swal("Error", "Error uploading file: ' . $upload_error['message'] . '", "error");</script>';
        }
    } else {
        echo '<script>swal("Error", "Invalid file format or size.", "error");</script>';
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

<?php include 'footer.php'?>