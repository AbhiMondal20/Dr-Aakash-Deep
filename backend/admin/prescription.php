<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $login_email = $_SESSION['email'];
} else {
    echo "<script>location.href='../index';</script>";
}
include 'header.php';
if (isset($_GET['id']) && isset($_GET['regId'])) {
    $patient_id = $_GET['id'];
    $regId = $_GET['regId'];

    $sql = "SELECT * FROM patient WHERE id = '$patient_id' AND reg_id = '$regId'";
    $res = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($res)) {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $age = $row['age'];
        $gender = $row['gender'];
        $bp = $row['bp'];
        $weight = $row['weight'];
        $dept = $row['dept'];
        $old_date = $row["reg_date"];
        $middle = strtotime($old_date);
        $reg_date = date("d-m-Y", $middle);
        $address = $row['address'];
        $status = $row['status'];
    }
}
?>

<script src="tinymce/js/tinymce/tinymce.min.js"></script>

<!-- User List -->
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Prescription</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card all-patients">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <address>
                                    <strong><?php echo $name; ?></strong><br>
                                    <?php echo $address; ?><br>
                                    <p class="mb-0"><strong>Mail: </strong><?php echo $email; ?></p>
                                    <p class="mb-0"><strong>Phone: </strong><?php echo $mobile; ?></p>
                                    <p class="mb-0"><strong>Gender: </strong><?php echo $gender; ?></p>
                                    <p class="mb-0"><strong>Age: </strong><?php echo $age; ?></p>
                                    <p class="mb-0"><strong>BP: </strong><?php echo $bp; ?></p>
                                    <p class="mb-0"><strong>Weight: </strong><?php echo $weight; ?></p>
                                </address>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <p class="mb-0"><strong>Reg. ID: </strong><?php echo $regId; ?></p>
                                <p><strong>Reg. Date: </strong><?php echo $reg_date; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="problems" placeholder="Problems"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="observation" placeholder="Observation"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="test" placeholder="Test"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="addon_notes" placeholder="Additional Notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="prescription" id="prescription" placeholder="Prescriptions"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Next Appointment Date</label>
                                            <input type="date"
                                                value="<?php echo date('Y-m-d', strtotime('+10 days')); ?>"
                                                name="nxt_appt_date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="display: none;">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" name="added_by">
                                            <?php
                                            $sql = "SELECT * FROM user WHERE email = '$login_email'";
                                            $res = mysqli_query($conn, $sql);

                                            if ($res) {
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $id = $row['id'];
                                                    $name = $row['name'];
                                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                                }
                                            } else {
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

<?php

if (isset($_POST['save'])) {
    $problems = mysqli_real_escape_string($conn, $_POST['problems']);
    $observation = mysqli_real_escape_string($conn, $_POST['observation']);
    $test = mysqli_real_escape_string($conn, $_POST['test']);
    $prescription = mysqli_real_escape_string($conn, $_POST['prescription']);
    $addon_notes = mysqli_real_escape_string($conn, $_POST['addon_notes']);
    $nxt_appt_date = mysqli_real_escape_string($conn, $_POST['nxt_appt_date']);
    $added_by = mysqli_real_escape_string($conn, $_POST['added_by']);

    // Check if a prescription already exists for the patient
    $sql = "SELECT * FROM prescription WHERE patient_id = '$patient_id'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        echo '<script>swal("Error", "Prescription already exists for this patient", "error")</script>';
    } else {
        // Create a prepared statement
        $stmt = mysqli_prepare($conn, "INSERT INTO `prescription`(`patient_id`, `problems`, `observation`, `test`, `prescription`, `add_notes`, `nxt_appt_date`, `added_by`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ssssssss", $patient_id, $problems, $observation, $test, $prescription, $addon_notes, $nxt_appt_date, $added_by);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo '<script>swal("Success", "", "success");
            setTimeout(function(){
                window.open("prescription_pdf?id=' . $patient_id . '&reg_id=' . $regId . '", "_blank");
            }, 1000);
            </script>';
        } else {
            echo '<script>swal("Error", "There appears to be some error", "error")</script>';
        }
    }
}

?>

<script>
    // Prescription TextArea
    tinymce.init({
        selector: 'textarea#prescription',
        height: 400,
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    });

    tinymce.init({
        selector: 'textarea',
        height: 250,
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
<?php include 'footer.php' ?>
