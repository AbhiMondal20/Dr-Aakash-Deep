<?php 
  include('header.php'); 
  if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $services = $_POST['services'];
    $message = $_POST['message'];
    $stmt = $conn->prepare("INSERT INTO `appt`(`name`, `phone`, `email`, `services`, `message`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $phone, $email, $services, $message);  
    // Execute the query
    if ($stmt->execute()) {
        echo "<script>
                alert('Success!');
                setTimeout(function(){
                    window.location.href = '../contact';
                }, 2000);
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
  }
?>


<!-- Get An Appointment -->
<div class="contact-section wf-section">
  <div class="main-container w-container">
    <div class="contact-container">
      <div data-w-id="8f7453ea-972b-fbdc-9ff1-403c9292132e" class="contact-text-wrapper">
        <div class="contact-header">
          Appointment
        </div>
        <div class="heading-wrapper">
          <h3 class="h2 bold">
            Get in touch to book your first appointment
          </h3>
        </div>
        <p class="body---variant-3 medium">
          Reach out today to secure clarity tomorrow – your first step to brighter vision awaits!
        </p>
        <div class="contact-points-wrapper">
          <a href="tel:+919046152200" class="contact-point w-inline-block">
            <img loading="lazy" src="assets/img/phoneIcon.svg" alt="" class="contact-point-icon" />
            <div class="body medium">
              +91 9046152200
            </div>
          </a>
          <a href="mailto:help@draakashdeep.com" class="contact-point w-inline-block">
            <img loading="lazy" src="assets/img/mailIcon.svg" alt="" class="contact-point-icon" />
            <div class="body medium">
              help@draakashdeep.com
            </div>
          </a>
        </div>
      </div>
      <div class="contact-form-wrapper w-form">
        <form method="get" class="contact-form" action="get_contact">
            <input type="text" class="contact-field w-input" maxlength="255" name="name" data-name="Name"
              placeholder="Name" id="Name" required="" />
            <input type="tel" class="contact-field w-input" maxlength="10" name="phone" data-name="Phone"
              placeholder="Phone" id="Phone-2" required="" />
              <input type="date" class="contact-field w-input" maxlength="255" name="appt_date" data-name="date"
              placeholder="Date" required="" />
            <textarea id="address" name="address" maxlength="255" data-name="field" placeholder="Address"
              class="contact-message-field w-input"></textarea>
            <div class="contact-form-btn">
              <input type="submit" value="Book Now" data-wait="Please wait..." class="primary-btn w-button" />
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- End Get An Appointment -->
<?php include('footer.php'); ?>