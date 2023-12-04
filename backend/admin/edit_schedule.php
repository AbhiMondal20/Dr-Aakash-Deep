<?php

session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) { 
    $email = $_SESSION['email'];
  
}else{
    echo "<script>location.href='../index';</script>";
}

include('header.php');
?>

<?php
    $schedule_id = $_GET['schedule_id'];
    $sql = "SELECT schedule.id As schedule_id, schedule.user_id AS user_id, schedule.start AS start, schedule.end As end, user.name AS doc_name, user.email AS email, user.mobile AS mobile, doctor.images AS images, doctor.about AS about, doctor.education As education  FROM schedule INNER JOIN user ON user.id = schedule.user_id  INNER JOIN doctor ON doctor.user_id = schedule.user_id  WHERE schedule.id = '$schedule_id' ";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) 
    {
        // schedule Table
        $schedule_id = $row['schedule_id'];
        $start = $row['start'];
        $user_id = $row['user_id'];



        $end = $row['end'];

        // user Table
        $doc_name = $row['doc_name'];
        $email = $row['email'];
        $mobile = $row['mobile'];

        // Doctor Table
        $images = $row['images'];
        $about = $row['about'];
        $education = $row['education'];


    } 
?>



<section class="content profile-page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 p-l-0 p-r-0">
                <section class="boxs-simple">
                    <div class="profile-header"> 
                        <div class="" align="left" style="margin-top:-20px;">    
                            <a  href="javascript:void(0)" onclick="goBack()"> <i class="material-icons">chevron_left</i> Back</a>
                        </div>
                        <div class="profile_info">
                            <div class="profile-image"> <img src="<?php echo $images; ?>" alt=""> </div>
                            <h4 class="mb-0"><?php echo $doc_name; ?> (<?php echo $education; ?>)</h4>
                            <div class="mt-10">
                                <!-- <button class="btn btn-raised btn-default bg-blush btn-sm">Follow</button>
                                <button class="btn btn-raised btn-default bg-green btn-sm">Message</button> -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 mt-4">
                <div class="card">
                    <div class="header">
                        <h2>About</h2>
                    </div>
                    <div class="body">
                        <p class="text-default">
                            <?php echo $about; ?>
                        </p>
                        <blockquote>
                            <small>Mobile :  <cite title="Source Title"><a href="tel:<?php echo $mobile; ?>"><?php echo $mobile; ?></a></cite></small> <br>
                            <small>Email :  <cite title="Source Title"><a href="mailto:<?php echo $email; ?>" ?><?php echo $email; ?></a></cite></small>                         
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 mt-4">
                <div class="card">
                    <div class="body"> 
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-6">
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

                                            $selected = ''; // Default empty string, indicating no pre-selection

                                            if ($id == $user_id) {
                                                $selected = 'selected="selected"'; // Set the 'selected' attribute if it matches the chosen department
                                            }

                                            echo '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';

                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" required name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="datetime-local" class="form-control" name="start" value="<?php echo $start; ?>" placeholder="Please choose date & time...">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="datetime-local" class="form-control" name="end" value="<?php echo $end; ?>" placeholder="Please choose date & time...">
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


<?php
    if(isset($_POST['save']))
    {
        $user_id = $_POST['user_id'];
        // $schedule = $_POST['schedule'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $status = $_POST['status'];
        $modified_by = $_POST['modified_by'];
        $modified_date = date("Y-m-d H:i:s");
        

        $sql = "UPDATE `schedule` SET `user_id`='$user_id',`start`='$start',`end`='$end',`status`='$status',`modified_date`='$modified_date',`modified_by`='$modified_by' WHERE id = '$schedule_id'";
        $res = mysqli_query($conn, $sql);
        
        if($res){
            echo '<script>swal("Successfull", "Schedule has been Successfully Updated", "success")
            setTimeout(function(){
                window.location.href = "doctor-schedule";
            },1000
            );
                </script>';
                
        }else{
            echo '<script>swal("Error", "There appears some error", "error")
            </script>';
        
        }
    }

?>



<?php
    include('footer.php');
?>
