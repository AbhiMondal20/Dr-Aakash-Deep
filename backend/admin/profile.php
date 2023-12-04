<?php
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login']) { 
        $email = $_SESSION['email'];
      
    }else{
        echo "<script>location.href='../index';</script>";
    }


include('header.php');
?>
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img src="assets/images/random-avatar7.jpg" alt=""> </div>
            <div class="admin-action-info"> <span>Welcome</span>
                <h3>Dr. John</h3>
                <ul>
                    <li><a href="mail-inbox.html" title="Go to Inbox"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a href="profile.html" title="Go to Profile"><i class="zmdi zmdi-account"></i></a></li>
                    <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
                    <li><a href="sign-in.html" title="sign out" ><i class="zmdi zmdi-sign-in"></i></a></li>
                </ul>
            </div>
            <div class="quick-stats">
                <h5>Today Report</h5>
                <ul>
                    <li><span>16<i>Patient</i></span></li>
                    <li><span>20<i>Panding</i></span></li>
                    <li><span>04<i>Visit</i></span></li>
                </ul>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li><a href="index-2.html"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>                                               
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Appointment</span> </a>
                    <ul class="ml-menu">
                        <li><a href="doctor-schedule.html">Doctor Schedule</a></li>
                        <li><a href="book-appointment.html">Book Appointment</a></li>
                    </ul>
                </li>
                <li  class="active open"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>Doctors</span> </a>
                    <ul class="ml-menu">
                        <li><a href="doctors.html">All Doctors</a></li>
                        <li><a href="add-doctor.html">Add Doctor</a></li>                       
                        <li class="active"><a href="profile.html">Doctor Profile</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Patients</span> </a>
                    <ul class="ml-menu">
                        <li><a href="patients.html">All Patients</a></li>
                        <li><a href="add-patient.html">Add Patient</a></li>                       
                        <li><a href="patient-profile.html">Patient Profile</a></li>
                        <li><a href="patient-invoice.html">Patient Invoice</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-balance-wallet"></i><span>Payments</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="payments.html">Payments</a></li>
                        <li> <a href="add-payments.html">Add Payment</a></li>
                        <li> <a href="patient-invoice.html">Patient Invoice</a></li>
                    </ul>
                </li>
                <li><a href="reports.html"><i class="zmdi zmdi-file-text"></i><span>Reports</span></a></li>
                <li><a href="widgets.html"><i class="zmdi zmdi-delicious"></i><span>Widgets</span></a></li>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Extra Pages</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="sign-in.html">Sign In</a> </li>
                        <li> <a href="sign-up.html">Sign Up</a> </li>
                        <li> <a href="forgot-password.html">Forgot Password</a> </li>
                        <li> <a href="404.html">Page 404</a> </li>
                        <li> <a href="500.html">Page 500</a> </li>
                        <li> <a href="page-offline.html">Page Offline</a> </li>
                        <li> <a href="locked.html">Locked Screen</a> </li>
                        <li> <a href="blank.html">Blank Page</a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>User Interface (UI)</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="typography.html">Typography</a> </li>
                        <li> <a href="helper-classes.html">Helper Classes</a></li>
                        <li> <a href="alerts.html">Alerts</a> </li>
                        <li> <a href="animations.html">Animations</a> </li>
                        <li> <a href="badges.html">Badges</a> </li>
                        <li> <a href="breadcrumbs.html">Breadcrumbs</a> </li>
                        <li> <a href="buttons.html">Buttons</a> </li>
                        <li> <a href="collapse.html">Collapse</a> </li>
                        <li> <a href="colors.html">Colors</a> </li>
                        <li> <a href="dialogs.html">Dialogs</a> </li>
                        <li> <a href="icons.html">Icons</a> </li>
                        <li> <a href="labels.html">Labels</a> </li>
                        <li> <a href="list-group.html">List Group</a> </li>
                        <li> <a href="media-object.html">Media Object</a> </li>
                        <li> <a href="modals.html">Modals</a> </li>
                        <li> <a href="notifications.html">Notifications</a> </li>
                        <li> <a href="pagination.html">Pagination</a> </li>
                        <li> <a href="preloaders.html">Preloaders</a> </li>
                        <li> <a href="progressbars.html">Progress Bars</a> </li>
                        <li> <a href="range-sliders.html">Range Sliders</a> </li>
                        <li> <a href="sortable-nestable.html">Sortable & Nestable</a> </li>
                        <li> <a href="tabs.html">Tabs</a> </li>
                        <li> <a href="waves.html">Waves</a> </li>
                    </ul>
                </li>
                <li class="header">LABELS</li>
                <li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-red"></i><span>Important</span> </a> </li>
                <li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-amber"></i><span>Warning</span> </a> </li>
                <li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-blue"></i><span>Information</span> </a> </li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat">Chat</a></li>
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
            <div role="tabpanel" class="tab-pane" id="chat">
                <div class="demo-settings">
                    <div class="search">
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Search..." required autofocus>
                            </div>
                        </div>
                    </div>
                    <h6>Recent</h6>
                    <ul>
                        <li class="online">
                            <div class="media">
                                <a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar1.jpg" alt=""></a>
                                <div class="media-body">
                                    <span class="name">Claire Sassu</span>
                                    <span class="message">Can you share the</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media">
                                <a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar2.jpg" alt=""></a>
                                <div class="media-body">
                                    <span class="name">Maggie jackson</span>
                                    <span class="message">Can you share the</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media">
                                <a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar3.jpg" alt=""></a>
                                <div class="media-body">
                                    <span class="name">Joel King</span>
                                    <span class="message">Ready for the meeti</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <h6>Contacts</h6>
                    <ul class="contacts_list">
                        <li class="offline">
                            <div class="media">
                                <a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar4.jpg" alt=""></a>
                                <div class="media-body">
                                    <span class="name">Hossein Shams</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media">
                                <a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar1.jpg" alt=""></a>
                                <div class="media-body">
                                    <span class="name">Maryam Amiri</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                        <li class="offline">
                            <div class="media">
                                <a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar2.jpg" alt=""></a>
                                <div class="media-body">
                                    <span class="name">Gary Camara</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
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
                        	<span>Notifications</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span>
                            	</label>
                            </div>
                        </li>
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

<section class="content profile-page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 p-l-0 p-r-0">
                <section class="boxs-simple">
                    <div class="profile-header">
                        <div class="profile_info">
                            <div class="profile-image"> <img src="assets/images/random-avatar7.jpg" alt=""> </div>
                            <h4 class="mb-0"><strong>Dr. John</strong> Smith</h4>
                            <span class="text-muted col-white">Dentist</span>
                            <div class="mt-10">
                                <button class="btn btn-raised btn-default bg-blush btn-sm">Follow</button>
                                <button class="btn btn-raised btn-default bg-green btn-sm">Message</button>
                            </div>
                            <p class="social-icon">
                                <a title="Twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                                <a title="Facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                                <a title="Google-plus" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                                <a title="Dribbble" href="javascript:void(0);"><i class="zmdi zmdi-dribbble"></i></a>
                                <a title="Behance" href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a>
                                <a title="Instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram "></i></a>
                                <a title="Pinterest" href="javascript:void(0);"><i class="zmdi zmdi-pinterest "></i></a>
                            </p>
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
                        <h2>About Me</h2>
                    </div>
                    <div class="body">
                        <p class="text-default">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <small>Designer <cite title="Source Title">Source Title</cite></small> </blockquote>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2>My Portfolio Status</h2>
                    </div>
                    <div class="body">
                        <ul class="list-unstyled">
                            <li>
                                <div>Behance</div>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Themeforest</div>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Dribbble</div>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Pinterest</div>
                                <div class="progress">
                                    <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                </div>
                            </li>
                        </ul>
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
                                    <div class="mypost-form">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>
                                        <div class="post-toolbar-b"> <a href="javascript:void(0);" tooltip="Add File" class="btn btn-raised btn-default btn-sm"><i class="zmdi zmdi-attachment"></i></a> <a href="javascript:void(0);" tooltip="Add Image" class="btn btn-raised btn-default btn-sm"><i class="zmdi zmdi-camera"></i></a> <a href="javascript:void(0);" class="pull-right btn btn-raised btn-success btn-sm" tooltip="Post it!">Post</a> </div>
                                    </div>
                                    <div class="mypost-list">
                                        <div class="post-box">
                                            <span class="text-muted text-small"><i class="zmdi zmdi-alarm"></i> 3 minutes ago</span>
                                            <div class="post-img"><img src="http://via.placeholder.com/1000x400" class="img-fluid" alt /></div>
                                            <div>
                                                <h5>Lorem Ipsum is simply dummy text of the printing</h5>
                                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                                                <p> <a href="javascript:void(0);" class="btn btn-raised btn-info btn-sm"><i class="zmdi zmdi-favorite-outline"></i> Like (5) </a> <a href="javascript:void(0);" class="btn btn-raised bg-soundcloud btn-sm"><i class="zmdi zmdi-long-arrow-return"></i> Reply</a> </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="post-box">
                                            <span class="text-muted text-small"><i class="zmdi zmdi-alarm"></i> 23 minutes ago</span>
                                            <div class="post-img"><img src="http://via.placeholder.com/1000x400" class="img-fluid" alt /></div>
                                            <div>
                                                <h5>Lorem Ipsum is simply dummy text of the printing</h5>
                                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                                                <p> <a href="javascript:void(0);" class="btn btn-raised btn-info btn-sm"><i class="zmdi zmdi-favorite-outline"></i> Like (5) </a> <a href="javascript:void(0);" class="btn btn-raised bg-soundcloud btn-sm"><i class="zmdi zmdi-long-arrow-return"></i> Reply</a> </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="post-box">
                                            <span class="text-muted text-small"><i class="zmdi zmdi-alarm"></i> 45 minutes ago</span>
                                            <div class="post-img"><img src="http://via.placeholder.com/1000x400" class="img-fluid" alt /></div>
                                            <div>
                                                <h5>Lorem Ipsum is simply dummy text of the printing</h5>
                                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                                                <p> <a href="javascript:void(0);" class="btn btn-raised btn-info btn-sm"><i class="zmdi zmdi-favorite-outline"></i> Like (5) </a> <a href="javascript:void(0);" class="btn btn-raised bg-soundcloud btn-sm"><i class="zmdi zmdi-long-arrow-return"></i> Reply</a> </p>
                                            </div>
                                        </div>
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
    incldue('footer.php');
?>