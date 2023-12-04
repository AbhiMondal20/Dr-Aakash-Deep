<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $login_email = $_SESSION['email'];
} else {
    echo "<script>location.href='../index';</script>";
}
include 'header.php';
// if (isset($_GET['id']) && isset($_GET['regId'])) {
//     $patient_id = $_GET['id'];
//     $regId = $_GET['regId'];

//     $sql = "SELECT * FROM patient WHERE id = '$patient_id' AND reg_id = '$regId'";
//     $res = mysqli_query($conn, $sql);
//     if ($row = mysqli_fetch_assoc($res)) {
//         $name = $row['name'];
//         $email = $row['email'];
//         $mobile = $row['mobile'];
//         $age = $row['age'];
//         $gender = $row['gender'];
//         $bp = $row['bp'];
//         $weight = $row['weight'];
//         $dept = $row['dept'];
//         $old_date = $row["reg_date"];
//         $middle = strtotime($old_date);
//         $reg_date = date("d-m-Y", $middle);
//         $address = $row['address'];
//         $status = $row['status'];
//     }
// }
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Patient Prescription</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="header">
                        <h2>Prescription</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-12">
                                <div class="media">
                                    <img class="align-self-start mr-3" src="assets/images/logo-placeholder.jpg" width="70" alt="Swift">
                                    <div class="media-body">
                                        <h4>Invoice # <br>
                                            <strong>2015-04-5654667546</strong>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <address>
                                    <strong>Twitter, Inc.</strong><br>
                                    795 Folsom Ave, Suite 546<br>
                                    San Francisco, CA 54656<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-34636
                                </address>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <p><strong>Order Date: </strong> Jun 15, 2016</p>
                                <p class="mb-0"><strong>Order Status: </strong> <span class="badge bg-orange">Pending</span></p>
                                <p class="mb-0"><strong>Order ID: </strong> #123456</p>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="mainTable" class="table table-striped" style="cursor: pointer;">
                                        <thead>
                                            <tr><th>#</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Total</th>
                                        </tr></thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>LCD</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>1</td>
                                                <td>$380</td>
                                                <td>$380</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Mobile</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>5</td>
                                                <td>$50</td>
                                                <td>$250</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>LED</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>2</td>
                                                <td>$500</td>
                                                <td>$1000</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>LCD</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>3</td>
                                                <td>$300</td>
                                                <td>$900</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Mobile</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>5</td>
                                                <td>$80</td>
                                                <td>$400</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <p class="text-right mb-0"><b>Sub-total:</b> 2930.00</p>
                                <p class="text-right mb-0">Discout: 12.9%</p>
                                <p class="text-right mb-0">VAT: 12.9%</p>
                            </div>                                    
                            <div class="col-md-12 text-right hidden-print">
                                <hr>
                                <a href="javascript:window.print()" class="btn btn-raised btn-success"><i class="zmdi zmdi-print"></i></a>
                                <a href="javascript:void(0);" class="btn btn-raised btn-default">Submit</a>
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include 'footer.php' ?>