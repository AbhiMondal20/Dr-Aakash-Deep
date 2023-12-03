<?php include('header.php'); ?>
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
            <img loading="lazy" src="assets/img/phoneIcon.svg" alt=""
              class="contact-point-icon" />
            <div class="body medium">
              +91 9046152200
            </div>
          </a>
          <a href="mailto:help@draakashdeep.com" class="contact-point w-inline-block">
            <img loading="lazy" src="assets/img/mailIcon.svg" alt=""
              class="contact-point-icon" />
            <div class="body medium">
              help@draakashdeep.com
            </div>
          </a>
        </div>
      </div>
      <div class="contact-form-wrapper w-form">
        <form id="wf-form-Contact-Form" name="wf-form-Contact-Form" data-name="Contact Form" method="get"
          class="contact-form">
          <input type="text" class="contact-field w-input" maxlength="256" name="Name" data-name="Name"
            placeholder="Name" id="Name" required="" />
          <input type="tel" class="contact-field w-input" maxlength="256" name="Phone" data-name="Phone"
            placeholder="Phone" id="Phone-2" required="" />
          <input type="email" class="contact-field w-input" maxlength="256" name="Email" data-name="Email"
            placeholder="Email" id="email" required="" />
          <select id="field" name="field" data-name="Field" class="contact-select-field w-select">
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
          <textarea id="Message" name="Message" maxlength="5000" data-name="field" placeholder="Message"
            class="contact-message-field w-input"></textarea>
          <div class="contact-form-btn">
            <input type="submit" value="Submit Now" data-wait="Please wait..." class="primary-btn w-button" />
          </div>
        </form>
        <div class="w-form-done">
          <div>
            Thank you! Your submission has been received!
          </div>
        </div>
        <div class="w-form-fail">
          <div>
            Oops! Something went wrong while submitting the form.
          </div>
        </div>
        <div class="contact-circle">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Get An Appointment -->

<?php include('footer.php'); ?>