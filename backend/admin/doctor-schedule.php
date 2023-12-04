<?php

session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) { 
    $email = $_SESSION['email'];
  
}else{
    echo "<script>location.href='../index';</script>";
}

include('header.php');
?>

<section class="content page-calendar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-5 col-xl-4">
                <div class="card m-t-20">
                    <div class="body">
                        <button type="button" class="btn btn-raised btn-primary btn-sm m-t-0" data-toggle="modal" data-target="#add_new_schedule"> <i class="zmdi zmdi-plus"></i> 
                        
                        New Schedule</button>  
                                            
                        <?php
                            $sql = "SELECT schedule.id AS schedule_id, user.name AS name, schedule.status AS status FROM schedule 
                                INNER JOIN user ON schedule.user_id = user.id WHERE  DATE(schedule.start) = CURDATE();";
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($res)) {
                                $schedule_id = $row['schedule_id'];
                                $name = $row['name'];
                                $status = $row['status'];
                        ?>
                        <div class="event-name b-greensea">Custom Schedule of # <a href="doctors" ><?php echo $name; ?></a> <?php if($status =='0') { echo '<span class="badge" style="background-color:red; color:white;">Deactive</span>'; }?><a  href="edit_schedule?schedule_id=<?php echo $schedule_id; ?>" class="text-muted event-remove"><i class="zmdi zmdi-edit"></i></a></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card">
                <div class="body">
                <h5 class="font-16">BOOKED SCHEDULE <a href="booked-schedule" class="font-11 m-4">View All</a></h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Appt. Date</th>
                                    <th>Doctor</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                         $sql = "SELECT user.name AS dr_name,patient.id AS id, patient.name AS name, patient.email AS email, patient.mobile AS mobile, patient.gender AS gender, patient.address AS address, patient.appt_time AS appt_time, patient.status AS status, dept.name AS dept_name, schedule.start AS appt_date FROM patient 
                                         lEFT JOIN user ON patient.user_id = user.id
                                         LEFT JOIN dept ON patient.dept_id = dept.id
                                         LEFT JOIN schedule ON patient.appt_date = schedule.id
                                         WHERE patient.status = 0 AND DATE(schedule.start) = CURDATE()
                                      ORDER BY patient.id DESC LIMIT 4";
                                     $res = mysqli_query($conn, $sql);
                                     $sno = 0;
                                     while ($row = mysqli_fetch_assoc($res)) 
                                     {
                                        $sno = $sno + 1;
                                         // patient Table
                                        $name = $row['name'];
                                        $p_email = $row['email'];
                                        $mobile = $row['mobile'];
                                        $gender = $row['gender'];
                         
                                        
                                        $old_date = $row["appt_date"];
                                        $middle = strtotime($old_date);
                                        $appt_date = date("d-m-Y ", $middle);
                                        $appt_time = $row['appt_time'];
                                        $address = $row['address'];
                                        $status = $row['status'];
                         
                                         // User table 
                                        $dr_name = $row['dr_name'];
                                        
                                         // Dept Table   
                                        $dept_name = $row['dept_name'];
        
                                        echo '  
                                        <tr>
                                        <td>'.$sno.'</td>
                                        <td>'.$name.' </td>
                                        <td>'.$appt_date.' : '.$appt_time.'</td>
                                        <td>'.$dr_name.'</td>
                                        </tr>';

                                     }

                                    ?>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-7 col-xl-8">
                <div class="card m-t-20">
                    <div class="body">
                        <button class="btn btn-raised btn-success btn-sm m-r-0 m-t-0" id="change-view-today">today</button>
                        <button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-day" >Day</button>
                        <button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-week">Week</button>
                        <button class="btn btn-raised btn-default btn-sm m-r-0 m-t-0" id="change-view-month">Month</button>                        
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- Schedule Modal -->

<div class="modal fade" id="add_new_schedule" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_new_scheduleLabel">Add New schedule</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="card">
                            <div class="body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
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
                                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="datetime-local" class="datetimepicker2 form-control" name="start" placeholder="Please choose date & time...">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="datetime-local" class="datetimepicker2 form-control" name="end" placeholder="Please choose date & time...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="display:none">
                                            <div class="form-group drop-custum">
                                                <select class="form-control show-tick" name="added_by">
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
        </div>
    </div>
</div>


<?php
    if(isset($_POST['save']))
    {
        $user_id = $_POST['user_id'];
        // $schedule = $_POST['schedule'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        $added_by = $_POST['added_by'];

        $sql = "INSERT INTO `schedule`(`user_id`, `start`, `end`, `added_by`) VALUES ('$user_id','$start','$end','$added_by')";
        $res = mysqli_query($conn, $sql);
        
        if($res){
            echo '<script>swal("Successfull", "New Schedule has been Successfully Added", "success")
            setTimeout(function(){
                window.location.href =  window.location.href;
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

<!-- calender script -->
<script>
    "use strict";
    $('#calendar').fullCalendar({
    header: {
        left: 'prev',
        center: 'title',
        right: 'next'
    },
    defaultDate: '2023-09-20',
    editable: true,
    droppable: true,
    drop: function() {
        if ($('#drop-remove').is(':checked')) {
            $(this).remove();
        }
    },
    eventLimit: true,
    events: [
        <?php
            $sql = "SELECT * FROM schedule 
                INNER JOIN user ON schedule.user_id = user.id";
            $res = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $name = $row['name'];
                $start = $row['start'];
                $end = $row['end'];

                echo "{
                    title: '$name',
                    start: '$start',
                    end: '$end',
                    className: 'b-l b-2x b-greensea'
                },";
            }
        ?>
    ]
});


    // Hide default header
    //$('.fc-header').hide();



    // Previous month action
    $('#cal-prev').click(function(){
        $('#calendar').fullCalendar( 'prev' );
    });

    // Next month action
    $('#cal-next').click(function(){
        $('#calendar').fullCalendar( 'next' );
    });

    // Change to month view
    $('#change-view-month').click(function(){
        $('#calendar').fullCalendar('changeView', 'month');

        // safari fix
        $('#content .main').fadeOut(0, function() {
            setTimeout( function() {
                $('#content .main').css({'display':'table'});
            }, 0);
        });

    });

    // Change to week view
    $('#change-view-week').click(function(){
        $('#calendar').fullCalendar( 'changeView', 'agendaWeek');

        // safari fix
        $('#content .main').fadeOut(0, function() {
            setTimeout( function() {
                $('#content .main').css({'display':'table'});
            }, 0);
        });

    });

    // Change to day view
    $('#change-view-day').click(function(){
        $('#calendar').fullCalendar( 'changeView','agendaDay');

        // safari fix
        $('#content .main').fadeOut(0, function() {
            setTimeout( function() {
                $('#content .main').css({'display':'table'});
            }, 0);
        });

    });

    // Change to today view
    $('#change-view-today').click(function(){
        $('#calendar').fullCalendar('today');
    });

    /* initialize the external events
     -----------------------------------------------------------------*/
    $('#external-events .event-control').each(function() {

        // store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true // maintain when user navigates (see docs on the renderEvent method)
        });

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });

    $('#external-events .event-control .event-remove').on('click', function(){
        $(this).parent().remove();
    });

    // Submitting new event form
    $('#add-event').submit(function(e){
        e.preventDefault();
        var form = $(this);

        var newEvent = $('<div class="event-control p-10 mb-10">'+$('#event-title').val() +'<a class="pull-right text-muted event-remove"><i class="fa fa-trash-o"></i></a></div>');

        $('#external-events .event-control:last').after(newEvent);

        $('#external-events .event-control').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });

        $('#external-events .event-control .event-remove').on('click', function(){
            $(this).parent().remove();
        });

        form[0].reset();

        $('#cal-new-event').modal('hide');

    });
</script>
