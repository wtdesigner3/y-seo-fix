<?php
include 'inc/function.php';
$breadcrumb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_breadcrumb WHERE brd_id = '16'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $breadcrumb['brd_name']; ?> | Yuccabe Planters</title>
  <meta name="description" content="<?php echo $breadcrumb['metadesc']; ?>" />
  <meta name="keywords" content="<?php echo $breadcrumb['metakeyword']; ?>" />

      <?php
        include 'inc/head.php';
        ?>
</head>
<body>
    <!-- Preloader Overlay -->
    <div id="overlay">
        <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
        <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
    </div>

    <div id="content" style="opacity: 0;">
        <!-- Header -->
        <?php
        include 'inc/header.php';
        ?>

        <!-- Main Content -->
        <main>
            <div class="cursor-track position-relative w-100">
                <div id="tracker" style="position: absolute; top: -20%; left: -0%; background: radial-gradient(circle, rgba(235, 205, 141, 1) 10%, rgba(235, 205, 141, .1) 70%, transparent 100%); opacity: .5; color: #fff; padding: 5px; width: 500px; height: 500px; border-radius: 100%; z-index: -1; box-shadow: rgb(225 255 0 / 75%) 0px 0px 20px 2px; display: flex; align-items: center; justify-content: center;"></div>
                
                <div class="container" style="padding-top: 40px;">
                    <div class="d-flex flex-column justify-content-center col-12 pb-5">
                        <div class="text-center">
                            <span class="getintouch" style="font-size: 8.68vw; font-weight: 600; font-family: 'Markpro'; letter-spacing: -3px;">Get In Touch</span>
                        </div>
                        <div class="d-flex justify-content-center pt-2">
                            <p class="getintouch-para" style="font-size: max(1.043vw, 12px); width: calc((2.0848vw - 2.777vw*2/48)*22); color: #3e3e3e; font-family: 'PPMori', 'Noto Sans JP', 'Noto Sans SC', sans-serif; font-weight: 100; line-height: 1.2;">
                                We'd love to hear from you. Whether you're an architect, a designer, a brand, or simply someone who loves beautiful spaces—let's create something timeless together.
                                Have a project in mind? Need a custom piece? Or just curious about how our planters can elevate your space? Drop us a message, and we'll be right there—ready to bring your green vision to life.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="contact-us" id="contact-form-section">
                <div class="cu-wrap">
                  <!-- Left — copy -->
                  <div class="cu-left">
                    <span class="cu-eyebrow">Let's Connect</span>
                    <h2 class="cu-title">
                      Have a vision<br />
                      <em>for your space?</em>
                    </h2>
                    <p class="cu-desc">
                      We collaborate with architects, designers, and hospitality brands to
                      create planters that truly transform spaces.
                    </p>
                    <div class="cu-taglines">
                      <p>We collaborate with ambitious companies and aesthetes.</p>
                      <p class="cu-cta-line">
                        Making a change starts with one conversation.{" "}
                        <strong>Let's talk!</strong>
                      </p>
                    </div>
                    <div class="cu-info-pills">
                      <a href="tel:<?= $contact['con_phone1'] ?>" class="cu-pill">📞 <?= $contact['con_phone1'] ?></a>
                      <a href="mailto:<?= $contact['con_email1'] ?>" class="cu-pill">✉️ <?= $contact['con_email1'] ?></a>
                      <a href="<?= SITE_URL ?>services" class="cu-pill">🏛️ View Services</a>
                    </div>
                  </div>
          
                  <!-- Right — form -->
                  <div class="cu-right">
                    <form  method="POST" action="<?= SITE_URL ?>mail/mail" class="hb-form" >
                                    <div class="hb-field-row">
                                        <div class="hb-field">
                                            <label for="hb-name" class="hb-label">Full Name *</label>
                                            <input id="hb-name" name="name" type="text" class="hb-input"
                                                placeholder="e.g. Rahul Sharma" required />
                                        </div>
                                        <div class="hb-field">
                                            <label for="hb-phone" class="hb-label">Phone *</label>
                                            <input id="hb-phone"  name="phone" type="tel" class="hb-input"
                                                placeholder="10-digit mobile" required maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="hb-field">
                                        <label for="hb-email" class="hb-label">Email Address *</label>
                                        <input id="hb-email"  name="email" type="email" class="hb-input" placeholder="you@example.com"
                                            required />
                                    </div>
                                    <div class="hb-field">
                                        <label for="hb-spaceType" class="hb-label">Space / Project Type</label>
                                        <select id="hb-spaceType"  name="project" class="hb-input hb-select">
                                            <option value="">Select your space type</option>
                                            <option value="Residential">Residential / Home</option>
                                            <option value="Commercial">Commercial Office</option>
                                            <option value="Hospitality">Hotel / Resort / Restaurant</option>
                                            <option value="Landscape">Landscape / Garden</option>
                                            <option value="Retail">Retail / Mall</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="hb-field">
                                        <label for="hb-message" class="hb-label">Message / Requirements</label>
                                        <textarea id="hb-message" name="message" class="hb-input hb-textarea"
                                            placeholder="Describe your space, quantity needed, preferred finishes…"
                                            rows="3"></textarea>
                                    </div>
                                    <div id="hb-alert" class="hb-alert" style="display:none;"></div>
                                    <div style="margin-bottom: 14px;">
                                        <div class="g-recaptcha" data-sitekey="6LcKuZAsAAAAACJIjQSSjX-gOScY16uJPnkgUY_z"
                                            data-theme="dark"></div>
                                    </div>
                                    <button type="submit" class="hb-submit">
                                        Request Free Quote
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                                            <path d="M3 9H15M15 9L10 4M15 9L10 14" stroke="currentColor"
                                                stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                  </div>
                </div>
            </div>
        </main>
        
        <!-- Footer -->
         <?php
        include 'inc/footer.php';
        ?>
    </div>

    <!-- Scripts -->
  <?php
        include 'inc/footer-data.php';
        ?>
    
    
    

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Mouse Tracker Logic from Contact-us.jsx
            const tracking = document.querySelector('.cursor-track');
            if (tracking) {
                tracking.addEventListener('mousemove', function (e) {
                    const x = e.clientX - 150;
                    const y = e.clientY - 100;
                    gsap.to('#tracker', {
                        x: x,
                        y: y,
                        duration: 1,
                        delay: 0.2,
                        ease: 'power2.out'
                    });
                });
            }

            // Contact Form Logic
            const contactForm = document.getElementById('contact-form');
            if(contactForm) {
                contactForm.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    
                    const alertBox = document.getElementById("contact-form-alert");
                    const showAlert = (message, type = 'danger') => {
                        alertBox.innerText = message;
                        alertBox.className = `alert alert-${type}`;
                        alertBox.classList.remove('d-none');
                        setTimeout(() => alertBox.classList.add('d-none'), 5000);
                    };

                    const formData = new FormData(contactForm);
                    const formPayload = Object.fromEntries(formData.entries());

                    const token = typeof grecaptcha !== 'undefined' ? grecaptcha.getResponse() : null;
                    if (!token) {
                        showAlert("Please complete the reCAPTCHA verification.");
                        return;
                    }
                    grecaptcha.reset();

                    formPayload.recaptcha = token;

                    try {
                        const response = await fetch('<?= SITE_URL ?>cms_forY/api/contact', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                            body: JSON.stringify(formPayload)
                        });

                        const result = await response.json();

                        if (result.status === 'success') {
                            showAlert(result.message || 'Message sent successfully!', 'success');
                            contactForm.reset();
                        } else {
                            showAlert(result.message || 'Submission failed.', 'danger');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showAlert('There was an error submitting the form.', 'danger');
                    }
                });
            }
        });
    </script>
    

    
</body>
</html>
