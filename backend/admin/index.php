<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $email = $_SESSION['email'];
} else {
    echo "<script>location.href='../index';</script>";
}
include 'header.php';
?>
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard</h2>
            <small class="text-muted">Welcome to Dr. Aakash Deep's Clinic</small>
        </div>

        <!-- booked_schedule.php -->

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-blue"></i> </div>
                    <div class="content">
                        <div class="text">Total Patient</div>
                        <div class="number total-patients">Loading...</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-green"></i> </div>
                    <div class="content">
                        <div class="text">Today's Patient</div>
                        <div class="number today-patients">Loading...</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-bug col-blush"></i> </div>
                    <div class="content">
                        <div class="text">Today's Visit</div>
                        <div class="number today-visits">Loading...</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-cyan"></i> </div>
                    <div class="content">
                        <div class="text">Today's Pending</div>
                        <div class="number today-pending">Loading...</div>
                    </div>
                </div>
            </div>
        </div>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
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
<!-- User List -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="body">
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
                                            <img src="<?php echo $logo; ?>" id="showlogo" height="70px">
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
                                            <input type="text" class="form-control" placeholder="Blog" name="blog" value="<?php echo $blog; ?>">
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


<script>
    // Function to fetch statistics and update the values
    function fetchStatistics() {
        $.ajax({
            url: "load/get_today_count_dashboard.php", // Your PHP file to fetch statistics
            type: "GET",
            dataType: "json",
            success: function (data) {
                // Update the total patients
                $('.total-patients').text(data.total_patients);

                // Update today's patients
                $('.today-patients').text(data.today_total_patients);

                // Update today's visits
                $('.today-visits').text(data.visit_patients);

                // Update today's pending
                $('.today-pending').text(data.pending_patients);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    fetchStatistics();
    setInterval(fetchStatistics, 5000); 
    
      function fetchData() {
    $.ajax({
        url: "load/get_patient_data_dashboard.php",
        type: "GET",
        dataType: "json",
        success: function (data) {
            var html = '';
            $.each(data, function (index, item) {
                var statusHtml = item.status == '1' ?
                    "<button class='btn btn-sm bg-cyan waves-effect' type='button'>Visited <span class='badge'></span></button>" :
                    "<button class='btn btn-sm bg-red waves-effect' type='button'>Not Visit <span class='badge'></span></button>";

                // Initialize date variable
                // var apptDateFormatted = "No Date";

                if (item.appt_date) {
                    var dateTimeParts = item.appt_date.split(" ");
                    if (dateTimeParts.length >= 1) {
                        var dateParts = dateTimeParts[0].split("-");
                        if (dateParts.length === 3) {
                            apptDateFormatted = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0];
                        } else {
                            apptDateFormatted = "Invalid Date";
                        }
                    }
                }
                html += '<tr>' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td>' + item.name + '</td>' +
                    '<td>' + item.email + '</td>' +
                    '<td>' + item.mobile + '</td>' +
                    '<td>' + item.appt_date + ' : ' + item.appt_time + '</td>' +
                    '<td>' + item.address + '</td>' +
                    '<td>' + item.dr_name + '</td>' +
                    '<td>' + statusHtml + '</td>' +
                    '<td><a href="https://wa.me/+91' + item.mobile + '?text=' +
                        encodeURIComponent(
                            'Hi ' + item.name + '\n\n' +
                            'We are delighted to inform you that your appointment booking has been successfully confirmed at Paramount Hospital Pvt. Ltd. 🏥\n\n' +
                            'Appointment Date: ' + item.appt_date + '\n' +
                            'Appointment Time: ' + item.appt_time + '\n' +
                            'Doctor: ' + item.dr_name + '\n\n' +
                            'We kindly request you to arrive at least 15 minutes before the scheduled appointment time. \n\n' +
                            'Paramount Hospital Pvt. LTD\n' +
                            'Mangal Pandey Road\n' +
                            'Khalpara Siliguri\n' +
                            'And for easy directions, you can click on this link: https://maps.app.goo.gl/g42q2afejE6Wm4Yp7'
                        ) +
                        '" class="whatsapp_float" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp" style="color: #23af33;"></i></a></td>' +
                    '</tr>';
            });

            // Update the table body with the new data
            $('table.table tbody').html(html);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
// Call the fetchData function initially to populate the table
fetchData();
// Set an interval to fetch data and update the table every few seconds (e.g., 5 seconds)
setInterval(fetchData, 5000); // Adjust the interval as needed
</script>
<?php include 'footer.php'?>