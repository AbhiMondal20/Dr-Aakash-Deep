<?php
    include('header.php');
    $id = $_GET['id'];
    $title = $_GET['title'];
    $sql = "SELECT * FROM blogs WHERE id = '$id' AND title = '$title'";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $title = $row['title'];
        $upload_date = $row['upload_date'];
        $description = $row['description'];
        $arc_images = $row['arc_images'];
        $images = $row['images'];
        $status = $row['status'];
        $date = date('d-M-Y', strtotime($row['upload_date']));
    }
?>
    <section class="doctors-section wf-section">
        <div class="main-container w-container">
            <div class="doctors-container">
                <div class="doctors-plans-heading">
                    <div class="doctors-hero-header">
                        <div class="body---variant-1 bold">Blog</div>
                    </div>
                    <div class="h3 bold">
                        <?php echo $title; ?>
                    </div>
                </div>
                <div class="doctors-blocks-wrapper2">
                    <div class="doctor-block2">
                        <img src="<?php echo 'backend/admin/' . $images; ?>" loading="lazy"
                            sizes="(max-width: 479px) 92vw, (max-width: 767px) 94vw, (max-width: 991px) 39vw, 350px" srcset="<?php echo 'backend/admin/' . $images; ?> 500w,
                            <?php echo 'backend/admin/' . $images; ?> 704w" alt="doctor&#x27;s image"
                            class="doctor-image" />
                        <div class="doctor-block-text">
                            <div class="paragraph-wrapper">
                                <?php echo $description; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>





