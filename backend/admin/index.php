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
            <small class="text-muted">Welcome to Paramount Hospital</small>
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
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> New Patient List </h2>
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
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                        <th>Share</th>
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
    </div>
</section>

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