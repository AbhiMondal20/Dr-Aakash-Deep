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
          <input type="text" class="contact-field w-input" maxlength="256" name="name" placeholder="Name" required="" />
          <input type="tel" class="contact-field w-input" maxlength="10" name="phone" placeholder="Phone" required="" />
          <input type="email" class="contact-field w-input" maxlength="256" name="email" placeholder="Email"
            required="" />
          <select name="services" class="contact-select-field w-select">
            <option value="All" selected="selected">- Select Services -</option>
            <option value="Central Retinal Vein Occlusion (CRVO)">Central Retinal Vein Occlusion (CRVO)</option>
            <option value="Retinal Tear">Retinal Tear</option>
            <option value="Retinal Detachment">Retinal Detachment</option>
            <option value="Branch Retinal Vein Occlusion (BRVO)">Branch Retinal Vein Occlusion (BRVO)</option>
            <option value="Diabetic Retinopathy">Diabetic Retinopathy</option>
            <option value="Epiretinal Membrane">Epiretinal Membrane</option>
            <option value="Macular Hole">Macular Hole</option>
            <option value="Macular Degeneration">Macular Degeneration</option>
            <option value="Retinitis Pigmentosa">Retinitis Pigmentosa</option>
            <option value="Retinopathy of Prematurity">Retinopathy of Prematurity</option>
          </select>
          <textarea name="message" maxlength="5000" placeholder="Message"
            class="contact-message-field w-input"></textarea>
          <div class="contact-form-btn">
            <input type="submit" value="Submit Now" class="primary-btn w-button" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Get An Appointment -->
<?php include('footer.php'); ?>