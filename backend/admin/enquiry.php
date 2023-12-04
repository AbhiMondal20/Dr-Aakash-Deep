<?php

session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) { 
    $email = $_SESSION['email'];
  
}else{
    echo "<script>location.href='../index';</script>";
}

include('header.php');
?>
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Quick Enquiry</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Quick Enquiry  </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu float-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Preferred Time To Call</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                         $sql = "SELECT * FROM web_enquiry ORDER BY id DESC";
                                     $res = mysqli_query($conn, $sql);
                                     $sno = 0;
                                     while ($row = mysqli_fetch_assoc($res)) 
                                     {
                                        $sno = $sno + 1;
                                        $name = $row['name'];
                                        $mobile = $row['mobile'];
                                        $time = $row['time'];
                                        $old_date = $row["date"];
                                        $middle = strtotime($old_date);
                                        $date = date("d-m-Y ", $middle);
                                        echo '  
                                        <tr>
                                        <td>'.$sno.'</td>
                                        <td>'.$name.' </td>
                                        <td><a href="tel:'.$mobile.'">'.$mobile.'</a></td>
                                        <td>'.$time.'</td>
                                        <td>'.$date.'</td>
                                        </tr>';

                                     }

                                    ?>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






<?php include('footer.php'); ?>