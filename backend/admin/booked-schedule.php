<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $email = $_SESSION['email'];
} else {
    echo "<script>location.href='../index';</script>";
}

include 'header.php';
?>

<a  href="javascript:void(0)" onclick="goBack()"> <i class="material-icons">chevron_left</i> </a>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>New Patient List</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                    <h2>Patient List</h2>
                    <div class="body">
                        <form action="" method="GET">
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="from" class="datepicker2 form-control" placeholder="DD-MM-YYYY" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="to" class="datepicke2 form-control" placeholder="DD-MM-YYYY" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <button type="submit" class="btn btn-raised g-bg-cyan">Filter</button>
                                </div> -->
                            </div>
                        </form>
                    </div>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu float-right">
                                    <li><a href="load/export_csv" class=" waves-effect waves-block">Export CSV</a></li>
                                    <li><a href="load/export_pdf" class=" waves-effect waves-block">Export PDF</a></li>
                                    <li><a href="load/export_txt" class=" waves-effect waves-block">Export Text</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Appt. Date</th>
                                <th>Address</th>
                                <th>Doctor</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    // Function to fetch data and update the table
    function fetchData() {
        var fromDate = $('input[name="from"]').val();
        var toDate = $('input[name="to"]').val();

        $.ajax({
            url: "load/get_booked_schedule.php", // Your PHP file to fetch data
            type: "GET",
            data: { from: fromDate, to: toDate },
            dataType: "json",
            success: function (data) {
                var html = '';
                $.each(data, function (index, item) {
                    var statusHtml = item.status == '1' ?
                        "<button class='btn btn-sm bg-cyan waves-effect' type='button'>Visited <span class='badge'></span></button>" :
                        "<button class='btn btn-sm bg-red waves-effect' type='button'>Not Visit <span class='badge'></span></button>";

                     // Convert date format from "28 18:00:00-07-2023" to "28-07-2023"
                     var dateTimeParts = item.appt_date.split(" ");
                    var dateParts = dateTimeParts[0].split("-");
                    var apptDateFormatted = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0];

                    html += '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + item.name + '</td>' +
                        '<td>' + item.email + '</td>' +
                        '<td>' + item.mobile + '</td>' +
                        '<td>' + apptDateFormatted + ' : ' + item.appt_time + '</td>' +
                        '<td>' + item.address + '</td>' +
                        '<td>' + item.dr_name + '</td>' +
                        '<td>' + statusHtml + '</td>' +
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

<?php include 'footer.php';?>
