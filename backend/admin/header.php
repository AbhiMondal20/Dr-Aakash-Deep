<?php
    if (isset($_SESSION['login']) && $_SESSION['login']) {
        $email = $_SESSION['email'];

    } else {
        echo "<script>location.href='../index';</script>";
    }

    include '../db_conn.php';

    $sql = "SELECT * FROM info";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $title = $row['title'];
        $fav_icon = $row['fav_icon'];
        $logo = $row['logo'];
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css">
<link rel="stylesheet" href="assets/plugins/morrisjs/morris.css"/>

<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css"/>

<link rel="stylesheet" href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"/>
<!-- Sweet Alert CDN-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- Date Picker -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->
<link rel="icon" href="<?php echo $fav_icon; ?>">
<!-- Doctor Schedule calendar -->
<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css"/>

<link href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Wait Me Css -->
<link rel="stylesheet" href="assets/plugins/waitme/waitMe.css" />
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<!--Fontawsome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-lime">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- #Float icon -->
<ul id="f-menu" class="mfbc-br mfb-zoomin" data-mfb-toggle="hover">
    <li class="mfbc_wrap">
        <a href="javascript:void(0);" class="mfbcb-main g-bg-cyan">
            <i class="mfbcm-icon-resting zmdi zmdi-plus"></i>
            <i class="mfbcm-icon-active zmdi zmdi-close"></i>
        </a>
        <ul class="mfbc_list">
            <li><a href="doctor-schedule" data-mfb-label="Doctor Schedule" class="mfb-child bg-blue"><i class="zmdi zmdi-calendar mfbc_icon"></i></a></li>
            <li><a href="patients" data-mfb-label="Patients List" class="mfb-child bg-orange"><i class="zmdi zmdi-account-o mfbc_icon"></i></a></li>
            <li><a href="payments" data-mfb-label="Payments" class="mfb-child bg-purple"><i class="zmdi zmdi-balance-wallet mfbc_icon"></i></a></li>
        </ul>
    </li>
</ul>
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index"><img src="<?php echo $logo; ?>" alt="" srcset="" height="30px"></a> </div>
        <ul class="nav navbar-nav navbar-right">
           
        </ul>
    </div>
</nav>
<!-- #Top Bar -->

<!-- Need for users name -->
<?php
$sql = "SELECT * FROM user WHERE email = '$email'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $name = $row['name'];
}
?>

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img src="assets/images/user.webp" alt=""> </div>
            <div class="admin-action-info"> <span>Welcome</span>
                <h3><?php echo $name; ?></h3>
                <ul>
                    <li><a href="mail-inbox" title="Go to Inbox"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a href="profile" title="Go to Profile"><i class="zmdi zmdi-account"></i></a></li>
                    <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
                    <li><a href="../logout" title="sign out" ><i class="zmdi zmdi-sign-in"></i></a></li>
                </ul>
            </div>

<style>
        .stat-number{
            background: #ffffff none repeat scroll 0 0;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    -o-border-radius: 2px;
    border-radius: 2px;
    color: #424242;
    float: left;
    /* padding: 1px 0; */
    text-align: center;
    width: 100%;
    font-weight: 700;
        }
</style>
<div class="quick-stats">
    <h5>Today Report</h5>
    <ul>
        <li>
            <div class="stat-number">
                <span  id="today-patients-number">Loading...</span><br>
                <span >Patient</span>
            </div>
        </li>
        <li>
            <div class="stat-number">
                <span  id="today-pending-number">Loading...</span> <br>
                <span>Pending</span>
            </div>

        </li>
        <li>
            <div class="stat-number">
                <span id="today-visits-number">Loading...</span> <br>
                <span >Visit</span>
            </div>
        </li>
    </ul>
</div>

        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active open"><a href="index"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Appointment</span> </a>
                    <ul class="ml-menu">
                        <li><a href="doctor-schedule">Doctor Schedule</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa-solid fa-user-doctor"></i><span>Doctors</span> </a>
                    <ul class="ml-menu">
                        <li><a href="doctors">All Doctors</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa-solid fa-hospital-user"></i><span>Patients</span> </a>
                    <ul class="ml-menu">
                        <li><a href="patients">All Patients</a></li>
                        <li><a href="prescription">Prescription</a></li>
                        <li><a href="patient-invoice">Patient Invoice</a></li>
                    </ul>
                </li>
                <li><a href="blogs" class="menu-toggle1"><i class="fa-solid fa-blog"></i><span>Blog</span></a></li>
                <li><a href="user" class="menu-toggle1"><i class="zmdi zmdi-account-add"></i><span>Add User</span></a></li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>

    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Setting</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red"><div class="red"></div><span>Red</span> </li>
                    <li data-theme="purple"><div class="purple"></div><span>Purple</span> </li>
                    <li data-theme="blue"><div class="blue"></div><span>Blue</span> </li>
                    <li data-theme="cyan" class="active"><div class="cyan"></div><span>Cyan</span> </li>
                    <li data-theme="green"><div class="green"></div><span>Green</span> </li>
                    <li data-theme="deep-orange"><div class="deep-orange"></div><span>Deep Orange</span> </li>
                    <li data-theme="blue-grey"><div class="blue-grey"></div><span>Blue Grey</span> </li>
                    <li data-theme="black"><div class="black"></div><span>Black</span> </li>
                    <li data-theme="blush"><div class="blush"></div><span>Blush</span> </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
                <div class="demo-settings">
                    <p>General settings</p>
                    <ul class="setting-list">
                        <li>
                        	<span>Report Panel Usage</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span>
                            	</label>
                            </div>
                        </li>
                        <li>
                        	<span>Email Redirect</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span>
                            	</label>
                            </div>
                        </li>
                    </ul>
                    <p>System settings</p>
                    <ul class="setting-list">
                        <li>
                        	<span>Auto Updates</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>Account settings</p>
                    <ul class="setting-list">
                        <li>
                        	<span>Offline</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                        	<span>Location Permission</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>

</section>

<script>
    // Function to fetch quick statistics and update the values
    function fetchQuickStats() {
        $.ajax({
            url: "load/get_header__quick_stats.php", // Your PHP file to fetch quick statistics
            type: "GET",
            dataType: "json",
            success: function (data) {
                // Update today's patients
                $('#today-patients-number').text(data.today_total_patients);

                // Update today's pending
                $('#today-pending-number').text(data.pending_patients);

                // Update today's visits
                $('#today-visits-number').text(data.visit_patients);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Call the fetchQuickStats function initially to populate the quick statistics
    fetchQuickStats();

    // Set an interval to fetch quick statistics and update the values every few seconds (e.g., 5 seconds)
    setInterval(fetchQuickStats, 5000); // Adjust the interval as needed
</script>
