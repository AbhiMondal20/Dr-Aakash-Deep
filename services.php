<?php include('header.php'); ?>

<section class="doctors-section wf-section">
      <div class="main-container w-container">
        <div class="doctors-container">
          <div class="doctors-plans-heading">
            <div class="doctors-hero-header">
              <div class="body---variant-1 bold">Services</div>
            </div>
            <div class="heading-wrapper">
              <h1 class="display-title bold">
              Dr. Aakash Deep is Dedicated to provide best the treatment.
              </h1>
            </div>
          </div>
          <div class="doctors-blocks-wrapper">
          <?php
              $sql = "SELECT * FROM services";
              $res = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $words = explode(' ', $description);
                $limited_words = array_slice($words, 0, 20);
                $limited_description = implode(' ', $limited_words);
                $arc_images = $row['arc_images'];
                $images = $row['images'];
                $status = $row['status'];
           ?>
            <div class="doctor-block">
              <img
                src="backend/admin/<?php echo $arc_images; ?>"
                loading="lazy"
                sizes="(max-width: 479px) 92vw, (max-width: 767px) 94vw, (max-width: 991px) 39vw, 350px"
                srcset="backend/admin/<?php echo $arc_images; ?>, backend/admin/<?php echo $arc_images; ?> 704w"
                alt="doctor&#x27;s image" class="doctor-image"/>
              <div class="doctor-block-text">
                <div class="h4 bold"><?php echo $title; ?></div>
                <div class="paragraph-wrapper">
                  <p class="body---variant-1 medium">
                    <?php echo $limited_description; ?> ...
                  </p>
                </div>
                <div class="appointment-cta">
                  <a href="services-details?id=<?php echo $id; ?>&title=<?php echo $title; ?>" class="primary-btn _15px w-button">Know More</a>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
<?php include('footer.php'); ?>