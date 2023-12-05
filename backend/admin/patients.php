<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $login_email = $_SESSION['email'];

} else {
    echo "<script>location.href='../index';</script>";
}

include('header.php');
?>
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
            <h2>All Appointment</h2>
            <small class="text-muted">Welcome to Dr. Aakash Deep's Clinic</small>
            <div align="right" style="margin-top: -3rem; display:none;">
                <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal"
                    data-target="#add_new_patient"> <i class="material-icons">add_box</i>New Patient Entry</button>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="body">
                        <table class="display table_now">
                            <thead>
                                <tr>
                                    <th>Reg. Id</th>
                                    <th>Appt. Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Dept</th>
                                    <th>Messaage</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM appt ORDER BY id DESC";
                                $res = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($res)) {
                                    // patient Table
                                    $id = $row['id'];
                                    // $reg_id = $row['reg_id'];
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['phone'];
                                    $message = $row['message'];
                                    $dept = $row['services'];
                                    $old_date = $row["date"];
                                    $middle = strtotime($old_date);
                                    $reg_date = date("d-m-Y ", $middle);
                                    echo '<tr>
                                                <td>' . $id . '</td>
                                                <td>' . $reg_date . '</td>
                                                <td>' . $name . '</td>
                                                <td>' . $email . '</td>
                                                <td>' . $mobile . '</td>
                                                <td>' . $dept . '</td>
                                                <td>' . $message . '</td>
                                                </tr>';
                                                // <td>
                                                //     <a href="#" class="btn btn-sm btn-info shadow-none waves-effect" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a> 
                                                    
                                                //     <a href="#" class="btn btn-sm btn-primary shadow-none waves-effect" title="Reports"><i class="fa-solid fa-file"></i></a>
                                                //     <a href="prescription?id=' . $id . '&regId=' . $reg_id . '" target="_BLANK" class="btn btn-sm btn-secondary shadow-none waves-effect" title="Prescription"><i class="fa-solid fa-prescription"></i></a>
                                                // </td>
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- add New Patient Modal -->
<div class="modal fade" id="add_new_patient" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_new_patientLabel">New Patient Entry</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="card">
                            <div class="body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="date" value="<?php echo date('Y-m-d'); ?>"
                                                        name="reg_date" class="form-control">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" required placeholder="Name"
                                                        name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" placeholder="Email"
                                                        name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="tel" class="form-control" maxlength="10" required
                                                        placeholder="Mobile" name="mobile">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" maxlength="3" required
                                                        placeholder="Age" name="age">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group drop-custum">
                                                <select class="form-control show-tick" name="gender">
                                                    <option value="">-- Gender --</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" required placeholder="BP"
                                                        name="bp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" required
                                                        placeholder="Weight" name="weight">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="3" class="form-control no-resize" required
                                                        placeholder="Address" name="address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Added by -->
                                    <div class="col-sm-6" style="display:none;">
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

                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <center>
                                                <input type="submit" class="btn btn-raised g-bg-cyan" name="save"
                                                    value="SAVE">
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

<!-- Php code -->
<?php

if (isset($_POST['save'])) {
    $reg_id = $_POST['reg_id'];
    $reg_date = $_POST['reg_date'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $bp = $_POST['bp'];
    $weight = $_POST['weight'];
    $address = $_POST['address'];
    $dept = "Orthopedic";
    $added_by = $_POST['added_by'];

    // Validate input
    if (empty($name) || empty($email) || empty($mobile) || empty($gender) || empty($reg_date) || empty($address) || empty($dept) || empty($bp) || empty($weight)) {
        echo '<script>swal("Error", "All fields are required", "error");
        setTimeout(function(){
            window.location.href =  "patient";
        },1000);
        </script>';
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>swal("Error", "Invalid email format", "error");
        setTimeout(function(){
            window.location.href =  "patient";
        },1000);
        </script>';
        exit();
    } else {
        $stmt = $conn->prepare("SELECT * FROM patient WHERE email = ? OR mobile = ?");
        $stmt->bind_param("ss", $email, $mobile);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo '<script>swal("Error", "Email or mobile already registered", "error");
                        setTimeout(function(){
                            window.location.href =  window.location.href;
                        },1000);
                        </script>';
            exit();
        } else {
            $stmt = $conn->prepare("INSERT INTO `patient`(`reg_id`, `reg_date`, `name`, `email`, `mobile`, `age`, `gender`, `bp`, `weight`, `dept`, `address`, `status`, `added_by`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?)");
            $stmt->bind_param("ssssssssssss", $reg_id, $reg_date, $name, $email, $mobile, $age, $gender, $bp, $weight, $dept, $address, $added_by);
            if ($stmt->execute()) {
                echo '<script>swal("Successful", "New Patient has been Successfully Added", "success");
                        setTimeout(function(){
                            window.location.href =  window.location.href;
                        },1000);
                        </script>';
                exit();
            } else {
                echo '<script>swal("Error", "There appears to be some error", "error");
                        setTimeout(function(){
                            window.location.href =  window.location.href;
                        },1000);
                        </script>';
                exit();
            }
        }
    }
}
?>
<!-- Table Sorting Script -->
<script>
    $(document).ready(function () {
        $('.table_now').DataTable({
            columnDefs: [
                {
                    targets: 0,
                    type: 'anti-the'
                }
            ],
            order: [[0, 'desc']] // Set the second column as the default sorted column in ascending order
        });
    });
</script>

<?php include('footer.php'); ?>