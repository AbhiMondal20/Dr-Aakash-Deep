<div class="color-bg"></div>

<!-- History Back Script -->
<script>
    function goBack() {
  window.history.back();
}
</script>


<!-- Upload File Format Script-->
<script>

    // data table script

    let table = new DataTable('#myTable');

    const fileInput = document.getElementById('fileToUpload');
    fileInput.addEventListener('change', () => {
        const allowedExtensions = /(\.webp|\.png)$/i;
        const maxSizeMB = 5;
        const fileSizeMB = fileInput.files[0].size / (1024 * 1024);
        const fileName = fileInput.value;
        if (!allowedExtensions.exec(fileName)) {
            swal({
                title: 'Invalid!',
                text: 'Invalid file format. Only WEBP and PNG files are allowed.',
                icon: 'error',
                button: 'Ok',
            });
            fileInput.value = '';
            return false;
        } else if (fileSizeMB > maxSizeMB) {
            swal({
                title: 'Invalid!',
                text: 'File size exceeds the maximum allowed size of 5 MB.',
                icon: 'error',
                button: 'Ok',
            });
            fileInput.value = '';
            return false;
        }
    });
</script>


<!-- Jquery Core Js --> 
<!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/chartscripts.bundle.js"></script> <!-- Chart Plugins Js -->
<script src="assets/bundles/sparklinescripts.bundle.js"></script> <!-- Chart Plugins Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/index.js"></script>
<script src="assets/js/pages/charts/sparkline.min.js"></script>

<script src="assets/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 
<script src="assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js -->
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 
<script src="assets/bundles/datatablescripts.bundle.js"></script><!-- Jquery DataTable Plugin Js -->

<script src="assets/js/morphing.js"></script><!-- Custom Js -->  
<script src="assets/js/pages/tables/jquery-datatable.js"></script>


<!--/ calender javascripts --> 
<script src="assets/bundles/fullcalendarscripts.bundle.js"></script>


<script src="assets/js/pages/forms/basic-form-elements.js"></script>
<!-- <script src="assets/js/pages/calendar/calendar.js"></script> -->

</body>
</html>