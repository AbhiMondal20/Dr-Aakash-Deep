<?php

session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $email = $_SESSION['email'];

} else {
    echo "<script>location.href='../index';</script>";
}

include 'header.php';

$id = $_GET['id'];
$name = $_GET['name'];

$sql = "SELECT dr.id AS id, dr.images AS images, dr.about AS about, dr.desn AS desn, dr.education AS education, dr.speciality AS speciality, dr.user_id AS user_id, user.name AS name, user.email AS email, user.mobile AS mobile, dept.name AS dept_name
    FROM doctor AS dr
    INNER JOIN user ON dr.user_id = user.id
    INNER JOIN dept ON dr.dept = dept.id
    WHERE user.name = '$name' AND dr.id = '$id'";

$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $id = $row['id'];
    $images = $row['images'];
    $desn = $row['desn'];
    $about = $row['about'];
    $education = $row['education'];
    $speciality = $row['speciality'];

    // user table
    $dr_name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $user_id = $row['user_id'];

    // dept table
    $dept_name = $row['dept_name'];
}

?>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>


<section class="content profile-page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 p-l-0 p-r-0">
                <section class="boxs-simple">
                    <div class="profile-header">
                        <div class="profile_info">
                            <div class="profile-image"> <img src="<?php echo $images; ?>" alt=""> </div>
                            <h4 class="mb-0"><?php echo $dr_name; ?> (<?php echo $education; ?>)</h4>
                            <span class="text-muted col-white"><?php echo $dept_name ?></span>
                            <div class="mt-10">
                                <!-- <button class="btn btn-raised btn-default bg-blush btn-sm">Follow</button>
                                <button class="btn btn-raised btn-default bg-green btn-sm">Message</button> -->
                            </div>
                        </div>
                    </div>
                    <div class="profile-sub-header">
                        <div class="box-list">
                            <ul class="text-center">
                                <li> <a href="mail-inbox.html" class=""><i class="zmdi zmdi-email"></i>
                                    <p>My Inbox</p>
                                    </a> </li>
                                <li> <a href="javascript:void(0);" class=""><i class="zmdi zmdi-camera"></i>
                                    <p>Gallery</p>
                                    </a> </li>
                                <li> <a href="javascript:void(0);"><i class="zmdi zmdi-attachment"></i>
                                    <p>Collections</p>
                                    </a> </li>
                                <li> <a href="javascript:void(0);"><i class="zmdi zmdi-format-subject"></i>
                                    <p>Tasks</p>
                                    </a> </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
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
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#mypost">My Post</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#timeline">Activities</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#usersettings">Setting</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="mypost">
                                <div class="wrap-reset">
                                    <div class="mypost-list">
                                        <?php
                                             $limit = 4;
                                             if(isset($_GET['page'])){
                                               $page = $_GET['page'];
                                             }else{
                                               $page = 1;
                                             }
                                             $offset = ($page -1) * $limit;
                                           $sql = "SELECT * FROM blogs INNER JOIN user ON blogs.dr_id = user.id WHERE blogs.dr_id = '$user_id' ORDER BY blogs.id DESC LIMIT {$offset}, {$limit}";
                                           $res = mysqli_query($conn, $sql);
                                           while ($row = mysqli_fetch_assoc($res)) {
                                             $id = $row['id'];
                                             $title = $row['title'];
                                             $description = $row['description'];
                                             $words = explode(' ', $description);
                                             $limited_words = array_slice($words, 0, 50);
                                             $limited_description = implode(' ', $limited_words);
                                             $page_type = $row['page_type'];
                                             $images = $row['images'];
                                             $upload_date = $row['upload_date'];
                                             $formatted_date = date("F j, Y", strtotime($upload_date));
                                             $dr_id = $row['dr_id'];
                                             $status = $row['status'];
                                             $dr_name = $row['name'];
                                        ?>
                                    
                                        <div class="post-box">
                                            <span class="text-muted text-small"><i class="zmdi zmdi-alarm"></i><?php echo $formatted_date ?></span>
                                            <div class="post-img"><img src="<?php echo $images ?>" class="img-fluid" alt /></div>
                                            <div>
                                                <h5><?php echo $title ?></h5>
                                                <p class="mb-0"><?php echo $limited_description ?></p>
                                                <p><a href="javascript:void(0);" class="btn btn-raised btn-info btn-sm"><i class="material-icons">pageview</i> View Details </a> <a href="edit_blogs?id=<?php echo $id ?>" class="btn btn-raised bg-soundcloud btn-sm"><i class="material-icons">edit</i>Edit</a></p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <hr>
                                        <div class="text-center"> <a href="javascript:void(0);" class="btn btn-raised btn-default">Load More …</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="timeline">
                                <div class="timeline-body">
                                    <div class="timeline m-border">
                                        <div class="timeline-item">
                                            <div class="item-content">
                                                <div class="text-small">Just now</div>
                                                <p>Finished task #features 4.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">11:30</div>
                                                <p>@Jessi retwit your post</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning border-l">
                                            <div class="item-content">
                                                <div class="text-small">10:30</div>
                                                <p>Call to customer #Jacob and discuss the detail.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning">
                                            <div class="item-content">
                                                <div class="text-small">3 days ago</div>
                                                <p>Jessi commented your post.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-danger">
                                            <div class="item-content">
                                                <div class="text--muted">Thu, 10 Mar</div>
                                                <p>Trip to the moon</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">Sat, 5 Mar</div>
                                                <p>Prepare for presentation</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-danger">
                                            <div class="item-content">
                                                <div class="text-small">Sun, 11 Feb</div>
                                                <p>Jessi assign you a task #Mockup Design.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">Thu, 17 Jan</div>
                                                <p>Follow up to close deal</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="item-content">
                                                <div class="text-small">Just now</div>
                                                <p>Finished task #features 4.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">11:30</div>
                                                <p>@Jessi retwit your post</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning border-l">
                                            <div class="item-content">
                                                <div class="text-small">10:30</div>
                                                <p>Call to customer #Jacob and discuss the detail.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning">
                                            <div class="item-content">
                                                <div class="text-small">3 days ago</div>
                                                <p>Jessi commented your post.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="usersettings">
                               <div class="body">
                                    <h2 class="card-inside-title">Security Settings</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" placeholder="Current Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" placeholder="New Password">
                                                </div>
                                            </div>
                                            <button class="btn btn-raised btn-success btn-sm">Save Changes</button>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Account Settings</h2>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="First Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="4" class="form-control no-resize" placeholder="Address Line 1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="E-mail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Country">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group checkbox">
                                                <label>
                                                    <input name="optionsCheckboxes" type="checkbox">
                                                    <span class="checkbox-material"><span class="check"></span></span> Profile Visibility For Everyone </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button class="btn btn-raised btn-success">Save Changes</button>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
