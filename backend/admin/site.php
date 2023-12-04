<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    echo "<script>location.href='../index';</script>";
    exit();
}
include 'header.php';
?>

<script src="tinymce/js/tinymce/tinymce.min.js"></script>

<!-- User List -->
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Site Info</h2>
            <small class="text-muted">Welcome to PMP</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="body">
                        <?php
                        $sql = "SELECT * FROM info";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $url = $row['url'];
                            $title = $row['title'];
                            $fav_icon = $row['fav_icon'];
                            $logo = $row['logo'];
                            $address = $row['address'];
                            $email = $row['email'];
                            $email2 = $row['email2'];
                            $mobile = $row['mobile'];
                            $mobile2 = $row['mobile2'];
                            $whatsapp = $row['whatsapp'];
                            $facebook = $row['facebook'];
                            $youtube = $row['youtube'];
                            $instagram = $row['instagram'];
                            $blog = $row['blog'];
                        }

                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2"> URL</label>
                                            <input type="text" class="form-control" name="url" placeholder="URL"
                                                value="<?php echo $url; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2"> Title</label>
                                            <input type="text" class="form-control" value="<?php echo $title; ?>"
                                                name="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class=" admin-image">
                                            <img src="<?php echo $logo; ?>" id="showlogo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <div class="admin-image">
                                            <img src="<?php echo $fav_icon; ?>" id="showfav" height="70px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Logo</label>
                                            <input type="file" class="form-control" placeholder="Images" name="logo"
                                                id="logo" accept=".png, .webp">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2"> Fav Icon</label>
                                            <input type="file" class="form-control" placeholder="Images" name="fav_icon"
                                                id="fav_icon" accept=".png, .webp">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Mobile</label>
                                            <input type="text" class="form-control" required placeholder="Mobile "
                                                name="mobile" value="<?php echo $mobile; ?>" maxlength="10">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Mobile2</label>
                                            <input type="text" class="form-control" placeholder="Mobile2" name="mobile2"
                                                value="<?php echo $mobile2; ?>" maxlength="10">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email"
                                                value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Email 2</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email2"
                                                value="<?php echo $email2; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Whats App</label>
                                            <input type="text" class="form-control" placeholder="Whats app"
                                                name="whatsapp" value="<?php echo $whatsapp; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Facebook</label>
                                            <input type="text" class="form-control" placeholder="Facebook"
                                                name="facebook" value="<?php echo $facebook; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Youtube</label>
                                            <input type="text" class="form-control" placeholder="Youtube" name="youtube"
                                                value="<?php echo $youtube; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Instagram</label>
                                            <input type="text" class="form-control" placeholder="instagram"
                                                name="instagram" value="<?php echo $instagram; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Blog</label>
                                            <input type="text" class="form-control" placeholder="Blog" name="blog"
                                                value="<?php echo $blog; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label id="imageSizeLabel" for="floatingInputGroup2">Address</label>
                                            <textarea rows="3" class="form-control" placeholder="Address"
                                                name="address"></textarea>
                                        </div>
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
    const fileInput = document.getElementById('logo');
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

    // fav icon filter
    const fav_icon = document.getElementById('fav_icon');
    fav_icon.addEventListener('change', () => {
        const allowedExtensions = /(\.png|\.webp)$/i;
        const maxSizeMB = 2;
        const fileSizeMB = fav_icon.files[0].size / (1024 * 1024);
        const fileName = fav_icon.value;
        if (!allowedExtensions.exec(fileName)) {
            swal({
                title: 'Invalid!',
                text: 'Invalid file format. Only WEBP and PNG files are allowed.',
                icon: 'error',
                button: 'Ok',
            });
            fav_icon.value = '';
            return false;
        } else if (fileSizeMB > maxSizeMB) {
            swal({
                title: 'Invalid!',
                text: 'Images size exceeds the maximum allowed size of 2 MB.',
                icon: 'error',
                button: 'Ok',
            });
            fav_icon.value = '';
            return false;
        }
    });

    // show logo upload images
    $(document).ready(function (e) {
        $('#logo').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showlogo').attr('src', e.target.result);

            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
    // show fav icons upload images
    $(document).ready(function (e) {
        $('#fav_icon').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showfav').attr('src', e.target.result);

            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


<!-- PHP code -->
<?php
if (isset($_POST['save'])) {

    $url = mysqli_real_escape_string($conn, $_POST['url']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $mobile2 = mysqli_real_escape_string($conn, $_POST['mobile2']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $email2 = mysqli_real_escape_string($conn, $_POST['email2']);
    $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    $youtube = mysqli_real_escape_string($conn, $_POST['youtube']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $Blog = mysqli_real_escape_string($conn, $_POST['Blog']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // logo upload handling
    if ($_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $tmp_dir = './upload/';
        $img_loc = $_FILES['logo']['tmp_name']; // Corrected from $_FILES['file']
        $img_name = $_FILES['logo']['name']; // Corrected from $_FILES['file']
    
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $thambname = uniqid();
        $img_dir = $tmp_dir . $thambname . "." . $img_ext;
        move_uploaded_file($img_loc, $img_dir);
    
        $img_upload = 'upload/' . $thambname . "." . $img_ext;
    
        $img_size = $_FILES['logo']['size'] / (1024 * 1024);
    
        if ($img_size > 2) {
            echo "<script>alert('Image size is greater than 2 MB')</script>";
            exit();
        }
    } else {
        $img_upload = $logo;
    }    


    // Favicon upload handling
    if ($_FILES['fav_icon']['error'] === UPLOAD_ERR_OK) {
        $tmp_dir_fav = './upload/';
        $img_loc_fav = $_FILES['fav_icon']['tmp_name'];
        $img_name_fav = $_FILES['fav_icon']['name'];

        $img_ext_fav = pathinfo($img_name_fav, PATHINFO_EXTENSION);
        $thambname_fav = uniqid();
        $img_dir_fav = $tmp_dir_fav . $thambname_fav . "." . $img_ext_fav;
        move_uploaded_file($img_loc_fav, $img_dir_fav);

        $img_upload_fav = 'upload/' . $thambname_fav . "." . $img_ext_fav;

        $img_size_fav = $_FILES['fav_icon']['size'] / (1024 * 1024);

        if ($img_size_fav > 2) {
            echo "<script>alert('Image size is greater than 2 MB')</script>";
            exit();
        }
    } else {
        $img_upload_fav = $fav_icon;
    }


    $sql = "UPDATE `info` SET `url`='$url',`title`='$title',`fav_icon`='$img_upload_fav',`logo`='$img_upload',`address`='$address',`email`='$email',`email2`='$email2',`mobile`='$mobile',`mobile2`='$mobile2',`whatsapp`='$whatsapp',`facebook`='$facebook',`youtube`='$youtube',`instagram`='$instagram',`blog`='$blog' WHERE id = 1";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        move_uploaded_file($img_loc, $img_upload);
        move_uploaded_file($img_loc_fav, $img_upload_fav);

        echo "<script>
    swal({
        title: 'Success',
        text: '',
        icon: 'success',
        button: 'Ok!',
    });
    setTimeout(function(){
        window.location.href =  window.location.href;
    },1000
    );
    </script>";
    } else {
        echo "<script>swal({
            title: 'Invalid!',
            text: 'Please Contact The Support Team!',
            icon: 'error',
            button: 'Ok',
            });
            setTimeout(function(){
            window.location.href =  window.location.href;
        },1000
        );
            </script>";

    }
}

?>

<?php include 'footer.php' ?>